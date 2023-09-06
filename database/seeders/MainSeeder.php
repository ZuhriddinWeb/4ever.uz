<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
use App\Models\Category;
use App\Models\Products;
use App\Models\StartBonus;
use App\Models\User;


class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('viloyats')->insert([
            [ 'viloyat' => 'Andijon'],
            [ 'viloyat' => 'Buxoro'], 
            [ 'viloyat' => 'Jizzax'],            
            [ 'viloyat' => 'Qashqadaryo'],            
            [ 'viloyat' => 'Navoiy'],            
            [ 'viloyat' => 'Namangan'],            
            [ 'viloyat' => 'Samarqand'],            
            [ 'viloyat' => 'Surxondaryo'],            
            [ 'viloyat' => 'Toshkent'],  
            [ 'viloyat' => 'Farg‘ona'],            
            [ 'viloyat' => 'Xorazm'],            
            [ 'viloyat' => 'Toshkent'],            
            [ 'viloyat' => 'Qoraqalpog‘iston Respublikasi'],            


        ]);
        
        DB::table('regions')->insert([
            ['id_viloyat'=>1,'tuman'=>'Andijon shahri'],
            ['id_viloyat'=>1, 'tuman'=>'Xonabod shahri'],
            ['id_viloyat'=>1, 'tuman'=>'Andijon tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Asaka tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Baliqchi tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Bo‘z tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Jalaquduq tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Izboskan tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Qo‘rg‘ontepa tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Marhamat tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Oltinko‘l tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Paxtaobod tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Ulug‘nor tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Xo‘jaobod tumani'],
            ['id_viloyat'=>1, 'tuman'=>'Shahrixon tumani'],
            ['id_viloyat'=>2, 'tuman'=>'Buxoro shahri'],
            ['id_viloyat'=>2, 'tuman'=>'Kogon shahri'],
            ['id_viloyat'=>2, 'tuman'=>'Buxoro tumani'],
            ['id_viloyat'=>2, 'tuman'=>'Vobkent tumani'],
            ['id_viloyat'=>2, 'tuman'=>'Jondor tumani'],
            ['id_viloyat'=>2, 'tuman'=>'Kogon tumani'],
            ['id_viloyat'=>2, 'tuman'=>'Olot tumani'],
            ['id_viloyat'=>2, 'tuman'=>'Peshku tumani'],
            ['id_viloyat'=>2, 'tuman'=>'Romitan tumani'],
            ['id_viloyat'=>2, 'tuman'=>'Shofirkon tumani'],
            ['id_viloyat'=>2, 'tuman'=>'Qorovulbozor tumani'],
            ['id_viloyat'=>2, 'tuman'=>'Qorako‘l tumani'],
            ['id_viloyat'=>2, 'tuman'=>'G‘ijduvon tumani'],
            ['id_viloyat'=>3, 'tuman'=>'Jizzax shahri'],
            ['id_viloyat'=>3, 'tuman'=>'Аrnasoy tumani'],
            ['id_viloyat'=>3, 'tuman'=>'Baxmal tumani'],
            ['id_viloyat'=>3, 'tuman'=>'Do‘stlik tumani'],
            ['id_viloyat'=>3, 'tuman'=>'Zarbdor tumani'],
            ['id_viloyat'=>3, 'tuman'=>'Zafarobod tumani'],
            ['id_viloyat'=>3, 'tuman'=>'Zomin tumani'],
            ['id_viloyat'=>3, 'tuman'=>'Mirzacho‘l tumani'],
            ['id_viloyat'=>3, 'tuman'=>'Paxtakor tumani'],
            ['id_viloyat'=>3, 'tuman'=>'Forish tumani'],
            ['id_viloyat'=>3, 'tuman'=>'Sharof Rashidov tumani'],
            ['id_viloyat'=>3, 'tuman'=>'G‘allaorol tumani'],
            ['id_viloyat'=>3, 'tuman'=>'Yangiobod tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Qarshi shahri'],
            ['id_viloyat'=>4, 'tuman'=>'Dehqonobod tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Kasbi tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Kitob tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Koson tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Mirishkor tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Muborak tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Nishon tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Chiroqchi tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Shahrisabz tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Yakkabog‘ tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Qamashi tumani'],
            ['id_viloyat'=>4, 'tuman'=>'Qarshi tumani'],
            ['id_viloyat'=>4, 'tuman'=>'G‘uzor tumani'],
            ['id_viloyat'=>5, 'tuman'=>'Navoiy shahri'],
            ['id_viloyat'=>5, 'tuman'=>'Zarafshon shahri'],
            ['id_viloyat'=>5, 'tuman'=>'Karmana tumani'],
            ['id_viloyat'=>5, 'tuman'=>'Konimex tumani'],
            ['id_viloyat'=>5, 'tuman'=>'Navbahor tumani'],
            ['id_viloyat'=>5, 'tuman'=>'Nurota tumani'],
            ['id_viloyat'=>5, 'tuman'=>'Tomdi tumani'],
            ['id_viloyat'=>5, 'tuman'=>'Uchquduq tumani'],
            ['id_viloyat'=>5, 'tuman'=>'Xatirchi tumani'],
            ['id_viloyat'=>5, 'tuman'=>'Qiziltepa tumani'],
            ['id_viloyat'=>6, 'tuman'=>'Namangan shahri'],
            ['id_viloyat'=>6, 'tuman'=>'Kosonsoy tumani'],
            ['id_viloyat'=>6, 'tuman'=>'Mingbuloq tumani'],
            ['id_viloyat'=>6, 'tuman'=>'Namangan tumani'],
            ['id_viloyat'=>6, 'tuman'=>'Norin tumani'],
            ['id_viloyat'=>6, 'tuman'=>'Pop tumani'],
            ['id_viloyat'=>6, 'tuman'=>'To‘raqo‘rg‘on tumani'],
            ['id_viloyat'=>6, 'tuman'=>'Uychi tumani'],
            ['id_viloyat'=>6, 'tuman'=>'Uchqo‘rg‘on tumani'],
            ['id_viloyat'=>6, 'tuman'=>'Chortoq tumani'],
            ['id_viloyat'=>6, 'tuman'=>'Chust tumani'],
            ['id_viloyat'=>6, 'tuman'=>'Yangiqo‘rg‘on tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Samarqand shahri'],
            ['id_viloyat'=>7, 'tuman'=>'Kattaqo‘rg‘on shahri'],
            ['id_viloyat'=>7, 'tuman'=>'Bulung‘ur tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Jomboy tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Ishtixon tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Kattaqo‘rg‘on tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Narpay tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Nurobod tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Oqdaryo tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Payariq tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Pastdarg‘om tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Paxtachi tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Samarqand tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Toyloq tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Urgut tumani'],
            ['id_viloyat'=>7, 'tuman'=>'Qo‘shrabot tumani'],
            ['id_viloyat'=>8, 'tuman'=>'Termiz shahri'],
            ['id_viloyat'=>8, 'tuman'=>'Аngor tumani'],
            ['id_viloyat'=>8, 'tuman'=>'Boysun tumani'],
            ['id_viloyat'=>8, 'tuman'=>'Denov tumani'],
            ['id_viloyat'=>8, 'tuman'=>'Jarqo‘rg‘on tumani'],
            [ 'id_viloyat'=>8, 'tuman'=>'Muzrobod tumani'],
            ['id_viloyat'=>8,'tuman'=> 'Oltinsoy tumani'],
            ['id_viloyat'=>8, 'tuman'=>'Sariosiyo tumani'],
            ['id_viloyat'=>8, 'tuman'=>'Termiz tumani'],
            ['id_viloyat'=>8, 'tuman'=>'Uzun tumani'],
            ['id_viloyat'=>8, 'tuman'=>'Sherobod tumani'],
            ['id_viloyat'=>8, 'tuman'=>'Sho‘rchi tumani'],
            ['id_viloyat'=>8, 'tuman'=>'Qiziriq tumani'],
            ['id_viloyat'=>8, 'tuman'=>'Qumqo‘rg‘on tumani'],
            ['id_viloyat'=>9, 'tuman'=>'Guliston shahri'],
            ['id_viloyat'=>9, 'tuman'=>'Yangier shahri'],
            ['id_viloyat'=>9, 'tuman'=>'Shirin shahri'],
            ['id_viloyat'=>9, 'tuman'=>'Boyovut tumani'],
            ['id_viloyat'=>9, 'tuman'=>'Guliston tumani'],
            ['id_viloyat'=>9,'tuman'=> 'Mirzaobod tumani'],
            ['id_viloyat'=>9, 'tuman'=>'Oqoltin tumani'],
            ['id_viloyat'=>9, 'tuman'=>'Sardoba tumani'],
            ['id_viloyat'=>9, 'tuman'=>'Sayxunobod tumani'],
            ['id_viloyat'=>9, 'tuman'=>'Sirdaryo tumani'],
            ['id_viloyat'=>9, 'tuman'=>'Xovos tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Nurafshon shahri'],
            ['id_viloyat'=>10, 'tuman'=>'Аngren shahri'],
            ['id_viloyat'=>10, 'tuman'=>'Bekobod shahri'],
            ['id_viloyat'=>10, 'tuman'=>'Olmaliq shahri'],
            ['id_viloyat'=>10, 'tuman'=>'Ohangaron shahri'],
            ['id_viloyat'=>10, 'tuman'=>'Chirchiq shahri'],
            ['id_viloyat'=>10, 'tuman'=>'Yangiyo‘l shahri'],
            ['id_viloyat'=>10, 'tuman'=>'Bekobod tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Bo‘ka tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Bo‘stonliq tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Zangiota tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Qibray tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Quyichirchiq tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Oqqo‘rg‘on tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Ohangaron tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Parkent tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Piskent tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Toshkent tumani'],
            ['id_viloyat'=>10, 'tuman'=>'O‘rtachirchiq tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Chinoz tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Yuqorichirchiq tumani'],
            ['id_viloyat'=>10, 'tuman'=>'Yangiyo‘l tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Farg‘ona shahri'],
            ['id_viloyat'=>11, 'tuman'=>'Marg‘ilon shahri'],
            ['id_viloyat'=>11, 'tuman'=>'Quvasoy shahri'],
            ['id_viloyat'=>11, 'tuman'=>'Qo‘qon shahri'],
            ['id_viloyat'=>11, 'tuman'=>'Beshariq tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Bog‘dod tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Buvayda tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Dang‘ara tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Yozyovon tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Quva tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Qo‘shtepa tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Oltiariq tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Rishton tumani'],
            ['id_viloyat'=>11,'tuman'=> 'So‘x tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Toshloq tumani'],
            ['id_viloyat'=>11, 'tuman'=>'O‘zbekiston tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Uchko‘prik tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Farg‘ona tumani'],
            ['id_viloyat'=>11, 'tuman'=>'Furqat tumani'],
            ['id_viloyat'=>12, 'tuman'=>'Urganch shahri'],
            ['id_viloyat'=>12, 'tuman'=>'Xiva shahri'],
            ['id_viloyat'=>12, 'tuman'=>'Bog‘ot tumani'],
            ['id_viloyat'=>12, 'tuman'=>'Gurlan tumani'],
            ['id_viloyat'=>12, 'tuman'=>'Urganch tumani'],
            ['id_viloyat'=>12, 'tuman'=>'Xiva tumani'],
            ['id_viloyat'=>12, 'tuman'=>'Xonqa tumani'],
            ['id_viloyat'=>12, 'tuman'=>'Hazorasp tumani'],
            ['id_viloyat'=>12, 'tuman'=>'Shovot tumani'],
            ['id_viloyat'=>12,'tuman'=> 'Yangiariq tumani'],
            ['id_viloyat'=>12, 'tuman'=>'Yangibozor tumani'],
            ['id_viloyat'=>12, 'tuman'=>'Qo‘shko‘pir tumani'],
            ['id_viloyat'=>13, 'tuman'=>'Bektemir tumani'],
            ['id_viloyat'=>13,'tuman'=> 'Mirzo Ulug‘bek tumani'],
            ['id_viloyat'=>13,'tuman'=> 'Mirobod tumani'],
            ['id_viloyat'=>13, 'tuman'=>'Olmazor tumani'],
            ['id_viloyat'=>13, 'tuman'=>'Sirg‘ali tumani'],
            ['id_viloyat'=>13,'tuman'=> 'Uchtepa tumani'],
            ['id_viloyat'=>13,'tuman'=> 'Chilonzor tumani'],
            ['id_viloyat'=>13, 'tuman'=>'Shayxontohur tumani'],
            ['id_viloyat'=>13, 'tuman'=>'Yunusobod tumani'],
            ['id_viloyat'=>13, 'tuman'=>'Yakkasaroy tumani'],
            ['id_viloyat'=>13, 'tuman'=>'Yashnobod tumani']
        ]);



        DB::table('categories')->insert([
            ['category_name' => 'Classic'],           
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
            [ 'name' => 'Женской'],
            [ 'name' => 'Мужской'],            
        ]);

        DB::table('pay_checks')->insert([
            [ 'name' => "Tasdiqlandi"],
            [ 'name' => "To'lov qilinmagan"],
            [ 'name' => "Qisman to'lov qilingan"],
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
            [ 'name' => 'Картой онлайн (UzCard, Humo)'],
            [ 'name' => 'Оплата с лицевого счёта',],            
        ]);
    }
}
