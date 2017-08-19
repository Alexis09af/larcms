<?php

use Illuminate\Database\Seeder;

class RedesSocialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lc_redes_sociales')->truncate();
        DB::table('lc_redes_sociales')->insert(
        [
            [
                'fbLink' => '',
                'twtLink' => '',
                'gpLink' => '',
                'instaLink' => '',
            ]
        ]);
    }
}
