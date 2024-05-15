<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reclamation;

class reclamationController extends Controller
{
    public function index(){
        $reclamation = Reclamation::all();
        return view('reclamations.index',['reclamations' => $reclamation]);

    }

    public function create(){
        return view('reclamations.create');
    }

    public function store(Request $request){
        $data = $request->validate ([
            'jesuis' => 'required',
            'typereclam'=> 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'cne' => 'required',
            'email' => 'required',
            'etablissement' => 'required',
            'message' => 'required',
        ]);

        $newReclamation = Reclamation::create($data);

        return redirect(route('reclamation.index'));
    }
    
    public function edit(Reclamation $reclamation){
        return view('reclamations.edit',['reclamation' => $reclamation]);
    }

    public function update(Reclamation $reclamation, Request $request){
        $data = $request->validate ([
            'jesuis' => 'required',
            'typereclam'=> 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'cne' => 'required',
            'email' => 'required',
            'etablissement' => 'required',
            'message' => 'required',
        ]);

        $reclamation->update($data);
        return redirect(route('reclamation.index'))->with('success','reclamation updated succesffully');
    }

    public function destroy(Reclamation $reclamation){
        $reclamation->delete();
        return redirect(route('reclamation.index'))->with('success','reclamation deleted succesffully');
        
    }

    public function treat(Request $request)
    {
        // $reclamation = Reclamation::where('id',$request->id)->update(array('status'=> 1));
        $reclamation = Reclamation::findOrFail($request->id);
        $reclamation->status = 1;
        $reclamation->save();

        // Additional logic for treating the form

        return redirect()->route('admin.admin_dashboard')->with('success', 'Form treated successfully.');
    }
}
