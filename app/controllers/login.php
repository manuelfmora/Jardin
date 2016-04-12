<?php
/**
 * CONTROLADOR de login de usuario
 */
//include_once HELP_PATH.'helps.php';
//if (isset($_SESSION['loginok'])) { //Si no está iniciada la sesión muestra el login
//    include_once CTRL_PATH . 'error404.php';
//} else {
//    include_once MODEL_PATH . 'login.php';
//
//    if (!$_POST)
//        include_once VIEW_PATH . 'login.php';
//    else {

class Login {

    public function __construct(){
        
    }
    
    public function CreaLogin(){
        
        if (!EMPTY($_POST['usuario']) && !EMPTY($_POST['clave'])) {
            if (LoginOK($_POST['usuario'], $_POST['clave'])) {//Sesión correcta
                
                $_SESSION['usuario'] = $_POST['usuario'];
                $_SESSION['loginok'] = "TRUE";
                $_SESSION['horainicio'] = date('h:i:s');
                $_SESSION['tipousuario'] = GetTipo($_POST['usuario']);
                $_SESSION['idusuario'] = GetID($_POST['usuario']);

                //include_once CTRL_PATH.'principal.php';
                //header('Location: index.php');
            } else {
                $loginok = FALSE; //Variable usada para mostrar error en la vista
                //include_once VIEW_PATH . 'login.php';
            }
            
        } else{
            
            //include_once VIEW_PATH.'login.php';
        }
        
    }
}