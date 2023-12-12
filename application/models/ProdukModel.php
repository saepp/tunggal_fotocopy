<?php
class ProdukModel extends CI_Model
{
    public function getAllData()
    {
        $result = $this->db->get('produk')->result();
        return $result;
    }

    public function getDataById($id_produk)
    {
        $result = $this->db->get_where('produk', ['id_produk' => $id_produk])->row();
        return $result;
    }

    public function insert($data)
    {
        $result = $this->db->insert('produk', $data);
        return $result;
    }

    public function update($id_produk, $data)
    {
        $result = $this->db->where('id_produk', $id_produk)->update('produk', $data);
        return $result;
    }

    public function delete($id_produk)
    {
        $result = $this->db->delete('produk', ['id_produk' => $id_produk]);
        return $result;
    }
}
