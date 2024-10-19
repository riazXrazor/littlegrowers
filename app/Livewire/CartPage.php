<?php

namespace App\Livewire;

use Livewire\Component;

class CartPage extends Component
{
    public function render()
    {
        $cart_data = !empty(session()->get('cart')) ?  session()->get('cart') : [];
        return view('livewire.cart-page',['cart_data' => $cart_data])->layout('components.layouts.app', ['cart_data' => $cart_data ]);
    }
}
