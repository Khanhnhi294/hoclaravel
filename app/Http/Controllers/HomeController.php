<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Rules\Uppercase;

class HomeController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['Welcome'] = 'Học lập trình Laravel tại <b>Unicode</b>';
        $this->data['title'] = 'Đào tạo lập trình web';
        $this->data['message'] = 'Đăng kí tài khoản thành công';

        // $users = DB::select('select * from users ');
        // $users = DB::select('SELECT * FROM users WHERE id > ?', [1]);
        $users = DB::select('SELECT * FROM users WHERE email=:email ', ['email'=> 'huda@gmail.com']);
        dd($users);


        // return 'Unicode';
        return view('client.home', $this->data);
    }
    public function products()
    {
        $this->data['title'] = 'Sản phẩm';
        return view('client.product', $this->data);
    }
    public function getNews()
    {
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
    public function postAdd(ProductRequest  $request)
    {
        dd('ok');
        $rules = [
            // 'product_name' => 'required|min:6',
            // 'product_price' => 'required|integer'

            // 'product_name' => 'required|min:6'.( new Uppercase),
            // 'product_price' => ['required','integer', new Uppercase ],

            'product_name' => ['required', 'min:6', function ($attibute, $value, $fail) {
                $this->isUppercase($value, 'Trường :attribute không hợp lệ', $fail);
            }],
            'product_price' => ['required', 'integer']

        ];
        // $errorMessage = [
        //     'product_name.required' => "Tên :attribute bắt buộc phải nhập",
        //     'product_name.required' => "Tên sp không được nhỏ hơn :min kí tự",
        //     'product_price.required' => 'Giá sản phẩm bắt buộc phải nhập',
        //     'product_price.riquired' => 'Giá sản phẩm phải là số'
        // ];
        $errorMessage = [
            'required' => 'Tên :attribute bắt buộc phải nhập',
            'min' => 'Trường :attribute không được nhỏ hơn :min kí tự',
            'integer' => 'Trường :attribute phải là số',
            // 'uppercase'=> 'Trường :attribute phải viết hoa'
        ];
        $request->validate($rules, $errorMessage);

        $attibute = [
            'product_name' => 'Tên sp',
            'product_price' => 'Giá sp'
        ];
        $validator = validator::make($request->all(), $rules, $errorMessage);
        $validator->validate();

        return response()->json(['status' => 'success']);

        // $validator = validator::make($request->all(), $rules, $errorMessage);
        // if ($validator->failed()) {
        //     // return 'Validate thất bại';
        //     $validator->errors()->add('msg', 'Vui lòng nhập lại');
        // } else {
        //     // return 'Validate thành công';
        //     return redirect()->route('product');
        // }
        // return back()->withErrors($validator);
    }
    public function putAdd(Request $request)
    {
        return 'Phương thức PUT';
    }
    public function getArray()
    {
        $content = [
            'name' => 'Mai',
            'description' => 'sinh  vueb cua PNv',
            'session' => 'laravel'
        ];
        return $content;
    }
    public function downLoad(Request $request)
    {
        if (!empty($request->image)) {
            $image = trim($request->image);
            $fileName = 'image_' . uniqid() . '.jpg';
            // $fileName = basename($image);

            // return response()->streamDownload(function()use ($image){
            //     $imageContent = file_get_contents($image);
            //     echo $imageContent;
            // },$filename);
            return response()->download($image, $fileName);
        }
    }
    public function isUppercase($value, $message, $fail)
    {
        if ($value != mb_strtoupper($value)) {
            //xảy ra lỗi
            $fail('Trường :attribute không hợp lệ');
        }
    }
}
