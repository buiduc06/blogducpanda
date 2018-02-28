<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcate=[
        ['id_cate' => 1,'name' => 'Giáo Dục','slug'=>'giao-duc' ],
        ['id_cate' => 1,'name' => 'Nhịp Điệu Trẻ','slug'=>'nhip-dieu-tre' ],
        ['id_cate' => 1,'name' => 'Du Lịch','slug'=>'du-lich' ],
        ['id_cate' => 1,'name' => 'Du Học','slug'=>'du-hoc' ],
        ['id_cate' => 2,'name' => 'Cuộc Sống Đó Đây','slug'=>'cuoc-song-do-day' ],
        ['id_cate' => 2,'name' => 'Anh','slug'=>'anh' ],
        ['id_cate' => 2,'name' => 'Người Việt Năm Châu','slug'=>'nguoi-viet-nam-chau' ],
        ['id_cate' => 2,'name' => 'Phân Tích','slug'=>'phan-tich' ],
        ['id_cate' => 3,'name' => 'Chứng Khoán','slug'=>'chung-khoan' ],
        ['id_cate' => 3,'name' => 'Bất Động Sản','slug'=>'bat-dong-san' ],
        ['id_cate' => 3,'name' => 'Doanh Nhân','slug'=>'doanh-nhan' ],
        ['id_cate' => 3,'name' => 'Quốc Tê','slug'=>'quoc-te' ],
        ['id_cate' => 3,'name' => 'Mua Sắm','slug'=>'mua-sam' ],
        ['id_cate' => 3,'name' => 'Doanh Nhiệp Việt','slug'=>'doanh-nghiep-viet' ],
        ['id_cate' => 4,'name' => 'Hoa Hậu','slug'=>'hoa-hau' ],
        ['id_cate' => 4,'name' => 'Nghệ Sỹ','slug'=>'nghe-sy' ],
        ['id_cate' => 4,'name' => 'Âm Nhạc','slug'=>'am-nhac' ],
        ['id_cate' => 4,'name' => 'Thời Trang','slug'=>'thoi-trang' ],
        ['id_cate' => 4,'name' => 'điện ảnh','slug'=>'dien-anh' ],
        ['id_cate' => 4,'name' => 'mỹ thuật','slug'=>'my-thuat' ],
        ['id_cate' => 5,'name' => 'bóng đá','slug'=>'bong-da' ],
        ['id_cate' => 5,'name' => 'Tennis','slug'=>'tennis' ],
        ['id_cate' => 5,'name' => 'Chân Dung','slug'=>'chan-dung' ],
        ['id_cate' => 6,'name' => 'Hình Sự','slug'=>'hinh-su' ],
        ['id_cate' => 9,'name' => 'IT','slug'=>'it' ],
        ['id_cate' => 9,'name' => 'Tuyển Dụng','slug'=>'tuyen-dung-it' ],
        ];
        DB::table('subcategories')->insert($subcate);
    }
}
