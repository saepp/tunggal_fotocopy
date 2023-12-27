<?php
class AkunModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('a.*, b.kode_akun as kode_akun_header, a.nama_akun as nama_akun_header');
        $this->db->from('akun a');
        $this->db->join('akun b', 'a.header_akun = b.id_akun', 'left');
        $this->db->order_by('a.id_akun', 'asc');
        $result = $this->db->get()->result();
        return $result;
    }

    public function getDataById($id_akun)
    {
        $result = $this->db->get_where('akun', ['id_akun' => $id_akun])->row();
        return $result;
    }

    public function insert($data)
    {
        $result = $this->db->insert('akun', $data);
        return $result;
    }

    public function update($id_akun, $data)
    {
        $result = $this->db->where('id_akun', $id_akun)->update('akun', $data);
        return $result;
    }

    public function delete($id_akun)
    {
        $result = $this->db->delete('akun', ['id_akun' => $id_akun]);
        return $result;
    }
}
