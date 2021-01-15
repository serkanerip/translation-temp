<?php

namespace Epigra\Translation\Console;

use Illuminate\Console\Command;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Spatie\TranslationLoader\LanguageLine;

class SyncTranslationsDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:translations {--group=} {--key=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync database translations with file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->registerCustomTranslatorThatUsesFileLoader();
        $keyOption = $this->option('key');
        $groupOption = $this->option('group');
        if (is_string($keyOption)) {
            return $this->handleKey($keyOption);
        }
        if (is_string($groupOption)) {
            return $this->handleGroup($groupOption);
        }
        return $this->checkAll();
    }

    private function registerCustomTranslatorThatUsesFileLoader()
    {
        app()->singleton('translator', function ($app) {
            $loader = new FileLoader(app('files'), app('path.lang'));
            $locale = $app['config']['app.locale'];
            $trans = new Translator($loader, $locale);
            $trans->setFallback($app['config']['app.fallback_locale']);
            return $trans;
        });
    }

    private function checkAll(): int
    {
        $records = LanguageLine::all();
        foreach ($records as $record) {
            $key = $record->group . '.' . $record->key;
            $translates = $this->getTranslatesOfKey($key);
            if ($translates != $record->text) {
                $response = $this->ask("Do you want to sync $key (Y/n)", "y");
                if (strtolower($response) === 'y') {
                    $this->handleKey($key);
                }
            }
        }
        return 1;
    }

    private function handleGroup(string $group): int
    {
        $keys = __($group);
        if (is_array($keys) !== true) {
            $this->error("$group is not a valid group!");
            return -1;
        }
        foreach ($keys as $key => $_) {
            $response = $this->ask("Do you want to sync $group.$key (Y/n)", "y");
            if (strtolower($response) === 'y') {
                $this->handleKey("$group.$key");
            }
        }
        return 1;
    }

    private function handleKey(string $key): int
    {
        $translates = $this->getTranslatesOfKey($key);
        $lastDotCharPosition = strrpos($key, '.');
        $group = substr($key, 0, $lastDotCharPosition);
        $key = substr($key, $lastDotCharPosition + 1, strlen($key));
        $identifiers = [
            'group' => $group,
            'key' => $key,
        ];
        LanguageLine::query()->updateOrCreate($identifiers, ['text' => $translates]);
        $this->line("$key, Key synced with database successfully");
        return 1;
    }

    private function getTranslatesOfKey(string $key): array
    {
        $languages = config('nova-translation-editor.languages');
        $translates = [];
        foreach ($languages as $index => $lang) {
            $translates[$lang] = __($key, [], $lang);
        }
        return $translates;
    }
}
