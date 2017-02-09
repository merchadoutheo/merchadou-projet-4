<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billet;

class PostController extends Controller
{
    public function index()
    {
    	$billets = Billet::latest()->whereStatut(1)->paginate(8);
    	
    	return view('billets')->with([
    		'billets' => $billets
		]);

    }

    public function show($slug)
    {
 
    	$billet = Billet::with('commentaires')->where('slug', '=' , $slug)->firstOrFail();

    	return view('showBillet')->with([
    		'billet' => $billet,
    		'commentaires' => $billet->commentaires
    	]);
    }
}
