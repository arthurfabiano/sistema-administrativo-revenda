<?php

namespace App\Providers;

use App\Models\MovimentoEstoque;
use App\Models\MovimentosFinanceiro;
use App\Observers\MovimentosEstoqueObserver;
use App\Observers\MovimentosFinanceiroObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrapFive();
        MovimentoEstoque::observe(MovimentosEstoqueObserver::class);
        MovimentosFinanceiro::observe(MovimentosFinanceiroObserver::class);
    }
}
