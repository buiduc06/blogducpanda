<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\posts;
use App\subcategories;
use App\Http\Requests\PostCreate;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         // phần search
        if (!empty($_GET['table_search'])) {
            $search=$_GET['table_search'];
            $getPost1=posts::where('title','like',"%$search%")->first();
            $getPost2=posts::where('summary','like',"%$search%")->first();
            if ($getPost1!=null) {
                $getPosts=posts::where('title','like',"%$search%")->paginate(10);
                $getPosts->withPath("/admin/posts?table_search=$search");
                return view('admin.page.Posts',compact('getPosts','search'));
                exit;
            }else if($getPost2!=null){
                $getPosts=posts::where('summary','like',"%$search%")->paginate(10);
                $getPosts->withPath("/admin/posts?table_search=$search");
                return view('admin.page.Posts',compact('getPosts','search'));
                exit;
            }else{
                $getPosts='';
                return view('admin.page.Posts',compact('getPosts','search'));
            }

        }else{
            $search='';
            $getPosts=posts::paginate(10);
            return view('admin.page.Posts',compact('getPosts','search'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $showSubcate=subcategories::all();
        return view('admin.page.CreatePosts',compact('showSubcate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreate $request)
    {
        //upload anh
        if($request->hasFile('avatar')){
            $file = $request->avatar;
            $photoname=str_slug($request->title).'_'.time().'.'.$request->avatar->getClientOriginalExtension();
            $file->move('images',$photoname);
        }
        $PostData=new posts();
        $PostData->cate_id=$request->subcategory;
        $PostData->create_by=Auth::user()->id;
        $PostData->title=$request->title;
        $PostData->summary=$request->summary;
        $PostData->content=$request->content;
        $PostData->images=$photoname;
        $PostData->status=$request->status;
        $PostData->slug=str_slug($request->title);
        $PostData->save();
        return redirect(route('admin.posts'))->withSuccess('Tạo Bài Viết Thành Công');
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
        $getData=posts::find($id);
        $showcategory=subcategories::where('id','!=',$id)->get();
        return view('admin.page.updateposts',compact('getData','showcategory'));
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
      $PostData=posts::find($id);
      echo $PostData->images;
        //upload anh
      if($request->hasFile('avatar')){
        $file = $request->avatar;
        $photoname=str_slug($request->title).'_'.time().'.'.$request->avatar->getClientOriginalExtension();
        $file->move('images',$photoname);
    }else{
        $photoname=$PostData->images;
    }
    
    $PostData->cate_id=$request->subcategory;
    $PostData->create_by=Auth::user()->id;
    $PostData->title=$request->title;
    $PostData->summary=$request->summary;
    $PostData->content=$request->content;
    $PostData->images=$photoname;
    $PostData->status=$request->status;
    $PostData->slug=str_slug($request->title).'_'.rand(100,10000);
    $PostData->update();
    return redirect(route('admin.posts'))->withSuccess('Cập nhật Bài Viết Thành Công');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData=posts::find($id);
        $deleteData->delete();
        return redirect()->back()->with('msg','xóa bài viết thành công');
    }
}
