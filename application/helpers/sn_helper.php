<?php

function tampilan($halaman, $data = [])
{
    echo view('template/v_header', $data);
    echo view('template/v_sidebar', $data);
    echo view('template/v_topbar', $data);
    echo view($halaman, $data);
    echo view('template/v_footer', $data);
}