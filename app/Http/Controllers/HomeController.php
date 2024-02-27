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
        // return view('Home');
        $title = "Hoc lap tronhhh";
        // $dataView = [
        //     'title'=> $title
        // ];

        //compact('title')
        // return view('home')->with('title',$title);    
        // return View::make('home', compact('title'));

        $this->data['Welcome'] = 'Học lập trình Laravel tại <b>Unicode</b>';
        $this->data['content'] = '<h3>Chương 1: Nhập môn Laravel</h3>
        <p>Kiến thức 1</p>
        <p>Kiến thức 2</p>
        <p>Kiến thức 3</p>';
        $this->data['index'] =1;
    }
    public function getNews()
    {
        // return 'Danh sach tin tuc';
        $this->data['dataArr'] = [];
    }
    public function getCategory($id)
    {
        // return 'Chuyen muc: ' . $id;
        $this->data['number'] = 9;
    }
    public function getProductDetail(){
        return view('home',$this->data);
    }
}
