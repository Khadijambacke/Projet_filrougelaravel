<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = [ 
        'user_id', 
        'service_id', 
        'date_reservation', 
        'heure_reservation', 
        'statut', 
        'commentaire' 
        ]; 
        public function user()
        { 
            ///belongsTo: fait reference a des cardinalites (1,1)
            ////hasmany:fait reference a des cardinalite(1,n)
         return $this->belongsTo(User::class); 
       } 
       public function service()
        { 
       return $this->belongsTo(Service::class); 
       } 
    }
