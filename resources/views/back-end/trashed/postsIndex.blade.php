@extends('back-end.layout.app')

@section('title')
    {{ $pageTitle ?? 'Trashed Items' }}
@endsection

@section('content')
    @component('back-end.layout.header',['folderName'=>$folderName,'trashed'=>"trashed"])
        @slot('nav_title')
            Trashed Items
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title ">All Trashed Posts </h4>
                            <p class="card-category">Here You Can Find And Delete All Trashed Posts
                            <span class="badge badge-warning mx-2">{{$rows->total()}}</span></p>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Item  ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    User
                                </th>
                                <th class="text-right">
                                    control
                                </th>
                            </tr></thead>
                            <tbody>
                            <tbody>
                            @foreach($rows as $index => $row)
                                <tr>
                                    <td >
                                        {{$index+($rows->currentPage()*10-10) +1}}
                                    </td>
                                    <td >
                                        {{$row->id}}
                                    </td>
                                    <td>
                                        {{ $row->name }}
                                    </td>

                                    <td>
                                        {{ $row->cat->name }}
                                    </td>
                                    <td>
                                        {{ $row->user->name }}
                                    </td>
                                    <td class="td-actions text-right">
                                        <a href="{{ route('trashedposts.destroy' , ['id' => $row->id]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm"
                                           data-original-title="Remove Post">
                                            <i class="material-icons">close</i>
                                        </a>
                                        <a href="{{ route('trashedposts.restore' , ['id' => $row->id]) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm"
                                           data-original-title="Remove Post">
                                            <i class="material-icons">restore</i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $rows->appends(request()->query())->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
