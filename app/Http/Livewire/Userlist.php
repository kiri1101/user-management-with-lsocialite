<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Userlist extends Component
{
    public int $userID;
    public bool $viewModal = false;
    public int $modalSwitch;
    public string $search = '';
    public $username;
    public $name;
    public $email;
    public $position;
    public $password;
    public $password_confirmation;

     use WithPagination;

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
        'page' => ['except' => 1, 'as' => 'p'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data['users'] = User::where('username', 'like', '%'.$this->search.'%')
                            ->Orwhere('name', 'like', '%'.$this->search.'%')
                            ->Orwhere('email', 'like', '%'.$this->search.'%')
                            ->Orwhere('position', 'like', '%'.$this->search.'%')
                            ->orderBy('id', 'asc')
                            ->paginate(4);
        return view('livewire.userlist',$data);
    }

    protected $rules = [
        'username' => 'required|string|min:3',
        'name' => 'required|string|min:8',
        'email' => 'required|email',
        'position' => 'required|string',
        'password' => 'sometimes|string|confirmed|min:6'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        try {
            $validatedData = $this->validate();
            $newUser = new User;
            $newUser->username = $validatedData['username'];
            $newUser->name = $validatedData['name'];
            $newUser->email = $validatedData['email'];
            $newUser->position = $validatedData['position'];
            $newUser->password = Hash::make($validatedData['password']);
            $newUser->save();

            session()->flash('success', 'User created successfully!');
            return redirect(request()->header('Referer'));
        } catch (\Throwable $th) {
            dd($th);
            // session()->flash('warning', 'Failed to create new user!');
            // return redirect(request()->header('Referer'));
        }
    }

    public function userEdit($id)
    {
        $this->viewModal = !$this->viewModal;
        $this->modalSwitch = 1;
        $this->userID = $id;
        try {
            $users = User::findOrFail($id);
            $this->username = $users->username;
            $this->name = $users->name;
            $this->email = $users->email;
            $this->position = $users->position;
        } catch(\Throwable $th) {
            session()->flash('warning', 'Unknown user ID!');
            return redirect(request()->header('Referer'));
        }
    }

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
            session()->flash('error', 'Failed to edit user!');
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

    public function opendeleteModal($id)
    {
        $this->viewModal = !$this->viewModal;
        $this->modalSwitch = 2;
        $this->userID = $id;
    }

    public function opencreateModal()
    {
        $this->viewModal = !$this->viewModal;
        $this->modalSwitch = 3;
    }

    public function closeModal()
    {
        $this->viewModal = !$this->viewModal;
    }
}
