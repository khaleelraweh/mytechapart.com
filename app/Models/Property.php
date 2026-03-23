<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Property extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    /**
     * Fields that are stored as translatable JSON (ar/en).
     */
    public array $translatable = [
        'name',
        'city',
        'address',
        'property_description',
    ];

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }
}
