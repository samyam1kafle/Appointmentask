@if(count(auth()->user()->Notifications) > 0)
    <li>

        <a href="javascript:;">
            {{--<span class="time">7 mins</span>--}}
            <a href="{{route('EmployeeDetails',$notification->data['thread']['title'])}}">
                                                         <span class="details">
<img
        src="{{asset('Uploads/users/thumbnails/'.$notification->data['user']['image'])}}"
        alt="{{$notification->data['user']['name']}} profile" height="65px">
                                                             {{$notification->data['user']['name']}} assigned you a task <strong>{{strtoupper($notification->data['thread']['title'])}}</strong>
                                                             .</span>
            </a>

        </a>

    </li>

@endif
