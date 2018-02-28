<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategory;
use App\categories;
use App\subcategories;
use App\posts;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   // public function __construct()
   //  {
        
   //      dd(Auth::user()->id);
   //      if (count(Auth::user()->user_roles->roles->role_modules)>0) {
   //          foreach (Auth::user()->user_roles->roles->role_modules as $roleModules) {
   //              $Showdata=App\modules::where('id',$roleModules->modules_id)->get();
   //              foreach ($Showdata as $Showdata1) {
   //                  dd($request);
   //              }
   //          }
   //      }
   //      // $this->middleware('auth');
   //  }


    public function index()
    {

        if (!empty($_GET['table_search'])) {
            $search=$_GET['table_search'];
            $getsubCate=subcategories::where('name','like',"%$search%")->paginate(8);
             $getsubCate->withPath("/admin/categories?table_search=$search");
        }else{
            $search='';
            $getsubCate=subcategories::paginate(8);

        }
        return view('admin.page.category',compact('getsubCate','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $showallcate=categories::all();
        return view('admin.page.createcategory',compact('showallcate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
     $checktrung=subcategories::where('name',$request->namecate)->first();
     $checktrung2=categories::where('name',$request->namecate)->first();
     if (!empty($checktrung) || !empty($checktrung2)) {
         return redirect()->back()->with('msg','tên danh mục đã tồn tại hoặc trùng với danh mục cha');
     }else{
        $postData=new subcategories();
        $postData->id_cate=$request->parent;
        $postData->name=$request->namecate;
        $postData->slug=str_slug($request->namecate);
        $postData->save();
        return redirect(route('admin.categories'))->withSuccess('Thêm Danh mục thành công');
    }

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getData=subcategories::find($id);
        $catnotsubcate=categories::where('id','!=',$id)->get();
        return view('admin.page.updatecategory',compact('getData','catnotsubcate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategory $request, $id)
    {
       $checkid=subcategories::where('id','!=',$id)->Where('name',$request->namecate)->first();
       $checktrung2=categories::where('name',$request->namecate)->first();
         // $checkname=$checkid->where();
       if (empty($checkid) && empty($checktrung2)) {
        $updatedata=subcategories::find($id);
        $updatedata->id_cate=$request->parent;
        $updatedata->name=$request->namecate;
        $updatedata->slug=str_slug($request->namecate);
        $updatedata->update();
        return redirect(route('admin.categories'))->withSuccess('cập nhật danh mục thành công');
    }else{
        return redirect()->back()->with('msg','tên danh mục đã tồn tại hoặc trùng với danh mục cha');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=subcategories::find($id);
        $delete->post()->delete(); // xoa tat cac cac bai lien quan
        $delete->delete();//xoa danh muc do
        return redirect()->back()->withSuccess('xóa danh mục thành công');
    }
}
