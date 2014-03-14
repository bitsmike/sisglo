<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
        <div class="container Formulario-position">
            <form class="form-signin" role="form" accept-charset="UTF-8" method="" action="">
                <label>Usuario:</label> 
                <input class="form-control" name="txtUsuario" type="text" autofocus placeholder="Elige un usuario" required>
                
                <label>Contraseña:</label>
                <input class="form-control" name="txtPassword" type="password" placeholder="Elige una contraseña" required>
                
                <label>Vuelve a ingresar tu contraseña:</label>
                <input class="form-control" name="txtConfirmarPassword" type="password" placeholder="Vuelve a escribir tu contraseña" required>

                <label>Email:</label>
                <input class="form-control" name="txtEmail" type="email" placeholder="Escribe tu direccion de correo" required>
                
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="btnGuardar">Registrar</button>
            </form>
        </div>