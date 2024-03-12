<div class="row p-4 pt-5 ">
    <div class="col-10 align-items-center justify-content-center mb-2 ">

        <div>
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        @if (session('error'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    toast: true,
                    title: ' erreur d\'enregistrement!',
                    showConfirmButton: false,
                    timer: 3000
                })
            </script>
        @endif


        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">

                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouveau service
                </h3>
            </div>

            {{--   <form role="form" wire:submit.prevent="store" method="POST">
                @csrf
                @method('POST')


                <div class="form-group m-2">
                    <label>Département</label>
                    <select class="form-control @error('departement_id') is-invalid @enderror"
                        wire:model="departement_id" name="departement_id">
                        <option value="">-----</option>
                        @foreach ($listeDepartements as $item)
                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                        @endforeach
                    </select>
                    @error('departement_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="card-body">
                        <div class="form-group">
                            <label>Nom du service</label>
                            <input type="text" wire:model="nom"
                                class="form-control @error('nom') is-invalid @enderror" name="nom">
                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="card-footer mb-3">
                    <button type=" submit" class="btn btn-primary">Enregistrer</button>
                    <a href="{{ route('admin.services') }}">
                        <button type="button" class="btn btn-danger">Retour à la liste des
                            services</button>
                    </a>
                </div>
        </div>
        <!-- /.card-body -->
        </form>
        </div> --}}
            <!-- /.card -->

            <div class="card-body">
                @foreach ($inputs as $key => $value)
                    <div class="row">

                        {{-- bouton ajouter (+) --}}
                        <div class="col-md-1">
                            <button type="button" wire:click="add"
                                class="btn btn-primary rounded-circle ml-2 add-button"
                                style="width: 30px; height: 30px; padding: 0; position: relative;">
                                <i class="fas fa-plus"
                                    style="font-size: 16px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                            </button>
                        </div>

                        <div class="col-md-5">
                            <label>Le département</label>
                            <div class=" d-flex align-items-center">
                                <select class="form-control @error('departement_id') is-invalid @enderror"
                                    wire:model="inputs.{{ $key }}.departement_id" name="departement_id">
                                    <option value="">-----</option>
                                    @foreach ($listeDepartements as $item)
                                        <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                    @endforeach
                                </select>
                                @error('inputs.' . $key . '.departement_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-5 ">
                            <label>Nom du Service</label>
                            <input wire:model="inputs.{{ $key }}.nom" type="text" class="form-control"
                                placeholder="nom" name="nom">
                            @error('inputs.' . $key . '.nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Bouton de soustration (-) --}}
                        <div class="col-md-1">
                            <button type="button" wire:click="remove({{ $key }})"
                                class="btn btn-danger rounded-circle ml-2 add-button"
                                style="width: 30px; height: 30px; padding: 0; position: relative;">
                                <i class="fas fa-minus-circle"
                                    style="font-size: 16px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"></i>
                            </button>
                        </div>

                    </div>
                    <br>
                @endforeach

                <div class="p-2 d-flex justify-content-between">
                    <a href="{{ route('admin.services') }}">
                        <button type="button" class="btn btn-danger">Retour à la liste</button>
                    </a>
                    <button wire:click="save" class="btn btn-success btn-sm">Enregistrer</button>
                </div>

            </div>

        </div>
    </div>
