<?php

namespace App\Livewire;

use App\Models\Veterinarian as VeterinarianModel;
use Livewire\Component;

class Veterinarian extends Component
{
    public $isOpen;
    public $veterinarianId;
    public $name;
    public $specialization;

    public function render()
    {
        return view('livewire.veterinarian', [
            'veterinarians' => VeterinarianModel::latest()->get()
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
        $veterinarian = VeterinarianModel::findOrFail($id);
        $this->veterinarianId = $id;
        $this->name = $veterinarian->name;
        $this->specialization = $veterinarian->specialization;

        $this->isOpen = true;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->specialization = '';
    }

    public function store()
    {
        $data = $this->validate([
            'name' => 'required|string',
            'specialization' => 'required|string',
        ]);

        if ($this->veterinarianId) {
            $veterinarian = VeterinarianModel::find($this->veterinarianId);
            if ($veterinarian) {
                $veterinarian->update($data);
            }
        } else {
            VeterinarianModel::create($data);
        }

        $this->resetInputFields();
        $this->isOpen = false;
    }

    public function delete($id)
    {
        VeterinarianModel::find($id)->delete();
    }
}
