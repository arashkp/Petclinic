<?php

namespace App\Livewire;

use App\Models\Appointment as AppointmentModel;
use App\Models\Owner;
use App\Models\Pet;
use App\Models\Veterinarian;
use Livewire\Component;

class Appointment extends Component
{
    public $isOpen;
    public $appointmentId;
    public $owner_id;
    public $pet_id;
    public $veterinarian_id;
    public $appointment_date;


    public function render()
    {
        return view('livewire.appointment', [
            'appointments' => AppointmentModel::latest()->get(),
            'owners' => Owner::all(),
            'pets' => Pet::all(),
            'veterinarians' => Veterinarian::all(),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function edit($id)
    {
        $appointment = AppointmentModel::findOrFail($id);
        $this->appointmentId = $id;
        $this->pet_id = $appointment->pet_id;
        $this->owner_id = $appointment->owner_id;
        $this->veterinarian_id = $appointment->veterinarian_id;
        $this->appointment_date = $appointment->appointment_date;

        $this->isOpen = true;
    }

    private function resetInputFields()
    {
        $this->pet_id = '';
        $this->veterinarian_id = '';
        $this->owner_id = '';
        $this->appointment_date = '';
    }

    public function store()
    {
        $data = $this->validate([
            'pet_id' => 'required|integer',
            'owner_id' => 'required|integer',
            'veterinarian_id' => 'required|integer',
            'appointment_date' => 'required|date',
        ]);

        if ($this->appointmentId) {
            $appointment = AppointmentModel::find($this->appointmentId);
            if ($appointment) {
                $appointment->update($data);
            }
        } else {
            AppointmentModel::create($data);
        }

        $this->resetInputFields();
        $this->isOpen = false;
    }

    public function delete($id)
    {
        AppointmentModel::find($id)->delete();
    }
}
