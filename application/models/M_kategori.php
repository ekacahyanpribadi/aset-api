<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

    /**
     * Get All Data Kategori
     */
    public function get_all()
    {
        $this->db->select("*");
        $this->db->from("kategori_aset");
        $this->db->order_by("ins_date", "DESC");
        return $this->db->get();
    }

    /**
     * Detail Data Kategori
     */
    public function detail_kategori($id_kategori)
    {
        $this->db->select("*");
        $this->db->from("kategori_aset");
        $this->db->where("id_kategori", $id_kategori);
        return $this->db->get();
    }

    /**
     * Simpan Data Kategori
     */
    public function simpan_kategori($dara)
    {
        $simpan = $this->db->insert("kategori_aset", $data);

        if($simpan) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

}