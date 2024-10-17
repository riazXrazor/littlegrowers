<?php

namespace App\Livewire;

use App\Mail\ContactUsEmail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactUsPage extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
 
    protected $rules = [
        'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:100',
            'message' => 'required|max:500',
    ];
    public function render()
    {
        return view('livewire.contact-us-page');
    }

    public function submit()
    {
            $validated = $this->validate();
            $this->reset(); 

            Mail::to(env('MAIL_INBOX_EMAIL'))->send(new ContactUsEmail($validated));
            $this->dispatch('show-success-modal'); 
    }
}
