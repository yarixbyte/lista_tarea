
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(246, 192, 163);
            text-align: center;
            padding: 20px;
        }
        .login-container {
            background:;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(140, 21, 21, 0.2);
            display: inline-block;
            text-align: left;
        }
        .login-container h2 {
            text-align: center;
        }
        .login-container label {
            font-weight: bold;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: lightcoral;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: darkred;
        }
        .extra-links {
            text-align: center;
            margin-top: 10px;
        }
        .extra-links a {
            color: blue;
            text-decoration: none;
        }
        .extra-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="verificar.php">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Ingresa tu correo" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" placeholder="Ingresa tu contraseña" required>

            <button type="submit">Ingresar</button>
        </form>

        <?php
        if (isset($_SESSION["error"])) {
            echo "<p style='color: blue; text-align: center;'>" . $_SESSION["error"] . "</p>";
            unset($_SESSION["error"]);
        }
        ?>
        
        <div class="extra-links">
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
            <p><a href="recuperar.php">¿Olvidaste tu contraseña?</a></p>
        </div>
    </div>
</body>
</html>