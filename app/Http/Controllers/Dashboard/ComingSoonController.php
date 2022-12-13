<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Commingsoon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ComingSoonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $comingsSoon = Commingsoon::all();
        return view('dashboard.comingSoon.index',compact('comingsSoon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('dashboard.comingSoon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->hasfile('image')) {
            $name = $request->image->getClientOriginalName();
            $request->image->move(public_path() . '/comingSoon/' . $request->title . '/', $name);
            $image = $name;
        }

        try {
            $coming = new Commingsoon();
            $coming->title = $request->title;
            $coming->description = $request->desc;
            $coming->image = $image;

            if ($coming->save()) {
                return redirect()->route('dashboard.coming.index')->with(['success' => __('global.success_save')]);

            } else {
                return redirect()->back()->with(['error' => __('global.error_save')]);
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard.coming.index')->with(['error' => __('global.data_error')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $comingSoon = Commingsoon::find($id);
        return response()->json($comingSoon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $comingSoon = Commingsoon::findOrFail($id);

        return view('dashboard.comingSoon.edit',compact('comingSoon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $comingSoon = Commingsoon::findOrFail($id);

        $comingSoon->update($request->all());

        if ($request->image != '') {
            $path = public_path() . '/comingSoon/';

            //code for remove old file
            if ($comingSoon->image != '' && $comingSoon->image != null) {
                $file_old = $path . $comingSoon->title . '/' . $comingSoon->image;
//                dd($file_old);
                Storage::disk('public')->delete($file_old);
            }
            //upload new file
            $name = $request->image->getClientOriginalName();
            $request->image->move($path . $request->title . '/', $name);
            $comingSoon->update(['image' => $name]);
        }

        return redirect()->route('dashboard.coming.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $comingSoon = Commingsoon::findOrFail($id);
        $comingSoon->forceDelete();
        return redirect()->route('dashboard.coming.index');
    }

    public function changeStatus($id): RedirectResponse
    {
        $comingSoon = Commingsoon::findOrFail($id);
        try {
            $status = $comingSoon->status == 0 ? 1 : 0;

            $comingSoon->update(['status'=>$status]);

            return redirect()->route('dashboard.coming.index')->with(['success'=>__('dashboard/admin.status_changed')]);

        }
        catch (\Exception $e) {

            return redirect()->route('dashboard.coming.index')->with(['error'=>__('global.try_again')]);
        }
    }
}
