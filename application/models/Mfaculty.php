<?php
class Mfaculty extends CI_Model{
    protected $_table = 'FACULTY';
    protected $_arr = array();

    public function __construct(){
        parent::__construct();
    }

    public function getList($type=null,$where = null, $param = null){
        $this->db->select('*');
        if ($type && $type=='where') {
            $this->db->where($where, $param);
        } else if ($type && $type=='sort') {
            $this->db->order_by($where, $param);
        }
        return $this->db->get($this->_table)->result_array();
    }

    public function countAll(){
        return $this->db->count_all($this->_table);
    }

    public function getById($id){
        $this->db->where("FACID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByNickname($key){
        $this->db->where("FACNICKNAME", $key);
        return $this->db->get($this->_table)->row_array();
    }

    public function insertFaculty($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateFaculty($data_update, $id){
        $this->db->where("FACID", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteFaculty($id){
        $this->db->where("FACID", $id);
        return $this->db->delete($this->_table);
    }
}
