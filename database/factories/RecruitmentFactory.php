<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\RecruitmentModel;
use Faker\Generator as Faker;
$h=0;
$factory->define(RecruitmentModel::class, function (Faker $faker) use (&$h){
    $h++;
    return [
        'name'=>'vị trí thiết kế UI/UX của MyPet '.$h,
        'description'=>'Công ty Cổ phần Mypet là công ty tiên phong về ứng dụng công nghệ chăm sóc toàn diện thú cưng tại Việt Nam, hiện thực hóa mong muốn mang lại lợi ích đồng thời cho cả chủ nuôi cũng như các trung tâm, cửa hàng kinh doanh',
        'content'=>$faker->paragraph,
        'thumb'=>'/images/avatar/tuyen-dung.png',


    ];
});
