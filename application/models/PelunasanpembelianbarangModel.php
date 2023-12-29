<?php
class PelunasanpembelianbarangModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('a.*, b.no_penerimaan, d.*');
        $this->db->from('pelunasan_pembelian_barang a');
        $this->db->join('penerimaan_pembelian_header b', 'a.id_penerimaan_pembelian_header = b.id_penerimaan_pembelian_header', 'left');
        $this->db->join('pemesanan_pembelian_header c', 'b.id_pemesanan_pembelian_header = c.id_pemesanan_pembelian_header', 'left');
        $this->db->join('supplier d', 'c.id_supplier = d.id_supplier', 'left');
        return $this->db->get()->result();
    }

    public function getPenerimaan()
    {
        $this->db->select('a.id_penerimaan_pembelian_header, a.no_penerimaan, COALESCE(SUM(b.kuantitas * (base_price + ppn)), 0) as total_penerimaan, a.tgl_penerimaan, d.nama_supplier');
        $this->db->from('penerimaan_pembelian_header a');
        $this->db->join('penerimaan_pembelian_detail b', 'a.id_penerimaan_pembelian_header = b.id_penerimaan_pembelian_header', 'left');
        $this->db->join('pemesanan_pembelian_header c', 'a.id_pemesanan_pembelian_header = c.id_pemesanan_pembelian_header', 'left');
        $this->db->join('supplier d', 'c.id_supplier = d.id_supplier', 'left');
        $this->db->group_by('a.id_penerimaan_pembelian_header, a.no_penerimaan, a.tgl_penerimaan, d.nama_supplier');
        return $this->db->get()->result();
    }

    public function getDataById($id_pelunasan_pembelian_barang)
    {
        return $this->db->get_where('pelunasan_pembelian_barang', ['id_pelunasan_pembelian_barang' => $id_pelunasan_pembelian_barang])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('pelunasan_pembelian_barang', $data);
    }

    public function insertJurnalPembelianDebit($data)
    {
        return $this->db->insert('jurnal_pembelian', $data);
    }

    public function insertJurnalPembelianKredit($data)
    {
        return $this->db->insert('jurnal_pembelian', $data);
    }

    public function update($id_pelunasan_pembelian_barang, $data)
    {
        $result = $this->db->where('id_pelunasan_pembelian_barang', $id_pelunasan_pembelian_barang)->update('pelunasan_pembelian_barang', $data);
        return $result;
    }

    public function delete($id_pelunasan_pembelian_barang)
    {
        $result = $this->db->where('id_pelunasan_pembelian_barang', $id_pelunasan_pembelian_barang)->delete('pelunasan_pembelian_barang');
        return $result;
    }

    public function deleteJurnal($id_penerimaan_pembelian_header, $id_akun, $posisi_dr_cr)
    {
        $result = $this->db->where('id_penerimaan_pembelian_header', $id_penerimaan_pembelian_header)->where('id_akun', $id_akun)->where('posisi_dr_cr', $posisi_dr_cr)->delete('jurnal_pembelian');
        return $result;
    }
}
