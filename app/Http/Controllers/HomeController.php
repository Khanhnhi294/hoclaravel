<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public $data = [];
    public function index()
    {
        return view('/sanpham');
        $title = "Hoc lap tronhhh";

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
        // $this->data['number'] = 9;
        // $this->data['number'] = 3;
        // $this->data['message'] = 'Đặt hàng thành công';
    }
    public function getProductDetail()
    {
        return view('home', $this->data);
    }
    public function product()
    {
        $this->data['title'] = 'san pham';
        return view('clients.products', $this->data);
    }
    public function getAdd()
    {
        $this->data['title'] = 'them san pham';

        return view('clients.blocks.add', $this->data);
    }
    public function postAdd(Request $request)
    {
        return $request . 'hih';
    }
    public function putAdd(Request $request)
    {
        return $request . 'hihe';
    }
}
