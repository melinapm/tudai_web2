<?php

Class VeterinariosView {

    function construct(){
        
    }

    public function DisplayVeterinarios($veterinarios){


        $html = '
        
            <!doctype html>
            <html lang="en">
            <head>
                <!-- Required meta tags -->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <base href="'.BASE_URL.'">

                <!-- CSS propio -->
                <link rel="stylesheet" href="css\estilo.css" type="text/css">
                <!-- Bootstrap CSS -->
                <link rel="stylesheet" href="css\bootstrap.min.css" type="text/css">
    
                <title>FufuLand!</title>
            </head>
            <body>
    
                <!-- Nav -->
                    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow-sm">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a href="home" id="logoErizo" class="home nav-link img-fluid rounded-circle">
                    <img style="max-width:75px;" class="img-fluid rounded" src="images\erizo_caricatura.png" alt="erizo_rosca">
                    </a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                                <a id="homeMenu" class="home nav-link" href="home">Home <span class="sr-only">(current)</span></a>
                        </li>
                    <li class="nav-item active">
                            <a id="galeria" class="nav-link" href="#">Galeria</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" >
                        Cuidados
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a id="cuidados_alimentacion" class="dropdown-item" href="#">Alimentacion</a>
                        <a id="cuidados_veterinarios" class="dropdown-item" href="veterinarios">Veterinarios</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                            <a  id="contacto" class="nav-link" href="#">Contacto</a>
                    </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                    </nav>
                <!-- Fin Nav -->
    
    
                <!-- Div principal -->
                <div id="div_principal" class="container">';

                    $html.= "<table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Especialidad</th>
                                <th>Veterinaria</th>
                            </tr>
                        <thead>
                        <tbody>
                        ";
                        foreach($veterinarios as $veterinario) {
                        $html.= "
                            <tr>
                                <td>$veterinario->nombre</td>
                                <td>$veterinario->apellido</td>
                                <td>$veterinario->especialidad</td>
                                <td>$veterinario->veterinaria</td>
                            </tr>
                        ";
                        }
                        $html.= " </tbody>    
                        </table>";


                '</div>
                <!-- Fin Div principal -->
    
                <!-- Footer -->
                <div class="container">
                <footer>
                    <p class="float-right"><a href="#">Back to top</a></p>
                    <p> © 2017-2020 FufuLand, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
                </footer>
                </div>
                <!-- Fin Footer -->
    
                <!-- JavaScript -->
                <script src="js\jquery-3.4.1.min.js"> </script>
                <script src="js\bootstrap.min.js"> </script>
    
            </body>
            </html>
    
    
        '; 

        echo $html;

    }

}
?>