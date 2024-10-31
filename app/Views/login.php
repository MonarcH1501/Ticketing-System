<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Styling untuk seluruh halaman */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            font-family: 'Arial', sans-serif;
        }

        /* Styling untuk kontainer login */
        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        /* Styling untuk judul */
        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        /* Styling untuk input */
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Styling untuk tombol login */
        .login-container input[type="submit"] {
            background-color: #2575fc;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Efek hover pada tombol login */
        .login-container input[type="submit"]:hover {
            background-color: #1a5bb5;
        }

        /* Styling untuk pesan error */
        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 14px;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if(session()->getFlashdata('error')): ?>
            <p class="error"><?php echo session()->getFlashdata('error'); ?></p>
        <?php endif; ?>
        <form action="/login/authenticate" method="post">
            <input type="text" name="username" id="username" placeholder="username" required>
            <input type="password" name="password" id="password" placeholder="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
