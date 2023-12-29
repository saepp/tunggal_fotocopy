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
        return $this->load->view('pelunasanpembelianbarang/create', ['penerimaan' => $penerimaan]);
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
        ];

        try {

            $dataJurnalPembelianDebit = [
                'id_jurnal_pembelian' => null,
                'id_akun' => 14,
                'id_penerimaan_pembelian_header' => $this->input->post('id_penerimaan_pembelian_header'),
                'nominal' => $this->input->post('nominal_pembayaran'),
                'posisi_dr_cr' => 'debit',
            ];

            $dataJurnalPembelianKredit = [
                'id_jurnal_pembelian' => null,
                'id_akun' => 5,
                'id_penerimaan_pembelian_header' => $this->input->post('id_penerimaan_pembelian_header'),
                'nominal' => $this->input->post('nominal_pembayaran'),
                'posisi_dr_cr' => 'credit',
            ];

            $this->PelunasanpembelianbarangModel->insert($data);
            $this->PelunasanpembelianbarangModel->insertJurnalPembelianDebit($dataJurnalPembelianDebit);
            $this->PelunasanpembelianbarangModel->insertJurnalPembelianKredit($dataJurnalPembelianKredit);
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
        return $this->load->view('pelunasanpembelianbarang/edit', ['data' => $data, 'penerimaan' => $penerimaan]);
    }

    public function update($id_pelunasan_pembelian_barang)
    {
        $data = [
            'keterangan' => $this->input->post('keterangan'),
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
            $id_penerimaan_pembelian_header = $this->PelunasanpembelianbarangModel->getDataById($id_pelunasan_pembelian_barang)->id_penerimaan_pembelian_header;
            $this->PelunasanpembelianbarangModel->deleteJurnal($id_penerimaan_pembelian_header, 14, 'debit');
            $this->PelunasanpembelianbarangModel->deleteJurnal($id_penerimaan_pembelian_header, 5, 'credit');
            $this->PelunasanpembelianbarangModel->delete($id_pelunasan_pembelian_barang);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            return redirect(base_url('/pelunasanpembelianbarang'));
        } catch (\Exception $e) {
            $this->session->set_flashdata('message', 'Data gagal dihapus');
            return redirect(base_url('/pelunasanpembelianbarang'));
        }
    }
}
