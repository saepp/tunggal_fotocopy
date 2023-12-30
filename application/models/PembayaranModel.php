<?php
class PembayaranModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('a.*, b.*, c.*, SUM(c.kuantitas * c.harga_jual) as total');
        $this->db->from('pembayaran a');
        $this->db->join('penjualan_barang_header b', 'a.id_penjualan_barang_header = b.id_penjualan_barang_header', 'left');
        $this->db->join('penjualan_barang_detail c', 'a.id_penjualan_barang_header = c.id_penjualan_barang_header', 'left');
        $this->db->group_by('a.id_penjualan_barang_header');
        return $this->db->get()->result();
    }

    public function getTotal($id_penjualan_barang_header)
    {
        $this->db->select('SUM(c.kuantitas * c.harga_jual) as total');
        $this->db->from('pembayaran a');
        $this->db->join('penjualan_barang_header b', 'a.id_penjualan_barang_header = b.id_penjualan_barang_header', 'left');
        $this->db->join('penjualan_barang_detail c', 'a.id_penjualan_barang_header = c.id_penjualan_barang_header', 'left');
        $this->db->where('a.id_penjualan_barang_header', $id_penjualan_barang_header);
        $this->db->group_by('a.id_penjualan_barang_header');
        return $this->db->get()->row();
    }

    public function getDataById($id_pembayaran)
    {
        $this->db->select('a.*, b.*, c.*');
        $this->db->from('pembayaran a');
        $this->db->join('penjualan_barang_header b', 'a.id_penjualan_barang_header = b.id_penjualan_barang_header', 'left');
        $this->db->join('penjualan_barang_detail c', 'a.id_penjualan_barang_header = c.id_penjualan_barang_header', 'left');
        $this->db->where('a.id_pembayaran', $id_pembayaran);
        return $this->db->get()->row();
    }

    public function getPenjualan()
    {
        $result = $this->db->get('penjualan_barang_header')->result();
        return $result;
    }

    public function insert($data)
    {
        $this->db->insert('pembayaran', $data);
        return $this->db->insert_id();
    }

    public function insertJurnalPenjualanDebit($data)
    {
        $result = $this->db->insert('jurnal_penjualan', $data);
        return $result;
    }

    public function insertJurnalPenjualanCredit($data)
    {
        $result = $this->db->insert('jurnal_penjualan', $data);
        return $result;
    }

    public function update($id_pembayaran, $data)
    {
        $result = $this->db->where('id_pembayaran', $id_pembayaran)->update('pembayaran', $data);
        return $result;
    }

    public function delete($id_pembayaran)
    {
        $result = $this->db->where('id_pembayaran', $id_pembayaran)->delete('pembayaran');
        return $result;
    }
}
