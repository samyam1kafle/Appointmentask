<h1>task assign to {{@Auth::user()->name}}</h1>
@foreach($todo as $todo_list)
    <a href="{{route('EmployeeDetails',$todo_list->title)}}">{{$todo_list->title}}</a>
    <br>
    @endforeach
<h5></h5>
