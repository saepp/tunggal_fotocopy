<?php
class produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdukModel');
    }

    public function index()
    {
        $data = $this->ProdukModel->getAllData();
        $this->load->view('produk/index', ['data' => $data]);
    }

    public function create()
    {
        $this->load->view('produk/create');
    }

    public function store()
    {
        $data = [
            'id_produk' => $this->input->post('id_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'satuan' => $this->input->post('satuan'),
        ];

        try {
            $this->ProdukModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            redirect(base_url('/produk'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            redirect(base_url('/produk/create'));
        }
    }

    public function edit($id_produk)
    {
        $data = $this->ProdukModel->getDataById($id_produk);
        $this->load->view('produk/edit', ['data' => $data]);
    }

    public function update($id_produk)
    {
        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'satuan' => $this->input->post('satuan'),
        ];

        try {
            $this->ProdukModel->update($id_produk, $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect(base_url('/produk'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal diubah');
            redirect(base_url('/produk/edit/' . $id_produk));
        }
    }

    public function delete($id_produk)
    {
        try {
            $this->ProdukModel->delete($id_produk);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
        }

        redirect(base_url('/produk'));
    }
}
