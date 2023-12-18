<?php
class pemesananpembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PemesananpembelianheaderModel');
        $this->load->model('SupplierModel');
    }

    public function index()
    {
        $data = $this->PemesananpembelianheaderModel->getAllData();
        $this->load->view('pemesananpembelian/index', ['data' => $data]);
    }

    public function create()
    {
        $supplier = $this->SupplierModel->getAllData();
        $this->load->view('pemesananpembelian/create', ['supplier' => $supplier]);
    }

    public function store()
    {
        $tgl = date_create($this->input->post('tgl_pemesanan'));
        $tgl_format = date_format($tgl, 'Y-m-d');

        $data = [
            'id_pemesanan_pembelian_header' => null,
            'tgl_pemesanan' => date('Y-m-d', strtotime($tgl_format)),
            'no_pemesanan' => no_pe($tgl_format),
            'keterangan' => $this->input->post('keterangan'),
            'status' => 'Proses',
            'tgl_jatuh_tempo' => $this->input->post('tgl_jatuh_tempo'),
            'alamat_pengiriman' => $this->input->post('alamat_pengiriman'),
            'satuan' => $this->input->post('satuan'),
            'id_supplier' => $this->input->post('id_supplier'),
        ];

        try {
            $this->PemesananpembelianheaderModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            redirect(base_url('/pemesananpembelian'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            redirect(base_url('/pemesananpembelian/create'));
        }
    }

    public function edit($id_pemesanan_pembelian_header)
    {
        $data = $this->PemesananpembelianheaderModel->getDataById($id_pemesanan_pembelian_header);
        $supplier = $this->SupplierModel->getAllData();
        $this->load->view('pemesananpembelian/edit', ['data' => $data, 'supplier' => $supplier]);
    }

    public function update($id_pemesanan_pembelian_header)
    {
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'status' => $this->input->post('status'),
            'tgl_jatuh_tempo' => $this->input->post('tgl_jatuh_tempo'),
            'alamat_pengiriman' => $this->input->post('alamat_pengiriman'),
            'id_supplier' => $this->input->post('id_supplier'),
        ];

        try {
            $this->PemesananpembelianheaderModel->update($id_pemesanan_pembelian_header, $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect(base_url('/pemesananpembelian'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal diubah');
            redirect(base_url('/pemesananpembelian/edit/' . $id_pemesanan_pembelian_header));
        }
    }

    public function delete($id_pemesanan_pembelian_header)
    {
        try {
            $this->PemesananpembelianheaderModel->delete($id_pemesanan_pembelian_header);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
        }
        redirect(base_url('/pemesananpembelian'));
    }
}
