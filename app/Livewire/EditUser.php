<?php

namespace App\Livewire;

use App\Models\Profil;
use App\Models\Service;
use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $nom;
    public $prenom;
    public $sexe;
    public $contact;
    public $email;

    public $service_id;
    public $profil_id;

    public $user;

    public $users;

    public function mount()
    {
        $this->nom = $this->users->nom;
        $this->prenom = $this->users->prenom;
        $this->sexe = $this->users->sexe;
        $this->contact = $this->users->contact;
        $this->email = $this->users->email;
        $this->service_id = $this->users->service_id;
        $this->profil_id = $this->users->profil_id;

    }

    public function update(User $user)
    {
        // la fonction find() permet de faire la recherche en fonction de l'id// dans le modèle Client
        $user = User::find($this->users->id);

        $this->validate(
            [
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'sexe' => '',
                'contact' => 'required|numeric',
                'email' => 'required|email',
                'profil_id' => 'required',
                'service_id' => 'required',
            ],
            [
                'nom.required' => "Le nom de l'utilisateur est obligatoire.",
                'prenom.required' => "Le prénom de l'utilisateur est obligatoire.",
                'sexe.required' => "Le sexe de l'utilisateur est obligatoire.",
                'contact.required' => "Le contact de l'utilisateur est obligatoire.",
                'email.required' => "L'email de l'utilisateur est obligatoire.",
                'email.unique' => "Cette adresse email existe déjà",
                'contact.unique' => "Ce contact existe déjà",
                'email.email' => "L'email de l'utilisateur n'est pas valide.",
                'profil_id.required' => "Le profil de l'utilisateur est obligatoire.",
                'service_id.required' => "Le service de l'utilisateur est obligatoire.",
            ]
        );

        try {
            $user->update([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'sexe' => $this->sexe,
                'contact' => $this->contact,
                'email' => $this->email,
                'profil_id' => $this->profil_id,
                'service_id' => $this->service_id,
            ]);
            return redirect()->route('admin.users.users')->with('message', 'L\'utilisateur a été modifié avec succès');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.users')->with('message', 'L\'utilisateur n\'a pas été modifié');
        }

    }



    public function render(
    ) {
        // récupéerer la liste des profils
        $profils = Profil::all();

        // récupéerer la liste des services
        $services = Service::all(); // récupéerer la liste des profils

        return view('livewire.edit-user', compact('profils', 'services'));
    }
}
