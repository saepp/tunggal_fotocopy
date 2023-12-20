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

    public function getAllHeader($id_penerimaan_pembelian_header)
    {
        $this->db->select('a.*, b.*, a.keterangan');
        $this->db->from('penerimaan_pembelian_header a');
        $this->db->join('pemesanan_pembelian_header b', 'a.id_pemesanan_pembelian_header = b.id_pemesanan_pembelian_header', 'left');
        $this->db->where('a.id_penerimaan_pembelian_header', $id_penerimaan_pembelian_header);
        return $this->db->get()->row();
    }

    public function getDataById($id_penerimaan_pembelian_header, $id_penerimaan_pembelian_detail, $data)
    {
        $result = $this->db->where('penerimaan_pembelian_detail', ['id_penerimaan_pembelian_detail' => $id_penerimaan_pembelian_detail])->row();
        return $result;
    }

    public function insert($data)
    {
        $result = $this->db->insert('penerimaan_pembelian_detail', $data);
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
