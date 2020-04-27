<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        return view('admin.permissions.index',[
            'permissions' => Permission::all()
        ]);
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit',[
            'permission' => $permission
        ]);
    }
}
