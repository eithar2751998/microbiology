<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $admins = Admin::all();
        $trashAdmins = Admin::onlyTrashed()->latest()->paginate(15);
        return view('dashboard.admin.index',compact('admins','trashAdmins'));
    }
    public function profile(): Factory|View|Application
    {
        $admin = auth()->user();
//        dd($admin->roles()->get());
        return view('dashboard.admin.profile',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles = Role::get()->pluck('name', 'name');
        return view('dashboard.admin.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminRequest $request
     * @return RedirectResponse
     */
    public function store(AdminRequest $request): RedirectResponse
    {
        try {
            $admin=new Admin();
            $admin->name=$request->name;
            $admin->email=$request->email;
            $admin->password=Hash::make($request->password);

            if ($admin->save()) {
                $roles = $request->input('roles') ? $request->input('roles') : [];
                $admin->assignRole($roles);
                return redirect()->route('dashboard.admins.index')
                    ->with(['success'=> __('global.success_save')]);

            }
            else {
                return redirect()->back()->with(['error'=> __('global.error_save')]);
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admins.index')->
            with(['error'=> __('global.data_error')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Admin $admin
     * @return Application|Factory|View
     */
    public function edit(Admin $admin): View|Factory|Application
    {
        $roles = Role::get()->pluck('name', 'name');
        $adminRole = $admin->roles()->get();
//        dd($admin->id);
        return view('dashboard.admin.edit',compact('admin','roles','adminRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Admin $admin
     * @return RedirectResponse
     */
    public function update(Request $request, Admin $admin): RedirectResponse
    {
        try {
            $validate = Validator::make($request->all(), [
                'name'      => 'required|min:5',
                'email'     => 'required',
                'roles'     => 'required'
            ]);
            if ($validate->fails()){
                return back()->withErrors($validate->errors())->withInput();
            }
            if ( $admin->update($request->all()) ){
                $roles = $request->input('roles') ? $request->input('roles') : [];
                $admin->roles()->detach();
                $admin->assignRole($roles);
                return redirect()->route('dashboard.admins.index')
                    ->with(['success'=> __('global.success_update')]);
            }
            else{
                return redirect()->route('dashboard.admins.index')
                    ->with(['error'=> __('global.error_update')]);
            }
        }
        catch (\Exception $e) {
            return redirect()->route('dashboard.admins.index')->
            with(['error'=> __('global.data_error')]);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin $admin
     * @return RedirectResponse
     */
    public function destroy(Admin $admin): RedirectResponse
    {
        if ($admin->delete()){
            return redirect()->route('dashboard.admins.index')
                ->with(['success'=> __('global.success_delete')]);
        }
        else{
            return redirect()->route('dashboard.admins.index')
                ->with(['error'=> __('global.error_delete')]);
        }


    }
    public function changeStatus(Admin $admin)
    {
        try {
            $status=$admin->status == 0 ? 1 : 0;

            $admin->update(['status'=>$status]);

//            notify()->success(__('global.status_changed'));
            return redirect()->route('dashboard.admins.index')->with(['success'=>__('global.status_changed')]);


        } catch (\Exception $e) {
//            notify()->error(__('global.try_again'));
            return redirect()->route('dashboard.admins.index')->with(['error'=>__('global.try_again')]);
        }
    }

    public function forceDelete($id): RedirectResponse
    {
        $admin = Admin::withTrashed()->find($id);
        if ($admin->forceDelete()){
            return redirect()->route('dashboard.admins.index')
                ->with(['success'=>__('global.success_force_delete')]);
        }
        else {
            return redirect()->route('dashboard.admins.index')
                ->with(['error'=>__('global.error_force_delete')]);
        }



    }

    public function restore($id): RedirectResponse
    {
        if (Admin::withTrashed()->find($id)->restore()){
            return redirect()->route('dashboard.admins.index')
                ->with(['success'=>__('global.success_restore')]);
        }
        else {
            return redirect()->route('dashboard.admins.index')
                ->with(['error'=>__('global.error_restore')]);
        }
    }
}
