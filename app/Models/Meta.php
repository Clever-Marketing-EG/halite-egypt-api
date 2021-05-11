<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Meta extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $timestamps = false;

    /**
     *
     *
     * @param Request $request
     * @return array
     */
    public static function validate(Request $request): array
    {
        return $request->validate([
            'content' => 'required|string|min:3',
            'content_ar' => 'required|string|min:3'
        ]);
    }

    /**
     * Load Arabic Meta from the database
     *
     * @return mixed
     */
    public static function loadArabic()
    {
        return Meta::select('id', 'name', 'content_ar as content', 'type', 'page')
            ->get()
            ->toArray();
    }
    /**
     * Load English Meta from the database
     *
     * @return mixed
     */
    public static function loadEnglish()
    {
        return Meta::select('id', 'name', 'content', 'type', 'page')
            ->get()
            ->toArray();
    }

    /**
     * Loads local version of the meta
     *
     * @return mixed
     */
    public function loadLocale()

    {
        if (App::getLocale() === 'ar') {
            return $this->where('id', $this['id'])->first([
                'id', 'name', 'content_ar as content', 'type', 'page'
            ]);
        } else {
            return $this->where('id', $this['id'])->first([
                'id', 'name', 'content', 'type', 'page'
            ]);
        }
    }
}
