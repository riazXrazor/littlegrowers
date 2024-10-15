<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $perpage = request()->has('perpage') ? request()->get('perpage') : 20;
        $categories = [
            'All' =>  0,
            'Grow Bags' => 0,
            'Organic Bio Fertilizer & Manures' => 0,
            'Seeds' => 0,
            'Garden Accessories' => 0,
            'Plastic Pots' => 0,
        ];

       
        $products = Product::with('images')->paginate($perpage);
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
            'max' => max($prices),
            'min' => min($prices),
        ];
        return view('livewire.home-page',['products' => $products, 'categories' => $categories, 'price_braket' => $price_braket]);
    }
}
