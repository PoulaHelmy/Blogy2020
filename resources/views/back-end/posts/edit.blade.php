@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

    @component('back-end.layout.header')
        @slot('nav_title')
            {{ $pageTitle }}
        @endslot
    @endcomponent

    @component('back-end.shared.edit' , ['pageTitle' => $pageTitle , 'pageDes' => $pageDes])
        <form action="{{ route($routeName.'.update' , [ $row]) }}" method="POST" enctype="multipart/form-data">
            {{ method_field('put') }}
            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">Update {{ $moduleName }}</button>
            <div class="clearfix"></div>
        </form>

        @slot('md4')
            @php $SRC=isset($row->photos->src)?$row->photos->src:""; @endphp
            <img src="{{asset('storage/'.$SRC)}}" width="250">
        @endslot
    @endcomponent


    @component('back-end.shared.edit' , ['pageTitle' => "Comments" , 'pageDes' => "here we can Control comments"])
        @include('back-end.comments.index',['parentclass'=>$routeName])
        @slot('md4')
            @include('back-end.comments.create',['parentclass'=>$routeName])
        @endslot
    @endcomponent


@endsection
