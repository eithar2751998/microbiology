<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AboutRequest;
use App\Models\About;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $about = About::all()->last();
        return view('dashboard.about.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('dashboard.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AboutRequest $request
     * @return RedirectResponse
     */
    public function store(AboutRequest $request): RedirectResponse
    {
        try {
            $about=new About();
            $about->header=$request->header;
            $about->content=$request->about;

            if ($about->save()) {
                return redirect()->route('dashboard.about.index')
                    ->with(['success'=> __('global.success_save')]);
            }
            else {
                return redirect()->back()->with(['error'=> __('global.error_save')]);
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard.about.index')->
            with(['error'=> __('global.data_error')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param About $about
     * @return Application|Factory|View
     */
    public function edit(About $about)
    {
        return view('dashboard.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param About $about
     * @return RedirectResponse
     */
    public function update(Request $request, About $about): RedirectResponse
    {
        if ($about->update($request->all())) {
            return redirect()->route('dashboard.about.index')
                ->with(['success'=>__('global.success_update')]);
        }
        else{
            return redirect()->route('dashboard.about.index')
                ->with(['error'=>__('global.error_update')]);
        }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
