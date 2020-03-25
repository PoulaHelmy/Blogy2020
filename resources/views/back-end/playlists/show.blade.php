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
                            @include('back-end.shared.buttons.edit')
                        </div>
                        <div class="col-md-2">
                            @include('back-end.shared.buttons.delete')
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route($routeName.'.create') }}" class="btn btn-white btn-round">
                                Add {{ $sModuleName }}
                            </a>
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
                                    Category
                                </td>
                                <td>
                                    @foreach($row->cat as $play)
                                        <a class="badge m-1 btn-outline-success" rel="tooltip" data-original-title="Show Category" style="font-size: 18px;" href="{{route('categories.show',$play)}}">  {{ $play->name }}</a>
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
                                    Description
                                </td>
                                <td>
                                    {{ $row->des }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Posts
                                </td>
                                <td class="row ">
                                        @if(sizeof($row->posts)>0)
                                            @foreach($row->posts as $post)
                                                <span class="badge  m-1 btn-outline-success"
                                                      style="font-size: 18px;">
                                             <a  href="{{route('posts.show',$post)}}"> {{$post->name}}</a>
                                            </span>
                                            @endforeach
                                        @else
                                        <span class="badge  m-1 btn-outline-success"
                                              style="font-size: 18px;">
                                             No Posts For This PlayList
                                            </span>
                                        @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Videos
                                </td>
                                <td class="row ">
                                    @if(sizeof($row->videos)>0)
                                        @foreach($row->videos as $video)
                                            <span class="badge  m-1 btn-outline-primary"
                                                  style="font-size: 18px;">
                                             <a  href="{{route('videos.show',$video)}}"> {{$video->name}}</a>
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="badge  m-1 btn-outline-info"
                                              style="font-size: 18px;">
                                             No Videos For This PlayList
                                            </span>
                                    @endif
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




