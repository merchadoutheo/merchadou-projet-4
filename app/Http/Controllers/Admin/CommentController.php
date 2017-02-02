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
}
