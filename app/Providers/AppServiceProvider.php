<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\donhang;
use App\Models\khachhang;
use App\Models\sanpham;
use App\Models\thongke;

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
        //truyền cho tất cả các view
        view()->composer('*', function ($view) {
            $donhang_count = donhang::all()->count();
            $khachhang_count = khachhang::all()->count();
            $thongke = thongke::all();
            $tong_loinhuan = $thongke->sum('profit');
            $tong_sanpham = sanpham::all()->count();

            $view->with(compact('donhang_count', 'khachhang_count', 'tong_loinhuan', 'tong_sanpham'));
        });
    }
}
