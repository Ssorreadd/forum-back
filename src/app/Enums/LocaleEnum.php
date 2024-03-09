<?php

namespace App\Enums;

enum LocaleEnum: string
{
    case Russian = 'ru';
    case English = 'en';

    public function name(): ?string
    {
        return __('locales.'.$this->value);
    }
}
