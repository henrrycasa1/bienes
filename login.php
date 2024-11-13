<?php
        require 'includes/config/database.php';
        $db = conectarDB();
        $errores = [];
        $email="";
        // Autenticar Usuario
        if($_SERVER['REQUEST_METHOD'] = 'POST'){
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
            $e = $_POST['email'];
            $p = $_POST['pas'];
            if(!$e){
                $errores[] = "El email es obligatorio"; 
            }
            if(!$p){
                $errores[] = "El password es obligatorio"; 
            }
            if(empty($errores)){
                $con_sql = "select * from usuarios where email='$e' and estado like 'Activo' ";
                // echo $con_sql;
                $res = mysqli_query($db,$con_sql);
                // var_dump($res);
                if($res->num_rows){
                    //revisar si el password es correcto
                    $usu = mysqli_fetch_array($res);
                    echo "<pre>";
                        var_dump($usu);
                        echo $p;
                    echo "</pre>"; 
                    $auth = password_verify($p,$usu['password']);
                    
                    // var_dump($usu);
                    var_dump($auth);
                    if($auth){
                        session_start();
                        //llenar el arreglo de la sesion
                        $_SESSION['usuario'] = $usu['email'];
                        $_SESSION['rol'] = $usu['rol'];
                        $_SESSION['login'] = true;
                        echo "<pre>";
                        var_dump($_SESSION);
                        echo "</pre>";
                        header('Location:/bienes/admin');
                    }else{
                        $errores[] = "El password es incorrecto";
                    }
                }
                else {
                    $errores[]="El usuario no existe";
                }
            }
        }

        include 'includes/funciones.php';
        include "includes/templates/header.php";


        ?>

            <main class="contenedor seccion">
                <h1>Iniciar Sesion</h1>
                <?php foreach($errores as $error):?>
                    <div class="alerta error alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php endforeach; ?>
                <!-- <br> -->
                <!-- <?= $completo_password; ?> -->
                <form method="POST" class="formulario" action="">
                    <fieldset>
                        <legend>Informacion Personal</legend>
                    
                        <label for="nombre">Email:</label>
                        <input type="email" name="email" id="email" placeholder="email">
                        <label for="telefono">Password:</label>
                        <input type="password" name="pas" id="pas" placeholder="****">
                    </fieldset>
                    <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
            
                </form>
            </main>
        <?php

incluirTemplate('footer');
