<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    public function billet()
    {
    	return $this->belongsTo(Billet::class);
    }
}
