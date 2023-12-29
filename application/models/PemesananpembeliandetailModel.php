<?php
class PemesananpembeliandetailModel extends CI_Model
{
    public function getAllData($id_pemesanan_pembelian_header)
    {

        $this->db->select('a.*, b.*, c.*');
        $this->db->from('pemesanan_pembelian_detail a');
        $this->db->join('produk b', 'a.id_produk = b.id_produk', 'left');
        $this->db->join('pegawai c', 'a.id_pegawai = c.id_pegawai', 'left');
        $this->db->where('id_pemesanan_pembelian_header', $id_pemesanan_pembelian_header);
        $data = $this->db->get()->result();

        return $data;
    }

    public function getAllHeader($id_pemesanan_pembelian_header)
    {
        $this->db->select('a.*, b.*');
        $this->db->from('pemesanan_pembelian_header a');
        $this->db->join('supplier b', 'a.id_supplier = b.id_supplier', 'left');
        $this->db->where('id_pemesanan_pembelian_header', $id_pemesanan_pembelian_header);
        $header = $this->db->get()->row();
        return $header;
    }

    public function getDataById($id_pemesanan_pembelian_detail)
    {
        $result = $this->db->get_where('pemesanan_pembelian_detail', ['id_pemesanan_pembelian_detail' => $id_pemesanan_pembelian_detail])->row();
        return $result;
    }

    public function insert($data)
    {
        $result = $this->db->insert('pemesanan_pembelian_detail', $data);
        return $result;
    }

    public function update($id_pemesanan_pembelian_header, $id_pemesanan_pembelian_detail, $data)
    {
        $result = $this->db->where('id_pemesanan_pembelian_detail', $id_pemesanan_pembelian_detail)->where('id_pemesanan_pembelian_header', $id_pemesanan_pembelian_header)->update('pemesanan_pembelian_detail', $data);
        return $result;
    }

    public function delete($id_pemesanan_pembelian_detail)
    {
        $result = $this->db->where('id_pemesanan_pembelian_detail', $id_pemesanan_pembelian_detail)->delete('pemesanan_pembelian_detail');
        return $result;
    }
}
