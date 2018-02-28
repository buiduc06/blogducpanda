<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; 
use App\modules;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class RoleModules
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // đếm số module của user
        for ($i=0; $i < count(Auth::user()->user_roles->roles->role_modules) ; ++$i) { 
            // thực hiện câu truy vấn tìm theo id
            $sql=modules::where('id',Auth::user()->user_roles->roles->role_modules[$i]->module_id)->get();
            //vòng lặp lấy ra các giá trị của bảng modules
            foreach ($sql as $key) {
                 // vòng lặp lấy ra các giá trị của bảng sub_modules
                 // phần này vói ver 1 có hoặc không cũng được
                foreach ($key->sub_modules as $key2) {
                    // nhập các giá trị tìm được từ bảng sub_modules vào mảng collect
                    $collect[$key2->route]=array($key2->route);
                }
                // nhập các giá trị tìm được từ bảng modules vào mảng collect
                $collect[$key->route]=array($key->route);
            }    
            
        }
 
        $getUrlRequest=str_replace('/','.',$request->path());//lấy url mà rq gửi lên
        $ccc=explode ('.',$getUrlRequest);//hàm tách chuỗi thành 1 mảng
        $check=$ccc[0].'.'.$ccc[1]; // nối phần từ 0 với phần tử 1
// dd($check);
        if (array_key_exists($check,$collect) ==true) {// array_key_exists check tồn tại key trong mảng
            return $next($request);
        }else{
            return redirect(route('error500'));// trả về thông báo lỗi thiếu quyền
        }
        




                    //------------------phiên bản tìm theo submodule------------------------------------

        // // đếm số module của user
        // for ($i=0; $i < count(Auth::user()->user_roles->roles->role_modules) ; ++$i) { 
        //     // thực hiện câu truy vấn tìm theo id
        //     $sql=modules::where('id',Auth::user()->user_roles->roles->role_modules[$i]->module_id)->get();
        //     //vòng lặp lấy ra các giá trị của bảng modules
        //     foreach ($sql as $key) {
        //          // vòng lặp lấy ra các giá trị của bảng sub_modules
        //         foreach ($key->sub_modules as $key2) {
        //             // nhập các giá trị tìm được từ bảng sub_modules vào mảng collect
        //             $collect[$key2->route]=array($key2->route);
        //         }
        //         // nhập các giá trị tìm được từ bảng modules vào mảng collect
        //         $collect[$key->route]=array($key->route);
        //     }    
            
        // }
 
        // $getUrlRequest=str_replace('/','.',$request->path());//lấy url mà rq gửi lên

        // if (array_key_exists($getUrlRequest,$collect) ==true) {// array_key_exists check tồn tại key trong mảng
        //     return $next($request);
        // }else{
        //     return redirect(route('error500'));// trả về thông báo lỗi thiếu quyền
        // }
        
   }
}
