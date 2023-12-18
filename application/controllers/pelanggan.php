<?php
class pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelangganModel');
    }

    public function index()
    {
        $data = $this->PelangganModel->getAllData();
        $this->load->view('pelanggan/index', ['data' => $data]);
    }

    public function create()
    {
        $this->load->view('pelanggan/create');
    }

    public function store()
    {
        $data = [
            'id_pelanggan' => null,
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
            'jenis_kelamin_pelanggan' => $this->input->post('jenis_kelamin_pelanggan'),
            'no_telp_pelanggan' => $this->input->post('no_telp_pelanggan'),
        ];

        try {
            $this->PelangganModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            redirect(base_url('/pelanggan'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            redirect(base_url('/pelanggan/create'));
        }
    }

    public function edit($id_pelanggan)
    {
        $data = $this->PelangganModel->getDataById($id_pelanggan);
        $this->load->view('pelanggan/edit', ['data' => $data]);
    }

    public function update($id_pelanggan)
    {
        $data = [
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
            'jenis_kelamin_pelanggan' => $this->input->post('jenis_kelamin_pelanggan'),
            'no_telp_pelanggan' => $this->input->post('no_telp_pelanggan'),
        ];

        try {
            $this->PelangganModel->update($id_pelanggan, $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect(base_url('/pelanggan'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal diubah');
            redirect(base_url('/pelanggan/edit/' . $id_pelanggan));
        }
    }

    public function delete($id_pelanggan)
    {
        try {
            $this->PelangganModel->delete($id_pelanggan);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
        }

        redirect(base_url('/pelanggan'));
    }
}
