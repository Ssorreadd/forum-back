<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseTranslatableModel extends Model
{
    protected $casts = [
        'title' => 'array',
    ];

    protected $appends = ['value'];

    public function getValueAttribute(): string
    {
        return $this->title[app()->getLocale()] ?? $this->title[config('settings.default_language')];
    }
}
