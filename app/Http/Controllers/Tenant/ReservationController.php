<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Unit;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('company_id', session('active_company_id'))->with(['unit.property', 'customer'])->orderBy('check_in', 'desc')->get();
        return view('tenant.reservations.index', compact('reservations'));
    }

    public function create()
    {
        // Fetch units not marked as maintenance
        $units = Unit::with(['property', 'floor'])
            ->whereHas('property', function($q) {
                $q->where('company_id', session('active_company_id'));
            })
            ->where('status', '!=', 'maintenance')
            ->get();
            
        $customers = Customer::where('company_id', session('active_company_id'))->orderBy('name')->get();
        return view('tenant.reservations.create', compact('units', 'customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'unit_id' => 'required|exists:units,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $unit = Unit::findOrFail($validated['unit_id']);
        $checkIn = Carbon::parse($validated['check_in']);
        $checkOut = Carbon::parse($validated['check_out']);

        // Check for overlapping dates natively 
        $overlap = Reservation::where('unit_id', $unit->id)
            ->whereIn('status', ['confirmed', 'checked_in'])
            ->where(function($query) use ($checkIn, $checkOut) {
                // overlap condition: existing stays dates intersect with requested dates
                $query->where(function($q) use ($checkIn, $checkOut) {
                    $q->where('check_in', '<', $checkOut)
                      ->where('check_out', '>', $checkIn);
                });
            })->exists();

        if ($overlap) {
            return back()->with('error', 'The selected room is already booked during these dates.')->withInput();
        }

        $nights = $checkIn->diffInDays($checkOut);
        if ($nights == 0) $nights = 1;

        $total_price = $unit->price * $nights;

        Reservation::create([
            'company_id' => session('active_company_id'),
            'unit_id' => $unit->id,
            'customer_id' => $validated['customer_id'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'nights' => $nights,
            'total_price' => $total_price,
            'status' => 'confirmed'
        ]);

        // Auto-update unit status if checking in today
        if ($checkIn->isToday()) {
            $unit->update(['status' => 'booked']);
        }

        return redirect()->route('reservations.index')->with('success', 'Reservation confirmed successfully.');
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:confirmed,checked_in,checked_out,cancelled'
        ]);

        $reservation->update(['status' => $validated['status']]);

        // Auto-sync room availability
        if ($validated['status'] == 'checked_in') {
            $reservation->unit->update(['status' => 'booked']);
        } elseif (in_array($validated['status'], ['checked_out', 'cancelled'])) {
            $reservation->unit->update(['status' => 'available']);
        }

        return back()->with('success', 'Reservation status updated.');
    }

    public function destroy(Reservation $reservation)
    {
        if (in_array($reservation->status, ['confirmed', 'checked_in'])) {
            $reservation->unit->update(['status' => 'available']);
        }
        $reservation->delete();
        return back()->with('success', 'Reservation deleted.');
    }
}
