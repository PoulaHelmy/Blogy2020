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
            <div class="col-md-4 text-right">
                @permission('create_skills')
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
                        @permission('update_skills')
                        @include('back-end.shared.buttons.edit')

                        @endpermission
                        @permission('delete_skills')
                        @include('back-end.shared.buttons.delete')

                        @endpermission
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    @endcomponent
@endsection



