<?php
class PenjualanbarangdetailModel extends CI_Model
{
    public function getAllData($id_penjualan_barang_header)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('penjualan_barang_detail a');
        $this->db->join('produk b', 'a.id_produk = b.id_produk', 'left');
        $this->db->where('a.id_penjualan_barang_header', $id_penjualan_barang_header);
        return $this->db->get()->result();
    }

    public function getDetailStock($id_penjualan_barang_header, $id_produk)
    {
        $this->db->select('sum(a.kuantitas) as total_penjualan');
        $this->db->from('penjualan_barang_detail a');
        $this->db->join('produk b', 'a.id_produk = b.id_produk', 'left');
        $this->db->where('a.id_penjualan_barang_header', $id_penjualan_barang_header);
        $this->db->where('a.id_produk', $id_produk);
        return $this->db->get()->row();
    }

    public function getDetailPersediaan($id_produk)
    {
        $this->db->select('SUM(a.kuantitas) - SUM(COALESCE(c.total_pengambilan, 0)) as stok');
        $this->db->from('persediaan a');
        $this->db->join('produk b', 'a.id_produk = b.id_produk', 'left');
        $this->db->join('(SELECT id_persediaan, SUM(kuantitas) as total_pengambilan FROM pengambilan GROUP BY id_persediaan) c', 'a.id_persediaan = c.id_persediaan', 'left');
        $this->db->where('a.id_produk', $id_produk);
        $this->db->group_by('a.id_produk, b.nama_produk, b.satuan');
        return $this->db->get()->row();

    }

    public function getAllHeader($id_penjualan_barang_header)
    {
        $this->db->select('a.*, b.*, c.*');
        $this->db->from('penjualan_barang_header a');
        $this->db->join('pelanggan b', 'a.id_pelanggan = b.id_pelanggan', 'left');
        $this->db->join('pegawai c', 'a.id_pegawai = c.id_pegawai', 'left');
        $this->db->where('a.id_penjualan_barang_header', $id_penjualan_barang_header);
        return $this->db->get()->row();
    }

    public function getDataItem()
    {
        $this->db->select('a.id_produk, b.nama_produk, b.satuan, SUM(a.kuantitas) as total_persediaan, SUM(c.total_pengambilan) as total_pengambilan, SUM(a.kuantitas * a.harga_satuan) - SUM(COALESCE(c.total_pengambilan, 0) * a.harga_satuan) as nilai_persediaan, SUM(a.kuantitas) - SUM(COALESCE(c.total_pengambilan, 0)) as stok');
        $this->db->from('persediaan a');
        $this->db->join('produk b', 'a.id_produk = b.id_produk', 'left');
        $this->db->join('(SELECT id_persediaan, SUM(kuantitas) as total_pengambilan FROM pengambilan GROUP BY id_persediaan) c', 'a.id_persediaan = c.id_persediaan', 'left');
        $this->db->group_by('a.id_produk, b.nama_produk, b.satuan');
        return $this->db->get()->result();
    }

    public function insert($data)
    {
        $result = $this->db->insert('penjualan_barang_detail', $data);
        return $result;
    }

    public function insertPengambilan($data)
    {
        $result = $this->db->insert('pengambilan', $data);
        return $result;
    }

    public function update($id_penjualan_barang_header, $id_penjualan_barang_detail, $data)
    {
        $result = $this->db->where('id_penjualan_barang_detail', $id_penjualan_barang_detail)->where('id_penjualan_barang_header', $id_penjualan_barang_header)->update('penjualan_barang_detail', $data);
        return $result;
    }

    public function delete($id_penjualan_barang_detail)
    {
        $result = $this->db->where('id_penjualan_barang_detail', $id_penjualan_barang_detail)->delete('penjualan_barang_detail');
        return $result;
    }
}
