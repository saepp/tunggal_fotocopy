<?php
class penerimaanpembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenerimaanpembelianheaderModel');
        $this->load->model('PemesananpembelianheaderModel');
    }

    public function index()
    {
        $data = $this->PenerimaanpembelianheaderModel->getAllData();
        $this->load->view('penerimaanpembelian/index', ['data' => $data]);
    }

    public function create()
    {
        $pemesanan_pembelian_header = $this->PemesananpembelianheaderModel->getAllData();
        $this->load->view('penerimaanpembelian/create', ['pemesanan_pembelian_header' => $pemesanan_pembelian_header]);
    }

    public function store()
    {
        $tgl = date_create();
        $tgl_format = date_format($tgl, 'Y-m-d');

        $data = [
            'id_penerimaan_pembelian_header' => null,
            'no_penerimaan' => no_pe($tgl_format),
            'tgl_penerimaan' => date('Y-m-d', strtotime($tgl_format)),
            'keterangan' => $this->input->post('keterangan'),
            'id_pemesanan_pembelian_header' => $this->input->post('id_pemesanan_pembelian_header'),
        ];

        try {
            $this->PenerimaanpembelianheaderModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            redirect(base_url('/penerimaanpembelian'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            redirect(base_url('/penerimaanpembelian/create'));
        }
    }

    public function edit($id_penerimaan_pembelian_header)
    {
        $data = $this->PenerimaanpembelianheaderModel->getDataById($id_penerimaan_pembelian_header);
        $pemesanan_pembelian_header = $this->PemesananpembelianheaderModel->getAllData();
        $this->load->view('penerimaanpembelian/edit', ['data' => $data, 'pemesanan_pembelian_header' => $pemesanan_pembelian_header]);
    }

    public function update($id_penerimaan_pembelian_header)
    {
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'id_pemesanan_pembelian_header' => $this->input->post('id_pemesanan_pembelian_header'),
        ];

        try {
            $this->PenerimaanpembelianheaderModel->update($id_penerimaan_pembelian_header, $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect(base_url('/penerimaanpembelian'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal diubah');
            redirect(base_url('/penerimaanpembelian/edit/' . $id_penerimaan_pembelian_header));
        }
    }

    public function delete($id_penerimaan_pembelian_header)
    {
        try {
            $this->PenerimaanpembelianheaderModel->delete($id_penerimaan_pembelian_header);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            redirect(base_url('/penerimaanpembelian'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
            redirect(base_url('/penerimaanpembelian'));
        }
    }
}
