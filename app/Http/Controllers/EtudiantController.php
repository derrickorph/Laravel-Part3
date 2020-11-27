<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants= Etudiant::orderBy('id','DESC')->get();
        return view('etudiants',compact('etudiants'));
    }
    public function ajoutEtudiant( Request $request)
    {
        $etudiant= new Etudiant();
        $etudiant->firstname= $request->firstname;
        $etudiant->lastname= $request->lastname;
        $etudiant->email= $request->email;
        $etudiant->phone= $request->phone;
        $etudiant->save();
        return Response::json($etudiant);
    }
    public function getEtudiantById($id)
    {
        $etudiant= Etudiant::find($id);
        return Response::json($etudiant);
    }
    public function updateEtudiant(Request $request)
    {
        $etudiant= Etudiant::find($request->id);
        $etudiant->firstname= $request->firstname;
        $etudiant->lastname= $request->lastname;
        $etudiant->email= $request->email;
        $etudiant->phone= $request->phone;
        $etudiant->save();
        return Response::json($etudiant);
    }
    public function deleteEtudiant($id)
    {
        $etudiant= Etudiant::find($id);

        $etudiant->delete();
        return Response::json(['success'=>'Record has been deleted successfully!']);
    }

    public function deleteCheckedEtudiants(Request $request)
    {
        $ids= $request->ids;

       Etudiant::whereIn('id',$ids)->delete();
       return Response::json(['success'=>'Students have been deleted successfully!']);
    }

}
