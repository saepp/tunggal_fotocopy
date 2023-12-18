<?php
class akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AkunModel');
    }

    public function index()
    {
        $data = $this->AkunModel->getAllData();
        $this->load->view('akun/index', ['data' => $data]);
    }

    public function create()
    {
        $this->load->view('akun/create');
    }

    public function store()
    {
        $data = [
            'id_akun' => null,
            'nama_akun' => $this->input->post('nama_akun'),
            'header_akun' => $this->input->post('header_akun'),
            'kode_akun' => $this->input->post('kode_akun'),
        ];

        try {
            $this->AkunModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            redirect(base_url('/akun'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            redirect(base_url('/akun/create'));
        }
    }

    public function edit($id_akun)
    {
        $data = $this->AkunModel->getDataById($id_akun);
        $this->load->view('akun/edit', ['data' => $data]);
    }

    public function update($id_akun)
    {
        $data = [
            'nama_akun' => $this->input->post('nama_akun'),
            'header_akun' => $this->input->post('header_akun'),
            'kode_akun' => $this->input->post('kode_akun'),
        ];

        try {
            $this->AkunModel->update($id_akun, $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect(base_url('/akun'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal diubah');
            redirect(base_url('/akun/edit/' . $id_akun));
        }
    }

    public function delete($id_akun)
    {
        try {
            $this->AkunModel->delete($id_akun);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
        }

        redirect(base_url('/akun'));
    }
}
