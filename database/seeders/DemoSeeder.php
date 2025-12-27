<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Service;


class DemoSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // class user qui fait reference a users 
        //:: operateurs de portee
        
        //laravel n'accepte pas automatiquement  il faut utiliser le $fillable pour specifier les champs remplisable
        //$squared permet specifier ce qu'on ne va pas remplir
        User::create([ 
            'name' => 'Admin', 
            'email' => 'admin@test.com', 
            'role' => 'admin', 
            'password' => bcrypt('admin123') 
                ]); 
                $medecin = User::create([ 
            'name' => 'Dr. Alpha', 
            'email' => 'medecin@test.com', 
            'role' => 'medecin', 
            'password' => bcrypt('password') 
                ]); 
                Service::create([ 
            'titre' => 'Consultation générale', 
            'description' => 'Consultation de base.', 
            'prix' => 15000, 
            'duree' => 30, 
            'statut' => 'actif', 
            'medecin_id' => $medecin->id 
                ]); 
    }
}
