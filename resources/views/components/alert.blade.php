@if(Session::has($status))
<div class="alert alert-{{$status!="error"?$status:"danger"}} alert-dismissible fade show" role="alert">
    {{Session::get($status)}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <?php Session::forget($status); ?>
</div>
@endif