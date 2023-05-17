<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function addproduct(){
        $categories = Category::All()->pluck('category_name', 'category_name');
        return view('admin.addproduct')->with('categories', $categories);
    }
    public function saveproduct(Request $request){
        $this->validate($request,   ['product_name' => 'required',
                                     'product_price' => 'required',
                                     'product_category' => 'required',
                                     'product_image' => 'image|nullable|max:1999']);                           

        if($request->hasFile('product_image')){
           $fileNamewithExt = $request->file('product_image')->getClientOriginalName();
           $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
           $extension = $request->file('product_image')->getClientOriginalExtension();
           $fileNameToStore = $fileName.'_'.time().'.'.$extension;
           $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);
        }
        else{
           $fileNameToStore ='noimage.jpg';
        }
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        $product->product_image = $fileNameToStore;
        $product->status = 1;
        $product->save();
        return back()->with('status', 'le produit a été enenregistrée avec succès !!!');

    }
   

    public function edit_product($id){
        $product = Product::find($id);
        $categories = $categories = Category::All()->pluck('category_name', 'category_name');
        return view('admin.editproduct')->with('product', $product)->with('categories', $categories);

    }
    public function products(){
        $products = Product::All();
        return view('admin.products')->with('products', $products);
    }
    public function updateproduct(Request $request){
        $this->validate($request,   ['product_name' => 'required',
                                     'product_price' => 'required',
                                     'product_category' => 'required',
                                     'product_image' => 'image|nullable|max:1999']);
        $product = Product::find($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->product_price;
        $product->product_category = $request->input('product_category');

        if($request->hasFile('product_image')){
            $fileNamewithExt = $request->file('product_image')->getClientOriginalName();
            $fileName = pathinfo($fileNamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('product_image')->storeAs('public/product_images', $fileNameToStore);

            if($product->product_image != 'noimage.jpg'){
                Storage::delete('public/product_images/'.$product->product_image);
            }

            $product->product_image = $fileNameToStore;
        }
        $product->update();
        return redirect('/products')->with('status', 'le produit a été Modifié avec succès !!!');


    }
    public function delete_product($id){
        $product = Product::find($id);
        if($product->product_image != 'noimage.jpg'){
            Storage::delete('public/product_images/'.$product->product_image);
        }
        $product->delete();
        return back()->with('status', 'le produit a été supprimé avec succès !!!');
    }
    public function activer_product($id){
        $product = Product::find($id);
        $product->status = 1;
        $product->update();
        return back();
    }
    public function desactiver_product($id){
        $product = Product::find($id);
        $product->status = 0;
        $product->update();
        return back();
    }
    public function select_par_cat($category_name){
        $products = Product::All()->where('product_category', $category_name)->where('status', 1);
        $categories = Category::All();
        return view('client.shop')->with('products', $products)->with('categories', $categories);

    }
    

    


}
