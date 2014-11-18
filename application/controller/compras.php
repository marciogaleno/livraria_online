<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of compras
 *
 * @author marcio
 */
class Compras extends Controller
{
    function checkout()
    {
       require 'application/views/_templates/header-admin.php';
       require 'application/views/compras/checkout.php';
       require 'application/views/_templates/footer.php';   
    }
}
