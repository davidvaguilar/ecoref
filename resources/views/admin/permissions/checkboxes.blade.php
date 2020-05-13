@foreach ($permissions as $key => $values)
    <div class="checkbox">
        <label>
        <input name="permissions[]" type="checkbox" value="{{ $key+1 }}" 
            {{ $model->permissions->contains($values->id) 
                    || collect(old('permission'))->contains($values->name) ? 'checked': ''}}>
            {{ $values->display_name }}
        </label>
    </div>
@endforeach
