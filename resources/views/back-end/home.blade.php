@extends('back-end.layout.app')
@section('content')
@component('back-end.layout.header',['nav_title'=>"HomePage",'folderName'=> "users",'trashed'=>''])

@endcomponent
<h1>Home</h1>

<div class="row justify-content-center">

    {{--    //admins--}}
    @role('super_admin')
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons" rel="tooltip"   data-original-title="Admins">assignment_ind</i>
                </div>
                <p class="card-category">Admins</p>
                <h3 class="card-title" >
                    <small rel="tooltip"  class="text-light" data-original-title="Number Of Users">{{$numAdmins}}</small>
                </h3>
            </div>
            <div class="card-footer">

                <div class="stats">
                    <i class="material-icons text-warning">warning</i>

                    <a href="{{ route('users.index')}}" class="warning-link"  rel="tooltip"   data-original-title="Admin Control">Control</a>

                </div>

            </div>
        </div>
    </div>
    @endrole
    {{--    //users--}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons" class="text-light" rel="tooltip"   data-original-title="Users">person</i>
                </div>
                <p class="card-category">Users</p>
                <h3 class="card-title" >
                    <small rel="tooltip" class="text-light"  data-original-title="Number Of Users">{{$numUsers}}</small>
                </h3>
            </div>
            <div class="card-footer">
                @permission('read_users')
                <div class="stats">
                    <i class="material-icons text-info">warning</i>
                    <a href="{{ route('users.index')}}" class="info-link"  rel="tooltip"   data-original-title="Users Control">Control</a>
                </div>
                @endpermission
            </div>
        </div>
    </div>

    {{--    //playlists--}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons" rel="tooltip"  data-original-title="PlayList">playlist_add_check</i>
                </div>
                <p class="card-category">PlayLists</p>
                <h3 class="card-title" >
                    <small rel="tooltip" class="text-light"   data-original-title="Number Of PlayLists">{{$plays}}</small>
                </h3>
            </div>
            <div class="card-footer">
                @permission('read_playlists')
                <div class="stats">
                    <i class="material-icons text-success">warning</i>
                    <a href="{{ route('playlists.index')}}" class="success-link"  rel="tooltip"   data-original-title="PlayLists Control">Control</a>
                </div>
                @endpermission
            </div>
        </div>
    </div>

    {{--    //videos--}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons" rel="tooltip"   data-original-title="Videos">video_call</i>
                </div>
                <p class="card-category">Videos</p>
                <h3 class="card-title" >
                    <small rel="tooltip" class="text-light"  data-original-title="Number Of Videos">{{$vids}}</small>
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    @permission('read_videos')
                    <i class="material-icons text-danger">warning</i>
                    <a href="{{ route('videos.index')}}" class="info-danger"  rel="tooltip"   data-original-title="Videos Control">Control</a>
                    @endpermission
                </div>
            </div>
        </div>
    </div>


    {{--    //posts--}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons" rel="tooltip" class="text-light"  data-original-title="Posts">book</i>
                </div>
                <p class="card-category">Posts</p>
                <h3 class="card-title" >
                    <small rel="tooltip"  class="text-light"  data-original-title="Number Of Posts">{{$posts}}</small>
                </h3>
            </div>
            <div class="card-footer">
                @permission('read_posts')
                <div class="stats">
                    <i class="material-icons text-warning">warning</i>
                    <a href="{{ route('posts.index')}}" class="warning-link"  rel="tooltip"   data-original-title="Posts Control">Control</a>
                    @endpermission
                </div>
            </div>
        </div>
    </div>


    {{--    //categories--}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons" rel="tooltip"   data-original-title="Categories">bubble_chart</i>
                </div>
                <p class="card-category">Categories</p>
                <h3 class="card-title" >
                    <small rel="tooltip" class="text-light"  data-original-title="number of Categories">{{$cat}}</small>
                </h3>
            </div>
            <div class="card-footer">
                @permission('read_categories')
                <div class="stats">
                    <i class="material-icons text-info">warning</i>
                    <a href="{{ route('categories.index') }}" class="warning-info"  rel="tooltip"   data-original-title="Categories Control">Control</a>
                    @endpermission
                </div>
            </div>
        </div>
    </div>

    {{--    //tags--}}

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons"  rel="tooltip"   data-original-title="Tags">offline_bolt</i>
                </div>
                <p class="card-category">Tags</p>
                <h3 class="card-title"rel="tooltip"  class="text-light" data-original-title="number of Tags">{{$tags}}</h3>
            </div>
            <div class="card-footer">
                @permission('read_tags')
                <div class="stats">
                    <i class="material-icons text-success">warning</i>
                    <a href="{{ route('tags.index') }}" class="success-link" rel="tooltip"   data-original-title="Tags Control">Control</a>
                    @endpermission
                </div>
            </div>
        </div>
    </div>



    {{--    //skills--}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons" rel="tooltip"   data-original-title="Skills">turned_in_not</i>
                </div>
                <p class="card-category">Skills</p>
                <h3 class="card-title" rel="tooltip" class="text-light"  data-original-title="number of Skills">{{$skills}}</h3>
            </div>
            <div class="card-footer">
                @permission('read_skills')
                <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="{{ route('skills.index') }}" class="info-danger"  rel="tooltip"   data-original-title="Skills Control">Control</a>
                    @endpermission
                </div>
            </div>
        </div>
    </div>




</div>































@endsection
