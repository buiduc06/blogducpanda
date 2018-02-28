<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate=[
        	['name'=>'Xã Hội','slug'=>'xa-hoi'],
        	['name'=>'Thế Giới','slug'=>'the-gioi'],
        	['name'=>'Kinh Doanh','slug'=>'kinh-doanh'],
        	['name'=>'Văn Hóa','slug'=>'van-hoa'],
        	['name'=>'Thể Thao','slug'=>'the-thao'],
        	['name'=>'Pháp Luật','slug'=>'phap-luat'],
        	['name'=>'Đời Sống','slug'=>'doi-song'],
        	['name'=>'Khoa Học','slug'=>'khoa-hoc'],
        	['name'=>'Công Nghệ','slug'=>'cong-nghe'],
        ];
        DB::table('Categories')->insert($cate);
    }
}
