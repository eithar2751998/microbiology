<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\Review;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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

        View::composer('*', function($view)
        {
            $courses = Department::where('status',1)->paginate(6);
            $reviews = Review::where('status',1)->paginate(10);
            $view->with(['courses' => $courses, 'reviews' => $reviews]);
        });
    }
}
