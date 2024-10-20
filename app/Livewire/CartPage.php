<?php

namespace App\Livewire;

use App\Models\Settings;
use Livewire\Component;

class CartPage extends Component
{
    public function render()
    {
        $cart_data = !empty(session()->get('cart')) ?  session()->get('cart') : [];
        return view('livewire.cart-page',['cart_data' => $cart_data]);
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->route('cart.page');
    }
    
    public function paceOrder()
    {
        $mobile = Settings::select('setting_value')->where('setting_name', 'whatsapp_number')->first()->setting_value;
        $items = session()->get('cart');
        $ordertext = "";
        if (!empty($items)) {
            foreach($items as $item){
                // $ordertext .= urlencode($item['name'].' x '.$item['quantity']).'%0a'.urlencode($item['url']).'%0a%0a';

                $ordertext .= urlencode("**NEW ORDER**")."%0a";
                $ordertext .= urlencode("Product Name : *".$item['name']."*")."%0a";
                $ordertext .= urlencode("Quantity : *".$item['quantity']."*")."%0a";
                $ordertext .= urlencode("Price : *₹ ".$item['price']."*")."%0a";
                $ordertext .= urlencode("Url : *".$item['url']."*")."%0a";
                $ordertext .= urlencode("***************")."%0a";
                // $message .= urlencode("Customer Name : *$name*")."%0a";
                // $message .= urlencode("Customer Phone : *$phone*")."%0a";
                // $message .= urlencode("Customer Address : $address")."%0a";
                // $message .= urlencode("*****************")."%0a";
            }
        }
        return redirect('https://api.whatsapp.com/send?phone='.$mobile.'&text='.$ordertext);
        
    }
}
