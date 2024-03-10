<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public $data = [];
    public function index()
    {
        return view('/sanpham');
        $title = "Hoc lap trinh";

        $this->data['Welcome'] = 'Học lập trình Laravel tại <b>Unicode</b>';
        $this->data['content'] = '<h3>Chương 1: Nhập môn Laravel</h3>
        <p>Kiến thức 1</p>
        <p>Kiến thức 2</p>
        <p>Kiến thức 3</p>';
        $this->data['index'] = 1;

        $this->data['title'] = 'Đào tạo lập trình web';
        return view('clients.home', $this->data);
    }
    public function products()
    {
        $this->data['title'] = 'Sản phẩm';
        return view('clients.products', $this->data);
    }
    public function getNews()
    {
        // return 'Danh sach tin tuc';
        $this->data['dataArr'] = [];
    }
    public function getCategory($id)
    {
        return 'Chuyen muc: ' . $id;
    
    }
    public function getProductDetail()
    {
        return view('home', $this->data);
    }
    public function product()
    {
        $this->data['title'] = 'san pham';
        return view('client.products', $this->data);
    }
    public function getAdd()
    {
        $this->data['title'] = 'them san pham';
        $this->data['errorMessage'] = 'Vui lòng kiểm tra lại dữ liệu';
        return view('add', $this->data);
    }
    public function postAdd(Request $request)
    {
        $rules =[
            'product_name'=> 'required|min:6',
            'product_price'=> 'required|integer'
        ];
        // $errorMessage= [
        //     'product_name.required'=> "Tên :attribute bắt buộc phải nhập",
        //     'product_name.required'=> "Tên sp không được nhỏ hơn :min kí tự",
        //     'product_price.required'=> 'Giá sản phẩm bắt buộc phải nhập',
        //     'product_price.riquired' => 'Giá sản phẩm phải là số'
        // ];
        $errorMessage= [
            'required' => 'Tên :attribute bắt buộc phải nhập',
            'min' => 'Trường :attribute không được nhỏ hơn :min kí tự',
            'integer' => 'Trường :attribute phải là số'
        ];
        $request->validate($rules, $errorMessage);
    }
    public function putAdd(Request $request)
    {
        return 'Phương thức PUT';
    }
    public function getArray(){
        $content = [
            'name'=>'Mai',
            'description'=>'sinh  vueb cua PNv',
            'session'=>'laravel'
        ];  
        return $content;
    }
    public function downLoad(Request $request){
        if(!empty($request->image)){
            $image = trim($request->image);
            $fileName = 'image_'.uniqid().'.jpg'; 
            // $fileName = basename($image);
    
            // return response()->streamDownload(function()use ($image){
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // },$filename);
            return response()->download($image, $fileName);
            }
    }
}
