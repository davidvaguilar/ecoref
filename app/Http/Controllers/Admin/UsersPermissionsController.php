<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersPermissionsController extends Controller
{
    public function update(Request $request, User $user)
    {   
        //dd($request->permissions);
       $user->permissions()->detach();
        if($request->filled('permissions')){
            $user->syncPermissions($request->permissions);
        }
        return back()->withFlash('Los permisos han sido actualizados');        
    }
}
