<?php

namespace App\Livewire;

use App\Models\Departement;
use Exception;
use Livewire\Component;

class EditDepartement extends Component
{
    public $nom;

    public $departement;

    public $departements;

    public function mount()
    {
        $this->nom = $this->departements->nom;
    }


    public function update(Departement $departement)
    {
        $departement = Departement::find($this->departements->id);


        $this->validate(
            [
                'nom' => 'required|string',
            ],
            [
                'nom.required' => "Le nom de l'utilisateur est obligatoire.",
            ]
        );

        try {
            $departement->nom = $this->nom;
            $departement->update();
            return redirect()->Route('admin.departements')->with('message', 'Le departement modifié avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la création du département');
        }

    }
    public function render()
    {
        return view('livewire.edit-departement');
    }
}