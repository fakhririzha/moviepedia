<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?= base_url('assets/css/materialize.min.css') ?>" />
    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?= base_url('assets/css/material-icons.css') ?>" />
    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?= base_url('assets/datatables.css') ?>" />
    <link rel="stylesheet" type="text/css" media="screen,projection" href="<?= base_url('assets/css/main.css') ?>" />
</head>

<body>
    <nav class="orange darken-3" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="<?= base_url('') ?>"
                class="brand-logo">MoviePedia</a>
            <!-- <ul class="right hide-on-med-and-down">
                <li>
                    <a href="<?= base_url('sign_in') ?>">Login</a>
            </li>
            </ul> -->

            <!-- <ul id="nav-mobile" class="sidenav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger btn waves-effect waves-light green darken-2"><i
                    class="material-icons">menu</i></a> -->
        </div>
    </nav>


    <div class="container-fluid">
        <div class="row" style="margin-bottom: 0px;">
            <div class="col s1"></div>

            <div class="col s10">
                <?php $this->load->view($content)?>
            </div>

            <div class="col s1"></div>
        </div>
    </div>

    <footer class="page-footer transparent" style="padding-top: 0px;">
        <!-- <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Company Bio</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project like
                        it's our full time job. Any amount would help support and continue development on this project
                        and is greatly appreciated.</p>


                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Settings</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Connect</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
        <div class="footer-copyright amber darken-2">
            <div class="container">
                Made by <a class="white-text" href="#">Kelompok 4</a>
            </div>
        </div>
    </footer>
</body>

<script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
<script src="<?= base_url('assets/js/materialize.min.js') ?>"></script>
<script src="<?= base_url('assets/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>

</html>
