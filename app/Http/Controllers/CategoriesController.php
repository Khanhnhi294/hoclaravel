<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use SebastianBergmann\CodeUnit\FunctionUnit;
use Symfony\Component\CssSelector\Node\FunctionNode;

class CategoriesController extends Controller
{
    //
    public function __construct(Request $request)
    {
        
        // echo 'Welcome';
        /*
        Nếu là trang danh sách chuyên mục => hiển thị ra dòng chữ: xin chào Unicode
         */
        // if ($request-> is('categories')){
        //     echo '<h3>xin chào Unicode</h3>';
        // }
    }
    // hiển thị danh sách chuyên mục (Method GET)
    public function index(Request $request)
    {
        // return 'Danh sách chuyên mục ';
        // if(isset($_GET['id'])){
        //     echo $_GET['id'];
        // }
        // $path = $request->path();
        // echo $path;
        // $url = $request->url();
        // $fulUrl = $request->fullUrl();
        // echo $fulUrl;
        // $method = $request->method();
        // echo $method;
        $ip = $request->ip();
        // echo 'IP là: '.$ip;
        // if($request->isMethod('GET')){
        //     echo 'Phương thức get';
        // }
        // $server = $request->serve();
        // print_r($server);
        // dd($_SERVER);
        // $header = $request ->header('user-agent');
        // dd($header);
        // $id = $request ->input('id');
        // echo $id;
        // $id = $request ->input('id.*.name');
        // $id = $request->id;
        // $name =$request->name;
        // dd($id);
// =================================================================
        // $query = $request->query();
        // dd($query);
        // $cateName= $request->category_name;
        if($request-> has('category_name')){
            $cateName= $request->category_name;
            // dd($cateName);
            $request->flash();
            return redirect(route('categories.add'));
        }else{
            return "Không có Category";
        }
      
        $name = request('name', 'Unicode');
        dd($name);
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
    public function addCategory(Request $request)
    {
        // return 'Form thêm chuyên mục';
        // $path = $request->path();
        // echo $path;

        $cateName = $request->old('category_name','Mặc định');
        echo $cateName;
        return view('client/categories/add');
    }
    // thêm data chuyên mục (Method POST)
    public function handleAddCategory(Request $request)
    {
         // $allData = $request->all();
        // echo $request->all()['name'];
        // dd($allData);
        redirect(route('categories.add'));
        return 'Thêm dữ liệu cho chuyên mục';
    }
    // xóa chuyên mục (Method GET)
    public function DeleteCategory($id)
    {
        return 'Xóa chuyên mục'.$id;
    }
    // lấy thông tin
    public Function getFile(){
        return view('client/categories/file');
    }
    // xử lí thông tin file
    public function handleFile(Request $request){
        // $file = $request->file('photo');
        if($request->hasFile('photo')){
            if($request->photo->isValid()){
                $file = $request->photo;
                // dd($file);
                // $path = $file->path;
                $ext = $file->extension();
                // $path= $file-> store('image'); 
                // $fileName= $file->getClientOriginalName();

                // đổi tên
                $fileName = md5(uniqid()).'.'.$ext ;
                dd($fileName);
            }else{
                return "Upload không thành công";
            }
           
        }else{
            return "Vui lòng chọn file";
        }
        
       
    }
    
}

