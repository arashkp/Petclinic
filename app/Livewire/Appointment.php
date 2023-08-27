<?php

namespace App\Livewire;

use App\Models\Appointment as AppointmentModel;
use Livewire\Component;

class Appointment extends Component
{
    public $isOpen;
    public $appointmentId;
    public $pet_id;
    public $veterinarian_id;
    public $date;
    public $time;
    public $reason;

    public function render()
    {
        return view('livewire.appointment', [
            'appointments' => AppointmentModel::latest()->get()
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
        $this->veterinarian_id = $appointment->veterinarian_id;
        $this->date = $appointment->date;
        $this->time = $appointment->time;
        $this->reason = $appointment->reason;

        $this->isOpen = true;
    }

    private function resetInputFields()
    {
        $this->pet_id = '';
        $this->veterinarian_id = '';
        $this->date = '';
        $this->time = '';
        $this->reason = '';
    }

    public function store()
    {
        $data = $this->validate([
            'pet_id' => 'required|integer',
            'veterinarian_id' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required|time',
            'reason' => 'required|string',
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
