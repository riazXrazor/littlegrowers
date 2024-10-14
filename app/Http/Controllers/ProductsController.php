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
                'product_images' =>'required',
                'product_images.*' => 'required|mimes:jpg,jpeg,bmp,png,webp|max:5000',
            ],[
                'product_images.*.required' => 'Please upload product images',
                'product_images.*.mimes' => 'Only jpeg,png and bmp images are allowed',
                'product_images.*.max' => 'Sorry! Maximum allowed size for an image is 5MB',
            ]);
          
            $validated['product_images_uploaded'] = [];
            foreach ($request->file('product_images') as $image) {
                $validated['product_images_uploaded'][] = $image->store('product-images');
            }   
            
            $product = new Product();
            $product->product_name = $validated['product_name'];
            $product->product_price = $validated['product_price'];
            $product->product_description = $validated['product_description'];
            $product->product_category = $validated['product_category'];
            $product->product_tags = json_encode($validated['product_tags']);
            $product->sku = 'LG-'.now()->format('ymd');
            $product->save();

            foreach ($validated['product_images_uploaded'] as $key => $image) {
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->product_images = $image;
                $productImage->is_main = $key == 0 ? true : false;
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
                'product_images.*' => 'mimes:jpeg,jpg,png,bmp,webp|max:5000',
            ],[
                'product_images.*.mimes' => 'Only jpeg,jpg,png,bmp and webp images are allowed',
                'product_images.*.max' => 'Maximum allowed size for an image is 5MB',
            ]);

            if($request->hasFile('product_images')){
                $images = $product->images;
                foreach ($images as $image) {
                    Storage::disk('s3')->delete($image->product_images);
                    $image->delete();
                }
                
                $validated['product_images_uploaded'] = [];
                foreach ($request->file('product_images') as $image) {
                    $validated['product_images_uploaded'][] = $image->store('product-images');
                }
            }

         
            
            $product->product_name = $validated['product_name'];
            $product->product_price = $validated['product_price'];
            $product->product_description = $validated['product_description'];
            $product->product_category = $validated['product_category'];
            $product->product_tags = json_encode($validated['product_tags']);
            $product->save();

           
            if($request->hasFile('product_images') && isset($validated['product_images_uploaded'])) {
                foreach ($validated['product_images_uploaded'] as $key => $image) {
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->product_images = $image;
                    $productImage->is_main = $key == 0 ? true : false;
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
            Storage::disk('s3')->delete($image->product_images);
            $image->delete();
        }
        
        $product->delete();
        return redirect('/admin/products');
    }

    public function image_update($id, Request $request)
    {
        $operation = $request->input('operation');
        $productimage = ProductImage::find($id);

        switch ($operation) {
            case 'delete':
                $image = $productimage->product_images;
                Storage::disk('s3')->delete($image);
                $productimage->delete();
                break;
            case 'cover':
                ProductImage::where('product_id', $productimage->product_id)->update(['is_main' => false]);
                $productimage->is_main = true;
                $productimage->save();
            break;
            default:
                break;
        }
      
        return redirect('/admin/products');
    }
}
