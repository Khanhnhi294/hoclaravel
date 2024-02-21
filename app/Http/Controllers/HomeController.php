<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view ('/sanpham');
        return view('Home');
    }

    public function getNews(){
        return 'Danh sach tin tuc';
    }
    public function getCategory($id){
        return 'Chuyen muc: '.$id;
    }
    }

