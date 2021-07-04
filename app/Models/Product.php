<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Product extends LocalizableModel
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'image_url' => 'array',
        'description' => 'array'
    ];

    protected $localizable = ['name', 'description'];


    public $timestamps = false;


    public static function validate(Request $request): array
    {
        return $request->validate([
            'name_en' => 'required|string|min:3',
            'name_ar' => 'required|string|min:3',
            'description_en' => 'required',
            'description_ar' => 'required',
            'image_url' => 'required|array|min:1',
            'image_url.*' => 'required|url',
            // 'category_id' => 'required|integer|exists:categories,id'
        ]);
    }
}
