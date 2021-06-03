<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public static function validate(Request $request): array
    {
        return $request->validate([
            'name' => 'required|string|min:3',
            'name_ar' => 'required|string|min:3',
            'description' => 'required|string|min:3',
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

    public static function loadEnglish()
    {
        return Category::select('id', 'name', 'description', 'image_url')
            ->get()
            ->toArray();
    }
    public static function loadArabic()
    {
        return Category::select('id', 'name_ar as name', 'description_ar as description', 'image_url')
            ->get()
            ->toArray();
    }

    /**
     * Loads local version of the Category
     *
     * @return mixed
     */
    public function loadLocale()

    {
        if (App::getLocale() === 'ar') {
            return $this->where('id', $this['id'])->first([
                'id', 'name_ar as name', 'description_ar as description', 'image_url'
            ])->load([
                'products' => function ($query) {
                    $query->select('id', 'name_ar as name', 'description_ar as description', 'image_url');
                }
            ]);
        } else {
            return $this->where('id', $this['id'])->first([
                'id', 'name', 'description', 'image_url'
            ])->load([
                'products' => function ($query) {
                    $query->select('id', 'name', 'description', 'image_url');
                }
            ]);
        }
    }
}
