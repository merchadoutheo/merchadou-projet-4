<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billet;
use App\Models\Commentaire;

class CommentController extends Controller
{
    public function send(Request $request, $slug)
    {
    	// vérifier le billet
    	$billet = Billet::where('slug', '=' ,slug)->firstOrFail();

    	// vérifier le commentaire
    	$validation = \Validator::make($request->all(), [
    		'pseudo' => 'required|min:3',
    		'contenu' => 'required|min:10|max:1000'
    	]);
    	
    	// on vérifie les données et on redirige si la validation échoue
    	if ($validation->fails())
    	{
    		return redirect()->back()->withErrors($validation)->withInput();
    	}

    	// sinon on affiche l'erreur du commentaire
    	$comment = new Commentaire;
    	$comment->pseudo = $request->pseudo;
    	$comment->contenu = $request->contenu;
    	$comment->billet_id = $id;
    	$comment->save();

    	return redirect()->back();
    }
}
