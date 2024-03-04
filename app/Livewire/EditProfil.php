<?php

namespace App\Livewire;

use App\Models\Profil;
use Exception;
use Livewire\Component;

class EditProfil extends Component
{
    public $nom;

    public $profils;

    public $profil;

    public function mount()
    {
        $this->nom = $this->profils->nom;
    }

    public function update(Profil $profil)
    {
        $profil = Profil::find($this->profils->id);

        $this->validate(
            [
                'nom' => 'required|string',
            ],
            [
                'nom.required' => 'Le nom est obligatoire',
                'nom.string' => 'Le nom doit être un texte',
            ]
        );

        try {
            $profil->nom = $this->nom;
            $profil->update();
            return redirect()->Route('admin.profils.profils')->with('message', 'Le profil créé avec succès');
        } catch (Exception $e) {
            return redirect()->Route('admin.profils.profils')->with('message', 'Erreur lors de la création du profil');
        }
    }

    public function render()
    {
        return view('livewire.edit-profil');
    }
}