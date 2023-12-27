<?php
class PersediaanModel extends CI_Model
{
    public function getAllDataHeader()
    {
        $this->db->select('a.id_produk, b.nama_produk, b.satuan, SUM(a.kuantitas) as total_persediaan, SUM(c.total_pengambilan) as total_pengambilan, SUM(a.kuantitas * a.harga_satuan) - SUM(COALESCE(c.total_pengambilan, 0) * a.harga_satuan) as nilai_persediaan');
        $this->db->from('persediaan a');
        $this->db->join('produk b', 'a.id_produk = b.id_produk', 'left');
        $this->db->join('(SELECT id_persediaan, SUM(kuantitas) as total_pengambilan FROM pengambilan GROUP BY id_persediaan) as c', 'a.id_persediaan = c.id_persediaan', 'left');
        $this->db->group_by('a.id_produk, b.satuan, b.nama_produk');
        return $this->db->get()->result();
    }

    public function getAllDataDetail($id_produk)
    {
        $this->db->select('a.*, b.*, COALESCE(c.total_pengambilan, 0) as total_pengambilan');
        $this->db->from('persediaan a');
        $this->db->join('produk b', 'a.id_produk = b.id_produk', 'left');
        $this->db->join('(SELECT id_persediaan, SUM(kuantitas) as total_pengambilan FROM pengambilan GROUP BY id_persediaan) as c', 'a.id_persediaan = c.id_persediaan', 'left');
        $this->db->where('a.id_produk', $id_produk);
        $this->db->order_by('a.tgl_persediaan', 'asc');
        return $this->db->get()->result();
    }
}
