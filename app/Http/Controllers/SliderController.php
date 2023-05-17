<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
    public function addslider()
    {
        return view('admin.addslider');

    }
    public function sliders()
    {
        $sliders = Slider::All();
        return view('admin.sliders')->with('sliders', $sliders);
    }
    public function saveslider(Request $request)
    {
        $this->validate($request, [
            'description1' => 'required',
            'description2' => 'required',
            'slider_image' => 'image|required|max:1999'
        ]);

        $fileNamewithExt = $request->file('slider_image')->getClientOriginalName();
        $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
        $extension = $request->file('slider_image')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('slider_image')->storeAs('public/slider_image', $fileNameToStore);
        $slider = new Slider();
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->input('description2');
        $slider->slider_image = $fileNameToStore;
        $slider->status = 1;
        $slider->save();
        return back()->with('status', 'le slider a été enenregistrée avec succès !!!');

    }
    public function edit_slider($id)
    {
        $slider = Slider::find($id);
        return view('admin.editslider')->with('slider', $slider);
    }
    public function updateslider(Request $request)
    {
        $slider = Slider::find($request->input('id'));
        $this->validate($request, [
            'description1' => 'required',
            'description2' => 'required',
            'slider_image' => 'image|max:1999' ]);

        $slider = Slider::find($request->input('id'));
        $slider->description1 = $request->input('description1');
        $slider->description2 = $request->description2;

        if ($request->hasFile('slider_image')) {
            $fileNamewithExt = $request->file('slider_image')->getClientOriginalName();
            $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('slider_image')->storeAs('public/slider_image', $fileNameToStore);

           
            Storage::delete('public/slider_image/' . $slider->slider_image);
            
            $slider->slider_image = $fileNameToStore;
            $slider->update();
        }
        $slider->update();
        return redirect('/sliders')->with('status', 'le slider a été Modifié avec succès !!!');

    }
    public function delete_slider($id){
        $slider = Slider::find($id);
        if($slider->slider_image != 'noimage.jpg'){
            Storage::delete('public/slider_image/'.$slider->slider_image);
        }
        $slider->delete();
        return back()->with('status', 'le slider a été supprimé avec succès !!!');

    }
    public function desactiver_slider($id){
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->update();
        return back();
    }
    public function activer_slider($id){
        $product = Slider::find($id);
        $product->status = 1;
        $product->update();
        return back();
    }
}