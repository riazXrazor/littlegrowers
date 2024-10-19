<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetailsPage extends Component
{

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $product = Product::findBySlug($this->slug);
        return view('livewire.product-details-page',['product' => $product])->layout('components.layouts.app', ['cart_data' => !empty(session()->get('cart')) ?  session()->get('cart') : []]);
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

        redirect()->route('product.details', $this->slug);
            
    }
}
