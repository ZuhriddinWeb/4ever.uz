<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
use App\Models\User;
use App\Models\Products;
use App\Models\Orders;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $constantUser = [
            'role' => '1',
            'password' => Hash::make('zzzz1111*'),
            'created_at' => now(),
            'status' => '1',
            'passport' => 'AA12345678',
        ];

        User::create(array_merge($constantUser , [
            'fname' => 'Zuhriddin',
            'lname' => 'Mustafoyev',
            'phone' => '9985972323',
            'promo_code'=> bin2hex(random_bytes(2)),
        ]));

        User::create(array_merge($constantUser , [
            'fname' => 'Sherali',
            'lname' => 'Mustafoyev',
            'parent_id'=> 1,
            'phone' => '9985972324',
            'promo_code'=> bin2hex(random_bytes(2)),
        ]));

        User::create(array_merge($constantUser , [
            'fname' => 'Alisher',
            'lname' => 'Mustafoyev',
            'parent_id'=> 1,
            'phone' => '9985972325',
            'promo_code'=> bin2hex(random_bytes(2)),
        ]));

        User::create(array_merge($constantUser , [
            'fname' => 'Aziz',
            'lname' => 'Soliyev',
            'parent_id'=> 1,
            'phone' => '9985972326',
            'promo_code'=> bin2hex(random_bytes(2)),
        ]));

        User::create(array_merge($constantUser , [
            'fname' => 'Asad',
            'lname' => 'Mustafoyev',
            'parent_id'=> 1,
            'phone' => '9985972327',
            'promo_code'=> bin2hex(random_bytes(2)),
        ]));


        Orders::withoutEvents(function() {
            $constantOrder = [
                'orderId' => 100,
                'operation_id' => 100,
                'operationState' => 100,
                'operationType' => 100,
                'urlPay' => 100,
                'urlCheck' => 100,
                'name'=> 'Zuhriddin',
                'phone'=> "5972323",
                'viloyat_id'=> 3,
                'tuman_id'=> 1,
                'address'=> 'Qishloq',
                'point'=> 'Dacha',
                'pay_id'=> 1,
                'order_check'=> 'COMPLETE',
                'send_order'=> 1,
            ];

            Orders::create(array_merge( $constantOrder , ['order_summa'=> 100, 'user_id' =>  1] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 100, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 200, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 300, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
            Orders::create(array_merge( $constantOrder , ['order_summa'=> 400, 'user_id' =>  User::where('id', '!=' , 1)->inRandomOrder()->first()->id] ));
        });

        DB::table('products')->insert([
            ['category_id' => 1,'tree_id' => 1, 'images_product' => '16888061090.jpg', 'product_name'=>'w101 Lanvin-Eclat d\'Arpege','flavor'=>'Цветочный, Зеленый','description_product'=>'Mezza','instruction_product'=>'Yana mezza','price'=>22,'volume'=>50,'count_products'=>100],
            ['category_id' => 1,'tree_id' => 1, 'images_product' => '16888061090.jpg', 'product_name'=>'w101 Lanvin-Eclat d\'Arpege','flavor'=>'Цветочный, Зеленый','description_product'=>'Mezza','instruction_product'=>'Yana mezza','price'=>22,'volume'=>50,'count_products'=>100],
            ['category_id' => 1,'tree_id' => 1, 'images_product' => '16888061090.jpg', 'product_name'=>'w101 Lanvin-Eclat d\'Arpege','flavor'=>'Цветочный, Зеленый','description_product'=>'Mezza','instruction_product'=>'Yana mezza','price'=>22,'volume'=>50,'count_products'=>100],
            ['category_id' => 1,'tree_id' => 1, 'images_product' => '16888061090.jpg', 'product_name'=>'w101 Lanvin-Eclat d\'Arpege','flavor'=>'Цветочный, Зеленый','description_product'=>'Mezza','instruction_product'=>'Yana mezza','price'=>22,'volume'=>50,'count_products'=>100],
            ['category_id' => 1,'tree_id' => 2, 'images_product' => '16888061090.jpg', 'product_name'=>'w10zzzzzzzzzz','flavor'=>'Цветочный, Зеленый','description_product'=>'Mezza','instruction_product'=>'Yana mezza','price'=>22,'volume'=>50,'count_products'=>100],
            ['category_id' => 1,'tree_id' => 2, 'images_product' => '16888061090.jpg', 'product_name'=>'w10zzzzzzzzzz','flavor'=>'Цветочный, Зеленый','description_product'=>'Mezza','instruction_product'=>'Yana mezza','price'=>22,'volume'=>50,'count_products'=>100],
            ['category_id' => 1,'tree_id' => 2, 'images_product' => '16888061090.jpg', 'product_name'=>'w10zzzzzzzzzz','flavor'=>'Цветочный, Зеленый','description_product'=>'Mezza','instruction_product'=>'Yana mezza','price'=>22,'volume'=>50,'count_products'=>100],
            ['category_id' => 1,'tree_id' => 2, 'images_product' => '16888061090.jpg', 'product_name'=>'w10zzzzzzzzzz','flavor'=>'Цветочный, Зеленый','description_product'=>'Mezza','instruction_product'=>'Yana mezza','price'=>22,'volume'=>50,'count_products'=>100],
            ['category_id' => 1,'tree_id' => 2, 'images_product' => '16888061090.jpg', 'product_name'=>'w10zzzzzzzzzz','flavor'=>'Цветочный, Зеленый','description_product'=>'Mezza','instruction_product'=>'Yana mezza','price'=>22,'volume'=>50,'count_products'=>100],
        ]);

    }
}
