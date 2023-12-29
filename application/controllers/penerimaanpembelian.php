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
            $penerimaan = $this->PenerimaanpembelianheaderModel->insert($data);

            $data_jurnalpembeliandebit = [
                'id_jurnal_pembelian' => null,
                'id_akun' => 9,
                'id_penerimaan_pembelian_header' => $penerimaan,
                'nominal' => 0,
                'posisi_dr_cr' => 'debit',
            ];

            $data_jurnalpembeliancredit = [
                'id_jurnal_pembelian' => null,
                'id_akun' => 14,
                'id_penerimaan_pembelian_header' => $penerimaan,
                'nominal' => 0,
                'posisi_dr_cr' => 'credit',
            ];

            $this->PenerimaanpembeliandetailModel->insertJurnalPembelianDebit($data_jurnalpembeliandebit);
            $this->PenerimaanpembeliandetailModel->insertJurnalPembelianCredit($data_jurnalpembeliancredit);
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
        $id_pemesanan_pembelian_header = $header->id_pemesanan_pembelian_header;
        $produk = $this->PenerimaanpembeliandetailModel->getAllProdukByPemesanan($id_pemesanan_pembelian_header);
        $pegawai = $this->PegawaiModel->getAllData();
        $stock_left = $this->PenerimaanpembeliandetailModel->getStockLeft($id_pemesanan_pembelian_header);

        return $this->load->view('penerimaanpembelian/detail', ['id_penerimaan_pembelian_header' => $id_penerimaan_pembelian_header, 'data' => $data, 'header' => $header, 'produk' => $produk, 'pegawai' => $pegawai, 'stock_left' => $stock_left]);
    }

    public function storedetail()
    {
        $header = $this->PenerimaanpembeliandetailModel->getAllHeader($this->input->post('id_penerimaan_pembelian_header'));
        $id_pemesanan_pembelian_header = $header->id_pemesanan_pembelian_header;

        $tgl = date_create();
        $tgl_format = date_format($tgl, 'Y-m-d');

        $data_penerimaan = [
            'id_penerimaan_pembelian_detail' => null,
            'kuantitas' => $this->input->post('kuantitas'),
            'base_price' => round(($this->input->post('base_price') / 1.11), 0),
            'ppn' => $this->input->post('base_price') - round(($this->input->post('base_price') / 1.11), 0),
            'satuan' => $this->ProdukModel->getDataById($this->input->post('id_produk'))->satuan,
            'id_penerimaan_pembelian_header' => $this->input->post('id_penerimaan_pembelian_header'),
            'id_produk' => $this->input->post('id_produk'),
            'id_pegawai' => $this->input->post('id_pegawai'),
        ];

        $stock_pemesanan = $this->PenerimaanpembeliandetailModel->getStockPemesananByProduk($id_pemesanan_pembelian_header, $this->input->post('id_produk'))->kuantitas_pemesanan;
        $stock_penerimaan = $this->PenerimaanpembeliandetailModel->getStockPenerimaanByProduk($this->input->post('id_penerimaan_pembelian_header'), $this->input->post('id_produk'))->kuantitas_penerimaan;

        if (($stock_penerimaan + $this->input->post('kuantitas')) > $stock_pemesanan) {
            $this->session->set_flashdata('message', 'Kuantitas melebihi pemesanan');
            return redirect('/penerimaanpembelian/' . $this->input->post('id_penerimaan_pembelian_header') . '/detail');
        }

        try {
            $penerimaan = $this->PenerimaanpembeliandetailModel->insertPenerimaan($data_penerimaan);

            $data_persediaan = [
                'id_persediaan' => null,
                'tgl_persediaan' => date('Y-m-d', strtotime($tgl_format)),
                'keterangan' => $header->keterangan,
                'kuantitas' => $this->input->post('kuantitas'),
                'harga_satuan' => $this->input->post('base_price'),
                'id_penerimaan_pembelian_detail' => $penerimaan,
                'id_produk' => $this->input->post('id_produk'),
            ];
            $total = $this->PenerimaanpembeliandetailModel->getSumTotal($this->input->post('id_penerimaan_pembelian_header'))->total;

            $data_jurnalpembelian = [
                'nominal' => $total,
            ];

            $this->PenerimaanpembeliandetailModel->updateJurnal($this->input->post('id_penerimaan_pembelian_header'), $data_jurnalpembelian);
            $this->PenerimaanpembeliandetailModel->insertPersediaan($data_persediaan);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            return redirect('/penerimaanpembelian/' . $this->input->post('id_penerimaan_pembelian_header') . '/detail');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            return redirect('/penerimaanpembelian/' . $this->input->post('id_penerimaan_pembelian_header') . '/detail');
        }
    }

    public function deletedetail($id_penerimaan_pembelian_header, $id_penerimaan_pembelian_detail)
    {
        try {
            $this->PenerimaanpembeliandetailModel->delete($id_penerimaan_pembelian_detail);
            $total = $this->PenerimaanpembeliandetailModel->getSumTotal($id_penerimaan_pembelian_header)->total;
            $this->PenerimaanpembeliandetailModel->updateJurnal($id_penerimaan_pembelian_header, ['nominal' => $total]);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            return redirect('/penerimaanpembelian/' . $id_penerimaan_pembelian_header . '/detail');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
            return redirect('/penerimaanpembelian/' . $id_penerimaan_pembelian_header . '/detail');
        }
    }
}
