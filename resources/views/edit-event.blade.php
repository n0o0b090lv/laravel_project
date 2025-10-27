<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit event</h1>
    <form action="/edit-event/{{$event->id}}" method="post">
        @csrf
        @method('PUT')
        <input name="title" type="text" value="{{$event->title}}">
        <textarea name="body">{{$event->body}}</textarea>
        <input name="location" type="text" value="{{$event->location}}">
        <input name="happen_date" type="datetime-local" value="{{$event->happen_date}}">
        <button>Save changes</button>
    </form>
</body>
</html>