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
    @component('back-end.shared.table' , ['pageTitle' => $pageTitle ?? '' , 'pageDes' => $pageDes])
        @slot('addButton')
            @permission('create_users')
            <div class="col-md-4 text-right">
                <a href="{{ route($routeName.'.create') }}" class="btn btn-white btn-round">
                    Add {{ $sModuleName }}
                </a>
            </div>
            @endpermission
        @endslot
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
                        <span class="badge-primary badge" style="font-size: 20px">{{ $row->name }}</span>

                    </td>
                </tr>
                <tr>
                    <td>
                        Role
                    </td>
                    <td>
                        <span class="badge-danger badge" style="font-size: 20px">
                            @foreach($row->getRoles() as $item)
                                {{$item}}
                            @endforeach
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        Permissions
                    </td>
                    <td>
                        @foreach($row->allPermissions() as $item)
                            <a class="badge m-1 btn-outline-success"
                               rel="tooltip"
                               data-original-title="Role"
                               style="font-size: 18px;"
                               href="">
                                {{$item->display_name}}</a>
                        @endforeach
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

                <tr>
                    <td>
                        Actions
                    </td>
                    <td>
                        @permission('update_users')
                        @include('back-end.shared.buttons.edit')
                        @endpermission
                        @permission('create_users')


                        @include('back-end.shared.buttons.delete')
                        @endpermission
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    @endcomponent
@endsection
