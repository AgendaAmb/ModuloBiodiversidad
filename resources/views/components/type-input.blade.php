<div class="form-group row g-3 {{$isRequiered ? ' was-validated':''}}  ">
    <label for="{{$labelFor}}"
    
        class="col-md-4 col-form-label text-md-left">{{ __($label) }}
    </label>
    <div class="col-md-6">
        <input id="{{$labelFor}}" type="{{$typeInput}}" class="form-control" name="{{$labelFor}}"
            value="{{ old($labelFor)}}"  {{$isRequiered ? ' required':''}}  autocomplete autofocus>

            @error($labelFor)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
    
</div>
