<?php
class JurnalpembelianModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('a.*, b.kode_akun, b.nama_akun, d.tgl_penerimaan, d.no_penerimaan');
        $this->db->from('jurnal_pembelian a');
        $this->db->join('akun b', 'a.id_akun = b.id_akun', 'left');
        $this->db->join('penerimaan_pembelian_detail c', 'a.id_penerimaan_pembelian_detail = c.id_penerimaan_pembelian_detail', 'left');
        $this->db->join('penerimaan_pembelian_header d', 'c.id_penerimaan_pembelian_header = d.id_penerimaan_pembelian_header', 'left');
        $this->db->order_by('d.tgl_penerimaan', 'asc');
        $this->db->order_by('a.id_penerimaan_pembelian_detail', 'asc');
        $this->db->order_by('a.id_akun', 'asc');
        $result = $this->db->get()->result();
        return $result;
    }
}
