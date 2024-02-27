<?php

use App\Models\UsersModel;

function currency($val)
{
    return number_format($val, 0, ',', '.');
}

function getUserName($id)
{
    $model = new UsersModel();
    $nama = $model->find($id);
    if (!$nama) {
        return '';
    }
    return $nama['name'];
}

function tglIndoToSystem($tgl)
{
    if ($tgl) {
        $tgl2 = str_replace('/', '-', $tgl);
        $pecah = explode("-", $tgl2);
        $tanggal = $pecah[0];
        $bulan = $pecah[1];
        $tahun = $pecah[2];
        return $tahun . '-' . $bulan . '-' . $tanggal;
    } else {
        return false;
    }
}

function fotoSmall($foto)
{
    if ($foto != '') {
        $label = "<img src='" .  base_url() . "/assets/img/scnd_unit/" . $foto . "' width='40px;'  class='img-responsive'>";
    } else {
        $label = "";
    }
    return $label;
}