<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\modules;
use App\Http\Requests\modulesrq;
class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty($_GET['table_search'])) {
            $search=$_GET['table_search'];
            $modules=modules::where('name','like',"%$search%")->paginate(8);
            $modules->withPath("/admin/modules?table_search=$search");
        }else{
            $search='';
            $modules=modules::paginate(8);

        }
        // $module=modules::all();
        return view('admin.module.home',compact('modules','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.module.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(modulesrq $request)
    {

       $checktrung2=modules::where('name',$request->name)->first();
       $checktrung1=modules::where('route',$request->routemodule)->first();

       if (!empty($checktrung2)) {
           return redirect()->back()->with('msg','tên Module đã tồn tại');
       }else if (!empty($checktrung1)) {
        return redirect()->back()->with('msg','route name đã tồn tại');
    }
    else{
        if (empty($request->icon)) {
            $request->icon="fa fa-dashboard";
        }else{
           $request->icon= $request->icon;
       }
       $postData=new modules();
       $postData->name=$request->name;
       $postData->route=$request->routemodule;
       $postData->icon= empty($request->icon)==true ? "fa fa-dashboard" : $request->icon;
       $postData->save();
       return redirect(route('admin.modules'))->withSuccess('Thêm Modules thành công');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getmodule=modules::find($id);
        return view('admin.module.update',compact('getmodule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $checkid=modules::where('id','!=',$id)->Where('name',$request->name)->first();
        $checktrung2=modules::where('id','!=',$id)->Where('route',$request->routemodule)->first();
         // $checkname=$checkid->where();
        if (empty($checkid) && empty($checktrung2)) {
            $updatedata=modules::find($id);
            $updatedata->name=$request->name;
            $updatedata->route=$request->routemodule;
            $updatedata->icon= empty($request->icon)==true ? "fa fa-dashboard" : $request->icon;
            $updatedata->update();
            return redirect(route('admin.modules'))->withSuccess('cập nhật Modules thành công');
        }else{
            return redirect()->back()->with('msg','tên Modules hoặc route đã tồn tại ');
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
       $delete=modules::find($id);
        $delete->sub_modules()->delete(); // xoa tat cac cac bai lien quan
        $delete->delete();//xoa danh muc do
        return redirect()->back()->withSuccess('xóa module thành công');
    }
}
