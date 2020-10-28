<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Concesionario supercas</title>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
    </head>
    <body>

    <div id="navbar">
        <?php
            if(isset($_SESSION['user'][0]) && !empty($_SESSION['user'][0]))
            {
                echo '<div class="login"><span><i class="fa fa-user" aria-hidden="true"></i>'.$_SESSION['user'][0]->user.' | <a href="'.base_url().'login/cerrar_sesion">Cerrar sesión</span></a></div>';
            }
            else
            {
                echo '<div class="login"><a href="'.base_url().'login"><span><i class="fa fa-user" aria-hidden="true"></i>Inicia sesión</span></a></div>';
            }
        ?>
        
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="<?php echo base_url(); ?>">Home <?php $_SERVER['REQUEST_URI'] == 'http://localhost/supercars/' ? '<span class="sr-only">(current)</span>' : '' ?></a>
                    <a class="nav-item nav-link" href="<?php echo base_url(); ?>catalogo">Catálogo <?php $_SERVER['REQUEST_URI'] == '/catalogo' ? '<span class="sr-only">(current)</span>' : '' ?></a>
                    <a class="nav-item nav-link" href="<?php echo base_url(); ?>buscador">Buscador <?php $_SERVER['REQUEST_URI'] == '/buscador' ? '<span class="sr-only">(current)</span>' : '' ?></a>
                    <a class="nav-item nav-link" href="<?php echo base_url(); ?>admin">Administración <?php $_SERVER['REQUEST_URI'] == '/admin' ? '<span class="sr-only">(current)</span>' : '' ?></a>
                </div>
            </div>
        </nav>
    </div>
