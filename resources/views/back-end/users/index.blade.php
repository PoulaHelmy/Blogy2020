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

    @component('back-end.shared.table' , ['pageTitle' => $pageTitle , 'pageDes' => $pageDes,'total'=>$rows->total()])
        @slot('addButton')
            <div class="col-md-4 text-right">
               @if(auth()->user()->hasPermission('create_users'))
                    <a href="{{ route($routeName.'.create') }}" class="btn btn-white btn-round">
                        Add {{$sModuleName}}
                    </a>
               @endif
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
                        Role
                    </th>
                    <th>
                        Email
                    </th>
                    <th class="text-right">
                        Controls
                    </th>
                </tr></thead>
                <tbody>
                @foreach($rows as $index=>$row)
                    <tr>
                        <td >
                            {{$index+($rows->currentPage()*10-10) +1}}
                        </td>
                        <td >
                            {{ $row->id }}
                        </td>
                        <td>
                            <a class="badge m-1 btn-outline-primary" style="font-size: 18px;" href="{{route('users.show',$row)}}">{{ $row->name }}</a>
                        </td>
                        <td>
                        <span class="badge-danger badge" style="font-size: 20px">
                            @foreach($row->getRoles() as $item)
                                {{$item}}
                            @endforeach
                        </span>
                        </td>
                        <td>
                            {{ $row->email }}
                        </td>
                        <td class="td-actions text-right">
                            @if(auth()->user()->hasPermission('update_users'))
                                @include('back-end.shared.buttons.edit')
                            @endif
                            @if(auth()->user()->hasPermission('delete_users'))
                                @include('back-end.shared.buttons.delete')
                            @endif


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $rows->appends(request()->query())->links() !!}
        </div>
    @endcomponent
@endsection
