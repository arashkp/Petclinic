<div class="container mx-auto px-4">
    <!-- Add New Appointment Button -->
    <div class="py-4">
        <button wire:click="create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + New Appointment
        </button>
    </div>

    <!-- Display all appointments in a table -->
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
        <tr>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Owner</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Pet</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Veterinarian</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Appointment Date</th>
            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
        </tr>
        </thead>
        <tbody class="bg-gray-600 text-gray-300">
        @foreach($appointments as $appointment)
            <tr class="hover:bg-gray-700">
                <td class="text-left py-3 px-4">{{ $appointment->owner?->name }}</td>
                <td class="text-left py-3 px-4">{{ $appointment->pet?->name }}</td>
                <td class="text-left py-3 px-4">{{ $appointment->veterinarian?->name }}</td>
                <td class="text-left py-3 px-4">{{ $appointment->appointment_date }}</td>
                <td class="text-left py-3 px-4">
                    <button wire:click="edit({{ $appointment->id }})" class="btn text-blue-400 hover:text-blue-500">
                        <span class="material-icons-outlined">edit</span>
                    </button>
                    <button wire:click="delete({{ $appointment->id }})" class="btn text-red-500 hover:text-red-600">
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
                <h2 class="text-xl mb-4">{{ $appointmentId ? 'Edit' : 'Add' }} Appointment</h2>

                <select wire:model="owner_id" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 text-gray-300">
                    <option value="">Select Owner</option>
                    @foreach($owners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                    @endforeach
                </select>

                <select wire:model="pet_id" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 text-gray-300">
                    <option value="">Select Pet</option>
                    @foreach($pets as $pet)
                        <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                    @endforeach
                </select>

                <select wire:model="veterinarian_id" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 text-gray-300">
                    <option value="">Select Veterinarian</option>
                    @foreach($veterinarians as $vet)
                        <option value="{{ $vet->id }}">{{ $vet->name }}</option>
                    @endforeach
                </select>

                <input type="datetime-local" wire:model="appointment_date" class="border rounded w-full py-2 px-3 mb-4 bg-gray-700 text-gray-300">

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
