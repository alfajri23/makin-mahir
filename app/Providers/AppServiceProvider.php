<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\NotifikasiUser;

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
        
        Paginator::useBootstrap();

        View()->composer('component.notifikasi.notifikasi', function ($view) {
            $data = NotifikasiUser::where('tipe','public')
            ->orWhere('id_user',auth()->user()->id)
            ->get();

            //var_dump($data);
            
            $view->with('data', $data);
        });
    }
}
