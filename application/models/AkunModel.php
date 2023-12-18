<?php
class AkunModel extends CI_Model
{
    public function getAllData()
    {
        $result = $this->db->get('akun')->result();
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
