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

            <button type="button" class="btn btn-primary">
                <a href="{{ route('admin.departements.create') }}" class="text-white fs-6"
                    style="text-decoration:none;"><i class="fas fa-plus"></i>Ajouter</a></button>
            <!-- boutons pour afficher le modal si nécessaire -->
            <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddNewModal">Ajouter
        departement</button> -->
            <!-- inclure le modal créer ici -->
        </div>
    </div>
    <!-- Fin -->

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center " style="background:#42C2FF ">

                <h3 class="card-title flex-grow-1 ">
                    Liste des départements
                </h3>
                <div class="card-tools d-flex align-items-center ">
                    <!-- Bouton d'ajout d'un utilisateur -->
                    <!-- <a href="{{ route('admin.departements.create') }}" class=" btn btn-link text-white
           mr-4 d-block">
            <i class="fas fa-item-plus"></i>
            Ajouter Nouveau </a> -->

                    <div class="input-group input-group-md" style="width: 230px;">
                        <input type="text" name="table_search" class="form-control float-right"
                            placeholder="Recherche" wire:model.live='search'>
                        {{-- <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed table-striped ">

                    <thead>
                        <tr>
                            <th style=" width= 5%;">ID</th>
                            <th style=" width= 35%;">Nom du département</th>
                            <th style=" width= 20%;">Nom du responsable</th>
                            <th style=" width= 15%;" class="text-center ">Ajouté</th>
                            <th style=" width= 25%;" class="text-center ">Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($departements as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nom }}</td>
                                <td>Nom respo(à mettre)</td>
                                <td class="text-center">{{ $item->created_at->diffForHumans() }}</td>

                                {{-- <td class="text-center">

                                    <a href="{{ route('admin.departements.edit', $item->id) }}"
                                        class="btn btn-primary text-white mr-4">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#DeleteModal{{ $item->id }}">
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
                                                href="{{ route('admin.departements.edit', $item->id) }}">
                                                <i class="fas fa-edit" aria-hidden="true"></i>
                                                Modifier
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                    data-target="#DeleteModal{{ $item->id }}">
                                                    <i class="fas fa-trash-alt"></i>Supprimer
                                                </button>
                                            </a>
                                        </div>
                                    </div>
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
                                            Êtes-vous sûr de vouloir supprimer ce departement ?
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('admin.departements') }}">
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
                    {{ $departements->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
