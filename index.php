<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

if(isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Iniciar Sesi&oacute;n</title>
    <style>
        /* Tu mismo CSS, sin cambios */
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: Arial, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 100vh; display: flex; justify-content: center; align-items: center; }
        .login-container { background: white; border-radius: 10px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); width: 400px; padding: 40px; }
        .login-container h2 { text-align: center; margin-bottom: 30px; color: #333; font-size: 28px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; color: #555; font-weight: bold; }
        .form-group input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-size: 16px; transition: border-color 0.3s; }
        .form-group input:focus { outline: none; border-color: #667eea; }
        button { width: 100%; padding: 12px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 5px; font-size: 16px; font-weight: bold; cursor: pointer; transition: transform 0.2s; }
        button:hover { transform: translateY(-2px); }
        .error-message { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb; text-align: center; }
        .register-link { text-align: center; margin-top: 20px; color: #666; }
        .register-link a { color: #667eea; text-decoration: none; }
        .register-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Iniciar Sesi&oacute;n</h2>

    <?php if($error == '1'): ?>
        <div class="error-message">Usuario o contrase&ntilde;a incorrectos</div>
    <?php elseif($error == '2'): ?>
        <div class="error-message">Por favor, complete todos los campos</div>
    <?php endif; ?>

    <form action="authenticate.php" method="POST">
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Contrase&ntilde;a:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Iniciar Sesi&oacute;n</button>
    </form>

    <div class="register-link">
        &iquest;No tienes cuenta? <a href="register.php">Reg&iacute;strate aqu&iacute;</a>
    </div>
</div>
</body>
</html>