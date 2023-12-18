<?php
class pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PegawaiModel');
    }

    public function index()
    {
        $data = $this->PegawaiModel->getAllData();
        $this->load->view('pegawai/index', ['data' => $data]);
    }

    public function create()
    {
        $this->load->view('pegawai/create');
    }

    public function store()
    {
        $data = [
            'id_pegawai' => null,
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'alamat_pegawai' => $this->input->post('alamat_pegawai'),
            'no_telp_pegawai' => $this->input->post('no_telp_pegawai'),
            'jenis_kelamin_pegawai' => $this->input->post('jenis_kelamin_pegawai'),
            'posisi_pegawai' => $this->input->post('posisi_pegawai'),
        ];

        try {
            $this->PegawaiModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            redirect(base_url('/pegawai'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            redirect(base_url('/pegawai/create'));
        }
    }

    public function edit($id_pegawai)
    {
        $data = $this->PegawaiModel->getDataById($id_pegawai);
        $this->load->view('pegawai/edit', ['data' => $data]);
    }

    public function update($id_pegawai)
    {
        $data = [
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'alamat_pegawai' => $this->input->post('alamat_pegawai'),
            'no_telp_pegawai' => $this->input->post('no_telp_pegawai'),
            'jenis_kelamin_pegawai' => $this->input->post('jenis_kelamin_pegawai'),
            'posisi_pegawai' => $this->input->post('posisi_pegawai'),
        ];

        try {
            $this->PegawaiModel->update($id_pegawai, $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect(base_url('/pegawai'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal diubah');
            redirect(base_url('/pegawai/edit/' . $id_pegawai));
        }
    }

    public function delete($id_pegawai)
    {
        try {
            $this->PegawaiModel->delete($id_pegawai);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
        }

        redirect(base_url('/pegawai'));
    }
}
