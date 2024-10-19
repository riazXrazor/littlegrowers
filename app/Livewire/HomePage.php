<?php

namespace App\Livewire;

use App\Models\Categories;
use App\Models\Product;
use Livewire\Component;

class HomePage extends Component
{

    public function render()
    {
        // session()->forget('cart');
        $perpage = request()->has('perpage') && !empty(request()->get('perpage')) ? request()->get('perpage') : 20;
        $orderby = request()->has('orderby') && !empty(request()->get('orderby')) ? request()->get('orderby') : 'created_at';
        $order_type = request()->has('order_type') && !empty(request()->get('order_type')) ? request()->get('order_type') : 'desc';
        
        $categories = [];
        Categories::all()->map(function ($category) use (&$categories) {
            $categories[$category->category_name] = Product::where('product_category', $category->category_name)->count(); 
        });
        

       
        $products = Product::with('images');
        if (request()->has('filter_category') && !empty(request()->get('filter_category'))) {
           
            $products = $products->where(function ($query) {
                $cat_arr = explode(',', request()->get('filter_category'));
                foreach ($cat_arr as  $value) {
                            $query->orWhere('product_category', $value);   
                }
            });
        }

        if (request()->has('max_price') && request()->has('min_price') && !empty(request()->get('min_price')) && !empty(request()->get('max_price'))) {
            $maxp = request()->get('max_price');
            $minp = request()->get('min_price');
            $products = $products->whereBetween('product_price', [$minp, $maxp]);
        }

        $products = $products->orderBy($orderby, $order_type)->paginate($perpage);
      

        $categories['All'] = collect($categories)->sum(fn ($value) => $value);


        $price_braket = [
            'max' => Product::max('product_price'),
            'min' =>  Product::min('product_price'),
        ];
        return view('livewire.home-page',['products' => $products, 'categories' => $categories, 'price_braket' => $price_braket])->layout('components.layouts.app', ['cart_data' => !empty(session()->get('cart')) ?  session()->get('cart') : []]); 
    }

    public function addItemToCart($id)
    {
        $product = Product::with('images')->find($id);

        if (!$product) {
            return redirect()->route('homepage');
        }

        $cart = session()->get('cart');

        if (!$cart) {

            $cart = [
                $product->id => [
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->product_price,
                    "photo" => $product->images->first()->product_images
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->route('homepage');
        }

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->route('homepage');
        }

        $cart[$product->id] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_price,
            "photo" => $product->images->first()->product_images
        ];

        session()->put('cart', $cart);

        redirect()->route('homepage');
            
    }
}
