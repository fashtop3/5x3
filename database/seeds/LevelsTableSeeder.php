<?php

use App\Level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create(['tag'=>'First']);
        Level::create(['tag'=>'Second']);
        Level::create(['tag'=>'Third']);

//        DB::table('levels')->insert([
//            'name' => str_random(10),
//            'email' => str_random(10).'@gmail.com',
//            'password' => bcrypt('secret'),
//        ]);
    }
}
