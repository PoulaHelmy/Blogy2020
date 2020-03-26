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

    @component('back-end.shared.create' , ['pageTitle' => 'Create ' .$role , 'pageDes' => 'Here you can creat '.$role])
        <form action="{{ route($routeName.'.store') }}" method="POST">
            @include('back-end.'.$folderName.'.form',['role'=>$role])
            @if($role=='Admin')
                @include('back-end.users.tasks')
            @endif
            <button type="submit" class="btn btn-primary pull-right">Add {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>
    @endcomponent
@endsection
