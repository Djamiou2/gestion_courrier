<?php

namespace App\Livewire;

use App\Models\Departement;
use App\Models\Service;
use Livewire\Component;

class CreateService extends Component
{

    public $nom;

    public $departement_id;


    public function store(Service $service)
    {
        $this->validate(
            [
                'nom' => 'required|string|unique:services,nom',
                'departement_id' => 'required'
            ],
            [
                'nom.required' => 'Le nom est obligatoire',
                'nom.unique' => 'Ce nom est déjà utilisé',
                'departement_id.required' => 'Le département est obligatoire',
            ]
        );


        try {
            $service = new Service();
            $service->nom = $this->nom;
            $service->departement_id = $this->departement_id;
            $service->save();
            return redirect()->Route('admin.services')->with('message', 'Le service a été enregistré avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement du service');
        }
    }

    public function render()
    {
        $listeDepartements = Departement::all();

        return view('livewire.create-service', compact('listeDepartements'));
    }
}
