<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    public function addEleve(){
        return view('add-eleve');
    }

    public function storeEleve(Request $request){

        $name= $request->name;
        $image= $request->file('file');
        $imageName= time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $eleve=new Eleve();
        $eleve->name=$name;
        $eleve->profileimage=$imageName;
        $eleve->save();
        return back()->with('eleve_added','Elève enregistré(e) avec succès!');
    }
    public function eleves(){
        $eleves=Eleve::all();
        return view('all-eleves',compact('eleves'));
    }
    public function editEleve($id){
        $eleve=Eleve::find($id);
        return view('edit-eleve',compact('eleve'));
    }
    public function updateEleve(Request $request){

        $name= $request->name;
        $image= $request->file('file');
        $imageName= time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $eleve= Eleve::find($request->id);
        $eleve->name= $name ;
        $eleve->profileimage= $imageName;
        $eleve->save();
        return back()->with('eleve_updated','Informations modifiées avec succès!');

    }
    // public function getPostById($id){
    //     $post=Eleve::where('id',$id)->first();
    //     return view('single-post',compact('post'));
    // }

    public function deleteEleve($id){
        $eleve=Eleve::find($id);
        unlink(public_path('images').'/'.$eleve->profileimage);
        $eleve->delete();
        return back()->with('eleve_deleted','Elève supprimer avec succès!');

    }

}
