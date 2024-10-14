<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $perpage = request()->has('perpage') ? request()->get('perpage') : 2;
        $categories = [
            'All plants' =>  0,
            'Outdoor Plants' => 0,
            'Indoor Plants' => 0,
            'Office Plants' => 0,
            'Potted' => 0,
            'Others' => 0,
        ];

       
        $products = Product::with('images')->paginate($perpage);
        $prices = [];
        foreach ($products as $product) {
            $categories['All plants'] += 1;
            $categories[$product->product_category] += 1;
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
