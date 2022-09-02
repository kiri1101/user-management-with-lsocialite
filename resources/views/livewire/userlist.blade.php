<div x-data="{ openModal: false, get isOpenModal() { return this.openModal }, toggleModal() { this.openModal = ! this.openModal }, }" class="relative min-w-full md:w-[1120px] min-h-full md:min-h-[500px] bg-white dark:bg-gray-900 overflow-x-auto shadow-md sm:rounded-lg text-sm">
    <div class="flex flex-col gap-2 px-3 py-4 bg-white md:items-center md:flex-row md:justify-between dark:bg-gray-800">
        <div class="min-w-64">
            <x-button wire:click='opencreateModal' @click="toggleModal()" class="bg-blue-300 hover:bg-blue-400">Create User</x-button>
        </div>
        {{-- <label for="table-search" class="sr-only">Search</label> --}}
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="search" wire:model='search' class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg md:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" aria-describedby="User's Table">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            @if ($users)
                <tr class="hidden md:block">
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>                    
                    <th scope="col" class="px-6 py-3">
                        Position
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            @endif
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="hidden px-6 py-4 md:block">
                        <div class="flex items-center">
                            {{ $user->id }}
                        </div>
                    </td>
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="https://api.lorem.space/image/face?w=150&h=150" alt="Jese image">
                        <div class="pl-3">
                            <div class="text-base font-semibold">{{ $user->name }}</div>
                            <div class="font-normal text-gray-500">{{ $user->email }}</div>
                        </div>  
                    </th>
                    <td class="hidden px-6 py-4 md:block">
                        {{ $user->username }}
                    </td>
                    <td class="px-6 py-4 hidden md:block @if($user->isAdmin) text-fuchsia-400 font-bold @endif">
                        <div class="flex items-center justify-center px-3 py-2 uppercase rounded-lg shadow bg-sky-200">
                            {{ $user->isAdmin ? 'Admin' : 'Customer' }}
                        </div>
                    </td>
                    <td class="hidden px-6 py-4 md:block">
                        {{ $user->position }}
                    </td>
                    <td class="hidden px-6 py-4 md:block">
                        <div class="flex items-center">
                            @if ($user->status)
                                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                            @else
                                <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div> Offline
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <!-- Modal toggle -->
                        <div wire:click='userEdit({{ $user->id }})' @click="toggleModal()" type="button" class="font-medium text-blue-600 cursor-pointer dark:text-blue-500 hover:underline">Edit</div>
                        <div wire:click='opendeleteModal({{ $user->id }})' @click="toggleModal()" type="button" class="font-medium text-red-600 cursor-pointer dark:text-red-500 hover:underline">Delete</div>
                    </td>
                </tr>
            @empty
                <div class="flex flex-col items-center justify-center w-full h-64 m-auto overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 fill-lime-400 stroke-green-300" data-name="Layer 1" viewBox="0 0 128 128">
                        <path d="M52.77,74.89a2,2,0,0,0,2.83,0l8.4-8.4,8.4,8.4a2,2,0,0,0,2.83-2.83l-8.4-8.4,8.4-8.4a2,2,0,0,0-2.83-2.83L64,60.83l-8.4-8.4a2,2,0,0,0-2.83,2.83l8.4,8.4-8.4,8.4A2,2,0,0,0,52.77,74.89Z"/>
                        <path d="M127.11,36.34l-24-16A2,2,0,0,0,102,20H2a2,2,0,0,0-1.49.68A2,2,0,0,0,0,22S0,90,0,90a2,2,0,0,0,.89,1.66l24,16A2.29,2.29,0,0,0,26,108H126a2,2,0,0,0,2-2s0-68,0-68A2,2,0,0,0,127.11,36.34ZM104,25.74,119.39,36H104ZM24,102.26,8.61,92H24ZM24,88H4V25.74L24,39.07ZM8.61,24H100V36H26.61ZM100,40V88H28V40ZM28,104V92h73.39l18,12Zm96-1.74L104,88.93V40h20Z"/>
                    </svg>
                    <h3 class="mt-1 font-mono text-sm font-semibold text-gray-600 md:text-md dark:text-gray-400">No users available</h3>
                </div>                 
            @endforelse
        </tbody>
    </table>
    @if ($users)
        <div class="mx-2">{{ $users->links() }}</div>
    @endif
    
    @if ($viewModal)
        <!-- Edit user modal -->
        <div x-show="isOpenModal" x-transition.delay.75ms x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 flex justify-center w-full p-4 overflow-x-hidden overflow-y-auto transition-transform duration-300 ease-in-out bg-gray-900/30 md:inset-0 h-modal md:h-full" aria-modal="true" role="dialog">
            <div class="relative flex items-center w-full h-full max-w-2xl md:h-auto">
                <!-- Modal content -->
                @if ($modalSwitch==1)
                    <form wire:submit.prevent='store({{ $userID }})' class="relative bg-white w-[40rem] rounded-lg shadow-lg dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Edit user {{ $userID }}
                            </h3>
                            <button type="button" wire:click='closeModal' @click="openModal = false" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editUserModal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" wire:model.lazy='username' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $username }}">
                                    @error('username') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" wire:model.lazy='name' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $name }}">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" wire:model.lazy='email' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $email }}">
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                                    <input type="text" wire:model.lazy='position' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $position }}">
                                    @error('position') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button wire:click='closeModal' type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>
                    </form>                    
                @endif
                @if ($modalSwitch==2)
                    <form wire:submit.prevent='delete({{ $userID }})' class="relative bg-white w-[40rem] rounded-lg shadow-lg dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 capitalize dark:text-white">
                                User: {{ $userID }}
                            </h3>
                            <button type="button" wire:click='closeModal' @click="openModal = false" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editUserModal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="flex items-center justify-center">
                                <p class="font-mono text-2xl font-bold text-red-400 capitalize">Are you sure you want to delete this account?</p>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-between p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button wire:click='closeModal' type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete</button>
                            
                            <button wire:click='closeModal' type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</button>
                        </div>
                    </form>                     
                @endif
                @if ($modalSwitch==3)
                    <form wire:submit.prevent='create' class="relative bg-white w-[40rem] rounded-lg shadow-lg dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Create new user
                            </h3>
                            <button type="button" wire:click='closeModal' @click="openModal = false" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editUserModal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" wire:model.lazy='username' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Kiri1101...">
                                    @error('username') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" wire:model.lazy='name' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe...">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" wire:model.lazy='email' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="info@info.com...">
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                                    <input type="text" wire:model.lazy='position' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Web developer...">
                                    @error('position') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" wire:model.lazy='password' class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********">
                                    @error('password') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Position</label>
                                    <input type="password" wire:model.lazy='password_confirmation'  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********">
                                    @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button wire:click='closeModal' type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>
                    </form>   
                @endif
            </div>
        </div>
    @endif        
</div>
