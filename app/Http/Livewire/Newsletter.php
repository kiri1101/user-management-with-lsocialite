<?php

namespace App\Http\Livewire;

use App\Models\Emails;
use Livewire\Component;

class Newsletter extends Component
{
    public $email;
    public $success;

    public function render()
    {
        return view('livewire.newsletter');
    }

    protected $rules = [
        'email' => 'required|email',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();
        $mail = new Emails;
        $mail->email = $validatedData['email'];
        $mail->save();

        $this->reset();
        $this->resetValidation();

        $this->success = 'Sent ✔️';
    }
}
