<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Slider;
use App\Models\News;



class IndexController extends Controller
{
    //
    public function index(){
        $sliders = Slider::All()->where('status', 1);
        $contents = News::All();
        return view('client.index')->with('contents', $contents)->with('sliders', $sliders);
    }
    public function news(){
        $contents = News::All();
        return view('client.news')->with('contents', $contents);
    }
    public function article($titre){
        
        
        $contents = Content::where([
          
            ['titre_article','LIKE','%'.$titre.'%']
        ])
        ->get(); 
        
        return view('client.article')->with('contents', $contents);
    }
    public function contact(){
        return view('client.contact');
    }
    public function savecontact(){
        
    }
   
}
