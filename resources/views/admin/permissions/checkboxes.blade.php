@foreach ($permissions as $id => $name)
    <div class="checkbox">
        <label>
        <input name="permissions[]" type="checkbox" value="{{ $name }}" 
            {{ $model->permissions->contains($id) 
                    || collect(old('permission'))->contains($name) ? 'checked': ''}}>
            {{ $name }}
        </label>
    </div>
@endforeach