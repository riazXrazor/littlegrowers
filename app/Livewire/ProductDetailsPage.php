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
        return view('livewire.product-details-page',['product' => $product]);
    }

    public function addItemToCart($id)
    {
        $product = Product::with('images')->find($id);

        if (!$product) {
            return ;
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
            $this->dispatch('new-item-to-cart');
            $this->dispatch('alert',['type' => 'success',  'message' => $product->product_name.' added to cart!']);
            return ;
        }

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);
            $this->dispatch('new-item-to-cart');
            $this->dispatch('alert',['type' => 'success',  'message' => $cart[$id]['name'].' updated in cart!']);
            return ;
        }

        $cart[$product->id] = [
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_price,
            "photo" => $product->images->first()->product_images
        ];

        session()->put('cart', $cart);

        $this->dispatch('new-item-to-cart');
        $this->dispatch('alert',['type' => 'success',  'message' => $product->product_name.' added to cart!']);
            
    }
}
