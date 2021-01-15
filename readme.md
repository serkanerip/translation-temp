# Epigra/Translation

This package is builted on spatie/laravel-translation-loader and 
bernhardh/nova-translation-editor packages.

## What This Packages Do

* Add your translations to database
* Edit your translations in nova
* Sync your file lang resources with database

## How To Download

```
composer require epigra/translation
```

## How To Use

1. Add NovaTranslationEditor to NovaServiceProvider
```php
public function tools()
{
    return [
        ...
        new Epigra\Translation\NovaTranslationEditor()
    ];
}
```
2. Publish Nova Translation Editor Config
```bash
php artisan vendor:publish --provider="Bernhardh\NovaTranslationEditor\ToolServiceProvider"
```
3. Add your groups and languages to nova-translation-editor.config

## Commands

### sync:translations {--group=} {--key=}

This command sync's your database with lang resource files. You can specify a specific group or key with optional parameters.
In default, it will check if there is a different in database and file version of key if there is it will ask you to sync.