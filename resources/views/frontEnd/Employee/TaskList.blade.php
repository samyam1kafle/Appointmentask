<h1>task assign to {{@Auth::user()->name}}</h1>
@if($todo)
@foreach($todo as $todo_list)
    <a href="{{route('EmployeeDetails',$todo_list->title)}}">{{$todo_list->title}}</a>
    <br>
    @endforeach
@endif
<h5></h5>
