<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body id="v">
    <style>
        * {
            color:black;
            background-color:white  ;
        }
        div {
            background-color:gray;
            margin: 5px;
        }
        #v {
            margin:0;
            padding: 10px;
            width: calc(100vw - 20px);
            height: calc(100vh - 20px);
            background-color:black;
        }
    </style>
    <h1>MY EYES AHHHHHss</h1>
    @auth
    <h1>Hello back :DD {{new dateTime()->getTimestamp()}}</h1>
    <form action="/logout" method="post">
        @csrf
        <button>Log out</button>
    </form>
    <div>
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

    <div>
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
            <?php } else {?>
                <p><a href="/subscirbe-event/{{$event->id}}" method="post">Subscribe</a></p>
            <?php }?>
            <form action="/delete-post/{{$event->id}}" method="post">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
        @endforeach
    </div>

    @else
    <div>
        <h2>Registry</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input type="password" placeholder="password" name="password">
            <button>Register</button>
        </form>
    </div>
    <div>
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="login_name" type="text" placeholder="name">
            <input name="login_password" type="password" placeholder="password">
            <button>Login</button>
        </form>
    </div>
    @endauth
</body>
</html>