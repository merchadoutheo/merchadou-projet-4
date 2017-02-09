<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function show($slug)
    {
 
    	$billet = Billet::with('commentaires')->where('slug', '=' ,$slug)->firstOrFail();

    	return view('showBillet')->with([
    		'billet' => $billet,
    		'commentaires' => $billet->commentaires
    	]);
    }

    public function changeStatut($slug)
    {
        $billet = Billet::where('slug', '=' ,$slug)->firstOrFail();
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
            'titre' => 'required|min:3|unique:billets',
            'contenu' => 'required|min:10|max:10000',
            'vignette' => 'image'
        ]);

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

            
        
        $billet = new Billet;
        $billet->titre = $request->titre;
        $billet->slug = str_slug($request->titre);
        $billet->contenu = $request->contenu;
        $billet->statut = $request->statut;

        if($request->vignette):
            $ext = $request->vignette->guessClientExtension();
            $request->vignette->storeAs('img/Vignette/', str_slug('vignette-'.$request->titre).'.'.$ext);
            $billet->urlImg = 'img/Vignette/'.str_slug('vignette-'.$request->titre).'.'.$ext;
        endif;   
        
        $billet->user_id = 1;
        $billet->save();

        return redirect()->route('accueil.admin');
    }

    public function suppression($slug)
    {
        $billet = Billet::where('slug', '=' ,$slug)->firstOrFail();

        $billet->delete();

        return redirect()->route('accueil.admin');
    }

    public function edition($slug)
    {
        $billet = Billet::where('slug', '=' ,$slug)->firstOrFail();

        return view('admin/modifierBillet')->with([
            'billet' => $billet]);
    }

    public function update(Request $request, $slug)
    {
         $validation = \Validator::make($request->all(), [
            'titre' => 'required|min:3',
            'contenu' => 'required|min:10|max:10000',
            'vignette' => 'image'
        ]);

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        
        $billet = Billet::where('slug', '=' ,$slug)->firstOrFail();

        $billet->titre = $request->titre;
        $billet->contenu = $request->contenu;
        $billet->statut = $request->statut;

        if($request->vignette != null)
        {
            $ext = $request->vignette->guessClientExtension();
            $request->vignette->storeAs('img/Vignette/', str_slug('vignette-'.$request->titre).'.'.$ext);
            $billet->urlImg = 'img/Vignette/'.str_slug('vignette-'.$request->titre).'.'.$ext;
        }

        $billet->save();

        return redirect()->route('accueil.admin');
    }
}
