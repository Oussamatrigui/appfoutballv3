<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Slider;
use Illuminate\support\Facades\Mail;
use App\http\Requests\ContactRequest;
use App\Mail\ContactMessageCreated;


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
    public function create(){
        return view('client.contact');
    }
   
    public function store(request $request)
    {
        $mailable = new ContactMessageCreated($request->name, $request->email, $request->msg);
        Mail::to('hello@examp')->send($mailable);

     /*  $this->validate($request,[
        'name'=>'required|min:3',
        'email'=>'required|min:3',
        'sujet'=>'required|min:3',
        'message'=>'required|min:3',

      ]);*/
      return redirect('/contact')->with('status', 'le message a été envoyer avec succès !!!');    }
    
 
}
