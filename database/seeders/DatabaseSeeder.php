<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus impedit odit ut amet facilis quas dolore, veritatis sunt fuga ipsa.',
            'contact' => 'contact',
            'termsofservice' => 'termsofservice',
            'privacypolice' => 'privacypolice'
        ]);
    }
}
