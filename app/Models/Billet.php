<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function commentaires()
    {
    	// Commentaire::class => 'App\Models\Commentaire'
    	return $this->hasMany(Commentaire::class);
    }
}
