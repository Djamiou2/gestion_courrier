<?php

namespace App\Livewire;

use App\Models\Expediteur;
use App\Models\Expediteurs;
use Livewire\Component;

class CreateExpediteur extends Component
{
    public $nom;
    public $contact;
    public $adresse;
    public $email;
    public $expediteur;

    public function store(Expediteurs $expediteur)
    {
        $this->validate(
            [
                'nom' => 'required|string',
                'adresse' => 'required|string',
                'contact' => 'required|numeric|unique:expediteurs,contact',
                'email' => 'required|email|unique:expediteurs,email',
            ],
            [
                'nom.required' => "Le nom de l'expediteur est obligatoire.",
                'adresse.required' => "L'adresse de l'expediteur est obligatoire.",
                'prenom.required' => "Le prénom de l'expediteur est obligatoire.",
                'contact.required' => "Le contact de l'expediteur est obligatoire.",
                'contact.unique' => "Ce contact est déjà utilisé",
                'email.required' => "L'email de l'expediteur est obligatoire.",
                'email.email' => "L'email de l'expediteur n'est pas valide.",
            ]
        );

        try {
            $expediteur = new Expediteurs();
            $expediteur->nom = $this->nom;
            $expediteur->adresse = $this->adresse;
            $expediteur->contact = $this->contact;
            $expediteur->email = $this->email;
            $expediteur->save();
            //toastr()->success('L\'expediteur a été enregistré avec succès', 'Félicitations', ['positionClass' => 'toast-top-center']);
            return redirect()->route('expediteurs')->with('message','L\'expediteur a été enregistré avec succès');

        } catch (\Exception $e) {
            //toastr()->warning('Erreur lors de l\'enregistrement de l\'expediteur', 'Erreur', ['positionClass' => 'toast-top-right']);
            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.create-expediteur');
    }
}
