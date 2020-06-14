<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Mail;
Use Image;
use App\Mail\LoginCredentials;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
//use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::all();
        $users = User::allowed()->get();        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        $roles = Role::with('permissions')->get();
        //$permissions = Permission::pluck('name','id');
        $permissions = Permission::all();
        return view('admin.users.create', compact('user', 'roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', new User);
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);
        $data['password'] = str_random(8);

        $user = User::create($data);
        $user->phone = $request->get('phone');
        $user->save();

        if ($request->filled('roles')){
            $user->assignRole($request->roles);
        }
        if ($request->filled('permissions')){
            $user->givePermissionTo($request->permissions);
        }

        //ENVIAR EMAIL EnviarCorreoConCredenciales
        //UserWasCreated::dispatch($user, $data['password']); DESDE MAILSHIP
        /* FIN ENVIO CORREO*/
        Mail::to($user->email)->send(new LoginCredentials($user, $data['password']));

        return redirect()->route('admin.users.index')->withFlash('El usuario ha sido creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        //$roles = Role::pluck('name','id');
        $roles = Role::with('permissions')->get();
        //$permissions = Permission::pluck('id', 'display_name','name');
        $permissions = Permission::all();
        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        /*$rules = [
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
        ];

        if($request->filled('password')){
            $rules['password'] = ['confirmed', 'min:6'];
        }*/

        //$data = $request->validate($rules);
        $data = $request->validated();
        $user->update($data);
        $user->phone = $request->get('phone');
        $user->save();
        return redirect()->route('admin.users.edit', $user)->withFlash('Usuario actualizado');
    }

    public function signature(Request $request, User $user){
        $this->validate($request, [
            'signature' => 'required|image'
        ]); 
        $this->authorize('update', $user);

        $file = $request->file('signature');
        $image_name = uniqid().'.'.$file->getClientOriginalExtension();
        $image = Image::make($file);
        $image->save('img/users/'.$image_name);

        $user->url = '/img/users/'.$image_name;
        $user->save();

        return back()->withFlash('Se le ha asignado una firma');
       // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('admin.users.index')->withFlash('Usuario eliminado');
    }
}
