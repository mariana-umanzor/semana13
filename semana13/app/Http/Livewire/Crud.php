<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pet;

class Crud extends Component
{
    public $pets, $name, $color, $pet_id;
    public $isOpen = 0;


    public function openModal(){
        $this->isOpen = true;
    }
    public function closeModal(){
        $this->isOpen = false;
    }


    public function render()
    {
        $this->pets = Pet::all();
        return view('livewire.crud');
    }
    public function create(){
        $this->openModal();
    }
    public function store(){
        //validar los campos
        $this->validate([
            'name'=>'required',
            'color'=>'required'
        ]);

        
        //guardar o actualizar
        Pet::updateOrCreate(['id'=>$this->pet_id],[
            'name'=> $this->name,
            'color' => $this->color
        ]);


        //creare una variable de sesion para enviar un mensaje
        session()->flash('message', $this->pet_id ? 'Se ha actualizado' : 'Se ha guardado exitosamente!');

        $this->closeModal();

    }
    public function edit($id){
        $pet = Pet::findOrFail($id);
        $this->pet_id= $id;
        $this->name= $pet->name;
        $this->color= $pet->color;

        $this->openModal();//llamamos al metodo que permite cargar el formulario
    }
    public function delete($id){
        Pet::find($id)->delete();
        session()->flash('message', 'Registro eliminado');
    }

}
