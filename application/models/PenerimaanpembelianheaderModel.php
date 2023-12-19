<?php
class PenerimaanpembelianheaderModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('a.*, b.*, c.*, d.subtotal_penerimaan, e.subtotal_pemesanan');
        $this->db->from('penerimaan_pembelian_header a');
        $this->db->join('pemesanan_pembelian_header b', 'a.id_pemesanan_pembelian_header = b.id_pemesanan_pembelian_header', 'left');
        $this->db->join('supplier c', 'b.id_supplier = c.id_supplier', 'left');
        $this->db->join('(SELECT id_penerimaan_pembelian_header, SUM(kuantitas * (base_price + ppn)) AS subtotal_penerimaan FROM penerimaan_pembelian_detail GROUP BY id_penerimaan_pembelian_header) d', 'a.id_penerimaan_pembelian_header = d.id_penerimaan_pembelian_header', 'left');
        $this->db->join('(SELECT id_pemesanan_pembelian_header, SUM(kuantitas * (base_price + ppn)) AS subtotal_pemesanan FROM pemesanan_pembelian_detail GROUP BY id_pemesanan_pembelian_header) e', 'a.id_pemesanan_pembelian_header = e.id_pemesanan_pembelian_header', 'left');
        return $this->db->get()->result();
    }

    public function getDataById($id_penerimaan_pembelian_header)
    {
        $result = $this->db->get_where('penerimaan_pembelian_header', ['id_penerimaan_pembelian_header' => $id_penerimaan_pembelian_header])->row();
        return $result;
    }

    public function insert($data)
    {
        $result = $this->db->insert('penerimaan_pembelian_header', $data);
        return $result;
    }

    public function update($id_penerimaan_pembelian_header, $data)
    {
        $result = $this->db->where('id_penerimaan_pembelian_header', $id_penerimaan_pembelian_header)->update('penerimaan_pembelian_header', $data);
        return $result;
    }

    public function delete($id_penerimaan_pembelian_header)
    {
        $result = $this->db->delete('penerimaan_pembelian_header', ['id_penerimaan_pembelian_header' => $id_penerimaan_pembelian_header]);
        return $result;
    }
}
