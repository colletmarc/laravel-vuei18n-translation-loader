<?php

namespace Ykmar\VueI18nTranslationLoader;

use Illuminate\Support\ServiceProvider;

class VueI18nTranslationLoaderServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
