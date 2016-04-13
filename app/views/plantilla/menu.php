
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
             <a class="navbar-brand" href="<?=Front_Controller::MakeURL('Tareas')?>">Inicio</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        
        <li class="dropdown">         
          
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
       
       <li><a href="<?=Front_Controller::MakeURL('Tareas', 'Listar')?>">Listar</a></li>
       <li><a href="<?=Front_Controller::MakeURL('Tareas', 'Add')?>">Nueva Tarea</a></li>
       <li><a href="<?=Front_Controller::MakeURL('Tareas', 'Buscar')?>">Buscar</a></li>
       <li><a href="<?=Front_Controller::MakeURL('Tareas', 'Login')?>">Login</a></li>
        <li><a href="#">Opciones</a></li>
      </ul>
    </div>
  </div>
</nav>
