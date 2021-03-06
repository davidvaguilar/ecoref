@extends('admin.layout')

@section('content')
  <div class="row">
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" 
                src="{{ $user->url }}" 
                alt="{{ $user->name }}">
          <h3 class="profile-username text-center">{{ $user->name }}</h3>
          <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ') }}</p>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
            </li>
            <li class="list-group-item">
              <b>Ordenes de Trabajo</b> <a class="pull-right">{{ $user->posts->count() }}</a>
            </li>
            @if ($user->roles->count())
              <li class="list-group-item">
                <b>Roles</b> <a class="pull-right">{{ $user->getRoleNames()->implode(', ') }}</a>
              </li>
            @endif
          </ul>
          <!--<a href="{{-- route('admin.users.edit', $user) --}}" class="btn btn-primary btn-block"><b>Editar</b></a>-->
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ordenes de Trabajo</h3>
        </div>
        <div class="box-body">
          @forelse ($user->posts as $post) 
              <a href="{{ route('posts.show', $post) }}" target="_blank">
                  <strong>Folio N° {{ $post->title }}</strong>
              </a>
              <br>
              <small class="text-muted">Generado el {{ $post->started_at->format('d/m/Y') }} </small>
              <p class="text-muted">Cliente {{ $post->client->name }}</p>
              @unless($loop->last)
                  <hr>
              @endunless
          @empty
              <small class="text-muted">No tiene ninguna orden</small>
          @endforelse
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Roles</h3>
        </div>
        <div class="box-body">
          @forelse ($user->roles as $role)
              <strong>{{ $role->display_name }}</strong>
              @if ( $role->permissions->count() )
                  <br>
                  <small class="text-muted">
                      Permisos: {{ $role->permissions->pluck('display_name')->implode(', ') }}
                  </small>                            
              @endif
              @unless($loop->last)
                  <hr>
              @endunless
          @empty
              <small class="text-muted">No tiene ningún rol asociado</small>
          @endforelse
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Permisos adicionales</h3>
        </div>
        <div class="box-body">
            @forelse ($user->permissions as $permission)
                <strong>{{ $permission->display_name }}</strong>
                @unless($loop->last)
                    <hr>
                @endunless
            @empty
                <small class="text-muted">No tiene permisos adicionales</small>
            @endforelse
        </div>
      </div>
    </div>
  </div>
    

@endsection