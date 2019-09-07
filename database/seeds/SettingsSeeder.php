<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'blog_name'=>'Fedora Linux blog',
            'phone'=>'0108070718',
            'blog_email'=>'abdo@gmail.com',
            'address'=>'Mansoura-Egupt',
        ]);
    }
}
