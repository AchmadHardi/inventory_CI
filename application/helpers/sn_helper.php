<?php

function tampilan($halaman, $data = [])
{
    echo view('_template/header', $data);
    echo view('_template/footer', $data);
    echo view($halaman, $data);
}