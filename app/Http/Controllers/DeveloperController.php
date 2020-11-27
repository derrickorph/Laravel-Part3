<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function addDeveloper()
    {
        $developer= new Developer();
        $developer->name='Derrick';
        $developer->email='DERRICK@gmail.com';
        $developer->phone='123456789';
        $developer->save();
        return "Enregistrement effectué";
    }
    public function getDeveloper()
    {
        return Developer::all();
    }
}
