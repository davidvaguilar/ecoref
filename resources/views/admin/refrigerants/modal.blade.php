<div class="modal fade" id="refrigerant-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Modificar Tipo</h4>
            </div>
            <form id="refrigerant-form" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <input type="hidden" id="_method" name="_method">
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-sm-3 control-label">Nombre</label>
                        <div class="col-sm-9">
                            <input id="name"
                                name="name" 
                                type="text"
                                class="form-control" 
                                placeholder="Ingrese Nombre" 
                                value="{{ old('name') }}" 
                                autocomplete="off" required>
                        {!! $errors->first('name', '<span class="help-block">:message</span>' ) !!}      
                        </div>                  
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                    <button id="button-submit" type="submit" class="btn btn-primary">Modificar Tipo</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        console.log(window.location.hash)
        
        $(document).on('show.bs.modal','#refrigerant-modal', function (event) {  // shown.bs.modal
            var button = $(event.relatedTarget);
            var id = button.attr('data-id');
            var name = button.attr('data-name');
            var url = button.attr('data-url');
            if( id ){
                document.getElementById("name").value = name;
                $('#_method').val("PUT");
                $('#refrigerant-form').attr('action', url);
                $('.modal-title').text("Actualizar Refrigerante "+name)
                $('#button-submit').text("Actualizar");
            } else {
                document.getElementById("name").value = "";
                $('#refrigerant-form').attr('action', url);
                $('.modal-title').text("Crear nuevo Refrigerante")
                $('#button-submit').text("Crear");
            }
            $('#name').focus();
        });
    </script>
@endpush