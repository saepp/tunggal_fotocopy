<?php
class persediaan extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->model('PersediaanModel');
        $this->load->model('PengambilanModel');
    }

    public function index()
    {
        $data = $this->PersediaanModel->getAllDataHeader();
        $this->load->view('persediaan/index', ['data' => $data]);
    }

    public function detail($id_item)
    {
        $data = $this->PersediaanModel->getAllDataDetail($id_item);
        $this->load->view('persediaan/detail', ['data' => $data]);
    }

    public function pengambilanproduk($id_persediaan)
    {
        $data = $this->PengambilanModel->getDataById($id_persediaan);
        $this->load->view('persediaan/pengambilanproduk', ['data' => $data]);
    }
}
