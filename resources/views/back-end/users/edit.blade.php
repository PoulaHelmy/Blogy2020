@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection
@php $role=session()->get('role');@endphp
@section('content')

    @component('back-end.layout.header',['folderName'=>$folderName,'trashed'=>''])
        @slot('nav_title')
            {{ $pageTitle }}
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">{{ $pageTitle }}</h4>
                    <p class="card-category">{{ $pageDes }}</p>
                </div>
                <div class="card-body">
                    <form action="{{ route($routeName.'.update' ,$row) }}" method="POST">
                        {{ method_field('put') }}
                        @include('back-end.'.$folderName.'.form',['role'=>$role])
                        @if($role=='Admin')
                            @include('back-end.users.tasks')
                        @endif
                        <button type="submit" class="btn btn-primary pull-right">Update {{ $moduleName }}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
