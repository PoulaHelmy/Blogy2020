@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle ?? '' }}
@endsection

@section('content')

    @component('back-end.layout.header',['folderName'=>$folderName,'trashed'=>''])
        @slot('nav_title')
            {{ $pageTitle ?? '' }}
        @endslot
    @endcomponent

    @component('back-end.shared.table' , ['pageTitle' => $pageTitle ?? '' , 'pageDes' => $pageDes ?? '','total'=>$rows->total()])
        @slot('addButton')
            <div class="col-md-4 text-right">
                @permission('create_playlists')
                <a href="{{ route($routeName.'.create') }}" class="btn btn-white btn-round">
                    Add {{ $sModuleName }}
                </a>
                @endpermission
            </div>
        @endslot
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                       Item ID
                    </th>
                    <th>
                        Name
                    </th>

                    <th>
                        Category
                    </th>
                    <th>
                        published
                    </th>
                    <th>
                        User
                    </th>
                    <th class="text-center">
                        control
                    </th>
                </tr></thead>
                <tbody>
                @foreach($rows as $index=>$row)
                    <tr>
                        <td class="text-light">
                            {{$index+($rows->currentPage()*10-10) +1}}
                        </td>
                        <td class="text-center">
                            {{ $row->id }}
                        </td>
                        <td>
                            <a class="badge m-1 btn-outline-primary"rel="tooltip" data-original-title="Show {{ $sModuleName }}" style="font-size: 18px;" href="{{route('playlists.show',$row)}}">{{ $row->name }}</a>
                        </td>
                        <td>
                            @foreach($row->cat as $play)
                                <a class="badge m-1 btn-outline-success" rel="tooltip" data-original-title="Show Category" style="font-size: 18px;" href="{{route('categories.show',$play)}}">  {{ $play->name }}</a>
                            @endforeach
                        </td>
                        <td>
                            @if($row->published == 1)
                                published
                            @else
                                hidden
                            @endif
                        </td>

                        <td>
                            {{ $row->user->name }}
                        </td>
                        <td class="td-actions text-right">
                            @permission('update_playlists')
                            @include('back-end.shared.buttons.edit')
                            @endpermission
                            @permission('delete_playlists')
                            @include('back-end.shared.buttons.delete')
                            @endpermission
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $rows->appends(request()->query())->links() !!}
        </div>
    @endcomponent
@endsection
