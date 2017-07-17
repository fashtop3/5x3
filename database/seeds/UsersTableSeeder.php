<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 200)->create()->each(function ($u) {
//            $u->profile()->save(factory(App\Profile::class)->make());
//            $u->bankAccount()->save(factory(App\BankProfile::class)->make());
        });
    }
}
