<!-- Modal -->
<div class="modal fade" id="type-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('admin.types.store') }}">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Ingrese nuevo Tipo</h5>
            </div>
            <div class="modal-body">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <!--<label>Titulo de la publicacion</label>-->
                    <input id="type-name"
                        name="name" 
                        class="form-control" 
                        placeholder="Ingresa aqui un nuevo tipo de orden" 
                        value="{{ old('name') }}" autofocus required>
                    {!! $errors->first('name', '<span class="help-block">:message</span>' ) !!}                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Crear Nuevo Tipo</button>
            </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        console.log(window.location.hash)
      /*  if(window.location.hash == '#create'){
            $('#type-modal').modal('show');
        }
        $('#type-modal').on('hide.bs.modal', function(){
            window.location.hash = '#'; 
        });

        $('#type-modal').on('shown.bs.modal', function(){
            $('#type-name').focus();
            window.location.hash = '#create'; 
        });*/
    </script>
@endpush