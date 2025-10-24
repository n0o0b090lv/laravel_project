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
    <h1>MY EYES AHHHHH</h1>
    <div>
        <h2>Registry</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" placeholder="name" name="name">
            <input type="text" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <button>Register</button>
        </form>
    </div>
</body>
</html>