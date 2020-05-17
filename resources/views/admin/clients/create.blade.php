<div class="modal fade" id="client-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h4>
            </div>
            <form method="POST" action="{{ route('admin.clients.store') }}" class="form-horizontal">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Nombre</label>
                        <div class="col-sm-9">
                            <input id="name"
                                name="name" 
                                class="form-control" 
                                placeholder="Ingrese nombre " 
                                value="{{ old('title') }}" 
                                autocomplete="off" autofocus required>
                            {!! $errors->first('title', '<span class="help-block">:message</span>' ) !!} 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code" class="col-sm-3 control-label">Id Local</label>
                        <div class="col-sm-9">
                            <input id="code"
                                name="code" 
                                type="number"
                                class="form-control" 
                                placeholder="Ingrese Id" 
                                value="{{ old('code') }}" 
                                autocomplete="off" required>
                        </div>
                        {!! $errors->first('code', '<span class="help-block">:message</span>' ) !!}                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrar Cliente</button>
                </div>
            </form>
        </div>
    </div>
    
</div>