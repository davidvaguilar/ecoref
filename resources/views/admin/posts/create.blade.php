<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('admin.posts.store', '#create') }}">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Titulo de la publicacion</h5>
            </div>
            <div class="modal-body">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <!--<label>Titulo de la publicacion</label>-->
                    <input id="post-title"
                        name="title" 
                        class="form-control" 
                        placeholder="Ingresa aqui el titulo de la publicación" 
                        value="{{ old('title') }}" autofocus required>  <!-- -->
                    {!! $errors->first('title', '<span class="help-block">:message</span>' ) !!}                        
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Crear publicación</button>
            </div>
            </div>
        </div>
    </form>
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