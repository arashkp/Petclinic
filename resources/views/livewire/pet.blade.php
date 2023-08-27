<div class="container mx-auto px-4">
    <!-- Add New Pet Button -->
    <div class="py-4">
        <button wire:click="create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + New Pet
        </button>
    </div>

    <!-- Display all pets in a table -->
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
        <tr>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Type</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Breed</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Health Notes</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
        </tr>
        </thead>
        <tbody class="bg-gray-600 text-gray-300">
        @foreach($pets as $pet)
            <tr class="hover:bg-gray-700">
                <td class="text-left py-3 px-4">{{ $pet->name }}</td>
                <td class="text-left py-3 px-4">{{ $pet->type }}</td>
                <td class="text-left py-3 px-4">{{ $pet->breed }}</td>
                <td class="text-left py-3 px-4">{{ $pet->health_notes }}</td>
                <td class="text-left py-3 px-4">
                    <button wire:click="edit({{ $pet->id }})" class="btn text-blue-400 hover:text-blue-500">
                        <span class="material-icons-outlined">edit</span>
                    </button>
                    <button wire:click="delete({{ $pet->id }})" class="btn text-red-500 hover:text-red-600">
                        <span class="material-icons-outlined">delete</span>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Create/Edit modal -->
    @if($isOpen)
        <div class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-900 bg-opacity-60">
            <div class="bg-gray-800 text-white rounded p-5 w-1/3">
                <h2 class="text-xl mb-4">{{ $petId ? 'Edit' : 'Add' }} Pet</h2>

                <input type="text" wire:model="name" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 placeholder-gray-500" placeholder="Pet Name">

                <select wire:model="type" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 text-gray-300">
                    <option value="">Select an Option</option>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Other">Other</option>
                </select>

                <input type="text" wire:model="breed" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 placeholder-gray-500" placeholder="Breed (Optional)">

                <textarea wire:model="health_notes" rows="4" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 placeholder-gray-500" placeholder="Health Notes (Optional)"></textarea>
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
