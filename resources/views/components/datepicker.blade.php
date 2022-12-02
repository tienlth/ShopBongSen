<input placeholder="yyyy-mm-dd" 
    @if(isset($required)){{'required'}}@endif
    @if(isset($disabled)){{"disabled"}}@endif
    class="date-picker component" type="date" 
    @if(isset($name)){{'name='.$name}}@else{{'name="date"'}}@endif
    value="@if(isset($date)){{$date}}@endif">