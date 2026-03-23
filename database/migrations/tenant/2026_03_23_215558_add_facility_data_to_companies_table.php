<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('username')->nullable()->after('name');
            $table->string('property_type')->nullable()->after('username');
            $table->string('tax_authority_id_type')->nullable()->after('account_type');
            $table->string('tax_authority_id')->nullable()->after('tax_authority_id_type');
            $table->string('country')->nullable()->after('address');
            $table->string('region')->nullable()->after('country');
            $table->string('city')->nullable()->after('region');
            $table->string('district')->nullable()->after('city');
            $table->string('street')->nullable()->after('district');
            $table->string('timezone')->nullable()->after('street');
            $table->decimal('latitude', 10, 7)->nullable()->after('timezone');
            $table->decimal('longitude', 10, 7)->nullable()->after('latitude');
            $table->string('po_box')->nullable()->after('sub_number');
            $table->string('short_address')->nullable()->after('postal_code');
            $table->string('mobile')->nullable()->after('phone');
            $table->string('fax')->nullable()->after('mobile');
            $table->string('hotline')->nullable()->after('fax');
            $table->string('website')->nullable()->after('email');
            
            // Tourism & Commercial
            $table->string('tourism_activity_type')->nullable();
            $table->string('tourism_license_no')->nullable();
            $table->date('tourism_license_expiry')->nullable();
            $table->integer('rooms_count')->nullable();
            $table->integer('beds_count')->nullable();
            $table->string('tourism_license_file')->nullable();
            $table->string('commercial_register_no')->nullable();
            $table->string('business_license_no')->nullable();
            $table->string('vat_registration_no')->nullable();
            $table->string('commercial_register_file')->nullable();
            $table->decimal('distance_from_haram', 8, 2)->nullable();
            $table->text('property_description')->nullable();
            $table->unsignedBigInteger('parent_company_id')->nullable()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn([
                'username', 'property_type', 'tax_authority_id_type', 'tax_authority_id',
                'country', 'region', 'city', 'district', 'street', 'timezone', 'latitude', 'longitude',
                'po_box', 'short_address', 'mobile', 'fax', 'hotline', 'website',
                'tourism_activity_type', 'tourism_license_no', 'tourism_license_expiry',
                'rooms_count', 'beds_count', 'tourism_license_file', 'commercial_register_no',
                'business_license_no', 'vat_registration_no', 'commercial_register_file',
                'distance_from_haram', 'property_description', 'parent_company_id'
            ]);
        });
    }
};
