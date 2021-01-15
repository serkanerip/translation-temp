<?php

namespace Epigra\Translation\Tests\Feature;

use Epigra\Translation\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Spatie\TranslationLoader\LanguageLine;

class TranslationTest extends TestCase
{
    public function test_it_should_have_no_record_in_language_lines()
    {
        $this->assertCount(0, LanguageLine::all());
    }

    public function test_it_should_use_spatie_loader()
    {
        LanguageLine::query()->create([
            'group' => 'ex',
            'key' => 'key',
            'text' => [
                'en' => ':field is required',
                'tr' => ':field alanı zorunlu'
            ]
                                      ]);
        $this->app->setLocale('tr');
        $localizedMessage = __('ex.key');
        $this->assertEquals(':field alanı zorunlu', $localizedMessage);
    }

    public function test_it_should_have_sync_db_command()
    {
        $exitCode = Artisan::call('sync:translations');
        $this->assertEquals(1, $exitCode);
    }
}