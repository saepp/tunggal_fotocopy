<?php
class PelangganModel extends CI_Model
{
    public function getAllData()
    {
        $result = $this->db->get('pelanggan')->result();
        return $result;
    }

    public function getDataById($id_pelanggan)
    {
        $result = $this->db->get_where('pelanggan', ['id_pelanggan' => $id_pelanggan])->row();
        return $result;
    }

    public function insert($data)
    {
        $result = $this->db->insert('pelanggan', $data);
        return $result;
    }

    public function update($id_pelanggan, $data)
    {
        $result = $this->db->where('id_pelanggan', $id_pelanggan)->update('pelanggan', $data);
        return $result;
    }

    public function delete($id_pelanggan)
    {
        $result = $this->db->delete('pelanggan', ['id_pelanggan' => $id_pelanggan]);
        return $result;
    }
}
