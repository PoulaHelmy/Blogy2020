@extends('back-end.layout.app')

@section('title')
   Trashed Items
@endsection

@section('content')

    @component('back-end.layout.header',['folderName'=>'trashedposts','trashed'=>''])
        @slot('nav_title')
            Trashed Items
        @endslot
    @endcomponent

    @component('back-end.shared.table' , ['pageTitle' => 'Trashed Items' , 'pageDes' => 'Here You you Found All Trashed Items','total'=>3])

        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons" rel="tooltip"   data-original-title="Trashed PlayLists">playlist_add_check</i>
                        </div>
                        <p class="card-category">PlayLists</p>
                        <h3 class="card-title" rel="tooltip"   data-original-title="number of trashed playlists over all number of playlists">{{$trashpalys}} / {{$plays}}
                            <small></small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-warning">warning</i>
                            <a href="{{ route('trashedplaylists.index') }}" class="warning-link"  rel="tooltip"   data-original-title="Get All Trashed PlayLists">Get All Items</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons"  rel="tooltip"   data-original-title="Trashed Videos">video_call</i>
                        </div>
                        <p class="card-category">Videos</p>
                        <h3 class="card-title"rel="tooltip"   data-original-title="number of trashed videos over all number of videos">{{$trashvids}} / {{$vids}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-success">warning</i>
                            <a href="{{ route('trashedvideos.index') }}" class="success-link" rel="tooltip"   data-original-title="Get All Trashed Videos">Get All Items</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons" rel="tooltip"   data-original-title="Trashed Posts">book</i>
                        </div>
                        <p class="card-category">Posts</p>
                        <h3 class="card-title" rel="tooltip"   data-original-title="number of trashed posts over all number of posts">{{$trashposts}} / {{$posts}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-info">warning</i>
                            <a href="{{ route('trashedposts.index') }}" class="info-link"  rel="tooltip"   data-original-title="Get All Trashed Posts">Get All Items</a>
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
