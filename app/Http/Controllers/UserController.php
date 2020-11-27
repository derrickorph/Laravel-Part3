<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Phone,User};
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function insertRecord()
    {
        $phone= new Phone();
        $phone->phone="0123456789";
        $user= new User();
        $user->name='Derrick';
        $user->email='ahouis@gmail.com';
        $user->password=Crypt::encrypt('secret');
        $user->save();
        $user->phone()->save($phone);
        return "Record has been created successfully!";

    }

    public function fetchPhoneById($id)
    {
        $phone=User::find($id)->phone;
        return $phone;
    }
}
