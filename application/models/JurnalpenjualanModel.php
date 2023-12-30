<?php
class JurnalpenjualanModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('a.*, b.kode_akun, b.nama_akun, c.tgl_pembayaran, c.no_pembayaran');
        $this->db->from('jurnal_penjualan a');
        $this->db->join('akun b', 'a.id_akun = b.id_akun', 'left');
        $this->db->join('pembayaran c', 'a.id_pembayaran = c.id_pembayaran', 'left');
        $this->db->order_by('c.tgl_pembayaran', 'asc');
        $this->db->order_by('a.id_jurnal_penjualan', 'asc');
        $result = $this->db->get()->result();
        return $result;
    }
}
