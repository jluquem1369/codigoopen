<?php
session_start();

// Verificar que se recibieron los datos
if(isset($_POST['usuario']) && isset($_POST['password'])) {
    
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    
    // Verificar que no estén vacíos
    if(empty($usuario) || empty($password)) {
        header("Location: login.php?error=2");
        exit();
    }
    
    // Configuración de usuarios (ejemplo básico)
    // En producción, esto debería venir de una base de datos
    $usuarios_validos = [
        'admin' => password_hash('admin123', PASSWORD_DEFAULT),
        'user1' => password_hash('user123', PASSWORD_DEFAULT),
        'demo' => password_hash('demo123', PASSWORD_DEFAULT)
    ];
    
    // Verificar si el usuario existe
    if(array_key_exists($usuario, $usuarios_validos)) {
        // Verificar la contraseña
        if(password_verify($password, $usuarios_validos[$usuario])) {
            // Autenticación exitosa
            $_SESSION['usuario_id'] = $usuario;
            $_SESSION['login_time'] = time();
            
            // Redirigir al dashboard
            header("Location: dashboard.php");
            exit();
        }
    }
    
    // Autenticación fallida
    header("Location: login.php?error=1");
    exit();
    
} else {
    // No se recibieron datos
    header("Location: login.php?error=2");
    exit();
}
?>