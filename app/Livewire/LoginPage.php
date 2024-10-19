<?php

namespace App\Livewire;

use Livewire\Component;

class LoginPage extends Component
{
    public function render()
    {
        return view('livewire.login-page')->layout('components.layouts.app', ['cart_data' => !empty(session()->get('cart')) ?  session()->get('cart') : []]);
    }
}
