<?php
include ('../config/config.php');
include ('Paciente.php');

    if( isset($_POST) && !empty($_POST) ){
        $p= new Paciente();

        if($_FILES['imagen']['name'] !==''){
          $_POST['imagen'] = saveImage($_FILES);
        }

        $save = $p->save($_POST);
        if ($save){
            $mensaje ='<div class="alert alert-success"> Sesión registrada </div>';
        }else{
            $mensaje ='<div class="alert alert-danger"> Error al registrar! </div>';
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Registrar sesión</title>
        <!-- <link rel="icon" type="image/png" href="images/Logo.png"> -->
        <link rel="icon" type="image/png" href="../images/Logo.png">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="../Estilos/register.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg fixed-top bg-dark">
                <div class="container-fluid">
                <a class="navbar-brand" href="./index.html">
                    <img class="w-50" src="../images/Logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggle
                    r-icon"></span>
                </button>
                <div class="collapse navbar-collapse center-items" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../CUIDADOS.html">Cuidados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./MANEJO ANTE CONDUCTAS DESAFIANTES.html">Conductas Desafiantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./CUIDATE PARA CUIDAR.html">Cuidate para Cuidar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Contactenos
                        </a>    
                        <ul class="dropdown-menu navbar-drop">
                        <li><a class="dropdown-item" href="../admi.html">Inicio de Sesión</a></li>
                        </ul>    
                    </li>
                    </ul>
                </div>
                </div>
            </nav>
        </header>
        <section class="container-top">
            <div class="container">
                <?php
                    if(isset($mensaje)){
                        echo $mensaje;
                    }
                ?>
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-2 title-register"> Registrar sesión</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group mt-3">
                                        <label for="nombres">Nombres del Paciente</label>
                                        <input type="text" name="nombres" id="nombres" placeholder="Nombres" class="form-control" />
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="email">Email del paciente</label>
                                        <input type="text" name="email" id="email" placeholder="Email" class="form-control" />
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="fecha">Fecha de sesion</label>
                                        <input type="datetime-local" name="fecha" id="fecha" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mt-3">
                                        <label for="nombres">Apellidos del paciente</label>
                                        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" class="form-control" />
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="duracionSecion">Duración de la sesión</label>
                                        <input type="text" name="duracionSecion" id="duracionSecion" placeholder="Duración" class="form-control" />
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="imagen">Foto</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control" />
                                    </div>
                                </div>   
                            </div>
                            <div class="btn-container mt-4">
                                <button class="btn btn-primary"> Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <footer class="bg-footer mt-5 ">
            <div class="row w-100">
                <div class="col">
                    <article class="art-style">
                        <cite>
                        Encuesta de Discapacidad EDAD-2008 del INE,
                        Ministerio de Sanidad y Política Social
                        </cite>
                    </article>
                    <address class="dir-style-law">
                        LEY 39/2006, de 14 de diciembre, de Promoción
                        de la Autonomía Personal y Atención a las personas
                        en situación de dependencia.
                    </address>
                    </div>
                    <div class="col">
                    <div class="icons-social-media">
                        <a href="https://www.facebook.com/people/Helping-Special-Families/100088909987339/?is_tour_dismissed=true" target="_blank"><i class="fa-brands fa-facebook fa-4x"></i></a>
                        <a href=""><i class="fa-brands fa-square-twitter fa-4x"></i></a>
                        <a href=""><i class="fa-brands fa-instagram fa-4x"></i></a>
                    </div>
                    <div class="reserved-rigths">
                        <p>2022 Todos los derechos reservados ®</p>  
                    </div>
                </div>
            </div>
        </footer>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<!--     
            <nav>
                <a href="index.html"class="img-logo"> <img src="../Imagenes/Imagen1 .0.jpg" style="margin-top: 17px;"  alt="" width="150" height="150"></a> 
                <ul>
                    <li> <a href="../index.html"> INICIO </a>   </li>
                    <li> <a href="../CUIDADOS.html"> CUIDADOS </a>   </li>
                    <li> <a href="../MANEJO ANTE CONDUCTAS DESAFIANTES.html"> CONDUCTAS DESAFIANTES </a></li> 
                    <li> <a href="../CUIDATE PARA CUIDAR.html"> CUIDATE PARA CUIDAR </a></li> 
                    <li> <a href="../ALGUNOS APOYOS.html"> APOYO </a></li> 
                    <li> <a href="../Paciente/add.php"> CONTACTANOS </a></li> 
                </ul>
            </nav>
 -->


        <!-- <div class="container">

        <?php
            if(isset($mensaje)){
                echo $mensaje;
            }
        ?>
            <h2 class="text-center mb-2"> Registrar sesión</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="col"> 
                    <input type="text" name="nombres" id="nombres" placeholder="Nombres del paciente" class="form-control" />
                </div>
                <div class="col"> 
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del paciente" class="form-control" />
                </div>   
            </div>
            <div class="row mb-2">
                <div class="col"> 
                    <input type="text" name="email" id="email" placeholder="Email del paciente" class="form-control" />
                </div>
                <div class="col"> 
                    <input type="number" name="celular" id="celular" placeholder="Celular del paciente" class="form-control" />
                </div>   
            </div>
            <div class="row mb-2">
            <div class="col">
                    <textarea id="enfermedades" name="enfermedades" id="enfermedades" placeholder="Email del paciente" class="form-control"> </textarea>
                </div>
                <div class="col"> 
                    <input type="text" name="duracionSecion" id="duracionSecion" placeholder="Duración de la sesión" class="form-control" />
                </div>   
            </div>
            <div class="row mb-2">
            <div class="col">
                    <input type="datetime-local" name="fecha" id="fecha" class="form-control"/>
                </div>
                <div class="col"> 
                    <input type="file" name="imagen" id="imagen" class="form-control" />
                </div>   
            </div>
            <button class ="btn btn-success"> Registrar</button>
            <button class ="btn btn-success"> Registrar</button>

        </form> -->

        </div>  

        <!-- <footer  class="bg-drak bg-gradient"> 

        <div class="d-flex align-content-center flex-row justify-content-center"> 

        <div class="f-content">

        <address>LEY 39/2006, de 14 de diciembre, de Promoción
        de la Autonomía Personal y Atención a las personas
        en situación de dependencia.</address>
        <address>Todos los derechos reservados</address>

        
        </div>     
        <div>

        </div>
        <form action="#" method="#">
        <div class ="box">
            <i class="fab fa-angular"></i>

        </div>


        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
        <a href="#">Instagram</a>
            
        </p>

        </form>
        </div>
        </footer> -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>