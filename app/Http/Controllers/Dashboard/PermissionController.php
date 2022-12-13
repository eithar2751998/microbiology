<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePermissionsRequest;
use App\Http\Requests\Dashboard\UpdatePermissionsRequest;
use App\Models\Contact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $permissions = Permission::all();

        return view('dashboard.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('dashboard.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePermissionsRequest $request
     * @return RedirectResponse
     */
    public function store(StorePermissionsRequest $request)
    {
        Permission::create($request->all());

        return redirect()->route('dashboard.permissions.index');
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
     * @param Permission $permission
     * @return Application|Factory|View
     */
    public function edit(Permission $permission)
    {
        return view('Dashboard.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePermissionsRequest $request
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function update(UpdatePermissionsRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route('dashboard.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('dashboard.permissions.index');
    }
}
