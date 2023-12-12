<?php
class PegawaiModel extends CI_Model
{
    public function getAllData()
    {
        $result = $this->db->get('pegawai')->result();
        return $result;
    }

    public function getDataById($id_pegawai)
    {
        $result = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row();
        return $result;
    }

    public function insert($data)
    {
        $result = $this->db->insert('pegawai', $data);
        return $result;
    }

    public function update($id_pegawai, $data)
    {
        $result = $this->db->where('id_pegawai', $id_pegawai)->update('pegawai', $data);
        return $result;
    }

    public function delete($id_pegawai)
    {
        $result = $this->db->delete('pegawai', ['id_pegawai' => $id_pegawai]);
        return $result;
    }
}
