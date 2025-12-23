<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    protected $fillable = [ 
        'titre', 
        'description', 
        'prix', 
        'duree', 
        'statut', 
        'medecin_id' 
        ];
        public function reservations()
        { 
          ///hasmany fait references aux  nombreux reservations
          return $this->hasMany(Reservation::class); 
       } 
     
        public function medecin()
        ///belongs fait reference aux fait que un service et gerer pa un et un medecin
        { 
       return $this->belongsTo(User::class, 'medecin_id'); 
       }     
}
