<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CakePHP</title>
    
    <link rel="stylesheet" href="<?= base_url(); ?>css/base.css" /> <!-- link of customized css file -->
    <link rel="stylesheet" href="<?= base_url(); ?>css/style.css" /> <!-- link of style css file -->
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="<?= base_url() . 'login'; ?>">Users</a></h1> <!-- Top left nav header to login -->
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <!-- skapar logga ut knapp-->
                <li><a href="<?= base_url() . 'register'; ?>">Register</a></li> <!-- Top right nav to register -->
            </ul>
        </div>
    </nav>
