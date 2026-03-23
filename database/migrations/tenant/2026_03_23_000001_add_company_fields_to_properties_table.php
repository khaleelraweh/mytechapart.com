<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Add new columns first (handling existing ones later)
        Schema::table('properties', function (Blueprint $table) {
            $table->string('username')->nullable()->after('name');
            $table->string('property_type_code')->nullable()->after('username');
            $table->string('logo')->nullable()->after('property_type_code');
            $table->boolean('is_active')->default(true)->after('logo');
            $table->string('property_code')->nullable()->after('is_active');
            $table->integer('max_units')->nullable()->after('property_code');
            $table->string('account_edition')->nullable()->after('max_units');
            $table->string('tax_authority_id_type')->nullable()->after('account_edition');
            $table->string('tax_authority_id')->nullable()->after('tax_authority_id_type');
            $table->string('guest_account_status')->default('active')->after('tax_authority_id');
            $table->date('guest_account_expiry')->nullable()->after('guest_account_status');
            $table->string('country')->nullable()->after('guest_account_expiry');
            $table->string('region')->nullable()->after('country');
            $table->string('district')->nullable()->after('city');
            $table->string('street')->nullable()->after('district');
            $table->string('timezone')->nullable()->after('street');
            $table->decimal('latitude', 10, 7)->nullable()->after('timezone');
            $table->decimal('longitude', 10, 7)->nullable()->after('latitude');
            $table->string('building_number')->nullable()->after('address');
            $table->string('sub_number')->nullable()->after('building_number');
            $table->string('po_box')->nullable()->after('sub_number');
            $table->string('postal_code')->nullable()->after('po_box');
            $table->string('short_address')->nullable()->after('postal_code');
            $table->string('phone')->nullable()->after('short_address');
            $table->string('mobile')->nullable()->after('phone');
            $table->string('fax')->nullable()->after('mobile');
            $table->string('hotline')->nullable()->after('fax');
            $table->string('email')->nullable()->after('hotline');
            $table->string('website')->nullable()->after('email');
            $table->string('manager_mobile')->nullable()->after('website');
            $table->string('tourism_activity_type')->nullable()->after('manager_mobile');
            $table->string('tourism_license_no')->nullable()->after('tourism_activity_type');
            $table->date('tourism_license_expiry')->nullable()->after('tourism_license_no');
            $table->integer('rooms_count')->nullable()->after('tourism_license_expiry');
            $table->integer('beds_count')->nullable()->after('rooms_count');
            $table->string('tourism_license_file')->nullable()->after('beds_count');
            $table->string('commercial_register_no')->nullable()->after('tourism_license_file');
            $table->string('business_license_no')->nullable()->after('commercial_register_no');
            $table->string('vat_registration_no')->nullable()->after('business_license_no');
            $table->string('commercial_register_file')->nullable()->after('vat_registration_no');
            $table->decimal('distance_from_haram', 8, 2)->nullable()->after('commercial_register_file');
            $table->text('property_description')->nullable()->after('distance_from_haram');
        });

        // 2. Safely convert data to JSON format before changing column type
        $properties = \Illuminate\Support\Facades\DB::table('properties')->get();
        foreach ($properties as $property) {
            $updates = [];
            foreach (['name', 'city', 'address'] as $col) {
                if (isset($property->$col)) {
                    $val = (string) $property->$col;
                    // If it's not already JSON-like, encode it
                    if (!empty($val) && !str_starts_with(trim($val), '{')) {
                        $updates[$col] = json_encode(['ar' => $val]);
                    }
                }
            }
            if (!empty($updates)) {
                \Illuminate\Support\Facades\DB::table('properties')
                    ->where('id', $property->id)
                    ->update($updates);
            }
        }

        // 3. Now change the column types to JSON
        Schema::table('properties', function (Blueprint $table) {
            $table->json('name')->nullable()->change();
            $table->json('city')->nullable()->change();
            $table->json('address')->nullable()->change();
            $table->json('property_description')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'username', 'property_type_code', 'logo', 'is_active', 'property_code',
                'max_units', 'account_edition', 'tax_authority_id_type', 'tax_authority_id',
                'guest_account_status', 'guest_account_expiry',
                'country', 'region', 'district', 'street', 'timezone', 'latitude', 'longitude',
                'building_number', 'sub_number', 'po_box', 'postal_code', 'short_address',
                'phone', 'mobile', 'fax', 'hotline', 'email', 'website', 'manager_mobile',
                'tourism_activity_type', 'tourism_license_no', 'tourism_license_expiry',
                'rooms_count', 'beds_count', 'tourism_license_file',
                'commercial_register_no', 'business_license_no', 'vat_registration_no',
                'commercial_register_file', 'distance_from_haram', 'property_description',
            ]);
            $table->string('name')->change();
            $table->string('city')->change();
            $table->text('address')->change();
        });
    }
};
