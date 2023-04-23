<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id'=> 2,
                'name'=> 'Khind 8KG Top Load Washer WM80A',
                'description'=> "Make laundry day a breeze with the Khind 8KG Top Load Washer WM80A.
                                 Featuring a generous 8KG capacity, this fully automatic washing machine is perfect for busy households that need to tackle large loads of laundry quickly and easily. 
                                 With a range of advanced features including multiple wash programs, a digital display, and adjustable water levels, you'll be able to customize your wash to suit your needs and get great results every time.
                                 The Khind WM80A also features a durable and easy-to-clean stainless steel drum, a powerful motor, and a sleek and stylish design that will look great in any laundry room. 
                                 And thanks to its compact and space-saving design, it's ideal for smaller homes or apartments too.
                                 Whether you're washing towels, bed sheets, or your favorite outfit, the Khind 8KG Top Load Washer WM80A is the perfect choice for anyone looking for a reliable and high-quality washing machine. 
                                 So why wait? Order yours today and experience the ultimate in laundry convenience and performance.",
                'price'=>850.00,
                'quantity'=>10,
                'image'=>'images/washing_machine_1.png',    
                'product_status'=>1,
                'stock_status'=>1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id'=> 6,
                'name'=> 'Khind 8KG Top Load Washer WM80A',
                'description'=> "Designed with your modern lifestyle in mind, this refrigerator has everything you need and more. 
                                 With a spacious 510L capacity, you'll have plenty of room to store all your groceries and keep them organized with its multiple compartments and shelves. The unique 4-door design adds a touch of sophistication to your kitchen while keeping your food fresh and easily accessible.
                                 Equipped with innovative features such as the Quick Cooling and Quick Freezing functions, you'll never have to worry about food spoilage again. The LED Touch Control Panel lets you easily adjust the temperature and settings to your preference, while the Energy-saving mode ensures that you can save on your electricity bills.
                                 The Haier 510L 4 Door Series - HRF-510MG is not just a refrigerator - it's a statement piece that will elevate your kitchen to the next level. Upgrade your lifestyle today with this top-of-the-line refrigerator from Haier!",
                'price'=>2599.00,
                'quantity'=>'20', 
                'image'=>'images/refrigerator_1.png',    
                'product_status'=>1,
                'stock_status'=>1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id'=> 6,
                'name'=> 'Khind 8KG Top Load Washer WM80A',
                'description'=> "Designed with your modern lifestyle in mind, this refrigerator has everything you need and more. 
                                 With a spacious 510L capacity, you'll have plenty of room to store all your groceries and keep them organized with its multiple compartments and shelves. The unique 4-door design adds a touch of sophistication to your kitchen while keeping your food fresh and easily accessible.
                                 Equipped with innovative features such as the Quick Cooling and Quick Freezing functions, you'll never have to worry about food spoilage again. The LED Touch Control Panel lets you easily adjust the temperature and settings to your preference, while the Energy-saving mode ensures that you can save on your electricity bills.
                                 The Haier 510L 4 Door Series - HRF-510MG is not just a refrigerator - it's a statement piece that will elevate your kitchen to the next level. Upgrade your lifestyle today with this top-of-the-line refrigerator from Haier!",
                'price'=>2599.00,
                'quantity'=>'20', 
                'image'=>'images/refrigerator_2.png',    
                'product_status'=>1,
                'stock_status'=>1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id'=> 7,
                'name'=> 'Panasonic 38L Premium Electric Oven PSN-NBH3801KSK',
                'description'=> "Looking to level up your home cooking game? 
                                 The Panasonic 38L Premium Electric Oven PSN-NBH3801KSK is here to help!
                                 This top-of-the-line oven is a must-have for any serious home chef.
                                 With a spacious 38L interior, you'll have plenty of room to cook up your favorite dishes for family and friends. The oven features a range of advanced settings, including multiple cooking modes and precise temperature controls, to ensure that your food is cooked to perfection every time.
                                 The sleek and modern design of the oven is sure to complement any kitchen decor, while the durable construction ensures that it will be a reliable companion in the kitchen for years to come. Whether you're baking bread, roasting a chicken, or whipping up a batch of cookies, the Panasonic 38L Premium Electric Oven PSN-NBH3801KSK is the perfect tool for the job. Order yours today and start cooking like a pro!",
                'price'=>749.00,
                'quantity'=>'15', 
                'image'=>'images/oven_1.png',    
                'product_status'=>1,
                'stock_status'=>1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id'=> 7,
                'name'=> 'Khind Multi Air Fryer Oven ARF9500',
                'description'=> "Looking for a versatile kitchen appliance that can help you cook healthier meals with less oil?
                                 Look no further than the Khind Multi Air Fryer Oven ARF9500! 
                                 With its powerful air frying technology, this appliance can help you fry, bake, roast, and grill your favorite foods to perfection - all without the extra fat and calories that come with traditional deep frying.
                                 Featuring a spacious interior and a range of adjustable temperature and cooking settings, the Khind Multi Air Fryer Oven ARF9500 is perfect for cooking everything from crispy french fries and juicy chicken wings to moist cakes and delicious pizzas. And with its sleek and modern design, this air fryer oven is sure to be a stylish addition to any kitchen. So why wait? Start cooking healthier, tastier meals today with the Khind Multi Air Fryer Oven ARF9500!",
                'price'=>428.90,
                'quantity'=>'5', 
                'image'=>'images/oven_2.png',    
                'product_status'=>1,
                'stock_status'=>1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id'=> 7,
                'name'=> 'Sharp 31L Healsio Superheated Steam Oven SHP-AX1700VMR',
                'description'=> "Introducing the Sharp 31L Healsio Superheated Steam Oven SHP-AX1700VMR - your new cooking companion that will elevate your culinary game to the next level. With its advanced superheated steam technology, you can now cook healthy and delicious meals for you and your family effortlessly. The spacious 31L interior allows you to cook multiple dishes at once, perfect for hosting dinner parties or family gatherings.
                                 Equipped with 9 cooking modes, you can easily bake, grill, roast, or steam your favorite dishes with just a touch of a button. The built-in temperature probe ensures that your food is cooked to perfection every time, while the superheated steam technology helps to lock in the nutrients and flavors, resulting in healthier and tastier meals.
                                 The sleek and modern design of the Sharp 31L Healsio Superheated Steam Oven SHP-AX1700VMR will complement any kitchen décor. Its easy-to-use interface and user-friendly features make it perfect for both novice and experienced cooks. Don't settle for anything less - upgrade your cooking game with the Sharp 31L Healsio Superheated Steam Oven SHP-AX1700VMR today!",
                'price'=>3699.90,
                'quantity'=>'24', 
                'image'=>'images/oven_3.png',    
                'product_status'=>1,
                'stock_status'=>1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
