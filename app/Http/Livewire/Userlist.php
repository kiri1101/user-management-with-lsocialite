<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Userlist extends Component
{
    public int $userID;
    public bool $viewModal = false;
    public string $search = '';
    public string $username;
    public string $name;
    public string $email;
    public string $position;

    protected $queryString = ['search'];

    public function render()
    {
        $data['users'] = User::where('username', 'like', '%'.$this->search.'%')
                            ->Orwhere('name', 'like', '%'.$this->search.'%')
                            ->Orwhere('email', 'like', '%'.$this->search.'%')
                            ->Orwhere('position', 'like', '%'.$this->search.'%')
                            ->latest()->paginate(4);
        return view('livewire.userlist',$data);
    }

    public function userEdit($id)
    {
        $this->viewModal = !$this->viewModal;
        $this->userID = $id;
        try {
            $users = User::findOrFail($id);
            $this->username = $users->username;
            $this->name = $users->name;
            $this->email = $users->email;
            $this->position = $users->position;
        } catch(\Throwable $th) {
            session()->flash('warning', 'Something went wrong!');
            return redirect(request()->header('Referer'));
        }
    }

    protected $rules = [
        'username' => 'required|string|min:3',
        'name' => 'required|string|min:8',
        'email' => 'required|email',
        'position' => 'required|string',
    ];

    public function store($id)
    {
        try {
            $validatedData = $this->validate();
            User::whereid($id)->update([
                'username' => $validatedData['username'],
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'position' => $validatedData['position'],
            ]);

            session()->flash('success', 'User update successful!');
            return redirect(request()->header('Referer'));

        } catch (\Throwable $th) {
            session()->flash('warning', 'Something went wrong!');
            return redirect(request()->header('Referer'));
        }
    }

    public function delete($id)
    {
        try {
            // Check if user is online
            if (auth()->check()) {
                session()->flash('error', 'Current User is Online!');
                return redirect(request()->header('Referer'));
            }

            // Delete user account if user is offline
            User::findOrFail($id)->delete();
            session()->flash('success', 'Account Deleted Successfully!');
            return redirect(request()->header('Referer'));
            
        } catch (\Throwable $th) {
            session()->flash('warning', 'Something went wrong!');
            return redirect(request()->header('Referer'));
        }
    }

    public function closeModal()
    {
        $this->viewModal = !$this->viewModal;
    }
}
