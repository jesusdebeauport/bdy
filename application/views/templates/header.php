<!DOCTYPE HTML>
<!--
    Strongly Typed by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Bon dans yeule - <?php echo $title;?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="/bdy/assets/css/main.css" />
    </head>
    <body>
        <div id="page-wrapper">

            <!-- Header -->
            <div id="header-wrapper">
                <div id="header" class="container">

                    <!-- Logo -->
                    <h1 id="logo"><a href="/">Bon dans yeule</a></h1>
                    <p>Mange moi l'sac!</p>

                    <!-- Nav -->
                    <?php $this->load->view('templates/menu'); ?>
                </div>

                <?php if ($this->session->flashdata('success_msg') !== null) { ?>
                <div class="success-box">
                    <?php echo $this->session->flashdata('success_msg'); ?>
                </div>
                <?php } ?>
                <?php if($this->session->flashdata('error_msg') !== null) { ?>
                <div class="error-box">
                    <?php echo $this->session->flashdata('error_msg'); ?>
                </div>
                <?php } ?>
            </div>