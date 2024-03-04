<?php

namespace App\Livewire;

use App\Models\Departement;
use Livewire\Component;

class CreateDepartement extends Component
{
    public $nom;

    public $departement;

    public function store(Departement $departement)
    {
        // règles de validation
        $this->validate(
            [
                'nom' => 'required|string|unique:departements,nom',
            ],
            [
                'nom.required' => "Le nom de l'utilisateur est obligatoire.",
                'nom.unique' => "Ce departement existe déjà",
            ]
        );

        try {
            $departement = new Departement();
            $departement->nom = $this->nom;
            $departement->save();
           // toastr()->success('Le departement a été enregistré avec succès!', 'Félicitations',
            // ['positionClass' => 'toast-top-right']);
            return redirect()->Route('admin.departements')->with('message', 'Le departement a été enregistré avec succès');
            //return redirect()->Route('admin.departements')->with('message', 'Le departement a été enregistré avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la création du département');
        }

    }


    public function render()
    {
        return view('livewire.create-departement');
    }
}