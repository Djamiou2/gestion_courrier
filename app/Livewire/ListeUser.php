<?php

namespace App\Livewire;

use App\Models\Profil;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Contracts\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ListeUser extends Component
{

  // Pour enregistrer les données de l'utilisateur
  public $nom;
  public $prenom;
  public $sexe;
  public $contact;
  public $email;
  public $password;

  public $service_id;
  public $profil_id;


  public function store(User $user)
  {
    $this->validate(
      [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'sexe' => 'required',
        'contact' => 'required|numeric|unique:users,contact',
        'email' => 'required|email|unique:users,email',
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

    // conditions pour verifier s'il y a deja un utilisateur avec le profil "chefservice"
    $user = User::where('profil_id', 3)->first();
    if ($user) {
      return redirect()->back()->with('error', 'Il y a déjà un chef service');
    } else {

      try {
        $user = new User();
        $user->nom = $this->nom;
        $user->prenom = $this->prenom;
        $user->sexe = $this->sexe;
        $user->contact = $this->contact;
        $user->email = $this->email;
        $user->profil_id = $this->profil_id;
        $user->service_id = $this->service_id;
        // Pour donner une valeur par défaut pour le Password
        $user->password = bcrypt('password');

        $user->save();
        //toastr()->success('L\'utilisateur a été enregistré avec succès', 'Félicitations', ['positionClass' => 'toast-top-center']);
        return redirect()->route('admin.users.users');

      } catch (\Exception $e) {
        //toastr()->warning('Erreur lors de l\'enregistrement de l\'utilisateur', 'Félicitations', ['positionClass' => 'toast-top-right']);
        return redirect()->back();
      }


    }
  }



  // Pour afficher la liste des utilisateurs

  public $search = "";

  use WithPagination;

  // Le code pour spécifier qu'on veut utiliser le theme de bootstrap pour la pagination
  protected $paginationTheme = 'bootstrap';

  public function confirmDelete($id)
  {
    $selectedItemId = User::find($id);
    $selectedItemId->delete();
   // toastr()->success('L\'Utilisateur à été supprimé', 'Attention', ['positionClass' => 'toast-top-center']);
    return redirect()->route('admin.users.users');
  }

  public function render()
  {

          // pour changer la langue en français
      Carbon::setLocale('fr');

    $word = '%' . $this->search . '%';
    if (!empty($this->search)) {
      $users = User::where('nom', 'like', $word)
        ->orwhere('prenom', 'like', $word);
    } else {

      $users = User::latest()->paginate(10);
    }

    $profils = Profil::all();

    // récupéerer la liste des services
    $services = Service::all();

    return view('livewire.liste-user', compact('users', 'profils', 'services'));
  }
}
