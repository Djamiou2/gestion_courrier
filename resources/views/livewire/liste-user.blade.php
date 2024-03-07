<div class="row p-4 pt-5 mb-2 ">


    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div>
        @if (session()->has('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
    </div>

    <!-- Boutons ajouter et imprimer -->
    <div class="col-12 justify-between align-items-center">
        <div class="col-md-6 mb-3">
            <button type="button" class="btn btn-secondary">
                <a href="#" class="text-white fs-6" style="text-decoration:none;"><i class="far fa-file-pdf"></i>
                    Imprimer la liste</a></button>

            <!--<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#AddNewModal">Ajouter nouvel
        utilisateur</button> (modals.modals_ajouts.modal_create_user)-->
            <!-- inclure  le modal -->

            <button type="button" class="btn btn-primary">
                <a href="{{ route('admin.users.users.create') }}" class="text-white fs-6"
                    style="text-decoration:none;"><i class="fas fa-plus"></i>Ajouter nouvel utilisateur</a></button>

        </div>
    </div>
    <!-- Fin -->
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary d-flex align-items-center ">

                <h3 class="card-title flex-grow-1 ">
                    <i class="nav-icon fas fa-users fa-2x"></i>
                    Liste des utilisateurs
                </h3>
                <div class="card-tools d-flex align-items-center ">

                    <div class="input-group input-group-md" style="width: 225px;">
                        <input type="text" name="table_search" class="form-control float-right"
                            placeholder="Recherche" wire:model="search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0" style="height: 250px;">
                <table class="table table-head-fixed table-striped ">
                    <thead>
                        <tr>
                            <th style=" width= 5%;">Sexe</th>
                            <th style=" width= 25%;">Nom & Prenom</th>
                            <th style=" width= 20%;">Email</th>
                            <th style=" width= 15%;">Profil</th>
                            <th style=" width= 10%;" class="text-center ">Ajouté</th>
                            <th style=" width= 25%;" class="text-center ">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    @if ($user->sexe == 'F')
                                        <img src="{{ asset('images/femme.png') }}" width="25" />
                                    @else
                                        <img src="{{ asset('images/homme_noir.png') }}" width="25" />
                                    @endif
                                </td>
                                <td>{{ $user->nom }} {{ $user->prenom }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->profil->nom }}</td>
                                <td class="text-center">{{ $user->created_at->diffForHumans() }}</td>
                                {{-- <td class="text-center">
                                    <a href="{{ route('admin.users.users.edit', $user->id) }}"
                                        class="btn btn-primary text-white mr-4">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>

                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#DeleteModal{{ $user->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td> --}}

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Actions</font>
                                            </font>
                                        </button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Basculer la liste déroulante
                                                    </font>
                                                </font>
                                            </span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.users.users.edit', $user->id) }}">
                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                                Modifier
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#DeleteModal{{ $user->id }}">
                                                    <i class="fas fa-trash-alt"></i>Supprimer
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </td>

                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="DeleteModal{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="DeleteModalLabel" aria-hidden="true">
                                <!--class="modal-dialog modal-dialog-centered"-->
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="DeleteModalLabel">Comfirmation de suppression
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer l'utilisateur ?
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('admin.users.users') }}">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">NON</button>
                                            </a>
                                            <button type="button" wire:click="confirmDelete('{{ $user->id }}')"
                                                class="btn btn-danger">OUI</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin pop up du modal -->
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
