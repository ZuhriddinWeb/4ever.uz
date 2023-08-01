<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use DB;
use Hash;
use App\Models\Category;
use App\Models\Products;
use App\Models\StartBonus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $promo = bin2hex(random_bytes(2));
        DB::table('users')->insert([
            'fname' => 'Zuhriddin',
            'lname' => 'Mustafoyev',
            'passport' => 'AA12345678',
            'role' => '1',
            'phone' => '5972323',
            'status' => '1',
            'promo_code'=> $promo,
            'password' => Hash::make('12345678'),
            'created_at' => now(),
        ]);
       
        DB::table('users')->insert([
            'fname' => 'Aziz',
            'lname' => 'Soliyev',
            'passport' => 'AA12345679',
            'role' => '1',
            'parent_id' => 1,
            'phone' => '5972323',
            'status' => '1',
            'code'=> $promo,
            'promo_code'=> bin2hex(random_bytes(2)),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'fname' => 'Jamshid',
            'lname' => 'Ravshanov',
            'passport' => 'AA12345670',
            'role' => '1',
            'parent_id' => 1,
            'phone' => '5972325',
            'status' => '1',
            'code'=> $promo,
            'promo_code'=> bin2hex(random_bytes(2)),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
        ]);


        DB::table('categories')->insert([
             ['category_name' => 'Classic','category_image'=> '"16829112800.jpg"'],           
        ]);
   
        DB::table('universal_bonuses')->insert([
            [ 'name' => 'Activ partner','prosents'=>11,'count_person'=>0,'user_ball'=>0,     'min_tree_ball'=>0,      'min_tree_count' => 0 ],
            [ 'name' => 'Bronze','prosents'=>11,'count_person'=>1,'user_ball'=>0,            'min_tree_ball'=>0,      'min_tree_count' => 0 ], 
            [ 'name' => 'Bronze Pro','prosents'=>10,'count_person'=>2,'user_ball'=>60,       'min_tree_ball'=>0,      'min_tree_count' => 0 ],            
            [ 'name' => 'Silver','prosents'=>10,'count_person'=>3,'user_ball'=>120,          'min_tree_ball'=>100,    'min_tree_count' => 2 ],            
            [ 'name' => 'Silver Pro','prosents'=>8,'count_person'=>5,'user_ball'=>250,       'min_tree_ball'=>300,    'min_tree_count' => 2 ],            
            [ 'name' => 'Gold','prosents'=>8,'count_person'=>6,'user_ball'=>600,             'min_tree_ball'=>600,    'min_tree_count' => 3 ],            
            [ 'name' => 'Gold Pro','prosents'=>8,'count_person'=>7,'user_ball'=>1200,        'min_tree_ball'=>2000,   'min_tree_count' => 3 ],            
            [ 'name' => 'Platinum ','prosents'=>7,'count_person'=>8,'user_ball'=>2500,       'min_tree_ball'=>5000,   'min_tree_count' => 4 ],            
            [ 'name' => 'Diamond','prosents'=>7,'count_person'=>9,'user_ball'=>5000,         'min_tree_ball'=>25000,  'min_tree_count' => 5 ],            

        ]);
        DB::table('trees')->insert([
            [ 'name' => 'Ayollar uchun ',],
            [ 'name' => 'Erkaklar uchun',],            
        ]);
       
        DB::table('statuses')->insert([
            [ 'status_name' => 'Участник',],
            [ 'status_name' => 'Клиент',],
            [ 'status_name' => 'Партнёр',],
        ]);
        DB::table('pay_checks')->insert([
            [ 'name' => 'Tasdiqlandi',],
            [ 'name' => 'To\'lov qilinmagan',],
            [ 'name' => 'Qisman to\'lov qilingan',],
        ]);
        DB::table('virtual_cards')->insert([
            [ 'number' => '1',],
            [ 'number' => '2',],
            [ 'number' => '3',],
            [ 'number' => '4',],
            [ 'number' => '5',],
            [ 'number' => '6',],

        ]);


        StartBonus::insert([
            [
                'period' => 1,
                'prosent' => 60,
            ],
            [
                'period' => 2,
                'prosent' => 60,
            ],
            [
                'period' => 3,
                'prosent' => 50,
            ],
            [
                'period' => 4,
                'prosent' => 35,
            ],
            [
                'period' => 5,
                'prosent' => 20,
            ],
            [
                'period' => 6,
                'prosent' => 10,
            ],
        ]);
        DB::table('pay_selects')->insert([
            [ 'name' => 'Картой онлайн (UzCard, Humo)',],
            [ 'name' => 'Оплата с лицевого счёта',],            
        ]);
    }
}
