<?php

namespace App\Livewire;

use App\Models\Expediteur;
use App\Models\Expediteurs;
use Livewire\Component;

class EditExpediteur extends Component
{
    public $nom;
    public $contact;
    public $adresse;
    public $email;
    public $expediteur;
    public $expediteurs;

    public function mount()
    {
        $this->nom = $this->expediteurs->nom;
        $this->contact = $this->expediteurs->contact;
        $this->adresse = $this->expediteurs->adresse;
        $this->email = $this->expediteurs->email;
    }
    public function update(Expediteurs $expediteur)
    {
        // la fonction find() permet de faire la recherche en fonction de l'id// dans le modèle Client
        $expediteur = Expediteurs::find($this->expediteurs->id);

        $this->validate(
            [
                'nom' => 'required|string',
                'adresse' => 'required|string',
                'contact' => 'required|numeric',
                'email' => 'required|email',
            ],
            [
                'nom.required' => "Le nom de l'expediteur est obligatoire.",
                'adresse.required' => "L'adresse de l'expediteur est obligatoire.",
                'contact.required' => "Le contact de l'expediteur est obligatoire.",
                'email.required' => "L'email de l'expediteur est obligatoire.",
                'email.email' => "L'email de l'expediteur n'est pas valide.",
            ]
        );

        try {

            $expediteur->nom = $this->nom;
            $expediteur->adresse = $this->adresse;
            $expediteur->contact = $this->contact;
            $expediteur->email = $this->email;
            $expediteur->save();
           // toastr()->success('L\'expediteur a été mise à jour avec succès', 'Félicitations', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('expediteurs');

        } catch (\Exception $e) {
           // toastr()->warning('Erreur lors de l\'enregistrement de l\'expediteur', 'Erreur', ['positionClass' => 'toast-bottom-right']);
            return redirect()->back();
        }

    }
    public function render()
    {
        return view('livewire.edit-expediteur');
    }
}
