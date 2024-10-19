<?php

namespace App\Livewire;

use Livewire\Component;

class ProfilePage extends Component
{
    public function render()
    {
        return view('livewire.profile-page')->layout('components.layouts.app', ['cart_data' => !empty(session()->get('cart')) ?  session()->get('cart') : []]);
    }
}
