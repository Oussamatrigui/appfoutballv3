<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Http\Middleware\CheckRole;

class NewsController extends Controller
{

    public function __construct()
    // {
    //     $this->middleware(CheckRole::class . ':admin', ['only' => ['adminAction']]);
    //     $this->middleware(CheckRole::class . ':journalist', ['only' => ['userAction']]);
    //     $this->middleware(CheckRole::class . ':confirmed', ['only' => ['confirmedAction']]);
    // }

    {
       
        // $this->middleware('auth');
        // $this->middleware('checkrole:journalist,journalist:true');
        // $this->middleware('role:journalist');
        // $this->middleware('role:admin');
        // $this->middleware('is_confirmed:1');
        
    }


    public function news(){
        $news = News::All();
        return view('admin.news') -> with('news' , $news);
    }

    public function addnews(){
        // $auteur = User::all()->pluck('name', 'name')->where('role', 'journalist')->toArray();
        $auteur = User::all()->pluck('name', 'name');
        return view('admin.addnews')->with('auteur', $auteur);
    }

    public function savenews(Request $request){

        $this->validate($request , ['auteur' => 'required' ,
        'news_title' => 'required',
        'news_content' => 'required',
        'news_image' => 'image|required|max:1999' ]);

            $fileNameWithExt = $request -> file('news_image') -> getClientOriginalName();

            $fileName = pathinfo ($fileNameWithExt , PATHINFO_FILENAME);

            $extension = $request -> file('news_image') -> getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request -> file('news_image') -> storeAs('public/news_images' , $fileNameToStore);


            $news = new News();
            $news -> auteur = $request ->input('auteur');
            $news -> news_title = $request ->input('news_title');
            $news -> news_content = $request ->input('news_content');
            $news -> news_image = $fileNameToStore;
            $news->status = 1;
            $news -> save();
    
            return back()->with('status' , 'News enregistré avec succées');

    }

    public function edit_news($id){
        $news = News::find($id);
        return view('admin.editnews') -> with('news', $news);
    }

    public function updatenews(Request $request){
        $this->validate($request , ['auteur' => 'required' ,
                                    'news_title' => 'required',
                                    'news_content' => 'required',
                                    'news_image' => 'image|nullable|max:1999' ]);
        
        $news = News::find( $request->input('id'));
        $news -> auteur = $request -> input('auteur');
        $news -> news_title = $request -> news_title;
        $news -> news_content = $request -> input('news_content');

        if ($request -> hasFile ('news_image')){
            $fileNameWithExt = $request -> file('news_image') -> getClientOriginalName();
            $fileName = pathinfo ($fileNameWithExt , PATHINFO_FILENAME);
            $extension = $request -> file('news_image') -> getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request -> file('news_image') -> storeAs('public/news_images' , $fileNameToStore);
            if($news -> news_image != 'noimage.jpg') {
                Storage::delete('public/news_images/'.$news->news_image);   
            }
            $news -> news_image = $fileNameToStore ;
        }
        $news ->update();
        return redirect('/newss')->with('status' , 'News à été Mise à jour avec succées');
        
    }

    public function delete_news($id){

        $news = News::find($id);

        $news -> delete();

        return back()->with('status' , 'News Supprimer avec succees');
    }

    public function activer_news($id){
        $news = News::find($id);
        $news->status = 1;
        $news->update();
        return back();
    }
    public function desactiver_news($id){
        $news = News::find($id);
        $news->status = 0;
        $news->update();
        return back();
    }
}
