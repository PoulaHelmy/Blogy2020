<form action="{{ route($parentclass.'comment.store') }}" method="post">
    {{ csrf_field() }}
    @include('back-end.comments.form')
    <input type="hidden" value="App\Models\{{ $moduleName }}" name="commentable_type">
    <input type="hidden" value="{{ $row->id }}" name="commentable_id">
    <button type="submit" class="btn btn-primary pull-right">Add Comment</button>
    <div class="clearfix"></div>
</form>
