<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

define("PAGELIST", "liste");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edit");

define("DEFAULTPASSOWRD", "password");


// Pour récupérer le nom complet de l'utilisateur
function getUserFullName()
{
    return Auth::user()->nom . ' ' . Auth::user()->prenom;
}

// recupérer le nom du profil de l'utilisateur
function getProfileName()
{
    return Auth::user()->profil->nom;
}





// fonction pour changer le classe de menu en fonction du nom de la route
function setMenuClasse($route, $classe)
{
    $routeActuel = request()->route()->getName();

    if (contains($routeActuel, $route)) {
        return $classe;
    }
    return "";
}

function setMenuActive($route)
{
    $routeActuel = request()->route()->getName();

    if ($routeActuel === $route) {
        return "active";
    }
    return "";
}

function contains($container, $contenu)
{
    return Str::contains($container, $contenu);
}
