<form  method="post" 
action="{{ route('club.store') }}"
      autocomplete="off"
      enctype="multipart/form-data">
@csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" required
                value="{{ old('name') }}"
               placeholder="Enter name" class="form-control" id="name">
        @if($errors->has('name'))
            <div class="error" style="color:red">{{ $errors->first('name') }}</div>
        @endif
    </div>
    
    
    <input type="file" name="image">
    @if($errors->has('image'))
            <div class="error" style="color:red">{{ $errors->first('image') }}</div>
        @endif

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
    </div>
</form>
            