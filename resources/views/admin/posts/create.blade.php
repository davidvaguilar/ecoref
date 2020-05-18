<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">ORDEN DE TRABAJO</h5>
            </div>
            <form method="POST" action="{{ route('admin.posts.store', '#create') }}" class="form-horizontal">
                {{ csrf_field() }}
                <div class="modal-body">
                    @if (session()->has('flash'))
                        <div class="alert alert-danger">{{ session('flash') }}</div>
                    @endif
                    <div class="form-group">
                        <label for="title" class="col-xs-2 control-label">Folio</label>
                        <div class="col-xs-10">
                            <input id="title"
                                name="title" 
                                type="number"
                                class="form-control" 
                                placeholder="Numero de folio" 
                                value="{{ old('title') }}"
                                autocomplete="off" autofocus required />
                            {!! $errors->first('title', '<span class="help-block">:message</span>' ) !!} 
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-xs-2 control-label">Cliente</label>
                        <div class="col-xs-4">
                                <select id="name"
                                    name="name" 
                                    class="form-control" require>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->name }}"  
                                        >{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <input id="code"
                                name="code" 
                                type="text"
                                class="form-control" 
                                placeholder="ID LOCAL" 
                                value="{{ old('code') }}" 
                                autocomplete="off" required>
                        </div>
                        {!! $errors->first('code', '<span class="help-block">:message</span>' ) !!}                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear Orden de Trabajo</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

@push('scripts')
    <script>
        console.log(window.location.hash)
        if(window.location.hash == '#create'){
            $('#exampleModal').modal('show');
        }
        $('#exampleModal').on('hide.bs.modal', function(){
            window.location.hash = '#'; 
        });

        $('#exampleModal').on('shown.bs.modal', function(){
            $('#post-title').focus();
            window.location.hash = '#create'; 
        });
    </script>
@endpush