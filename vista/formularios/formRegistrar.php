<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
        <div class="Formulario-position">
            <form accept-charset="UTF-8">
                <label>Usuario:</label> 
                <input name="txtUsuario" type="text" autofocus placeholder="Elige un usuario" required>
                
                <label>Contraseña:</label>
                <input name="txtPassword" type="password" placeholder="Elige una contraseña" required>
                
                <label>Vuelve a ingresar tu contraseña:</label>
                <input name="txtConfirmarPassword" type="password" placeholder="Vuelve a escribir tu contraseña" required>

                <label>Email:</label>
                <input name="txtEmail" type="email" placeholder="Escribe tu direccion de correo" required>
                
                <br>
                <input name="btnGuardar" type="submit">
            </form>
        </div>