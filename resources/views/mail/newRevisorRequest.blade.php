<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('ui.requestNew')}}</title>
</head>
<body>
    <h1>{{__('ui.salveAdmin')}} </h1>
    <p>{{__('ui.infoMessage')}}</p>
    <p>{{__('ui.infoMessage2')}}</p>
    <p>{{$user->name}} {{$user->surname}}</p>
    <p>{{$user->email}}</p>
    <p>{{__('ui.infoMessage3')}} <a href="{{route('request.newRevisorAccepted', compact('user'))}}">{{__('ui.rendiRevisore')}}</a></p>
</body>
</html>