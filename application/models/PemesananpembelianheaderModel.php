<?php
class PemesananpembelianheaderModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('a.*, b.*, c.subtotal_pemesanan');
        $this->db->from('pemesanan_pembelian_header a');
        $this->db->join('supplier b', 'a.id_supplier = b.id_supplier', 'left');
        $this->db->join('(SELECT id_pemesanan_pembelian_header, SUM(kuantitas * (base_price + ppn)) AS subtotal_pemesanan FROM pemesanan_pembelian_detail GROUP BY id_pemesanan_pembelian_header) c', 'a.id_pemesanan_pembelian_header = c.id_pemesanan_pembelian_header', 'left');
        return $this->db->get()->result();
    }

    public function getDataById($id_pemesanan_pembelian_header)
    {
        $result = $this->db->get_where('pemesanan_pembelian_header', ['id_pemesanan_pembelian_header' => $id_pemesanan_pembelian_header])->row();
        return $result;
    }

    public function insert($data)
    {
        $result = $this->db->insert('pemesanan_pembelian_header', $data);
        return $result;
    }

    public function update($id_pemesanan_pembelian_header, $data)
    {
        $result = $this->db->where('id_pemesanan_pembelian_header', $id_pemesanan_pembelian_header)->update('pemesanan_pembelian_header', $data);
        return $result;
    }

    public function delete($id_pemesanan_pembelian_header)
    {
        $result = $this->db->delete('pemesanan_pembelian_header', ['id_pemesanan_pembelian_header' => $id_pemesanan_pembelian_header]);
        return $result;
    }
}
