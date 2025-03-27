<?php
session_start();

if (isset($_SESSION['rol'])) {
    $rol = $_SESSION['rol'];

    switch ($rol) {
        case 'admin':
            header('Location: views/admin/dashboard.php');
            exit();
        case 'tecnico':
            header('Location: views/tecnico/dashboard.php');
            exit();
        case 'superintendente':
            header('Location: views/superintendente/dashboard.php');
            exit();
        default:
            // Rol no válido o no definido
            header('Location: views/login/formulario.php');
            exit();
    }
} else {
    // Usuario no autenticado
    header('Location: views/login/formulario.php');
    exit();
}
?>