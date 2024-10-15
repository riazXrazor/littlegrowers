<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $perpage = request()->has('perpage') ? request()->get('perpage') : 20;
        $orderby = request()->has('orderby') ? request()->get('orderby') : 'created_at';
        $order_type = request()->has('order_type') ? request()->get('order_type') : 'desc';
        
        $categories = [
            'All' =>  0,
            'Grow Bags' => 0,
            'Organic Bio Fertilizer & Manures' => 0,
            'Seeds' => 0,
            'Garden Accessories' => 0,
            'Plastic Pots' => 0,
        ];

       
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
        $prices = [];
        foreach ($products as $product) {
            $categories['All'] += 1;
            if(isset($categories[$product->product_category])){
                $categories[$product->product_category] += 1;
            }
            $prices[] = $product->product_price;
        }

        
    //    dd($products);

        $price_braket = [
            'max' => count($prices) > 0 ? max($prices) : 0,
            'min' => count($prices) > 0 ? min($prices): 0,
        ];
        return view('livewire.home-page',['products' => $products, 'categories' => $categories, 'price_braket' => $price_braket]);
    }
}
