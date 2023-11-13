<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTermRequest;
use App\Models\Term;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $term = Term::all()->last();
        return view('dashboard.terms.index',compact('term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTermRequest $request)
    {
        try {
            $about=new Term();
            $about->content=$request->about;

            if ($about->save()) {
                return redirect()->route('dashboard.term.index')
                    ->with(['success'=> __('global.success_save')]);
            }
            else {
                return redirect()->back()->with(['error'=> __('global.error_save')]);
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard.term.index')->
            with(['error'=> __('global.data_error')]);
        }
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
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $term = Term::find($id);
        return view('dashboard.terms.edit',compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $term = Term::find($id);
        if ($term->update($request->all())) {
            return redirect()->route('dashboard.term.index')
                ->with(['success'=>__('global.success_update')]);
        }
        else{
            return redirect()->route('dashboard.term.index')
                ->with(['error'=>__('global.error_update')]);
        }
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
}
