<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RoleController extends Controller
{
    public function addRole()
    {
        $roles=[
            ['name'=>'Administrateur'],
            ['name'=>'Editeur'],
            ['name'=>'Auteur'],
            ['name'=>'Contributeur'],
            ['name'=>'Utilisateurs'],
        ];
        Role::insert($roles);
        return "Roles are creating successfully!";
    }
    public function addUser()
    {
        $user= new User();
        $user->name='Calos';
        $user->email='calos@gmail.com';
        $user->password=Crypt::encrypt('secret');
        $user->save();

        $roleids=[3,4,5];
        $user->roles()->attach($roleids);

        return "Record has been created successfully!";

    }
    public function getAllRolesByUser($id)
    {
        $user=User::find($id);
        $roles= $user->roles;
        return $roles;
    }

    public function getAllUsersByRole($id)
    {
        $role=Role::find($id);
        $users= $role->users;
        return $users;
    }
}
