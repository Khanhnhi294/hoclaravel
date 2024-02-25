<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index(){
        return view ('/sanpham');
        // return view('Home');
        $title = "Hoc lap tronhhh";
        // $dataView = [
        //     'title'=> $title
        // ];
    
        //compact('title')
        // return view('home')->with('title',$title);    
            return View::make('home',compact('title'));
    }

    public function getNews(){
        return 'Danh sach tin tuc';
    }
    public function getCategory($id){
        return 'Chuyen muc: '.$id;
    }
    }

