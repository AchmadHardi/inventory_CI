<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?= base_url(); ?>assets/swal/sweetalert2.all.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <style>
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        #content {
            flex: 1;
        }

        .sticky-footer {
            flex-shrink: 0;
        }

        .nav-item {
            margin-bottom: 10px;
            /* Add some margin to separate items */
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        // Check for success message
        $success_message = $this->session->flashdata('success_message');
        if ($success_message) {
            echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '$success_message',
                showConfirmButton: false,
                timer: 1500
            });
          </script>";
        }

        // Check for error message
        $error_message = $this->session->flashdata('error_message');
        if ($error_message) {
            echo "<script>
            Swal.fire({
                title: 'Error',
                text: '$error_message',
                icon: 'error'
            });
          </script>";
        }
        ?>