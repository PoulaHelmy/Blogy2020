{{ csrf_field() }}
<div class="row my-3">
    <input type="hidden" value="App\Models\{{ $moduleName }}" name="photoable_type">
    @php $input = "name"; @endphp
    <div class="col-md-12 my-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video Name</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : old("$input") }}"
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
            <label >Post image</label>
            <input type="file" name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
            @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>

    @php $input = "playlists[]"; @endphp
    <div class="col-md-12 my-4">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Video PlayList</label>
            <select  style="font-color:#000;" name="{{$input}}" class="form-control js-example-basic-single @error($input) is-invalid @enderror">
                @foreach($playlists  as $playlist)
                    <option style="font-color:#000;"  value="{{ $playlist->id }}" {{ in_array( $playlist->id, $selectedPlaylists) ? 'selected' : old("$input") }}>{{ $playlist->name }}</option>
                @endforeach
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
            <label class="bmd-label-floating">Post Category</label>
            <select style="font-color:#000;"  name="{{$input}}" class="form-control js-example-basic-single @error($input) is-invalid @enderror">
                @foreach($categories  as $caegory)
                    <option style="font-color:#000;" value="{{ $caegory->id }}" {{ isset($row) && $row->{$input} == $caegory->id ? 'selected'  :old("$input") }}>{{ $caegory->name }}</option>
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
    <div class="col-md-12 my-5">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Post Description</label>
            <textarea  name="{{ $input }}"  cols="30" rows="4" class="form-control @error($input) is-invalid @enderror">{{ isset($row) ? $row->{$input} : old("$input") }}</textarea>
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
            <select style="font-color:#000;" name="{{$input}}" class="form-control js-example-basic-multiple @error($input) is-invalid @enderror" multiple="multiple">
                @foreach($tags  as $tag)
                    <option style="font-color:#000;" value="{{ $tag->id }}"  {{ in_array( $tag->id, $selectedTags) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
            @error($input)
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
             </span>
            @enderror
        </div>
    </div>
    <label class="bmd-label-floating "style="margin-top: 50px;margin-bottom: 25px;">Post Content</label>

    @php $input = "content"; @endphp
    <div class="col-md-12 " >
        <div class="form-group bmd-form-group ">
            <input id="x" class="bg-light" value="{{ isset($row) ? $row->{$input} : old("$input") }}" type="hidden" name="{{$input}}">
            <trix-editor input="x" class="bg-light text-dark"></trix-editor>
        </div>
    </div>

</div>
