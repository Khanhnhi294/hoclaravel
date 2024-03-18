<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Contracts\Service\Attribute\Required;

class UserController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }

    public function index()
    {
        $statement = $this->users->statementUser("DELETE FROM users");

        dd($statement);

        $title = 'Danh sách người dùng';

        $listUser = $users->getAllUser();
        return view('client.users.list', compact('title', 'listUser')) ;
    }
    public function add()
    {
        $title = 'Thêm người dùng';
        return view('client.users.add', compact('title'));
    }

    public function postAdd(Request $request)
    {
        $request->validate([
            'fullname' => 'required |min :5 ',
            'email' => 'required|email'
        ],[
            'fullname.required' => 'Họ & tên bắt buộc phải nhập',
            'fullname.min' => 'Họ & tên bắt buộc :min kí tự trở lên',
            'email.required'=> 'Email bắt buộc phải nhập',
            'email.email' => 'Email phải đúng định dạng'
        ]);

        $dataInsert = [
             $request->fullame,
             $request->email,
             date('Y-m-d H:i:s')
        ];
        $this->users->addUser($dataInsert);
        return redirect()->route('user.index')->with('msg', 'Thêm thành công');
    }
    public function getEdit(Request $request,$id=0){
        $title = 'Cập nhật người dùng';

        if (!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])){
                $request->session()->put('id',$id);
                $userDetail = $userDetail[0];
            }else{
                return redirect()->route('users.index')->with('msg','Người dùng không tổn tại');
            }

        }else{
            return redirect()->route('users.index')->with('msg','Liên kết không tổn tại');

        }

        return view('clients.users.edit',compact('title','userDetail'));

    }

    public function postEdit(Request $request){
        $id = session('id');
        if (!empty($id)){
            return back()->with('msg','Liên kết không tồn tại');
        }
        $request->validate([
            'fullname'=>'required|min:5',
            'email'=>'required|email|unique:users,email,'.$id
        ],[
            'fullname.required'=>'Họ và tên bắt buộc phải nhập',
            'fullname.min' =>'Họ và tên phải từ :min ký tự trở nên',
            'email.required' =>'Email bắt buộc phải nhập',
            'email.email' =>'Email không đúng định dạng',
            'email.unique' =>'Email đã tồn tại trên hệ thống'
        ]);

        $dataUpdate = [
            $request->fullname,
            $request->email,
            date('Y-m-d H:i:s')
        ];

        $this->users->updateUser($dataUpdate,$id);

        return back()->with('msg','Cập nhật người dùng');
    }
    public function delete($id=0){

        if (!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if (!empty($userDetail[0])){
                $deleteStatus = $this->users->deleteUser($id);
                if ($deleteStatus){
                    $msg = 'Xóa người dùng thành công';
                }else{
                    $msg = 'Bạn không thể xóa người dùng này. Vui lòng thử lại sau';
                }
            }else{
                $msg = 'Người dùng không tổn tại';
            }

        }else{
            $msg = 'Liên kết không tổn tại';            
        }
        return redirect()->route('users.index')->with('msg',$msg);

    }
}
