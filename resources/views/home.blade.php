<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @auth
    <p>You are logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Logout</button>
    </form>

    @else
    <div style="border: 2px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name" style="padding: 2px">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>
    <div style="border: 2px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginEmail" placeholder="email">
            <input type="password" name="loginPassword" placeholder="password">
            <button>Login</button>
        </form>
    </div>
    @endauth


</body>
</html>
