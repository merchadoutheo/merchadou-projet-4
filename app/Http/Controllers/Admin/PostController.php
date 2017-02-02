<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Billet;


class PostController extends Controller
{
   	public function index()
    {
    	$billets = Billet::latest()->paginate(15);
    	
    	return view('admin/AccueilAdmin')->with([
    		'billets' => $billets
		]);

    }

    public function show($id)
    {
 
    	$billet = Billet::with('commentaires')->find($id);

    	return view('showBillet')->with([
    		'billet' => $billet,
    		'commentaires' => $billet->commentaires
    	]);
    }

    public function changeStatut($id)
    {
        $billet = Billet::find($id);
        if ($billet->statut == 1) {
            $billet->statut = 0;
        }
        else{
            $billet->statut = 1;
        }
        $billet->save();
        return redirect()->back();
    }

    public function AjoutBillet() 
    {
        return view('admin/AjoutBillet');
    }

    public function send(Request $request)
    {   
        $validation = \Validator::make($request->all(), [
            'titre' => 'required|min:3',
            'contenu' => 'required|min:10|max:1000',
        ]);

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $billet = new Billet;
        $billet->titre = $request->titre;
        $billet->contenu = $request->contenu;
        $billet->statut = $request->statut;
        $billet->user_id = 1;
        $billet->save();

        return redirect()->route('accueil.admin');
    }

    public function suppression($id)
    {
        $billet = Billet::findOrFail($id);

        $billet->delete();

        return redirect()->route('accueil.admin');
    }

    public function edition($id)
    {
        $billet = Billet::findOrFail($id);

        return view('admin/modifierBillet')->with([
            'billet' => $billet]);
    }

    public function update(Request $request, $id)
    {
        
        $billet = Billet::find($id);

        $billet->titre = $request->titre;
        $billet->contenu = $request->contenu;
        $billet->statut = $request->statut;
        $billet->save();

        return redirect()->route('accueil.admin');
    }
}
