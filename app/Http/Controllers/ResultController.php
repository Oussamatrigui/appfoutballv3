<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Result;




class ResultController extends Controller
{
    public function addresult(){
        return view('admin.addresult');
    }
    public function saveresult(Request $request){
        $this->validate($request,   ['equipe1' => 'required',
        'equipe1_logo' => 'image|nullable|max:1999',
        'equipe2' => 'required',
        'equipe2_logo' => 'image|nullable|max:1999',
        'Result' => 'required',
        'datematch' => 'required',
        'heure' => 'required',
 ]);                           

if($request->hasFile('equipe1_logo')){
$fileNamewithExt = $request->file('equipe1_logo')->getClientOriginalName();
$fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
$extension = $request->file('equipe1_logo')->getClientOriginalExtension();
$fileNameToStore = $fileName.'_'.time().'.'.$extension;
$path = $request->file('equipe1_logo')->storeAs('public/logo1_images', $fileNameToStore);
}
else{
$fileNameToStore ='noimage.jpg';

if($request->hasFile('equipe2_logo,e')){
    $fileNamewithExt = $request->file('equipe2_logo')->getClientOriginalName();
    $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
    $extension = $request->file('equipe2_logo')->getClientOriginalExtension();
    $fileNameToStore = $fileName.'_'.time().'.'.$extension;
    $path = $request->file('equipe2_logo')->storeAs('public/logo2_images', $fileNameToStore);
    }
    else{
    $fileNameToStore ='noimage.jpg';
}
$result = new Result();
$result->equipe1 = $request->input('equipe1');
$result->equipe1_logo = $fileNameToStore;
$result->equipe2 = $request->input('equipe2');
$result->equipe2_logo = $fileNameToStore;
$result->Result = $request->input('Result');
$result->datematch = $request->input('datematch');
$result->heure = $request->input('heure');

$result->status = 1;
$result->save();
return back()->with('status', 'le produit a été enenregistrée avec succès !!!');

}

    }
    public function results(){
        $results = Result::All();

        return view('admin.results')->with('results', $results);
    }
}
