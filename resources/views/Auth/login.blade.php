<html>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/LoginStyles.css')}}">
        <title>Login Form</title>
    </head>
    <body background="{{asset('images/LogoNusaFood.png')}}">
        <table width="100%" height="100%">
            <tr>
                <td align="center">
                    <div style="text-align: center; color: white;">
                        <h2>Login</h2>
                        <form action="login" method="post">
                            @csrf
                            <label for="username">Username:</label><br>
                            <input type="text" id="username" name="username" required><br>
                        <label for="password">Password:</label><br>
                        <input type="password" id="password" name="password" required><br>
                        <button type="submit">Login</button>
                        </form>
                        <p class="reg">Belum punya akun? <a href="register">Silahkan Register disini</a></p>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>