<?php
class pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PembayaranModel');
    }

    public function index()
    {
        $data = $this->PembayaranModel->getAllData();
        return $this->load->view('pembayaran/index', ['data' => $data]);
    }

    public function create()
    {
        $data = $this->PembayaranModel->getPenjualan();
        return $this->load->view('pembayaran/create', ['data' => $data]);
    }

    public function store()
    {
        $tgl = date_create();
        $tgl_format = date_format($tgl, 'Y-m-d');

        if ($this->input->post('metode_pembayaran') == 'Cash') {
            $metode_pembayaran = 'Tunai';
        } else {
            $metode_pembayaran = 'Non Tunai';
        }

        $data = [
            'id_pembayaran' => null,
            'no_pembayaran' => no_pembayaran($tgl_format),
            'metode_pembayaran' => $this->input->post('metode_pembayaran'),
            'status_pembayaran' => 'Menunggu',
            'tgl_pembayaran' => $tgl_format,
            'jenis_pembayaran' => $metode_pembayaran,
            'id_penjualan_barang_header' => $this->input->post('id_penjualan_barang_header'),
        ];

        try {
            $this->PembayaranModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            return redirect('/pembayaran');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            return redirect('/pembayaran/create');
        }
    }

    public function edit($id_pembayaran)
    {
        $data = $this->PembayaranModel->getDataById($id_pembayaran);
        $penjualan = $this->PembayaranModel->getPenjualan();
        return $this->load->view('pembayaran/edit', ['data' => $data, 'penjualan' => $penjualan]);
    }

    public function update($id_pembayaran)
    {
        $data = [
            'status_pembayaran' => $this->input->post('status_pembayaran'),
        ];

        try {
            $this->PembayaranModel->update($id_pembayaran, $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            return redirect('/pembayaran');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal diubah');
            return redirect('/pembayaran/edit/' . $id_pembayaran);
        }
    }

    public function delete($id_pembayaran)
    {
        try {
            $this->PembayaranModel->delete($id_pembayaran);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            return redirect('/pembayaran');
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
            return redirect('/pembayaran');
        }
    }
}
