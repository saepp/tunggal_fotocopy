
<?php
class jurnalpenjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JurnalpenjualanModel');
    }

    public function index()
    {
        $data = $this->JurnalpenjualanModel->getAllData();
        $this->load->view('jurnalpenjualan/index', ['data' => $data]);
    }
}
