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