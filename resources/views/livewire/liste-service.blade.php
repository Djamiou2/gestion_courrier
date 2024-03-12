<div class="row p-4 pt-5 mb-2 ">


    {{-- <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div> --}}

    {{-- @if (session('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast: true,
                title: 'Enregistrement réussi !!',
                /* text: 'Le service a été enregistré avec succès !!!' */
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif --}}

    @if (session('message'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast: true,
                title: 'Service enregistré avec succès!',
                showConfirmButton: false,
                timer: 4000,
                // Exemple d'ajout d'une animation personnalisée
                showClass: {
                    popup: 'animate__animated animate__fadeInRight'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutRight'
                }
            })
        </script>
    @endif

    {{--   @if (session('delete'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                toast: true,
                title: ' Suppression du service!',
                showConfirmButton: false,
                timer: 4000
            })
        </script>
    @endif --}}
    @if (session('delete'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                toast: true,
                title: 'Suppression du service!',
                showConfirmButton: false,
                timer: 4000,
                // Ajoutez d'autres propriétés personnalisées ici
                customClass: {
                    // Classe CSS personnalisée pour le toast
                    container: 'custom-toast-container',
                    popup: 'custom-toast-popup',
                    icon: 'custom-toast-icon',
                    title: 'custom-toast-title',
                    timer: 'custom-toast-timer'
                },
                // Exemple d'ajout d'une animation personnalisée
                showClass: {
                    popup: 'animate__animated animate__fadeInRight'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutRight'
                }
                // Ajoutez d'autres propriétés selon vos besoins
            });
        </script>
    @endif


    {{-- <div>
        @if (session()->has('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }}
            </div>
        @endif
    </div> --}}

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

                                {{-- <td class="text-center">

                                    <a href="{{ route('admin.services.edit', $item->id) }}"
                                        class="btn btn-primary text-white mr-4">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#DeleteModal{{ $item->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td> --}}

                                {{-- Boutons modifier/ Supprimer --}}
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
                                                href="{{ route('admin.services.edit', $item->id) }}">
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
