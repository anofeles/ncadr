<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
@if(isset($order['url']))
    <h1><a href="{{ $order['url'] }}" target="_blank">{{ $order['title'] }}</a></h1>
    <p><a href="{{route('home.removesubscriber',['uuid'=>$order['remova']])}}" target="_blank">remove subscriber</a></p>
@elseif($order['name'])
    <h1>{{ $order['name'] }}</h1>
    <p><b>Email: </b> {{$order['email']}} </p>
    <p><b>Text: </b> {{$order['text']}} </p>
@endif
<p>Thank you</p>

</body>
</html>
