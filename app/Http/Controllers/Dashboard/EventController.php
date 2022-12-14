<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EventRequest;
use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $events = Event::all();
        return view('dashboard.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('dashboard.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return RedirectResponse
     */
    public function store(EventRequest $request): RedirectResponse
    {
        try {
            if ($request->hasfile('image')) {
                $name = $request->image->getClientOriginalName();
                $request->image->move(public_path() . '/events/' . $request->title . '/', $name);
                $image = $name;
            }
            $event = new event();
            $event->title = $request->title;
            $event->date = $request->date;
            $event->time = $request->time;
            $event->description = $request->desc;
            $event->image = $image;

            if ($event->save()) {
                return redirect()->route('dashboard.events.index')->with(['success' => __('global.success_save')]);

            } else {
                return redirect()->back()->with(['error' => __('global.error_save')]);
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard.events.index')->with(['error' => __('global.data_error')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $event = Event::find($id);
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return Application|Factory|View
     */
    public function edit(Event $event): View|Factory|Application
    {
        return view('dashboard.event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Event $event
     * @return RedirectResponse
     */
    public function update(Request $request, Event $event): RedirectResponse
    {
        try {
            $validate = Validator::make($request->all(), [
                'title'         => 'required|min:5',
                'date'          => 'required|date|after:tomorrow',
                'time'          => 'required',
                'desc'          => 'required',
                'image'         => 'mimes:jpeg,jpg,png',
            ],[
                'image.mimes'       =>'jpeg or jpg or png'
            ]);
            if ($validate->fails()){
                return back()->withErrors($validate->errors())->withInput();
            }

            if ($event->update($request->all())){
                if ($request->image != '') {
                    $path = public_path() . '/events/';

                    //code for remove old file
                    if ($event->image != '' && $event->image != null) {
                        $file_old = $path . $event->title . '/' . $event->image;
//                dd($file_old);
                        Storage::disk('public')->delete($file_old);
                    }
                    //upload new file
                    $name = $request->image->getClientOriginalName();
                    $request->image->move(public_path() . '/events/' . $request->title . '/', $name);
                    $event->update(['image' => $name]);
                }

                return redirect()->route('dashboard.events.index')
                    ->with(['success' => __('global.success_update')]);
            }
            else{
                return redirect()->route('dashboard.events.index')
                    ->with(['error' => __('global.error_update')]);
            }
        }
        catch (\Exception $e){
            return redirect()->route('dashboard.events.index')
                ->with(['error' => __('global.data_error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return RedirectResponse
     */
    public function destroy(Event $event): RedirectResponse
    {
        if ($event->forceDelete()){
            return redirect()->route('dashboard.events.index')
                ->with(['success' => __('global.success_force_delete')]);
        }
        else
            return redirect()->route('dashboard.events.index')
                ->with(['error' => __('global.error_force_delete')]);
    }

    public function changeStatus(Event $event): RedirectResponse
    {
        try {
            $status = $event->status == 0 ? 1 : 0;

            $event->update(['status'=>$status]);

            return redirect()->route('dashboard.events.index')->with(['success'=>__('global.status_changed')]);

        }
        catch (\Exception $e) {

            return redirect()->route('dashboard.events.index')->with(['error'=>__('global.try_again')]);
        }
    }
}
