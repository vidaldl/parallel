<?php

use Illuminate\Database\Seeder;

class LatestMenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_items')->delete();
        
        \DB::table('menu_items')->insert(array (
            0 => 
            array (
                'id' => '1',
                'logo' => 'content/menu/obrBizO7KByC6bYifV6WcJfA5MFh7ZqPnhDEwZHB.png',
                'logo_dark' => NULL,
                'item_inicio' => 'Inicio',
                'padding' => NULL,
                'menu_style' => '0',
                'menu_borders' => '0',
                'menu_sticky' => '0',
            ),
        ));
        
        
    }
}