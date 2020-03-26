{{ csrf_field() }}
<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-12 my-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Username</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old("$input") }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input = "email"; @endphp
    <div class="col-md-12 my-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email address</label>
            <input type="email" name="{{$input}}" value="{{ isset($row) ? $row->{$input} :  old("$input") }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    @php $input = "password"; @endphp
    <div class="col-md-12 my-3">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="password" name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    @php $input = "role"; @endphp
    <div class="col-md-12 my-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Category</label>
            <select  style="font-color:#000;" name="{{$input}}" class="form-control js-example-basic-single @error($input) is-invalid @enderror">
                @foreach($roles  as $role)
                    <option style="font-color:#000;"  value="{{ $role->id }}" >{{ $role->name }}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

</div>
