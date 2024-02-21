<?php

namespace App\Controllers\Api;

use App\Models\UnitBekasModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class CApiUnitBekas extends ResourceController
{


    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $model = new UnitBekasModel();
        $data = [
            'message' => 'success',
            'data_unit' => $model->findAll(),
        ];
        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $model = new UnitBekasModel();
        $model->insert([
            'foto' => esc($this->request->getVar('foto')),
            'nama_kontak' => esc($this->request->getVar('nama_kontak')),
            'no_wa' => esc($this->request->getVar('no_wa')),
            'alamat' => esc($this->request->getVar('alamat')),
            'longitude' => esc($this->request->getVar('longitude')),
            'latitude' => esc($this->request->getVar('latitude')),
            'ins_by' => esc($this->request->getVar('ins_by')),
            'status' => 1
        ]);
        $response = [
            'message' => 'Data unit berhasil ditambahkan'
        ];

        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}