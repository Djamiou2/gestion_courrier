<?php

namespace App\Livewire;

use App\Models\Destinataire;
use Livewire\Component;

class CreateDestinataire extends Component
{
    public $nom;
    public $contact;
    public $adresse;
    public $email;
    public $destinataire;

    public function store(Destinataire $destinataire)
    {
        $this->validate(
            [
                'nom' => 'required|string',
                'adresse' => 'required|string',
                'contact' => 'required|numeric|unique:destinataires,contact',
                'email' => 'required|email|unique:destinataires,email',
            ],
            [
                'nom.required' => "Le nom du destinataires est obligatoire.",
                'adresse.required' => "L'adresse du destinataires est obligatoire.",
                'prenom.required' => "Le prénom du destinataires est obligatoire.",
                'contact.required' => "Le contact du destinataires est obligatoire.",
                'contact.unique' => "Ce contact est déjà utilisé",
                'email.required' => "L'email du destinataires est obligatoire.",
                'email.email' => "L'email du destinataires n'est pas valide.",
            ]
        );

        try {
        $destinataire= new Destinataire();
        $destinataire->nom = $this->nom;
        $destinataire->adresse = $this->adresse;
        $destinataire->contact = $this->contact;
        $destinataire->email = $this->email;
        $destinataire->save();
            //toastr()->success('Ldestinataires a été enregistré avec succès', 'Félicitations', ['positionClass' => 'toast-top-center']);
            return redirect()->route('destinataires')->with('message','Le destinataire a été enregistré avec succès');

        } catch (\Exception $e) {
            //toastr()->warning('Erreur lors du l\'enregistrement du ldestinataires', 'Erreur', ['positionClass' => 'toast-top-right']);
            return redirect()->back();
        }
    }
    public function render()
    {
        return view('livewire.create-destinataire');
    }
}
