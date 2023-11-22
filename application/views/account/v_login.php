<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    body {
        padding-top: 50px;
    }

    .card {
        padding-bottom: 10px;
        margin-top: 70px;
        /* Adjusted margin-bottom */
        box-shadow: 0 7px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-bottom: 20px;
    }

    .warning {
        margin: 10px 20px;
    }

    /* Adjusted margin for labels */
    .form-group label {
        margin-left: 15px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Halaman Login</h2>
                        <?php
                        // Cetak jika ada notifikasi
                        if ($this->session->flashdata('sukses')) {
                            echo '<p class="alert alert-success">' . $this->session->flashdata('sukses') . '</p>';
                        }
                        ?>

                        <?php echo form_open('login', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username:</label>
                            <div class="col-sm-8">
                                <!-- Adjusted to col-sm-8 -->
                                <input type="text" class="form-control" id="username" name="username"
                                    value="<?php echo set_value('username'); ?>" />
                                <?php echo form_error('username', '<p class="text-danger">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password:</label>
                            <div class="col-sm-8">
                                <!-- Adjusted to col-sm-8 -->
                                <input type="password" class="form-control" id="password" name="password"
                                    value="<?php echo set_value('password'); ?>" />
                                <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-primary" name="btnSubmit" value="Login" />
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                        <p class="text-center mb-3">Kembali ke beranda, Silakan klik
                            <?php echo anchor(site_url('auth'), 'di sini..'); ?>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>