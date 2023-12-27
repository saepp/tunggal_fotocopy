<?php
class PenerimaanpembeliandetailModel extends CI_Model
{
    public function getAllData($id_penerimaan_pembelian_header)
    {
        $this->db->select('a.*, b.*, c.*, d.*');
        $this->db->from('penerimaan_pembelian_header a');
        $this->db->join('penerimaan_pembelian_detail b', 'a.id_penerimaan_pembelian_header = b.id_penerimaan_pembelian_header', 'left');
        $this->db->join('produk c', 'b.id_produk = c.id_produk', 'left');
        $this->db->join('pegawai d', 'b.id_pegawai = d.id_pegawai', 'left');
        $this->db->where('b.id_penerimaan_pembelian_header', $id_penerimaan_pembelian_header);
        return $this->db->get()->result();
    }

    public function getStockLeft($id_pemesanan_pembelian_header)
    {
        $this->db->select('c.id_produk, c.nama_produk, SUM(b.kuantitas) as stock_pemesanan');
        $this->db->select('(SELECT COALESCE(SUM(d.kuantitas), 0) FROM penerimaan_pembelian_detail d LEFT JOIN penerimaan_pembelian_header e ON d.id_penerimaan_pembelian_header = e.id_penerimaan_pembelian_header WHERE d.id_produk = c.id_produk) as stock_penerimaan');
        $this->db->from('pemesanan_pembelian_header a');
        $this->db->join('pemesanan_pembelian_detail b', 'a.id_pemesanan_pembelian_header = b.id_pemesanan_pembelian_header', 'left');
        $this->db->join('produk c', 'b.id_produk = c.id_produk', 'left');
        $this->db->where('b.id_pemesanan_pembelian_header', $id_pemesanan_pembelian_header);
        $this->db->group_by('b.id_produk');
        return $this->db->get()->result();
    }

    public function getAllProdukByPemesanan($id_pemesanan_pembelian_header)
    {
        $this->db->select('d.nama_produk, d.id_produk');
        $this->db->from('penerimaan_pembelian_header a');
        $this->db->join('pemesanan_pembelian_header b', 'a.id_pemesanan_pembelian_header = b.id_pemesanan_pembelian_header', 'left');
        $this->db->join('pemesanan_pembelian_detail c', 'b.id_pemesanan_pembelian_header = c.id_pemesanan_pembelian_header', 'left');
        $this->db->join('produk d', 'c.id_produk = d.id_produk', 'left');
        $this->db->where('a.id_pemesanan_pembelian_header', $id_pemesanan_pembelian_header);
        return $this->db->get()->result();
    }

    public function getStockPemesananByProduk($id_pemesanan_pembelian_header, $id_produk)
    {
        $this->db->select('SUM(c.kuantitas) as kuantitas_pemesanan');
        $this->db->from('penerimaan_pembelian_header a');
        $this->db->join('pemesanan_pembelian_header b', 'a.id_pemesanan_pembelian_header = b.id_pemesanan_pembelian_header', 'left');
        $this->db->join('pemesanan_pembelian_detail c', 'b.id_pemesanan_pembelian_header = c.id_pemesanan_pembelian_header', 'left');
        $this->db->join('produk d', 'c.id_produk = d.id_produk', 'left');
        $this->db->where('c.id_pemesanan_pembelian_header', $id_pemesanan_pembelian_header);
        $this->db->where('c.id_produk', $id_produk);
        return $this->db->get()->row();
    }

    public function getStockPenerimaanByProduk($id_penerimaan_pembelian_header, $id_produk)
    {
        $this->db->select('SUM(c.kuantitas) as kuantitas_penerimaan');
        $this->db->from('penerimaan_pembelian_header a');
        $this->db->join('penerimaan_pembelian_detail c', 'a.id_penerimaan_pembelian_header = c.id_penerimaan_pembelian_header', 'left');
        $this->db->join('produk d', 'c.id_produk = d.id_produk', 'left');
        $this->db->where('c.id_penerimaan_pembelian_header', $id_penerimaan_pembelian_header);
        $this->db->where('c.id_produk', $id_produk);
        return $this->db->get()->row();
    }

    public function getAllHeader($id_penerimaan_pembelian_header)
    {
        $this->db->select('a.*, b.*, a.keterangan');
        $this->db->from('penerimaan_pembelian_header a');
        $this->db->join('pemesanan_pembelian_header b', 'a.id_pemesanan_pembelian_header = b.id_pemesanan_pembelian_header', 'left');
        $this->db->where('a.id_penerimaan_pembelian_header', $id_penerimaan_pembelian_header);
        return $this->db->get()->row();
    }

    public function getDataById($id_penerimaan_pembelian_detail)
    {
        $result = $this->db->where('penerimaan_pembelian_detail', ['id_penerimaan_pembelian_detail' => $id_penerimaan_pembelian_detail])->row();
        return $result;
    }

    public function insertPenerimaan($data)
    {
        $this->db->insert('penerimaan_pembelian_detail', $data);
        return $this->db->insert_id();
    }

    public function insertPersediaan($data)
    {
        $result = $this->db->insert('persediaan', $data);
        return $result;
    }

    public function insertJurnalPembelianDebit($data)
    {
        $result = $this->db->insert('jurnal_pembelian', $data);
        return $result;
    }

    public function insertJurnalPembelianCredit($data)
    {
        $result = $this->db->insert('jurnal_pembelian', $data);
        return $result;
    }

    public function update($id_penerimaan_pembelian_header, $id_penerimaan_pembelian_detail, $data)
    {
        $result = $this->db->get_where('id_penerimaan_pembelian_detail', $id_penerimaan_pembelian_detail)->where('id_penerimaan_pembelian_header', $id_penerimaan_pembelian_header)->update('penerimaan_pembelian_detail', $data);
        return $result;
    }

    public function delete($id_penerimaan_pembelian_detail)
    {
        $result = $this->db->where('id_penerimaan_pembelian_detail', $id_penerimaan_pembelian_detail)->delete('penerimaan_pembelian_detail');
        return $result;
    }
}
