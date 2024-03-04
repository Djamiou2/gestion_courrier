<?php

namespace App\Livewire;

use App\Models\Destinataire;
use Livewire\Component;

class EditDestinataire extends Component
{

    public $nom;
    public $contact;
    public $adresse;
    public $email;
    public $destinataire;
    public $destinataires;

    public function mount()
    {
        $this->nom = $this->destinataires->nom;
        $this->contact = $this->destinataires->contact;
        $this->adresse = $this->destinataires->adresse;
        $this->email = $this->destinataires->email;
    }
    public function update(Destinataire $destinataire)
    {
        // la fonction find() permet de faire la recherche en fonction de l'id// dans le modèle Client
        $Destinataire = Destinataire::find($this->destinataires->id);

        $this->validate(
            [
                'nom' => 'required|string',
                'adresse' => 'required|string',
                'contact' => 'required|numeric',
                'email' => 'required|email',
            ],
            [
                'nom.required' => "Le nom du destinateur est obligatoire.",
                'adresse.required' => "L'adresse du destinateur est obligatoire.",
                'contact.required' => "Le contact du destinateur est obligatoire.",
                'email.required' => "L'email du destinateur est obligatoire.",
                'email.email' => "L'email du destinateur n'est pas valide.",
            ]
        );

        try {

            $destinataire->nom = $this->nom;
            $destinataire->adresse = $this->adresse;
            $destinataire->contact = $this->contact;
            $destinataire->email = $this->email;
            $destinataire->save();
           // toastr()->success('Le Destinataire a été mise à jour avec succès', 'Félicitations', ['positionClass' => 'toast-bottom-right']);
            return redirect()->route('destinataires')->with('message', 'Le Destinataire a été mise à jour avec succès');

        } catch (\Exception $e) {
           // toastr()->warning('Erreur lors de l\'enregistrement de l\'Destinataire', 'Erreur', ['positionClass' => 'toast-bottom-right']);
            return redirect()->back();
        }

    }

    public function render()
    {
        return view('livewire.edit-destinataire');
    }
}
