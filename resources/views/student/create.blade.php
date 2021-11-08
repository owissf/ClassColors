<form  method="post" 
action="{{ route('student.store' , $clubColor) }}"
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
    

    <div class="form-group">
        <label for="code">code</label>
        <input type="text" name="code" required
                value="{{ old('code') }}"
               placeholder="Enter code" class="form-control" id="code">
        @if($errors->has('code'))
            <div class="error" style="color:red">{{ $errors->first('code') }}</div>
        @endif
    </div>


    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>
        </div>
    </div>
</form>
            