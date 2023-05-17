<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Content;



class ContentController extends Controller
{
    public function addcontent()
    {
        return view('admin.addcontent');
    }
    public function savecontent(Request $request)
    {
        $this->validate($request, [
            'titre_article' => 'required',
            'article' => 'required',
            'nom_auteur' => 'required',
            'content_image' => 'image|nullable|max:1999'
        ]);
        if ($request->hasFile('content_image')) {
            $fileNamewithExt = $request->file('content_image')->getClientOriginalName();
            $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('content_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('content_image')->storeAs('public/content_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $content = new Content();
        $content->titre_article = $request->input('titre_article');
        $content->article = $request->input('article');
        $content->nom_auteur = $request->input('nom_auteur');
        $content->content_image = $fileNameToStore;
        $content->status = 1;
        $content->save();
        return back()->with('status', 'le contenu  a été enenregistrée avec succès !!!');

    }
    public function contents()
    {
        $contents = Content::All();
        return view('admin.contents')->with('contents', $contents);
    }
    public function edit_content($id)
    {
        $content = Content::find($id);
        return view('admin.editcontent')->with('content', $content);

    }
    public function updatecontent(Request $request)
    {
        $this->validate($request, [
            'titre_article' => 'required',
            'article' => 'required',
            'nom_auteur' => 'required',
            'content_image' => 'image|nullable|max:1999'
        ]);
        $content = Content::find($request->input('id'));
        $content->titre_article = $request->input('titre_article');
        $content->article = $request->input('article');
        $content->nom_auteur = $request->input('nom_auteur');
        if ($request->hasFile('content_image')) {
            $fileNamewithExt = $request->file('content_image')->getClientOriginalName();
            $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('content_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('content_image')->storeAs('public/content_images', $fileNameToStore);
            if($content->content_image != 'noimage.jpg'){
                Storage::delete('public/content_images/'.$content->content_image);
            }
            $content->content_image = $fileNameToStore;

        }
        $content->update();
        return redirect('/contents')->with('status', 'le contenu  a été modifier avec succès !!!');


    }
    public function delete_content($id){
        $content = Content::find($id);
        if($content->content_image != 'noimage.jpg'){
            Storage::delete('public/content_images/'.$content->content_image);
        }
        $content->delete();
        return back()->with('status', 'le produit a été supprimé avec succès !!!');
    }
    public function activer_content($id){
        $content = Content::find($id);
        $content->status = 1;
        $content->update();
        return back();
    }
    public function desactiver_content($id){
        $content = Content::find($id);
        $content->status = 0;
        $content->update();
        return back();
    }
}