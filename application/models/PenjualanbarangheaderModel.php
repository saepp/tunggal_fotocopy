<?php
class PenjualanbarangheaderModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('a.*, b.*, c.*, COALESCE(d.total_penjualan, 0) as total_penjualan, d.nama_produk');
        $this->db->from('penjualan_barang_header a');
        $this->db->join('pelanggan b', 'a.id_pelanggan = b.id_pelanggan', 'left');
        $this->db->join('pegawai c', 'a.id_pegawai = c.id_pegawai', 'left');
        $this->db->join('(SELECT e.id_penjualan_barang_header, SUM(e.kuantitas * e.harga_jual) as total_penjualan, GROUP_CONCAT(f.nama_produk) as nama_produk FROM penjualan_barang_detail e LEFT JOIN produk f ON e.id_produk = f.id_produk GROUP BY e.id_penjualan_barang_header) d', 'a.id_penjualan_barang_header = d.id_penjualan_barang_header', 'left');
        return $this->db->get()->result();
    }

    public function getDataById($id_penjualan_barang_header)
    {
        $result = $this->db->get_where('penjualan_barang_header', ['id_penjualan_barang_header' => $id_penjualan_barang_header])->row();
        return $result;
    }

    public function getPelanggan()
    {
        return $this->db->get('pelanggan')->result();
    }

    public function getPegawai()
    {
        return $this->db->get('pegawai')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('penjualan_barang_header', $data);
    }

    public function update($id_penjualan_barang_header, $data)
    {
        $result = $this->db->where('id_penjualan_barang_header', $id_penjualan_barang_header)->update('penjualan_barang_header', $data);
        return $result;
    }

    public function delete($id_penjualan_barang_header)
    {
        $result = $this->db->where('id_penjualan_barang_header', $id_penjualan_barang_header)->delete('penjualan_barang_header');
        return $result;
    }
}
