{{ csrf_field() }}
<div class="row">
    @php $input = "name"; @endphp
    <div class="col-md-12 my-2">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tag Name</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old("$input") }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input = "display_name"; @endphp
    <div class="col-md-12 my-2">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Display Name</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old("$input") }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input = "description"; @endphp
    <div class="col-md-12 my-2">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Description</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old("$input") }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
