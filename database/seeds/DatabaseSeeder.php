<?php

use App\Models\ProductAttributeModel;
use App\Models\ProductImageModel;
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
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(AttributeTableSeeder::class);
        $this->call(ProductAttributeTableSeeder::class);
        $this->call(ProductImageTableSeeder::class);
        $this->call(TestimonialTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(PaymentTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(ShippingTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
//        $this->call(OrderTableSeeder::class);
        $this->call(DiscountTableSeeder::class);
//        $this->call(OrderProductTableSeeder::class);
        $this->call(RecruitmentTableSeeder::class);




    }
}
