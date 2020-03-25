<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary ">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title ">{{ $pageTitle }} </h4>
                        <p class="card-category">{{ $pageDes }}<span class="badge badge-warning mx-2">{{$total??''}}</span></p>
                    </div>
                    {{ $addButton }}
                </div>
            </div>
            <div class="card-body table-hover">
                {{  $slot }}
            </div>
        </div>
    </div>
</div>
