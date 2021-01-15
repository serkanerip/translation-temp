<?php

namespace Epigra\Translation\Models;

use Spatie\TranslationLoader\LanguageLine as BaseModel;

class Translation extends BaseModel
{
    protected $table = 'language_lines';
}
