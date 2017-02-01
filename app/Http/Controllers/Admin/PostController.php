<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
   	public function index()
    {
    	$billets = Billet::latest()->whereStatut(1)->paginate(5);
    	
    	return view('billets')->with([
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
}
