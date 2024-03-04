 @extends('layouts.master')

 @section('content')
     <div class="row">
         <div class="col-12 p-4">
             <div class="jumbotron ">
                 <h3 class="display-3">Bienvenu, <strong>{{ getUserFullName() }} </strong></h3>
                 <p class="lead">Vous êtes un : <b> {{ getProfileName() }}</b> de ce système.
                     Vous pouvez visiter toutes les fonctionnalités
                     de l'application et plus encore, vous pouvez également créer un compte et vous connecter.</p>
                 <hr class="my-4">
                 <p> Nous vous invitons à vous connecter.
                 </p>
                 <p class="lead">
                     <a class="btn btn-primary btn-lg" href="#" role="button">Lire plus</a>
                 </p>
             </div>
         </div>
     </div>
 @endsection
