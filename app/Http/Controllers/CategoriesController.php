<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;

class CategoriesController extends Controller
{
    //
    public function __construct()
    {
    }
    // hiển thị danh sách chuyên mục (Method GET)
    public function index()
    {
        // return 'Danh sách chuyên mục ';
        return view('client/categories/list');

    }
    // lấy theo id (Method GET)
    public function getCategory($id)
    {
        // return 'Chi tiết chuyên mục'.$id;
        return view('client/categories/edit');
    }
    // cập nhật chuyên mục (Method POST)
    public function updateCategory($id)
    {
        return 'Cập nhật chuyên mục'.$id;

    }
    // show form thêm dữ liệu (Method GET) 
    public function addCategory()
    {
        // return 'Form thêm chuyên mục';
        return view('client/categories/add');
    }
    // thêm data chuyên mục (Method POST)
    public function handleAddCategory()
    {
        redirect(route('categories.add'));
        return 'Thêm dữ liệu cho chuyên mục';
    }
    // xóa chuyên mục (Method GET)
    public function DeleteCategory($id)
    {
        return 'Xóa chuyên mục'.$id;
    }
}
