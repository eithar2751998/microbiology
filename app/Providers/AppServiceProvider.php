<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Commingsoon;
use App\Models\Department;
use App\Models\Event;
use App\Models\Review;
use Carbon\Carbon;
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
            $reviews = Review::where('status',1)->paginate(10);
            $about = About::orderBy('id', 'DESC')->first();
            $courses = Department::where('status',1)->orderBy('id', 'DESC')->paginate(6);
            $comingSoons = Commingsoon::where('status',1)->orderBy('id', 'DESC')->paginate(3);
            $currentDateTime = Carbon::now();
            $upcomingEvents = Event::where([
                ['date','>',$currentDateTime->toDateString()],
                ['status',1]
            ])->paginate(3);
            $finishedEvents = Event::where([
                ['date','<',$currentDateTime->toDateString()],
                ['status',1]
            ])->paginate(6);
            $view->with(['courses' => $courses, 'reviews' => $reviews, 'about' => $about, 'comingSoons' => $comingSoons,
                'upcomingEvents' => $upcomingEvents, 'finishedEvents' => $finishedEvents]);
        });
    }
}
