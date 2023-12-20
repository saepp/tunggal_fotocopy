<?php
class penerimaanpembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenerimaanpembelianheaderModel');
        $this->load->model('PenerimaanpembeliandetailModel');
        $this->load->model('PemesananpembelianheaderModel');
        $this->load->model('ProdukModel');
        $this->load->model('PegawaiModel');
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

    public function detail($id_penerimaan_pembelian_header)
    {
        $data = $this->PenerimaanpembeliandetailModel->getAllData($id_penerimaan_pembelian_header);
        $header = $this->PenerimaanpembeliandetailModel->getAllHeader($id_penerimaan_pembelian_header);
        $produk = $this->ProdukModel->getAllData();
        $pegawai = $this->PegawaiModel->getAllData();
        $this->load->view('penerimaanpembelian/detail', ['id_penerimaan_pembelian_header' => $id_penerimaan_pembelian_header, 'data' => $data, 'header' => $header, 'produk' => $produk, 'pegawai' => $pegawai]);
    }

    public function storedetail()
    {
        $data = [
            'id_penerimaan_pembelian_detail' => null,
            'kuantitas' => $this->input->post('kuantitas'),
            'base_price' => round(($this->input->post('base_price') / 1.11), 0),
            'ppn' => $this->input->post('base_price') - round(($this->input->post('base_price') / 1.11), 0),
            'satuan' => $this->ProdukModel->getDataById($this->input->post('id_produk'))->satuan,
            'id_penerimaan_pembelian_header' => $this->input->post('id_penerimaan_pembelian_header'),
            'id_produk' => $this->input->post('id_produk'),
            'id_pegawai' => $this->input->post('id_pegawai'),
        ];

        try {
            $this->PenerimaanpembeliandetailModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            redirect('/penerimaanpembelian/' . $this->input->post('id_penerimaan_pembelian_header') . '/detail');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            redirect('/penerimaanpembelian/' . $this->input->post('id_penerimaan_pembelian_header') . '/detail');
        }
    }

    public function deletedetail($id_penerimaan_pembelian_header, $id_penerimaan_pembelian_detail)
    {
        try {
            $this->PenerimaanpembeliandetailModel->delete($id_penerimaan_pembelian_detail);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
        }
        redirect('/penerimaanpembelian/' . $id_penerimaan_pembelian_header . '/detail');
    }
}
