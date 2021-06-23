<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LocalizableModel extends Model
{

    /**
     * Localized attributes.
     *
     * @var array
     */
    protected $localizable = [];


    /**
     * Hidden attribute for localization
     *
     * @var array
     */
    protected static $hiddenLocalizedAttributes = [];


    /**
     * Localized attribute for localization
     *
     * @var array
     */
    protected static $localizedAttributes = [];

    /**
     * Whether or not to hide translated attributes e.g. name_en
     *
     * @var boolean
     */
    protected $hideLocaleSpecificAttributes = true;


    /**
     * Whether or not to append translatable attributes to array
     * output e.g. name
     *
     * @var boolean
     */
    protected $appendLocalizedAttributes = true;


    /**
     * Make a new translatable model
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        // We dynamically append localizable attributes to array output
        // and hide the localized attributes from array output
        foreach($this->localizable as $localizableAttribute) {
            if ($this->appendLocalizedAttributes) {
                $this->appends[] = $localizableAttribute;
                self::$localizedAttributes[] = $localizableAttribute;
            }
            if ($this->hideLocaleSpecificAttributes) {
                foreach(config('app.supported_locales') as $locale) {
                    $this->hidden[] = $localizableAttribute.'_'.$locale;
                    self::$hiddenLocalizedAttributes[] = $localizableAttribute.'_'.$locale;
                }
            }
        }
        parent::__construct($attributes);
    }


    /**
     * Magic method for retrieving a missing attribute.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        // We determine the current locale and return the associated
        // locale-specific attribute e.g. name_en
        if (in_array($key, $this->localizable)) {
            $localeSpecificAttribute = $key.'_'.app()->getLocale();
            return $this->{$localeSpecificAttribute};
        }
        return parent::__get($key);
    }


    /**
     * Magic method for calling a missing instance method.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        // We handle the accessor calls for all our localizable attributes
        // e.g. getNameAttribute()
        foreach($this->localizable as $localizableAttribute) {
            if ($method === 'get'.Str::studly($localizableAttribute).'Attribute') {
                return $this->{$localizableAttribute};
            }
        }
        return parent::__call($method, $parameters);
    }


    /**
     *
     *
     * @return LocalizableModel[]|Collection
     */
    public static function allFull() {
        return parent::all()->makeVisible(self::$hiddenLocalizedAttributes)
            ->makeHidden(self::$localizedAttributes);
    }


    public function viewFull(): LocalizableModel
    {
        return $this->makeVisible(self::$hiddenLocalizedAttributes)
            ->makeHidden($this->localizable);
    }
}
