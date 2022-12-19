<?php
include ('../config/config.php');
include ('Paciente.php');

$p = new Paciente();
$dp= mysqli_fetch_object($p->getOne($_GET['id']));

$date = new dateTime($dp->fecha);

if (isset($_POST) && !empty($_POST)){
  $_POST['imagen'] = $dp->imagen;
  if ($_FILES['imagen']['name'] !=='' ){
    $_POST['imagen'] = saveImage($_FILES);
  }
  $update =$p->update($_POST);
  if ($update){
    $mensaje = '<div class="alert alert-success" role="alert" > Sesion modificada con exito. ></div>';
  }else{
    $mensaje = '<div class="alert alert-danger" role="alert" > Error! ></div>';

  }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Modificaciones de sesiones</title>
        <link rel="icon" type="image/png" href="../images/Logo.png">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="../Estilos/edit.css">
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
                        <li>
                            <a class="nav-link" href="<?= ROOT ?>admi.html" > Cerrar sesión </a>
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
                        <h2 class="text-center mb-2 title-register"> Modificar sesión</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group mt-3">
                                        <label for="nombres">Nombres del Paciente</label>
                                        <input type="text" name="nombres" id="nombres" placeholder="Nombres " class="form-control" value="<?= $dp->Nombre ?>" />
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="Correo">Email del paciente</label>
                                        <input type="email" name="Correo" id="Correo" placeholder="Email" class="form-control" value="<?=$dp->Correo?>"/>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="fecha">Enfermedades</label>
                                        <textarea id="enfermedades" name="enfermedades" id="enfermedades" placeholder="Enfermedades" class="form-control" ><?=$dp->Enfermedades?> </textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="fecha">Fecha de sesion</label>
                                        <input type="datetime-local" name="fecha" id="fecha" class="form-control" value="<?=$date->format('Y-m-d\TH:i') ?>" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group mt-3">
                                        <label for="nombres">Apellidos del paciente</label>
                                        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" class="form-control" value="<?=$dp->Apellidos?>"/>
                                        <input type="hidden" name="id" value="<?=$dp->id ?>" />
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="duracionSecion">Duración de la sesión</label>
                                        <input type="text" name="duracionSecion" id="duracionSecion" placeholder="Duración" class="form-control" value="<?=$dp->duracionSecion?>"/>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="celular">Celular del paciente</label>
                                        <input type="number" name="celular" id="celular" placeholder="Celular del paciente" class="form-control" value="<?=$dp->Celular?>"/>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="imagen">Foto</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control" />
                                    </div>
                                </div>   
                            </div>
                            <div class="btn-container mt-4">
                                <button class="btn btn-success"> Modificar</button>
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
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>  
    </body>
</html>