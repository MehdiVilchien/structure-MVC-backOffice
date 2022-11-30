<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mehdi Vilchien</title>
    <!-- We can still have our own CSS file -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<?php
  // On inclut des sous-vues => "partials"
  include __DIR__ . '/../partials/nav.tpl.php';
  ?>
 

  <div class="container my-4">

<?php 

// On inclut la sous-vue qui affiche les messages d'erreur
include __DIR__ . '/../partials/messages.tpl.php';