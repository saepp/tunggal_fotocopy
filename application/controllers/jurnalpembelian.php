<?php
class jurnalpembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JurnalpembelianModel');
    }

    public function index()
    {
        $data = $this->JurnalpembelianModel->getAllData();
        $this->load->view('jurnalpembelian/index', ['data' => $data]);
    }
}
