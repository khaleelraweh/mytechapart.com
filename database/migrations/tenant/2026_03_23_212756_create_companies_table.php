<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Can be translatable json or string
            $table->string('status')->default('active'); // حالة الحساب
            $table->date('nazeel_account_expiry')->nullable(); // تاريخ انتهاء صلاحية نزيل
            $table->string('facility_code')->nullable(); // رمز المنشأة
            $table->integer('max_units')->nullable(); // أقصى عدد الوحدات
            $table->string('account_type')->nullable(); // حالة الحساب مثل أساسي
            $table->text('address')->nullable(); // العنوان
            $table->string('building_number')->nullable(); // رقم المبنى
            $table->string('sub_number')->nullable(); // الرقم الفرعي
            $table->string('postal_code')->nullable(); // الرمز البريدي
            $table->string('email')->nullable(); // البريد الإلكتروني
            
            // Other editable fields by the tenant:
            $table->string('phone')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('logo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
