<?php

namespace App\Livewire;

use App\Models\Profil;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ListeProfil extends Component
{


    use WithPagination;

    // Le code pour spécifier qu'on veut utiliser le theme de bootstrap pour la pagination
    protected $paginationTheme = 'bootstrap';

    // La fonction supprimer un profil
    public function confirmDelete($id)
    {
        $selectedItemId = Profil::find($id);
        $selectedItemId->delete();
        return redirect()->route('admin.profils.profils')->with('delete', 'Le profils est supprimé avec succès');
    }

    // fonction pour enregistrer un profil: debut
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
    // fonction pour enregistrer un profil: fin

    public function render()
    {
              // pour changer la langue en français
      Carbon::setLocale('fr');
        // récuperer la liste des profils
        $profils = Profil::latest()->paginate(10);

        return view('livewire.liste-profil', compact('profils'));
    }
}
