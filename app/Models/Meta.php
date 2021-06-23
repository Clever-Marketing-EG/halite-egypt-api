<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Meta extends LocalizableModel
{
    use HasFactory;
    protected $guarded = [];

    public $timestamps = false;

    protected $localizable = ['content'];


    /**
     *
     *
     * @param Request $request
     * @return array
     */
    public static function validate(Request $request): array
    {
        return $request->validate([
            'content_en' => 'required|string|min:3',
            'content_ar' => 'required|string|min:3'
        ]);
    }
}
