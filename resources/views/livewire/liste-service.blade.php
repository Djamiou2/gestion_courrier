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

    <!-- Boutons imprimer et ajouter -->
    <div class="col-12 justify-between align-items-center">
        <div class="col-md-6 mb-3">
            <button type="button" class="btn btn-secondary">
                <a href="#" class="text-white fs-6" style="text-decoration:none;"><i class="far fa-file-pdf"></i>
                    Imprimer la liste</a></button>

            <button type="button" class="btn btn-primary">
                <a href="{{ route('admin.services.create') }}" class="text-white fs-6" style="text-decoration:none;"><i
                        class="fas fa-plus"></i>Ajouter service</a></button>
            {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddNewModal">Ajouter
                service</button> --}}
            <!-- <button type="button" class="btn btn-primary"> -->
            <!-- <a href="{{ route('admin.users.users.create') }}" class="text-white fs-6" style="text-decoration:none;"><i
          class="fas fa-plus"></i>Ajouter nouvel utilisateur</a></button> -->
            {{-- @include('modals.modals_ajouts.modal_create_service') --}}
        </div>
    </div>
    <!-- Fin -->

    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary d-flex align-items-center ">

                <h3 class="card-title flex-grow-1 ">
                    Liste des services
                </h3>
                <div class="card-tools d-flex align-items-center ">
                    <!-- Bouton d'ajout d'un utilisateur -->
                    <!-- <a href="{{ route('admin.services.create') }}" class=" btn btn-link text-white
           mr-4 d-block">
            <i class="fas fa-item-plus"></i>
            Ajouter Nouveau </a> -->

                    <div class="input-group input-group-md" style="width: 230px;">
                        <input type="text" name="table_search" class="form-control float-right"
                            placeholder="Recherche">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed table-striped ">

                    <thead>
                        <tr>
                            <th style=" width= 5%;">ID</th>
                            <th style=" width= 20%;">Nom du service</th>
                            <th style=" width= 20%;">Nom du département</th>
                            <th style=" width= 15%;">Nom du responsable</th>
                            <th style=" width= 20%;" class="text-center ">Ajouté</th>
                            <th style=" width= 20%;" class="text-center ">Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($listeServices as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nom }}</td>
                                <td>{{ $item->departement->nom }}</td>
                                <td>--à mettre--</td>
                                <td class="text-center">{{ $item->created_at->diffForHumans() }}</td>
                                <td class="text-center">

                                    <a href="{{ route('admin.services.edit', $item->id) }}"
                                        class="btn btn-primary text-white mr-4">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#DeleteModal{{ $item->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1" role="dialog"
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
                                            Êtes-vous sûr de vouloir supprimer ce service ?
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('admin.services') }}">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">NON</button>
                                            </a>
                                            <button type="button" wire:click="confirmDelete('{{ $item->id }}')"
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
                    {{ $listeServices->links() }}
                </div>
            </div>
        </div>
    </div>
