<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Commingsoon;
use App\Models\Department;
use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
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
        return view('front.index',compact('about','courses','comingSoons',
            'upcomingEvents','finishedEvents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function contactUs(){

        return view('front.contact_us');
    }
    public function sendContactUs(Request $request){
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|email',
//            'message' => 'required',
//        ]);
//        dd('test');

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        // Change 'to' to your desired email address
//        Mail::to('your-email@example.com')->send(new ContactMail($data));
        dd(Mail::to('micro.info@success-micro.com')->send(new ContactMail($data)));

            return redirect('/home')->with('success', 'Your message has been sent!');

    }
}
