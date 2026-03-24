<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UnitType;
use App\Models\UnitClassification;

class UnitCustomizationSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'غرفة', 'غرفة وصالة', 'غرفتين وصالة', 'جناح', 'جناح ملكي', 'مطعم',
            'جناح عرسان', 'خيمة', 'مكتب', 'مكتب خاص', 'قاعة', 'غرفة ثلاثية',
            'VIP', 'قاعة طعام', 'صالة افراح', 'فيلا', 'فيلا بمسبح', 'جناح بشرفة'
        ];

        foreach ($types as $type) {
            UnitType::firstOrCreate(['name_ar' => $type], ['is_active' => true]);
        }

        $classifications = ['شقة', 'شاليه', 'غرفة', 'وحدة'];

        foreach ($classifications as $classification) {
            UnitClassification::firstOrCreate(['name_ar' => $classification], ['is_active' => true]);
        }
    }
}
