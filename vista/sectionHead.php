<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

        <div class="container-fluid">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="span4">
                                    <a class="brand" href="#" onclick="btnPress('inicio');">MICAMI.com</a>
                                </div>
                                <div class="span4">
                                </div>
                                <div class="span4" id="prueba">
                                    <a class="btn btn-info" id="lnkRegistrar" href="#" onclick="btnPress('login');">Mi Cuenta / Registrarme</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row-fluid">
                        <button class="btn btn-success" id="jugueteria" onclick="btnPress('Jugueteria');">JUGUETERIA</button>
                        <button class="btn btn-success" id="maleteria" onclick="btnPress('Maleteria');">MALETERIA</button>
                        <button class="btn btn-success" id="libreria" onclick="btnPress('Libreria');">LIBRERIA</button>
                        <button class="btn btn-success" id="abarroteria" onclick="btnPress('Abarroteria');">ABARROTERIA</button>
                        <div class="span3">
                            <form class="navbar-search">
                                <input type="text" class="search-query" placeholder="Buscar carrito, muñeca, leche,etc" name="srcBuscadorMicami">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
