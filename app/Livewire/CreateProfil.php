<?php

namespace App\Livewire;

use App\Models\Profil;
use Livewire\Component;

class CreateProfil extends Component
{
    public $nom;

    public function store(Profil $profil)
    {
        $this->validate(
            [
                'nom' => 'required|string|unique:profils,nom'
            ],
            [
                'nom.required' => 'Le nom est obligatoire',
                'nom.string' => 'Le nom doit être une chaine de caractères',
                'nom.unique' => 'Ce nom est déjà utilisé'
            ]
        );

        try {
            $profil = new Profil();
            $profil->nom = $this->nom;
            $profil->save();
            return redirect()->Route('admin.profils.profils')->with('message', 'Le profil créé avec succès');
        } catch (\Exception $e) {
            return redirect()->Route('admin.profils.profils')->with('message', 'Erreur lors de la création du profil');
        }

    }

    public function render()
    {
        return view('livewire.create-profil');
    }
}
