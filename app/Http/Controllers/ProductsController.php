<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    
    public function index()
    {
        $products = Product::with('images')->get();
        return view('admin.products',['products' => $products]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'product_name' => 'required|max:255',
                'product_price' => 'required|numeric',
                'product_description' => 'required',
                'product_category' => 'required',
                'product_tags' => 'required',
                'product_images' => 'required',
            ]);
            $validated['product_images_uploaded'] = [];
            foreach ($request->file('product_images') as $image) {
                $validated['product_images_uploaded'][] = $image->store('product-images', ['disk' => 'local_uploads']);
            }

      
            
            $product = new Product();
            $product->product_name = $validated['product_name'];
            $product->product_price = $validated['product_price'];
            $product->product_description = $validated['product_description'];
            $product->product_category = $validated['product_category'];
            $product->product_tags = json_encode($validated['product_tags']);
            $product->save();

            foreach ($validated['product_images_uploaded'] as $image) {
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->product_images = $image;
                $productImage->save();
            }

            return redirect('/admin/products');
            

        }
        return view('admin.add-products');
    }

    public function edit($id, Request $request)
    {
        $product = Product::with('images')->where('id', $id)->first();

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'product_name' => 'required|max:255',
                'product_price' => 'required|numeric',
                'product_description' => 'required',
                'product_category' => 'required',
                'product_tags' => 'required',
            ]);

            if($request->hasFile('product_images')){
                $images = $product->images;
                foreach ($images as $image) {
                    Storage::disk('local_uploads')->delete($image->product_images);
                    $image->delete();
                }
                
                $validated['product_images_uploaded'] = [];
                foreach ($request->file('product_images') as $image) {
                    $validated['product_images_uploaded'][] = $image->store('product-images', ['disk' => 'local_uploads']);
                }
            }
            
            $product->product_name = $validated['product_name'];
            $product->product_price = $validated['product_price'];
            $product->product_description = $validated['product_description'];
            $product->product_category = $validated['product_category'];
            $product->product_tags = json_encode($validated['product_tags']);
            $product->save();

           
            if($request->hasFile('product_images') && isset($validated['product_images_uploaded'])) {
                foreach ($validated['product_images_uploaded'] as $image) {
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->product_images = $image;
                    $productImage->save();
                }
            }

            return redirect('/admin/products');
            

        }
       
        return view('admin.edit-products',['product' => $product]);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $images = $product->images;
        foreach ($images as $image) {
            Storage::disk('local_uploads')->delete($image->product_images);
            $image->delete();
        }
        
        $product->delete();
        return redirect('/admin/products');
    }
}
