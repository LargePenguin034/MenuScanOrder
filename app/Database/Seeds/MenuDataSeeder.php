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
            'time_created' => time(),
            'username' => 'Aaron',
            'email' => 'aaron.squidlips@gmail.com',
            'status' => 'active',
            'admin' => 1

        ];

        $menu_data = [
            [
                'restaurant_id' => '1',
                'item_name' => 'Burger 1',
                'description' => 'yUMy BURGER MY fAVourite delish yum yum yum',
                'price' => '14.00',
                'kj' => '1400',
                'image' => APPPATH.'public/images/burger.jpg',
                'type' => 'Food',
                'item_id' => '1'
            ],
            [
                'restaurant_id' => '1',
                'item_name' => 'Burger 2',
                'description' => 'yum yum yum yUMy BURGER MY fAVourite delish',
                'price' => '15.00',
                'kj' => '1900',
                'image' => APPPATH.'public/images/burger2.jpg',
                'type' => 'Food',
                'item_id' => '2'
            ],
            [
                'restaurant_id' => '1',
                'item_name' => 'Drink',
                'description' => 'glug glug glgug',
                'price' => '6.00',
                'image' => APPPATH.'public/images/drink1.jpg',
                'type' => 'Drink',
                'item_id' => '3'
            ]
            ];
        //
        $type_data = [
            [
                'restaurant_id' => '1',
                'type' => 'Food',
                'description' => 'Yum Yum Yum',
            ],
            [
                'restaurant_id' => '1',
                'type' => 'Drink',
                'description' => 'Glug Glug Glub',
            ],
            ];

        foreach ($menu_data as $menu) {
            $this->db->table('Menu')->insert($menu);
        }

        foreach ($type_data as $type) {
            $this->db->table('Type')->insert($type);
        }

        $this->db->table('Restaurant')->insert($restaurant);
    }
}
