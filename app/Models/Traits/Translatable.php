<?php
/**
 * Created by PhpStorm.
 * User: Виталий
 * Date: 05.01.2021
 * Time: 19:22
 */

namespace App\Models\Traits;


use Illuminate\Support\Facades\App;

trait Translatable
{
    protected $defaultLocale = 'ru';

    public function __($originalFieldName) {
        $locale = App::getLocale() ?? $this->defaultLocale;

        if($locale === 'en') {
            $fieldName = $originalFieldName.'_en';
        } else {
            $fieldName = $originalFieldName;
        }

        if($this->$fieldName == null) { // если поле пустое, оставляем пустым
            return '';
        }

        if($locale === 'en' && (is_null($this->$fieldName)  || empty($this->$fieldName))) { // если нет английской версии поля
                return $originalFieldName;
        }

        return $this->$fieldName;
    }
}