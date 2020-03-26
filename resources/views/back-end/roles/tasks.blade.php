<div class="row">
<div class="col-md-12 my-3">
    <div class="card">
        <div class="card-header card-header-tabs card-header-danger">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <span class="nav-tabs-title">Tasks:</span>
                   <div class="row">
                    <ul class="nav nav-tabs" data-tabs="tabs">
                      @php
                          $models=['categories','tags','skills','posts','videos','playlists','profile'];
                            $maps=['create','read','update','delete'];
                          @endphp
                        @foreach($models as $index=> $model)

                            <li class="nav-item">
                                <a class="nav-link {{$index==0?'active':''}}" href="#{{$model}}" data-toggle="tab">
                                    <i class="material-icons">eco</i> {{$model}}
                                    <div class="ripple-container"></div>
                                </a>
                            </li>

                        @endforeach


                    </ul>
                   </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content" style="font-size: 18px">
                @foreach($models as $index=> $model)

                    <div class="tab-pane {{$index== 0 ? 'active':'' }}" id="{{$model}}">
                        <table class="table table-hover">
                            <tbody>
                            @foreach($maps as $index=> $map)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input"
                                                       name="permissions[]"
                                                       type="checkbox"
                                                       value="{{$map .'_' .$model}}"
                                                       @isset($row)
                                                           {{$row->hasPermission($map.'_'.$model) ? 'checked':''}}
                                                       @endisset>
                                                <span class="form-check-sign"><span class="check"></span></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-lg-center" style=""> {{$map }} {{ $model}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
</div>
</div>
