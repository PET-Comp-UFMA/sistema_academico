<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('unique_email_in_professors', function ($attribute, $value, $parameters, $validator) {
            // Verifique se o email não existe na tabela "Professor" com base no campo "user_id".
            $exists = DB::table('professor')
                ->join('users', 'users.id', '=', 'professor.user_id')
                ->where('users.email', $value)
                ->exists();
            return !$exists;
        });
    }
}
