<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Commentaire;

class CommentController extends Controller
{
    public function index()
    {
    	$commentaires = Commentaire::latest()->paginate(15);


    	return view('admin/indexCommentaires')->with([
    		'commentaires' => $commentaires

    	]);
    }

    public function changeStatut($id)
    {
    	$commentaire = Commentaire::findOrFail($id);

    	if ($commentaire->statut == 1) {
    		$commentaire->statut = 0;
    	}
    	else{
    		$commentaire->statut = 1;
    	}

    	$commentaire->save();

    	return redirect()->route('index.commentaire');
    }

    public function suppression($id)
    {
        $commentaire = Commentaire::findOrFail($id);

        $commentaire->delete();

        return redirect()->route('index.commentaire');
    }

    public function voirCommentaire($id)
    {
        $commentaire = Commentaire::findOrFail($id);

        return view('admin/voirCommentaire')->with([
            'commentaire' => $commentaire
        ]);
    }
}
