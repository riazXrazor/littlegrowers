<?php

namespace App\Livewire;

use Livewire\Component;

class AboutUsPage extends Component
{
    public function render()
    {
        return view('livewire.about-us-page')->layout('components.layouts.app', ['cart_data' => !empty(session()->get('cart')) ?  session()->get('cart') : []]);
    }
}
