<?php
class JurnalpembelianModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('a.*, b.kode_akun, b.nama_akun, c.tgl_penerimaan, c.no_penerimaan');
        $this->db->from('jurnal_pembelian a');
        $this->db->join('akun b', 'a.id_akun = b.id_akun', 'left');
        $this->db->join('penerimaan_pembelian_header c', 'a.id_penerimaan_pembelian_header = c.id_penerimaan_pembelian_header', 'left');
        $this->db->order_by('c.tgl_penerimaan', 'asc');
        $this->db->order_by('a.id_jurnal_pembelian', 'asc');
        $result = $this->db->get()->result();
        return $result;
    }
}
