<?php

namespace App\Livewire;

use App\Models\Pet as PetModel;
use Livewire\Component;

class Pet extends Component
{
    public $isOpen;
    public $petId;
    public $name;
    public $type;
    public $breed;
    public $age;
    public $health_notes;

    public function render()
    {
        return view('livewire.pet', [
            'pets' => PetModel::latest()->get()
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
        $pet = PetModel::findOrFail($id);
        $this->petId = $id;
        $this->name = $pet->name;
        $this->type = $pet->type;
        $this->breed = $pet->breed;
        $this->age = $pet->age;
        $this->health_notes = $pet->health_notes;

        $this->isOpen = true;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->type = '';
        $this->breed = '';
        $this->age = '';
        $this->health_notes = '';
    }
    public function store()
    {

        $data = $this->validate([
            'name' => 'required|string',
            'type' => 'required|in:Dog,Cat,Other',
            'breed' => 'nullable|string',
            'health_notes' => 'nullable|string',
        ]);

        if ($this->petId) {
            $pet = PetModel::find($this->petId);
            if ($pet) {
                $pet->update($data);
            }
        } else {
            PetModel::create($data);
        }

        $this->resetInputFields();
        $this->isOpen = false;
    }
    public function delete($id)
    {
        PetModel::find($id)->delete();
    }
}
