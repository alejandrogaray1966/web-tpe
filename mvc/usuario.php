<?php

class Usuario {
    
    public static function iniciarSesion() {
        if ( session_status() != PHP_SESSION_ACTIVE ) {
            session_start();
        }
        return;
    }

    public static function login($usuario) {
        Usuario::iniciarSesion();
        $_SESSION['ID_USUARIO'] = $usuario->id_clave;
        $_SESSION['NOMBRE'] = $usuario->usuario; 
        return;
    }

    public static function logout() {
        Usuario::iniciarSesion();
        unset($_SESSION['ID_USUARIO']);
        unset($_SESSION['NOMBRE']);
        session_destroy();
        // header('Location: ' . BASE_URL . 'login');
        header('Location: ' . BASE_URL );
        return;
    }

    public static function verificar() {
        Usuario::iniciarSesion();
        if (!isset($_SESSION['ID_USUARIO'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
        return;
    }

    public static function showUsuario() {
        if ( !isset($_SESSION['ID_USUARIO']) ) {
            $GLOBALS['usuario'] = "Sin Credenciales";
        } else {
            $GLOBALS['usuario'] = "Administrador";
        }
        return;
    }

}

?>