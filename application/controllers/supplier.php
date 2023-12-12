<?php
class supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SupplierModel');
    }

    public function index()
    {
        $data = $this->SupplierModel->getAllData();
        $this->load->view('supplier/index', ['data' => $data]);
    }

    public function create()
    {
        $this->load->view('supplier/create');
    }

    public function store()
    {
        $data = [
            'id_supplier' => $this->input->post('id_supplier'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'alamat_supplier' => $this->input->post('alamat_supplier'),
            'no_telp_supplier' => $this->input->post('no_telp_supplier'),
        ];

        try {
            $this->SupplierModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            redirect(base_url('/supplier'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            redirect(base_url('/supplier/create'));
        }
    }

    public function edit($id_supplier)
    {
        $data = $this->SupplierModel->getDataById($id_supplier);
        $this->load->view('supplier/edit', ['data' => $data]);
    }

    public function update($id_supplier)
    {
        $data = [
            'nama_supplier' => $this->input->post('nama_supplier'),
            'alamat_supplier' => $this->input->post('alamat_supplier'),
            'no_telp_supplier' => $this->input->post('no_telp_supplier'),
        ];

        try {
            $this->SupplierModel->update($id_supplier, $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect(base_url('/supplier'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal diubah');
            redirect(base_url('/supplier/edit/' . $id_supplier));
        }
    }

    public function delete($id_supplier)
    {
        try {
            $this->SupplierModel->delete($id_supplier);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
        }

        redirect(base_url('/supplier'));
    }
}
