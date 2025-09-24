<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(Request $request): void
    {
        // بررسی پارامتر lang در query string
        if ($request->has('lang')) {
            $lang = $request->get('lang');
            $available = ['fa', 'en', 'ar']; // زبان‌های مجاز
            if (in_array($lang, $available)) {
                Session::put('locale', $lang);
            }
        }

        // ست کردن زبان از session یا استفاده از پیش‌فرض
        $locale = Session::get('locale', 'fa'); // fa پیش‌فرض
        App::setLocale($locale);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
