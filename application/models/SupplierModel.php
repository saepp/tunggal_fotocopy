<?php
class SupplierModel extends CI_Model
{
    public function getAllData()
    {
        $result = $this->db->get('supplier')->result();
        return $result;
    }

    public function getDataById($id_supplier)
    {
        $result = $this->db->get_where('supplier', ['id_supplier' => $id_supplier])->row();
        return $result;
    }

    public function insert($data)
    {
        $result = $this->db->insert('supplier', $data);
        return $result;
    }

    public function update($id_supplier, $data)
    {
        $result = $this->db->where('id_supplier', $id_supplier)->update('supplier', $data);
        return $result;
    }

    public function delete($id_supplier)
    {
        $result = $this->db->delete('supplier', ['id_supplier' => $id_supplier]);
        return $result;
    }
}
