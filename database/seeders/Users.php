<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfils')->insert([
            'name' => 'PROMOTOR',
        ]);

        DB::table('perfils')->insert([
            'name' => 'SUPERVISOR',
        ]);

        DB::table('perfils')->insert([
            'name' => 'ADMINISTRADOR',
        ]);
      
        DB::table('users')->insert([
            'usuario_login'=> 'JPEREZ',
            'trabajador' => 'JUAN PEREZ LOPEZ',
            'id_perfil' => 1,
            'password' => Hash::make('12345'),
            
        ]);
        
        DB::table('users')->insert([
            'usuario_login'=> 'JROBLES',
            'trabajador' => 'JOSE ROBLES JAUJO',
            'id_perfil' => 1,
            'password' => Hash::make('43432'),
            
        ]);
        
        DB::table('users')->insert([
            'usuario_login'=> 'MROJAS',
            'trabajador' => 'MARIA ROJAS VILLAFANE',
            'id_perfil' => 2,
            'password' => Hash::make('23454'),
            
        ]);
        DB::table('users')->insert([
            'usuario_login'=> 'MCASAS',
            'trabajador' => 'MIGUEL CASAS LEGUIA',
            'id_perfil' => 3,
            'password' => Hash::make('98778'),
            
        ]);

    }
}
