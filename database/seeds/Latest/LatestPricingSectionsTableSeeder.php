<?php

use Illuminate\Database\Seeder;

class LatestPricingSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pricing_sections')->delete();
        
        \DB::table('pricing_sections')->insert(array (
            0 => 
            array (
                'id' => '1',
                'title' => 'Catalogo',
                'subtitle' => 'Arrastra para más -->',
            ),
        ));
        
        
    }
}