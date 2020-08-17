<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[

            [
                'id' =>'1',
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('123456789')

            ]
  
        ];
        foreach($roles as $key=>$value){
            User::create($value);
        }
    }
}
