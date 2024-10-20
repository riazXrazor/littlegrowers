<?php

namespace App\Livewire;

use Livewire\Component;
use Masmerise\Toaster\Toaster;

class CartHeaderComponent extends Component
{

    protected $listeners = [
       'new-item-to-cart' =>  '$refresh'
    ];
    public function render()
    {
        return view('livewire.cart-header-component',['cart_data' => !empty(session()->get('cart')) ?  session()->get('cart') : []]);
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        $product = $cart[$id];
        unset($cart[$id]);
        session()->put('cart', $cart);
        $this->dispatch('alert',['type' => 'info',  'message' => $product['name'].' removed from cart!']);
    }

    public function clearCart()
    {
        session()->forget('cart');
        $this->dispatch('alert',['type' => 'info',  'message' => 'Cart cleared!']);
    }

    public function checkoutpage()
    {
        return redirect()->route('cart.page');
    }
}
