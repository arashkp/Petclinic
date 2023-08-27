<div class="container mx-auto px-4">
    <!-- Add New Owner Button -->
    <div class="py-4">
        <button wire:click="create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + New Owner
        </button>
    </div>

    <!-- Display all owners in a table -->
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
        <tr>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Address</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone Number</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
        </tr>
        </thead>
        <tbody class="bg-gray-600 text-gray-300">
        @foreach($owners as $owner)
            <tr class="hover:bg-gray-700">
                <td class="text-left py-3 px-4">{{ $owner->name }}</td>
                <td class="text-left py-3 px-4">{{ $owner->address }}</td>
                <td class="text-left py-3 px-4">{{ $owner->phone_number }}</td>
                <td class="text-left py-3 px-4">{{ $owner->email }}</td>
                <td class="text-left py-3 px-4">
                    <button wire:click="edit({{ $owner->id }})" class="btn text-blue-400 hover:text-blue-500">
                        <span class="material-icons-outlined">edit</span>
                    </button>
                    <button wire:click="delete({{ $owner->id }})" class="btn text-red-500 hover:text-red-600">
                        <span class="material-icons-outlined">delete</span>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Create/Edit modal for Owner -->
    @if($isOpen)
        <div class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-900 bg-opacity-60">
            <div class="bg-gray-800 text-white rounded p-5 w-1/3">
                <h2 class="text-xl mb-4">{{ $ownerId ? 'Edit' : 'Add' }} Owner</h2>

                <input type="text" wire:model="name" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 placeholder-gray-500" placeholder="Owner Name">
                <input type="text" wire:model="address" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 placeholder-gray-500" placeholder="Owner Address">
                <input type="text" wire:model="phone_number" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 placeholder-gray-500" placeholder="Phone Number">
                <input type="email" wire:model="email" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 placeholder-gray-500" placeholder="Email">

                @if ($errors->any())
                    <div class="mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button wire:click="store" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Save
                </button>
                <button wire:click="close" class="ml-3 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Close
                </button>
            </div>
        </div>
    @endif
</div>
