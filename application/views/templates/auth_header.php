<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/flexslider.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/icons/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/icons/css/simple-line-icons.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/rs-plugin/css/settings.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/prettyPhoto.css'); ?>" rel="stylesheet" type="text/css" />

</head>
<style>
body,
html {
    margin: 0;
    padding: 0;
}

.fullwidthbanner {
    width: 100%;
    margin: 0;
    padding: 0;
}

.tp-banner {
    width: 100%;
    position: relative;
}

.tp-banner ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.tp-banner li {
    width: 100%;
}

.tp-banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.tp-caption {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.tp-caption.slider-button {
    position: absolute;
    left: 50%;
    bottom: 20px;
    transform: translateX(-50%);
}

.portfolio-thumb img {
    height: 250px;

    width: 100%;
    object-fit: cover;

}

.footer {

    padding: 5px;
}
</style>

<body data-spy="scroll" data-target=".navbar" data-offset="80">