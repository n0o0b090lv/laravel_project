<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources\css\app.css')
    <link rel="stylesheet" href="css/style.css" />
</head>
<body class="flex flex-col bg-black text-white p-10">
    <h1 class="text-5xl font-bold text-shadow-red-500 text-shadow-2xs">MY EYES AHHHHHss</h1>
    @auth
    <div>
        <h1>Hello back {{auth()->user()->name}} :DD</h1>
        <form action="/logout" method="post">
            @csrf
            <button>Log out</button>
    </div>
    </form>
    <div class="bg-red-500 text-shadow-blue-500 text-shadow-2xs p-1">
        <h2>Create new event</h2>
        <form action="/create-event" method="POST">
            @csrf
            <input name="title" type="text" placeholder="Events title">
            <textarea name="body" placeholder="The most insane event description goes here 0_0"></textarea>
            <input name="location" type="text" placeholder="Events location">
            <input name="happen_date" type="datetime-local">
            <button>DO THE EVENT</button>
        </form>
    </div>

    <div class="bg-blue-500 text-shadow-red-500 text-shadow-2xs p-1">
        <h2>ALL EVENTS</h2>
        @foreach($events as $event)
        <div>
            <h3>{{$event['title']}}</h3>
            <h4>event from:{{$event->user->name}}</h4>
            description: {{$event['body']}} <br>
            location: {{$event['location']}} <br>
            at: {{date("d/m/yy H:i A", strtotime($event['happen_date']))}}
            <?php if (auth()->id() == $event->user_id) {?>
                <p><a href="/edit-event/{{$event->id}}">Edit details</a></p>
                <form action="/delete-event/{{$event->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            <?php }?>
        </div>
        @endforeach
    </div>

    @else
    <div class="bg-red-500 text-shadow-blue-500 text-shadow-2xs p-1">
        <h2 class="text-3xl font-bold">Registry</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name" class="border">
            <input name="email" type="text" placeholder="email" class="border">
            <input type="password" placeholder="password" name="password" class="border">
            <button class="border">Register</button>
        </form>
    </div>
    <div class="bg-blue-500 text-shadow-red-500 text-shadow-2xs my-1 p-1">
        <h2 class="text-3xl font-bold">Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="login_name" type="text" placeholder="name" class="border"> 
            <input name="login_password" type="password" placeholder="password" class="border">
            <button class="border">Login</button>
        </form>
    </div>
    @endauth
</body>
</html>