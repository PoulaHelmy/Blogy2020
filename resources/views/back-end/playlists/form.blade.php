{{ csrf_field() }}
<div class="row">
    <input type="hidden" value="App\Models\{{ $moduleName }}" name="photoable_type">
    @php $input = "name"; @endphp
    <div class="col-md-6 my-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Name</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @php $input = "published"; @endphp
    <div class="col-md-6 my-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="{{$input}}" class="form-control js-example-basic-single @error($input) is-invalid @enderror">
                <option value="1" {{ isset($row) && $row->{$input} == 1 ? 'selected'  :'' }}>published</option>
                <option value="0" {{ isset($row) && $row->{$input} == 0 ? 'selected'  :'' }}>hidden</option>
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    @php $input = "meta_keywords"; @endphp
    <div class="col-md-12 my-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta keywords</label>
            <input type="text" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}"
                   class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    @php $input = "image"; @endphp
    <div class="col-md-12 my-4">
        <div >
            <label >Vedio image</label>
            <input type="file" name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

    @php $input = "level"; @endphp
    <div class="col-md-6 my-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Status</label>
            <select name="{{$input}}" class="form-control js-example-basic-single @error($input) is-invalid @enderror">
                <option value="easy" {{ isset($row) && $row->{$input} == 'easy' ? 'selected'  :'' }}>Easy</option>
                <option value="middle" {{ isset($row) && $row->{$input} == 'middle' ? 'selected'  :'' }}>Middle</option>
                <option value="hard" {{ isset($row) && $row->{$input} == 'hard' ? 'selected'  :'' }}>Hard</option>
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

    @php $input = "cat_id"; @endphp
    <div class="col-md-12 my-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Category</label>
            <select  style="font-color:#000;" name="{{$input}}" class="form-control js-example-basic-single @error($input) is-invalid @enderror">
                @foreach($categories  as $caegory)
                    <option style="font-color:#000;"  value="{{ $caegory->id }}" {{ isset($row) && $row->{$input} == $caegory->id ? 'selected'  :'' }}>{{ $caegory->name }}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    @php $input = "skills[]"; @endphp
    <div class="col-md-12 my-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Skills</label>
            <select style="font-color:#000;" name="{{$input}}" class="form-control js-example-basic-multiple @error($input) is-invalid @enderror" multiple="multiple">
                @foreach($skills  as $skill)
                    <option style="font-color:#000;" value="{{ $skill->id }}" {{ in_array( $skill->id, $selectedSkills) ? 'selected' : '' }} >{{ $skill->name }}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

    @php $input = "tags[]"; @endphp
    <div class="col-md-12 my-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Tags</label>
            <select style="font-color:#000;" name="{{$input}}" class="form-control  js-example-basic-multiple @error($input) is-invalid @enderror" multiple="multiple">
                @foreach($tags  as $tag)
                    <option value="{{ $tag->id }}" class="text-dark" style="font-color:#000;"  {{ in_array( $tag->id, $selectedTags) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

    @php $input = "des"; @endphp
    <div class="col-md-12 my-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Description</label>
            <textarea name="{{ $input }}"  cols="30" rows="5" class="form-control @error($input) is-invalid @enderror">{{ isset($row) ? $row->{$input} : '' }}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    @php $input = "meta_des"; @endphp
    <div class="col-md-12 my-5">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Meta Description</label>
            <textarea name="{{ $input }}"  cols="30" rows="3" class="form-control @error($input) is-invalid @enderror">{{ isset($row) ? $row->{$input} : '' }}</textarea>
            @error($input)
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>



</div>
