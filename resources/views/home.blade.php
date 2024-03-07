 @extends('layouts.master')

 @section('content')
     <br>
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
         <div class="col-lg-3 col-6">
             <!-- small box -->
             <div class="small-box bg-danger">
                 <div class="inner">
                     <h3>{{ $mailCount }}</h3>

                     <p>Tous les courriers</p>
                 </div>
                 <div class="icon">
                     {{-- <i class="ion ion-pie-graph"></i> --}}
                     <i class="nav-icon fa-envelope"></i>
                 </div>
                 <a href="{{ route('courriers') }}" class="small-box-footer">voir liste <i
                         class="fas fa-arrow-circle-right"></i></a>
             </div>
         </div>
         <!-- ./col -->
     </div>
 @endsection
