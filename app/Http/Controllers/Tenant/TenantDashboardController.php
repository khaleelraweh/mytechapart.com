<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Floor;
use App\Models\Unit;
use App\Models\Reservation;

class TenantDashboardController extends Controller
{
    public function index()
    {
        $metrics = [
            'total_properties' => Property::count(),
            'total_floors' => Floor::count(),
            'total_units' => Unit::count(),
            'total_reservations' => Reservation::count(),
            'occupancy_rate' => $this->calculateOccupancyRate(),
            // Averages requested:
            'floors_per_property' => Property::count() > 0 ? round(Floor::count() / Property::count(), 2) : 0,
            'units_per_floor' => Floor::count() > 0 ? round(Unit::count() / Floor::count(), 2) : 0,
        ];

        return view('tenant.dashboard', compact('metrics'));
    }

    private function calculateOccupancyRate()
    {
        $totalUnits = Unit::count();
        if ($totalUnits === 0) return 0;

        $occupiedUnits = Unit::where('status', 'booked')->count();
        return round(($occupiedUnits / $totalUnits) * 100, 2);
    }
}
