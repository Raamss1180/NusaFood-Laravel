<html>
    <head>
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/LoginStyles.css')}}">
        <title>NusaFood</title>
    </head>
    <body>
        <table width="100%" height="100%">
            <tr>
                <td align="center">
                    <div style="text-align: center; color: white;">
                        <h2>Register</h2>
                        <form action="{{ route('register.submit') }}" method="post">
                            @csrf
                            <label for="reg-username">Username:</label><br>
                            <input type="text" id="reg-username" name="reg-username" required><br>
                            <label for="email">Email:</label><br>
                            <input type="email" id="email" name="email" required><br>
                            <label for="reg-password">Password:</label><br>
                            <input type="password" id="reg-password" name="reg-password" required><br>
                            <button type="submit" name="register" id="register">Register</button>
                        </form>
                        <p>Sudah punya akun? <a href="login">Login disini</a></p>
                        <p> Kembali Kehalaman Utama? <a href="index"> Klik disini</a></p>
                    </div>
                </td>
            </tr>
        </table>    
    </body>
</html>