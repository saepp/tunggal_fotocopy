<?php
class pemesananpembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PemesananpembelianheaderModel');
        $this->load->model('PemesananpembeliandetailModel');
        $this->load->model('SupplierModel');
        $this->load->model('ProdukModel');
        $this->load->model('PegawaiModel');
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
        $tgl = date_create();
        $tgl_format = date_format($tgl, 'Y-m-d');

        $data = [
            'id_pemesanan_pembelian_header' => null,
            'tgl_pemesanan' => date('Y-m-d', strtotime($tgl_format)),
            'no_pemesanan' => no_po($tgl_format),
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

    public function detail($id_pemesanan_pembelian_header)
    {
        $data = $this->PemesananpembeliandetailModel->getAllData($id_pemesanan_pembelian_header);
        $header = $this->PemesananpembeliandetailModel->getAllHeader($id_pemesanan_pembelian_header);
        $produk = $this->ProdukModel->getAllData();
        $pegawai = $this->PegawaiModel->getAllData();
        $this->load->view('pemesananpembelian/detail', ['id_pemesanan_pembelian_header' => $id_pemesanan_pembelian_header, 'data' => $data, 'produk' => $produk, 'pegawai' => $pegawai, 'header' => $header]);
    }

    public function storedetail()
    {
        $data = [
            'id_pemesanan_pembelian_detail' => null,
            'kuantitas' => $this->input->post('kuantitas'),
            'base_price' => round(($this->input->post('base_price') / 1.11), 0),
            'ppn' => $this->input->post('base_price') - round(($this->input->post('base_price') / 1.11), 0),
            'id_pemesanan_pembelian_header' => $this->input->post('id_pemesanan_pembelian_header'),
            'id_produk' => $this->input->post('id_produk'),
            'id_pegawai' => $this->input->post('id_pegawai'),
        ];

        try {
            $this->PemesananpembeliandetailModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            redirect('/pemesananpembelian/' . $this->input->post('id_pemesanan_pembelian_header') . '/detail');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            redirect('/pemesananpembelian/' . $this->input->post('id_pemesanan_pembelian_header') . '/detail/');
        }
    }

    public function editdetail($id_pemesanan_pembelian_header, $id_pemesanan_pembelian_detail)
    {
        $data = $this->PemesananpembeliandetailModel->getDataById($id_pemesanan_pembelian_detail);
        $header = $this->PemesananpembeliandetailModel->getAllHeader($id_pemesanan_pembelian_header);
        $produk = $this->ProdukModel->getAllData();
        $pegawai = $this->PegawaiModel->getAllData();

        $this->load->view('pemesananpembelian/editdetail', ['id_pemesanan_pembelian_header' => $id_pemesanan_pembelian_header, 'data' => $data, 'produk' => $produk, 'pegawai' => $pegawai, 'header' => $header]);
    }

    public function updatedetail($id_pemesanan_pembelian_header, $id_pemesanan_pembelian_detail)
    {
        $data = [
            'kuantitas' => $this->input->post('kuantitas'),
            'base_price' => round(($this->input->post('base_price') / 1.11), 0),
            'ppn' => $this->input->post('base_price') - round(($this->input->post('base_price') / 1.11), 0),
            'id_pemesanan_pembelian_header' => $id_pemesanan_pembelian_header,
            'id_produk' => $this->input->post('id_produk'),
            'id_pegawai' => $this->input->post('id_pegawai'),
        ];

        try {
            $this->PemesananpembeliandetailModel->update($id_pemesanan_pembelian_header, $id_pemesanan_pembelian_detail, $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect('/pemesananpembelian/' . $id_pemesanan_pembelian_header . '/detail');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect('/pemesananpembelian/' . $id_pemesanan_pembelian_header . '/editdetail');
        }
    }

    public function deletedetail($id_pemesanan_pembelian_header, $id_pemesanan_pembelian_detail)
    {
        try {
            $this->PemesananpembeliandetailModel->delete($id_pemesanan_pembelian_detail);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
        }
        redirect('/pemesananpembelian/' . $id_pemesanan_pembelian_header . '/detail');
    }
}
