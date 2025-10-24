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
            padding: 5px;
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
    <h1>Hello back :DD</h1>
    <form action="/logout" method="post">
        @csrf
        <button>Log out</button>
    </form>
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
            <input name="login_name" type="password" placeholder="password">
            <button>Login</button>
        </form>
    </div>
    @endauth
</body>
</html>