<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuDataSeeder extends Seeder
{
    public function run()
    {
        $restaurant = 
        [
            'restaurant_id' => '1',
            'name' => 'testRestaurant',
            'time_created' => time()

        ];

        $menu_data = [
            [
                'restaurant_id' => '1',
                'name' => 'Burger 1',
                'description' => 'yUMy BURGER MY fAVourite delish yum yum yum',
                'price' => '14.00',
                'kj' => '1400',
                'image' => APPPATH.'public/images/burger.jpg',
                'type' => 'Food'
            ],
            [
                'restaurant_id' => '1',
                'name' => 'Burger 2',
                'description' => 'yum yum yum yUMy BURGER MY fAVourite delish',
                'price' => '15.00',
                'kj' => '1900',
                'image' => APPPATH.'public/images/burger2.jpg',
                'type' => 'Food'
            ],
            [
                'restaurant_id' => '1',
                'name' => 'Drink',
                'description' => 'glug glug glgug',
                'price' => '6.00',
                'image' => APPPATH.'public/images/drink1.jpg',
                'type' => 'Drink'
            ]
            ];
        //
        foreach ($menu_data as $menu) {
            $this->db->table('Menu')->insert($menu);
        }

        $this->db->table('Restaurant')->insert($restaurant);
    }
}
