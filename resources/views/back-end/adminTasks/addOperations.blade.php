@extends('back-end.layout.app')

@section('title')
    Secondary Items
@endsection

@section('content')

    @component('back-end.layout.header',['folderName'=>'trashedposts','trashed'=>''])
        @slot('nav_title')
            Secondary Items
        @endslot
    @endcomponent

    @component('back-end.shared.table' , ['pageTitle' => 'Secondary Items' , 'pageDes' => 'Here You you Found All Secondary Items','total'=>3])

        <div class="row justify-content-center">

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons" rel="tooltip"   data-original-title="Categories">bubble_chart</i>
                        </div>
                        <p class="card-category">Categories</p>
                        <h3 class="card-title" rel="tooltip"   data-original-title="number of Categories">{{$cat}}
                            <small></small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-warning">warning</i>
                            <a href="{{ route('categories.index') }}" class="warning-link"  rel="tooltip"   data-original-title="Categories Control">Control</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons"  rel="tooltip"   data-original-title="Tags">offline_bolt</i>
                        </div>
                        <p class="card-category">Tags</p>
                        <h3 class="card-title"rel="tooltip"   data-original-title="number of Tags">{{$tags}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-success">warning</i>
                            <a href="{{ route('tags.index') }}" class="success-link" rel="tooltip"   data-original-title="Tags Control">Control</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons" rel="tooltip"   data-original-title="Skills">turned_in_not</i>
                        </div>
                        <p class="card-category">Skills</p>
                        <h3 class="card-title" rel="tooltip"   data-original-title="number of Skills">{{$skills}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-info">warning</i>
                            <a href="{{ route('skills.index') }}" class="info-link"  rel="tooltip"   data-original-title="Skills Control">Control</a>
                        </div>
                    </div>
                </div>
            </div>


            {{--            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">--}}
            {{--                <div class="card card-stats">--}}
            {{--                    <div class="card-header card-header-danger card-header-icon">--}}
            {{--                        <div class="card-icon">--}}
            {{--                            <i class="material-icons">info_outline</i>--}}
            {{--                        </div>--}}
            {{--                        <p class="card-category">Fixed Issues</p>--}}
            {{--                        <h3 class="card-title">75</h3>--}}
            {{--                    </div>--}}
            {{--                    <div class="card-footer">--}}
            {{--                        <div class="stats">--}}
            {{--                            <i class="material-icons">local_offer</i> Tracked from Github--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

        </div>













    @endcomponent
@endsection
