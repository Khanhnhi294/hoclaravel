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
        $title = 'Danh sách người dùng';

        $listUser = $users->getAllUser();
        return view('client.users.list', compact('title', 'listUser'));
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
}
