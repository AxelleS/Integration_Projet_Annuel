<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Play with my CMS</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIRNAME; ?>assets/dist/grid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIRNAME; ?>assets/dist/default.css" />
    <!-- Seul CSS à modifier -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo DIRNAME; ?>assets/dist/css/main.css" />
    <!--  -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

    <?php include "views/".$this->v; ?>
