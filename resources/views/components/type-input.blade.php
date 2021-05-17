<div class="form-group row g-3 {{$isRequiered ? ' was-validated':''}}  ">
    <label for="{{$labelFor}}"
        class="col-md-4 col-form-label text-md-left">{{ __($label) }}
    </label>

    @if ($isTextArea)
    <div class="col-md-7">
        <textarea {{$isReadOnly ? 'readonly':''}}  aria-label="With textarea" id="{{$labelFor}}" type="text"
            class="form-control @error($labelFor) is-invalid @enderror" name="{{$labelFor}}"
            value="{{$haveValue ? $value:old($labelFor)}}"  autocomplete autofocus>{{$value}}</textarea>
            @error($labelFor)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
    @else
    <div class="col-md-7">
        <input id="{{$labelFor}}" type="{{$typeInput}}" {{$typeInput=="number"? "step=0.0001 min=0.0001":''}} 
        class="form-control @error($labelFor)is-invalid @enderror"
        name="{{$labelFor}}"
        value="{{$haveValue ? $value:old($labelFor)}}"
             {{$isRequiered ? 'required':''}}  {{$isReadOnly ? 'readonly':''}}  autocomplete autofocus>
            @error($labelFor)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
    @endif
    
</div>
