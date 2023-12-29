<?php
class penjualanbarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenjualanbarangheaderModel');
        $this->load->model('PenjualanbarangdetailModel');
        $this->load->model('ProdukModel');
    }

    public function index()
    {
        $data = $this->PenjualanbarangheaderModel->getAllData();
        return $this->load->view('penjualanbarang/index', ['data' => $data]);
    }

    public function create()
    {
        $pelanggan = $this->PenjualanbarangheaderModel->getPelanggan();
        $pegawai = $this->PenjualanbarangheaderModel->getPegawai();
        return $this->load->view('penjualanbarang/create', ['pelanggan' => $pelanggan, 'pegawai' => $pegawai]);
    }

    public function store()
    {
        $tgl = date_create();
        $tgl_format = date_format($tgl, 'Y-m-d');

        $data = [
            'id_penjualan_barang_header' => null,
            'no_penjualan' => no_penjualan($tgl_format),
            'tgl_penjualan' => $tgl_format,
            'keterangan' => $this->input->post('keterangan'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_pegawai' => $this->input->post('id_pegawai'),
        ];

        try {
            $this->PenjualanbarangheaderModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            return redirect(base_url('/penjualanbarang'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            return redirect(base_url('/penjualanbarang/create'));
        }
    }

    public function edit($id_penjualan_barang_header)
    {
        $data = $this->PenjualanbarangheaderModel->getDataById($id_penjualan_barang_header);
        $pelanggan = $this->PenjualanbarangheaderModel->getPelanggan();
        $pegawai = $this->PenjualanbarangheaderModel->getPegawai();
        return $this->load->view('penjualanbarang/edit', ['data' => $data, 'pelanggan' => $pelanggan, 'pegawai' => $pegawai]);
    }

    public function update($id_penjualan_barang_header)
    {
        $data = [
            'keterangan' => $this->input->post('keterangan'),
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'id_pegawai' => $this->input->post('id_pegawai'),
        ];

        try {
            $this->PenjualanbarangheaderModel->update($id_penjualan_barang_header, $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            return redirect(base_url('/penjualanbarang'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal diubah');
            return redirect(base_url('/penjualanbarang/edit/' . $id_penjualan_barang_header));
        }
    }

    public function delete($id_penjualan_barang_header)
    {
        try {
            $this->PenjualanbarangheaderModel->delete($id_penjualan_barang_header);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            return redirect(base_url('/penjualanbarang'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
            return redirect(base_url('/penjualanbarang'));
        }
    }

    public function detail($id_penjualan_barang_header)
    {
        $data = $this->PenjualanbarangdetailModel->getAllData($id_penjualan_barang_header);
        $header = $this->PenjualanbarangdetailModel->getAllHeader($id_penjualan_barang_header);
        $dataItem = $this->PenjualanbarangdetailModel->getDataItem($id_penjualan_barang_header);
        $produk = $this->ProdukModel->getAllData();
        return $this->load->view('penjualanbarang/detail', ['id_penjualan_barang_header' => $id_penjualan_barang_header, 'data' => $data, 'produk' => $produk, 'header' => $header, 'dataItem' => $dataItem]);
    }

    public function storedetail()
    {
        $data = [
            'id_penjualan_barang_detail' => null,
            'kuantitas' => $this->input->post('kuantitas'),
            'harga_jual' => $this->input->post('harga_jual'),
            'id_produk' => $this->input->post('id_produk'),
            'id_penjualan_barang_header' => $this->input->post('id_penjualan_barang_header'),
        ];

        $dataStock = $this->PenjualanbarangdetailModel->getDetailStock($this->input->post('id_penjualan_barang_header'), $this->input->post('id_produk'))->total_penjualan;
        $dataPersediaan = $this->PenjualanbarangdetailModel->getDetailPersediaan($this->input->post('id_produk'))->stok;

        if ($dataStock + $this->input->post('kuantitas') > $dataPersediaan) {
            $this->session->set_flashdata('message', 'Data gagal disimpan, stok tidak mencukupi');
            return redirect('/penjualanbarang/' . $this->input->post('id_penjualan_barang_header') . '/detail');
        }

        try {
            $this->PenjualanbarangdetailModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            return redirect('/penjualanbarang/' . $this->input->post('id_penjualan_barang_header') . '/detail');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            return redirect('/penjualanbarang/' . $this->input->post('id_penjualan_barang_header') . '/detail');
        }
    }

    public function deletedetail($id_penjualan_barang_header, $id_penjualan_barang_detail)
    {
        try {
            $this->PenjualanbarangdetailModel->delete($id_penjualan_barang_detail);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            return redirect('/penjualanbarang/' . $id_penjualan_barang_header . '/detail');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
            return redirect('/penjualanbarang/' . $id_penjualan_barang_header . '/detail');
        }
    }
}
