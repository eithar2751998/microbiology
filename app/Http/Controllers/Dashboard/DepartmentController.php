<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DepartmentRequest;
use App\Models\Admin;
use App\Models\Department;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use PharIo\Manifest\Exception;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $departments = Department::all();
        return view('dashboard.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('dashboard.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @return RedirectResponse
     */
    public function store(DepartmentRequest $request): RedirectResponse
    {
        try {
            if ($request->hasfile('image')) {
                $name = $request->image->getClientOriginalName();
                $request->image->move(public_path() . '/departments/' . $request->name . '/', $name);
                $image = $name;
            }

            $department = new Department();
            $department->name = $request->name;
            $department->image = $image;


            if ($department->save()) {
                return redirect()->route('dashboard.dept.index')->with(['success' => __('global.success_save')]);

            } else {
                return redirect()->back()->with(['error' => __('global.error_save')]);
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard.dept.index')->with(['error' => __('global.data_error')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $dept = Department::find($id);

        return response()->json($dept);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(Department $department): View|Factory|Application
    {
        return view('dashboard.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(Request $request, Department $department): RedirectResponse
    {
        try {
            $validate = Validator::make($request->all(), [
                'name'      => 'required|min:5',
                'image'     => 'mimes:jpeg,jpg,png',
            ],[
                'image.mimes'       =>'jpeg or jpg or png'
            ]);
            if ($validate->fails()){
                return back()->withErrors($validate->errors())->withInput();
            }

            if ($department->update($request->all())){
                if($request->image != ''){
                    $path = public_path().'/department/';

                    //code for remove old file
                    if($department->image != ''  && $department->image != null){
                        $file_old = $path.$department->name.'/'.$department->file;
                        File::delete($file_old);
                    }
                    //upload new file
                    $file = $request->image;
                    $filename = $file->getClientOriginalName();
                    $file->move($path.$department->name.'/', $filename);

                    //for update in table
                    $department->update(['image' => $filename]);
                }
                return redirect()->route('dashboard.dept.index')
                    ->with(['success' => __('global.success_update')]);
            }
            else{
                return redirect()->route('dashboard.dept.index')
                    ->with(['error' => __('global.error_update')]);
            }
        }
        catch (Exception $e){
            return redirect()->route('dashboard.dept.index')
                ->with(['success' => __('global.data_error')]);
        }





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(Department $department): RedirectResponse
    {
        if ($department->forceDelete())
            return redirect()->route('dashboard.dept.index')
                ->with(['success' => __('global.success_force_delete')]);

        else
            return redirect()->route('dashboard.dept.index')
                ->with(['error' => __('global.error_force_delete')]);

    }

    public function changeStatus(Department $department): RedirectResponse
    {
        try {
            $status=$department->status == 0 ? 1 : 0;

            $department->update(['status'=>$status]);

            return redirect()->route('dashboard.dept.index')->with(['success'=>__('global.status_changed')]);

        }
        catch (\Exception $e) {

            return redirect()->route('dashboard.dept.index')->with(['error'=>__('global.try_again')]);
        }
    }
}
