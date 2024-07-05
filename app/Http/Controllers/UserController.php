<?php

namespace App\Http\Controllers;
use App\Models\User;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users=User::get();
       return view('role-permission.user.index',[
        'users'=>$users
       ]);
        
     
    }
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('role-permission.user.create',[
            'roles' =>$roles
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:20',
            'roles'=>'required'
            ]);
            $user = User::create([
                'name' => $request->name,
                'email'=> $request->email,
                'password'=>Hash::make($request->password),
            ]);
            $user->syncRoles($request->roles);
            return redirect('/users')->with('status','User Created successfully');
    }
    public function edit(User $user)
    {
        
        $roles = Role::pluck('name','name')->all();
        $userRoles=$user->roles->pluck('name','name')->all();
        return view('role-permission.user.edit',[
            'user'=>$user,
            'roles'=>$roles,
            'userRoles'=>$userRoles
            
        ]
    );

    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            
            'password' => 'nullable|string|max:20',
            'roles'=>'required'
            ]); 
            $date=[
                'name' => $request->name,
                'email'=> $request->email,
                'password'=>Hash::make($request->password),
            ];
            if(!empty($request->password)){
                $date +=[
                    'password'=>Hash::make($request->password),
                ];
                $user->update($date);
                $user->syncRoles($request->roles);
                return redirect('/users')->with('status','Updated Created successfully');
            }

           
    }
    public function destroy($userId)
    {
        $user=User::find($userId);
        $user->delete();
        return redirect('/users')->with('status', 'User Deleted  Successfully');
        
    }

}
