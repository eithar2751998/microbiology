<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {

        $subjects = Subject::all();
        return view('dashboard.subject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {

        $departments = Department::where('status',1)->get();
        return view('dashboard.subject.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validate = Validator::make($request->all(), [
                'name'          => 'required',
                'department'    => 'required',
                'image'     => 'mimes:jpeg,jpg,png|required'
            ],[
                'image.mimes'       =>'jpeg or jpg or png'
            ]);
            if ($validate->fails()){
                return back()->withErrors($validate->errors())->withInput();
            }
            if ($request->hasfile('image')) {
                $name = $request->image->getClientOriginalName();
                $request->image->move(public_path() . '/subjects/' . $request->name . '/', $name);
                $image = $name;
            }
            $subject=new Subject();
            $subject->name=$request->name;
            $subject->image=$image;
            $department = Department::find($request->department);


            if ($department->subjects()->save($subject)) {
                return redirect()->route('dashboard.subjects.index')
                    ->with(['success'=> __('global.success_save')]);

            }
            else {
                return redirect()->back()->with(['error'=> __('global.error_save')]);
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard.subjects.index')->
            with(['error'=> __('global.data_error')]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        $department = $subject->department;
        return response()->json([$subject,$department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subject $subject
     * @return Application|Factory|View
     */
    public function edit(Subject $subject): View|Factory|Application
    {
        $departments = Department::all();
        return view('dashboard.subject.edit',compact('subject','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Subject $subject
     * @return RedirectResponse
     */
    public function update(Request $request, Subject $subject): RedirectResponse
    {
        try {
            $validate = Validator::make($request->all(), [
                'name'          => 'required',
                'image'         => 'mimes:jpeg,jpg,png'
            ],[
                'image.mimes'       =>'jpeg or jpg or png'
            ]);
            if ($validate->fails()){
                return back()->withErrors($validate->errors())->withInput();
            }

            if ($subject->update($request->all())){
                if($request->image != ''){
                $path = public_path().'/subjects/';

                //code for remove old file
                if($subject->image != ''  && $subject->image != null){
                    $file_old = $path.$subject->name.'/'.$subject->file;
                    File::delete($file_old);
                }
                //upload new file
                $file = $request->image;
                $filename = $file->getClientOriginalName();
                $file->move($path.$subject->name.'/', $filename);

                //for update in table
                $subject->update(['image' => $filename]);
            }
                return redirect()->route('dashboard.subjects.index')
                    ->with(['success' => __('global.success_update')]);
            }
            else{
                return redirect()->route('dashboard.subjects.index')
                    ->with(['error' => __('global.error_update')]);
            }
        }
        catch (\Exception $e){
            return redirect()->route('dashboard.subjects.index')
                ->with(['error' => __('global.data_error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subject $subject
     * @return RedirectResponse
     */
    public function destroy(Subject $subject): RedirectResponse
    {
        if($subject->forceDelete()){
            return redirect()->route('dashboard.subjects.index')
                ->with(['success' => __('global.success_force_delete')]);
        }
        else{
            return redirect()->route('dashboard.subjects.index')
                ->with(['error' => __('global.error_force_delete')]);
        }

    }

    public function changeStatus(Subject $subject): RedirectResponse
    {
        try {
            $status = $subject->status == 0 ? 1 : 0;
            $subject->update(['status' => $status]);

            return redirect()->route('dashboard.subjects.index')->with(['success'=>__('dashboard/admin.status_changed')]);


        } catch (\Exception $e) {

            return redirect()->route('dashboard.subjects.index')->with(['error'=>__('global.try_again')]);
        }
    }
}
