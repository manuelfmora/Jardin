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

include_once (MODEL_PATH.'LoginModel.php');


class Login {
    
    protected $model=NULL;

    public function __construct(){
        $this->model=new LoginModel();
        
    }
    
    public function CreaLogin(){
          
        if ($this->model->LoginOK($_POST['usuario'], $_POST['clave'])) {//Sesión correcta
            
            echo 'ENTRA EN LOGIN_OK...................<BR>';
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['loginok'] = "TRUE";
            $_SESSION['horainicio'] = date('h:i:s');
            $_SESSION['tipousuario'] =  $this->model->GetTipo($_POST['usuario']);
            $_SESSION['idusuario'] = $this->model->GetID($_POST['usuario']);
            
            header('Location: index.php');
            
        } else {
            echo 'LOGIN FALSO::::::::::::::::: <br>';
            return $loginok = FALSE; //Variable usada para mostrar error en la vista
           
        }            
     
    }
}