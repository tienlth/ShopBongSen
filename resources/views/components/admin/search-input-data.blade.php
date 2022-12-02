<form action=@if(isset($routeName)){{route($routeName)}}@endif class="d-flex my-3" role="search">
    <input class="form-control" name="search" type="search" placeholder="{{$placeholder}}" aria-label="Search">
</form>