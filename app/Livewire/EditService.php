<?php

namespace App\Livewire;

use App\Models\Departement;
use App\Models\Service;
use Exception;
use Livewire\Component;

class EditService extends Component
{
    public $nom;

    public $departement_id;

    public $services;

    public $service;

    public function mount()
    {
        $this->nom = $this->services->nom;
        $this->departement_id = $this->services->departement_id;
    }

    public function update(Service $service)
    {
        $service = Service::find($this->services->id);

        $this->validate(
            [
                'nom' => 'required|string',
                'departement_id' => 'required'
            ],
            [
                'nom.required' => 'Le nom est obligatoire',
                'departement_id.required' => 'Le département est obligatoire',
            ]
        );

        try {

            $service->nom = $this->nom;
            $service->departement_id = $this->departement_id;
            $service->save();
            return redirect()->Route('admin.services')->with('message', 'Le service modifié avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement du service');
        }
    }
    public function render()
    {

        $listeDepartements = Departement::all();

        return view('livewire.edit-service', compact('listeDepartements'));

    }
}
