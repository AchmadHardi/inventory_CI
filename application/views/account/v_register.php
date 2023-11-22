<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
    body {
        background-color: #f8f9fa;
        /* Set background color */
        padding-top: 50px;
    }

    h2 {
        color: #000;
        ;
        /* Set text color */
    }

    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        /* Set card header background color */
        color: #fff;
        /* Set card header text color */
    }

    .form-group {
        margin-bottom: 20px;
    }

    .alert {
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center" style="color: #000;">
                        <h2>Pendaftaran Akun</h2>
                    </div>

                    <div class="card-body">
                        <?php echo form_open('register', 'class="form-horizontal"'); ?>

                        <div class="form-group">
                            <label for="name">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="<?php echo set_value('name'); ?>" />
                            <?php echo form_error('name', '<p class="text-danger">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?php echo set_value('username'); ?>" />
                            <?php echo form_error('username', '<p class="text-danger">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?php echo set_value('email'); ?>" />
                            <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                value="<?php echo set_value('password'); ?>" />
                            <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="password_conf">Password Confirm:</label>
                            <input type="password" class="form-control" id="password_conf" name="password_conf"
                                value="<?php echo set_value('password_conf'); ?>" />
                            <?php echo form_error('password_conf', '<p class="text-danger">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="btnSubmit">Daftar</button>
                        </div>

                        <?php echo form_close(); ?>

                        <p class="text-center">Kembali ke beranda, Silakan klik
                            <?php echo anchor(site_url() . '/auth', 'di sini..'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>