<?php
class MY_GenericCRUD extends CI_Model {
    private $_table;
    protected $_arr = array();

    public function __construct(){
        parent::__construct();
    }

    public function setTable($table) {
        $this->_table = $table;
    }

    public function getList($where=null,$order=null){
        $this->db->select('*');
        if ($where) {
            $this->db->where($where);
        }
        if ($order) {
            $this->db->order_by($order);
        }
        return $this->db->get($this->_table)->result_array();
    }

    public function countAll(){
        return $this->db->count_all($this->_table);
    }

    public function getById($id){
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByNickname($key){
        $this->db->where("nickname", $key);
        return $this->db->get($this->_table)->row_array();
    }

    public function insertOrg($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateOrg($data_update, $id){
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteOrg($id){
        $this->db->where("id", $id);
        return $this->db->delete($this->_table);
    }

}