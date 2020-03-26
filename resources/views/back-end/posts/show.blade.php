@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    @component('back-end.layout.header',['folderName'=>$folderName,'trashed'=>''])
        @slot('nav_title')
            {{ $pageTitle }}
        @endslot
    @endcomponent
    <div class="row overflow-hidden">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary ">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="card-title ">{{ $pageTitle }}</h4>
                            <p class="card-category">{{ $pageDes }}</p>
                        </div>
                        <div class="col-md-2">
                            @permission('update_posts')
                            @include('back-end.shared.buttons.edit')
                            @endpermission
                        </div>
                        <div class="col-md-2">
                            @permission('delete_posts')
                            @include('back-end.shared.buttons.softDelete')
                            @endpermission
                        </div>
                        <div class="col-md-4 text-right">
                            @permission('create_posts')
                            <a href="{{ route($routeName.'.create') }}" class="btn btn-white btn-round">
                                Add {{ $sModuleName }}
                            </a>
                            @endpermission
                        </div>
                    </div>
                </div>
                <div class="card-body table-hover">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>Name</th>
                                <th>Value</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>
                                    ID
                                </td>
                                <td>
                                    {{ $row->id }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Name
                                </td>
                                <td>
                                    {{ $row->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    User
                                </td>
                                <td>
                                    {{ $row->user->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    PlayList
                                </td>
                                <td>
                                    @foreach($row->playlists as $play)
                                        <a class="badge  m-1 btn-outline-warning" style="font-size: 18px;" href="{{route('playlists.show',$play)}}"> {{ $play->name }}</a>
                                    @endforeach

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Category
                                </td>
                                <td>
                                    @foreach($row->cat as $play)
                                        <a class="badge m-1 btn-outline-success"
                                           rel="tooltip"
                                           data-original-title="Show Category"
                                           style="font-size: 18px;"
                                           href="{{route('categories.show',$play)}}">
                                            {{ $play->name }}</a>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Image
                                </td>
                                <td>
                                    <div>
                                        @php $SRC=isset($row->photos->src)?$row->photos->src:""; @endphp
                                        <img src="{{asset('storage/'.$SRC)}}" class="img-fluid" width="250">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tags
                                </td>
                                <td class="row">
                                    @foreach($row->tags as $tag)
                                        <span class="badge btn-outline-danger m-1" style="font-size: 18px;">
                                           <a  href="{{route('tags.show',$tag)}}"> {{$tag->name}}</a>
                                        </span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Skills
                                </td>
                                <td class="row ">
                                    @foreach($row->skills as $skill)
                                        <span class="badge  m-1 btn-outline-info"
                                              style="font-size: 18px;">
                                         <a  href="{{route('tags.show',$skill)}}"> {{$skill->name}}</a>
                                        </span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Content
                                </td>
                                <td class="text-light">
                                    {!! $row->content !!}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Description
                                </td>
                                <td>
                                    {{ $row->des }}
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Date
                                </td>
                                <td>
                                    {{ $row->created_at }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>



@endsection
