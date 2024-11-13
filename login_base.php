<?php
    $inicio=false;
    include "includes/templates/header.php";
?>
    <main class="contenedor seccion">
        <h1>Iniciar Sesion</h1>
    </main>
        <form class="formulario">
                <fieldset>
                    <legend>Información Personal</legend>

                    <label for="email">E-mail</label>
                    <input type="email" placeholder="email" id="email" name="email">

                    <label for="password">Password</label>
                    <input type="password" placeholder="******" id="pas" name="pas" >

                </fieldset>
                <input type="submit" value="Iniciar Sesion" class="boton-verde">
        </form>
    <main>

<?php
    include "includes/templates/footer.php";
?>