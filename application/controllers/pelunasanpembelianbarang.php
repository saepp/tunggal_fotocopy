<?php
class pelunasanpembelianbarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PelunasanpembelianbarangModel');
    }

    public function index()
    {
        $data = $this->PelunasanpembelianbarangModel->getAllData();
        return $this->load->view('pelunasanpembelianbarang/index', ['data' => $data]);
    }

    public function create()
    {
        $penerimaan = $this->PelunasanpembelianbarangModel->getPenerimaan();
        $pembayaran = $this->PelunasanpembelianbarangModel->getPembayaran();
        return $this->load->view('pelunasanpembelianbarang/create', ['penerimaan' => $penerimaan, 'pembayaran' => $pembayaran]);
    }

    public function store()
    {
        $tgl = date_create();
        $tgl_format = date_format($tgl, 'Y-m-d');

        $data = [
            'id_pelunasan_pembelian_barang' => null,
            'no_pelunasan' => no_pelunasan($tgl_format),
            'tgl_pelunasan' => $tgl_format,
            'nominal_pembayaran' => $this->input->post('nominal_pembayaran'),
            'keterangan' => $this->input->post('keterangan'),
            'id_penerimaan_pembelian_header' => $this->input->post('id_penerimaan_pembelian_header'),
            'id_pembayaran' => $this->input->post('id_pembayaran'),
        ];

        try {
            $this->PelunasanpembelianbarangModel->insert($data);
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            return redirect(base_url('/pelunasanpembelianbarang'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal disimpan');
            return redirect(base_url('/pelunasanpembelianbarang/create'));
        }
    }

    public function edit($id_pelunasan_pembelian_barang)
    {
        $data = $this->PelunasanpembelianbarangModel->getDataById($id_pelunasan_pembelian_barang);
        $penerimaan = $this->PelunasanpembelianbarangModel->getPenerimaan();
        $pembayaran = $this->PelunasanpembelianbarangModel->getPembayaran();
        return $this->load->view('pelunasanpembelianbarang/edit', ['data' => $data, 'penerimaan' => $penerimaan, 'pembayaran' => $pembayaran]);
    }

    public function update($id_pelunasan_pembelian_barang)
    {
        $data = [
            'nominal_pembayaran' => $this->input->post('nominal_pembayaran'),
            'keterangan' => $this->input->post('keterangan'),
            'id_penerimaan_pembelian_header' => $this->input->post('id_penerimaan_pembelian_header'),
            'id_pembayaran' => $this->input->post('id_pembayaran'),
        ];

        try {
            $this->PelunasanpembelianbarangModel->update($id_pelunasan_pembelian_barang, $data);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            return redirect(base_url('/pelunasanpembelianbarang'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal diubah');
            return redirect(base_url('/pelunasanpembelianbarang/edit/' . $id_pelunasan_pembelian_barang));
        }
    }

    public function delete($id_pelunasan_pembelian_barang)
    {
        try {
            $this->PelunasanpembelianbarangModel->delete($id_pelunasan_pembelian_barang);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            return redirect(base_url('/pelunasanpembelianbarang'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
            return redirect(base_url('/pelunasanpembelianbarang'));
        }
    }
}
