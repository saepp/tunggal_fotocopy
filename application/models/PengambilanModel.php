<?php
class PengambilanModel extends CI_Model
{
    public function getDataById($id_persediaan)
    {
        $this->db->select('*');
        $this->db->from('pengambilan');
        $this->db->where('id_persediaan', $id_persediaan);
        $this->db->order_by('tgl_pengambilan', 'DESC');
        return $this->db->get()->result();
    }
}
