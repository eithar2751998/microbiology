<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreRolesRequest;
use App\Http\Requests\Dashboard\UpdateRolesRequest;
use App\Models\Contact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $roles = Role::all();

        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {

        $permissions = Permission::get()->pluck('name', 'name');

        return view('dashboard.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRolesRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRolesRequest $request)
    {
        $role = Role::create($request->except('permission'));
        if ($role == true){
            $permissions = $request->input('permission') ? $request->input('permission') : [];
            $role->givePermissionTo($permissions);
            return redirect()->route('dashboard.roles.index')->with(['success'=> __('global.success_save')]);
        }
        else {
                return redirect()->route('dashboard.roles.index')->with(['error'=> __('global.error_save')]);
        }





    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return Application|Factory|View
     */
    public function show(Role $role)
    {
        $role->load('permissions');

        return view('dashboard.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Application|Factory|View
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get()->pluck('name', 'name');

        return view('dashboard.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRolesRequest $request
     * @param Role $role
     * @return RedirectResponse
     */
    public function update(UpdateRolesRequest $request, Role $role)
    {
        $role->update($request->except('permission'));
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('dashboard.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('dashboard.roles.index');
    }
}
