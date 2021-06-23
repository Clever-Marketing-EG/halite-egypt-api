<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class Category extends LocalizableModel
{
    use HasFactory;

    protected $guarded = [];

    protected $localizable = ['name', 'description'];

    public $timestamps = false;

    public static function validate(Request $request): array
    {
        return $request->validate([
            'name_en' => 'required|string|min:3',
            'name_ar' => 'required|string|min:3',
            'description_en' => 'required|string|min:3',
            'description_ar' => 'required|string|min:3',
            'image_url' => 'required|url'

        ]);
    }
    /**
     * Relates to projects
     *
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
