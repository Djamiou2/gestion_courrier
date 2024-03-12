<!-- Modal -->
<div class="modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-labelledby="AddNewModalLabel" aria-hidden="true">
    <!--class="modal-dialog modal-dialog-centered"-->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddNewModalLabel">CREATION DE NATURE COURRIER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Body -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création de service
                        </h3>
                    </div>
                    <form role="form" wire:submit.prevent="store" method="POST">
                        @csrf
                        @method('POST')

                        <div>
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>

                        @if (session('message'))
                            <script>
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    toast: true,
                                    title: '  {{ session('
                                                                                                                                                                            message ') }}',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            </script>
                        @endif

                        <div class="card-body">
                            <div class="d-flex">
                                <div class="form-group flex-grow-1 mr-2">
                                    <label>Nom</label>
                                    <input type="text" wire:model="nom" name="nom"
                                        class="form-control @error('nom') is-invalid @enderror">

                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group flex-grow-1">
                                    <label>contact</label>
                                    <input type="tel" class="form-control @error('contact') is-invalid @enderror"
                                        wire:model="contact" name="contact">
                                    @error('contact')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="form-group flex-grow-1 mr-2">
                                    <label> Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        wire:model="email" name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group flex-grow-1">
                                    <label>Adresse</label>
                                    <input type="text" class="form-control @error('adresse') is-invalid @enderror"
                                        wire:model="adresse" name="adresse">
                                    @error('adresse')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>



                            <div class="p-5">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>

                                <a href="{{ route('courriers') }}">
                                    <button type="button" class="btn btn-danger">
                                        Retour</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
