@extends('back-end.layout.app')

@section('title')
    Users Control
@endsection

@section('content')

    @component('back-end.layout.header',['folderName'=>'users','trashed'=>''])
        @slot('nav_title')
            Users Control
        @endslot
    @endcomponent

    @component('back-end.shared.table' , ['pageTitle' => 'Users Control' , 'pageDes' => 'Here You you Found All About Users Control','total'=>4])

        <div class="row justify-content-center">
            @role('super_admin')
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons" rel="tooltip"   data-original-title="Users">assignment_ind</i>
                        </div>
                        <p class="card-category">Users</p>
                        <h3 class="card-title" >
                            <small rel="tooltip"   data-original-title="Number Of Users">{{$numAdmins}}</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-warning">warning</i>

                            <a href="{{ route('users.index')}}" class="warning-link"  rel="tooltip"   data-original-title="Users Control">Control</a>

                        </div>
                    </div>
                </div>
            </div>
            @endrole



{{--            @role('super_admin')--}}
{{--            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">--}}
{{--                <div class="card card-stats">--}}
{{--                    <div class="card-header card-header-success card-header-icon">--}}
{{--                        <div class="card-icon">--}}
{{--                            <i class="material-icons"  rel="tooltip"   data-original-title="Users">account_circle</i>--}}
{{--                        </div>--}}
{{--                        <p class="card-category">Users</p>--}}
{{--                        <h3 class="card-title" >--}}
{{--                            <small rel="tooltip"   data-original-title="Number Of Users">{{$numUsers}}</small>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer">--}}
{{--                        <div class="stats">--}}
{{--                            <i class="material-icons text-success">warning</i>--}}

{{--                            <a href="{{ route('users.index',['role'=>'user'])}}" class="success-link" rel="tooltip"   data-original-title="Users Control">Control</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endrole--}}

            @role('super_admin')
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons" rel="tooltip"   data-original-title="Roles">control_camera</i>
                        </div>
                        <p class="card-category">Roles</p>
                        <h3 class="card-title" >
                                <small>{{$numRoles}}</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-info">warning</i>
                            <a href="{{ route('roles.index') }}" class="info-link"  rel="tooltip"   data-original-title="Roles Control">Control</a>
                        </div>
                    </div>
                </div>
            </div>
            @endrole

{{--            @role('super_admin')--}}
{{--            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">--}}
{{--                <div class="card card-stats">--}}
{{--                    <div class="card-header card-header-danger card-header-icon">--}}
{{--                        <div class="card-icon">--}}
{{--                            <i class="material-icons" rel="tooltip"   data-original-title="Permissions">compare_arrows</i>--}}
{{--                        </div>--}}
{{--                        <p class="card-category"></p>--}}
{{--                        <h3 class="card-title"  style="font-size: 22px">--}}
{{--                                <small>Permissions</small>--}}
{{--                        </h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-footer">--}}
{{--                        <div class="stats">--}}
{{--                            <i class="material-icons text-danger">warning</i>--}}
{{--                            <a href="#" class="info-danger"  rel="tooltip"   data-original-title="Permissions Control">Control</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endrole--}}

        </div>













    @endcomponent
@endsection
