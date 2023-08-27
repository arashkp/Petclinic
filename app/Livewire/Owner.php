<?php

namespace App\Livewire;

use App\Models\Owner as OwnerModel;
use Livewire\Component;

class Owner extends Component
{
    public $isOpen;
    public $ownerId;
    public $name;
    public $address;
    public $phone_number;
    public $email;

    public function render()
    {
        return view('livewire.owner', [
            'owners' => OwnerModel::latest()->get()
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
        $owner = OwnerModel::findOrFail($id);
        $this->ownerId = $id;
        $this->name = $owner->name;
        $this->address = $owner->address;
        $this->phone_number = $owner->phone_number;
        $this->email = $owner->email;

        $this->isOpen = true;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->address = '';
        $this->phone_number = '';
        $this->email = '';
    }

    public function store()
    {
        $data = $this->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
        ]);

        if ($this->ownerId) {
            $owner = OwnerModel::find($this->ownerId);
            if ($owner) {
                $owner->update($data);
            }
        } else {
            OwnerModel::create($data);
        }

        $this->resetInputFields();
        $this->isOpen = false;
    }

    public function delete($id)
    {
        OwnerModel::find($id)->delete();
    }
}
