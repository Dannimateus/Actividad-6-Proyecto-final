<?php
include_once('../config/config.php');
include('Paciente.php');

$p=new Paciente();
$data=$p->getAll();

if ( isset($_GET['id']) && !empty($_GET['id']) ){
  $remove = $p->delete($_GET['id']);
  if ($remove){
    header('Location: '.ROOT.'/Paciente/index.php');
  }else{
    $mensaje = '<div class="alert alert-danger" role="alert" > Error al eliminar ></div>'; 
  }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Lista de sesiones</title>
        <link rel="icon" type="image/png" href="../images/Logo.png">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="../Estilos/table-sesions.css">
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
            <h3 class="text-center">Lista de sesiones</h3>
            <div class="container">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Imagen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($pacienteData = mysqli_fetch_object($data)){
                            $date=$pacienteData->fecha;
                            echo "<tr>";
                                echo "<th><img src='".ROOT."/images/$pacienteData->imagen' width='50' height='50'/></th>";
                                echo "<td><p>$pacienteData->Nombre $pacienteData->Apellidos</p></td>";
                                echo "<td><p>Fecha ". date('d-M-Y H:i', strtotime($date)) ."</p></td>";
                                echo "<td><a class='btn btn-success' href='".ROOT."/Paciente/edit.php?id=$pacienteData->id' > Modificar </a><a class='btn btn-danger ml-2' href='".ROOT."/Paciente/index.php?id=$pacienteData->id' >Eliminar </a></td>";
                            echo "</tr>";
                        } 
                        ?>
                    </tbody>
                </table>
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