 @extends('layouts.master')

 @section('content')
     <br>
     <br>
     <div class="row">

         <div class="col-lg-3 col-6">
             <div class="small-box bg-success">
                 <div class="inner">
                     <h3>{{ $departmentCount }}</h3>
                     <p>Départements</p>
                 </div>
                 <div class="icon">
                     {{-- <i class="ion ion-stats-bars"></i> --}}
                     {{-- <ion-icon name="mail-open-outline"></ion-icon> --}}
                     {{--  <i class="nav-icon fa-envelope"></i> --}}
                     <i class="nav-icon fas fa-building"></i>
                 </div>
                 <a href="{{ route('admin.departements') }}" class="small-box-footer">Voir plus <i
                         class="fas fa-arrow-circle-right"></i></a>
             </div>
         </div>

         <!-- ./col -->
         <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-warning">
                 <div class="inner">
                     <h3>{{ $serviceCount }}</h3>

                     <p>Service</p>
                 </div>
                 <div class="icon">
                     {{-- <i class="ion ion-person-add"></i> --}}
                     {{--  <i class="nav-icon fa-envelope"></i> --}}
                     <i class="fa fa-briefcase" aria-hidden="false"></i>

                 </div>
                 <a href="{{ route('admin.services') }}" class="small-box-footer">Voir plus <i
                         class="fas fa-arrow-circle-right"></i></a>
             </div>
         </div>

         <div class="col-lg-3 col-6">
             <div class="small-box bg-info">
                 <div class="inner">
                     <h3>{{ $userCount }}</h3>
                     <p>Employés</p>
                 </div>
                 <div class="icon">
                     <i class="nav-icon fas fa-users"></i>
                 </div>
                 <a href="{{ route('admin.users.users') }}" class="small-box-footer">Voir liste <i
                         class="fas fa-arrow-circle-right"></i></a>
             </div>
         </div>

         <!-- ./col -->
         {{-- <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-danger">
                 <div class="inner">
                     <h3>{{ $mailCount }}</h3>

                     <p>Tous les courriers</p>
                 </div>
                 <div class="icon">
                     {{-- <i class="ion ion-pie-graph"></i> --}}
         {{--  <i class="nav-icon fa-envelope"></i>
                 </div>
                 <a href="{{ route('courriers') }}" class="small-box-footer">voir liste <i
                         class="fas fa-arrow-circle-right"></i></a>
             </div>
         </div> --}}
         <!-- ./col -->
     </div>
     <hr>
     <div class="bg-secondary text-white p-3 mb-3">
         <span>
             COURRIERS ENTRANTS
         </span>
     </div>
     <hr>
     <div class="row">
         <!-- ./col -->

         {{-- Courriers à indexer --}}
         <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-warning">
                 <div class="inner">
                     <h3></h3>

                     <p>Indexés</p>
                 </div>
                 <div class="icon">
                     {{-- <i class="ion ion-person-add"></i> --}}
                     {{--  <i class="nav-icon fa-envelope"></i> --}}
                     <i class="fa fa-briefcase" aria-hidden="false"></i>

                 </div>
                 <a href="#" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
             </div>
         </div>

         {{-- Courrier à traiter --}}
         <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-warning">
                 <div class="inner">
                     <h3></h3>

                     <p>A Affecter</p>
                 </div>
                 <div class="icon">
                     {{-- <i class="ion ion-person-add"></i> --}}
                     {{--  <i class="nav-icon fa-envelope"></i> --}}
                     <i class="fa fa-briefcase" aria-hidden="false"></i>

                 </div>
                 <a href="#" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
             </div>
         </div>

         {{-- Courriers à traiter --}}
         <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-warning">
                 <div class="inner">
                     <h3></h3>

                     <p>A Traiter</p>
                 </div>
                 <div class="icon">
                     {{-- <i class="ion ion-person-add"></i> --}}
                     {{--  <i class="nav-icon fa-envelope"></i> --}}
                     <i class="fa fa-briefcase" aria-hidden="false"></i>

                 </div>
                 <a href="#" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
             </div>
         </div>

         {{-- Raponse à valider --}}
         <div class="col-lg-3 col-6">
             <div class="small-box bg-warning">
                 <div class="inner">
                     <h3></h3>
                     <p>Reponses à valider</p>
                 </div>
                 <div class="icon">
                     <i class="fa fa-briefcase" aria-hidden="false"></i>
                 </div>
                 <a href="#" class="small-box-footer">Voir plus <i class="fas fa-arrow-circle-right"></i></a>
             </div>
         </div>
     </div>
     {{--  <div class="row">
         <div class="col-md-6">

             <div class="card card-primary">
                 <div class="card-header border-transparent">
                     <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse">
                             <i class="fas fa-minus"></i>
                         </button>
                     </div>
                 </div>

                 <div class="card-body p-4 mb-2" style="display: block;">

                     <div class="form-group">
                         <label>Objet</label>
                         <input type="text" wire:model="objet" name="objet"
                             class="form-control @error('objet') is-invalid @enderror">
                     </div>

                     {{-- contenu --}}
     {{-- <div class="form-group">
         <label>Contenu</label>
         <textarea wire:model="contenu" name="contenu"
             class="form-control resize-vertical resize-horizontal @error('contenu') is-invalid @enderror">
                                </textarea>
     </div> --}}

     {{-- Fichier --}}
     {{-- <div class="form-group">
         <label class="form-label" for="fichier">Joindre Fichier(s) :</label>
         <input type="file" wire:model="fichier" name="fichier" id="fichier"
             class="form-control @error('fichier') is-invalid @enderror">
     </div>

     </div> --}}

     {{--     </div>

         </div>
     </div> --}}


     </div>
 @endsection
