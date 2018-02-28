<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\storesuser;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = isset($_GET['table_search'])!=null ? $_GET['table_search'] : '' ;
        // phần search
        if (!empty($search)) {
            $getUsers1=User::where('name','like',"%$search%")->first();
            $getUsers2=User::where('email','like',"%$search%")->first();
            if ($getUsers1!=null) {
                $getUsers=User::where('name','like',"%$search%")->get();
                return view('admin.page.users',compact('getUsers','search'));
                exit;
            }else if($getUsers2!=null){
             $getUsers=User::where('email','like',"%$search%")->get();
             return view('admin.page.users',compact('getUsers','search'));
             exit;
         }else{
            $getUsers='';
            return view('admin.page.users',compact('getUsers','search'));
        }

    }else{
        $search='';
        $getUsers=User::all();
        return view('admin.page.users',compact('getUsers','search'));
    }

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.createusers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storesuser $request)
    {

        $checkemail=User::where('email',$request->email)->first();
        if (!empty($checkemail)) {
         return redirect()->back()->with('email','địa chỉ email đã tồn tại');
     }else{
        if ($request->hasFile( 'avatar' )) {
           $file = $request->avatar;
           $photoname=time().'.'.$request->avatar->getClientOriginalName();
           $file->move('images',$photoname);
       }else{
        $photoname='default.png';
    }
    $PostData=new user();
    $PostData->name=$request->name;
    $PostData->email=$request->email;
    $PostData->password=bcrypt($request->password);
    $PostData->avatar=$photoname;
    $PostData->status=1;
    $PostData->save();
    return redirect(route('admin.users'))->withSuccess('thêm users thành công');
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
        $getData=user::find($id);
        if (empty($getData)) {
            return redirect(route('admin.users'))->with('msg','không tìm thấy user');;
        }else{
            return view('admin.page.updateuser',compact('getData'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storesuser $request, $id)
    {
        $PostData=user::find($id);
        $checkemail=User::where('email','!=',$PostData->email)->where('email',$request->email)->first();
        if (!empty($checkemail)) {

           return redirect()->back()->with('email',"địa chỉ email $request->email đã tồn tại");
       }else{
        if ($request->hasFile( 'avatar')) {
         $file = $request->avatar;
         $photoname=time().'.'.$request->avatar->getClientOriginalName();
         $file->move('images',$photoname);
     }else{
        $photoname=$PostData->avatar;
    }
    $PostData->name=$request->name;
    $PostData->email=$request->email;
    $PostData->password=$PostData->password;
    $PostData->avatar=$photoname;
    $PostData->status=$request->status;
    $PostData->update();
    return redirect(route('admin.users'))->withSuccess('update users thành công');
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
        $idauth=auth::id();
        if ($id==$idauth) {
            $getUsers=User::all();
            return redirect()->back()->with('msg','Bạn không thể xóa tài khoản của chính mình');
        }else{
            $deleteuser=User::find($id);
            $deleteuser->delete();
            $getUsers=User::all();
            return redirect()->back()->with('msg','xóa user thành công');
        }
    }
}
