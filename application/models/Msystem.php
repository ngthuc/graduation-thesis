<?php
class Msystem extends CI_Model{
    protected $_table = 'SYSTEM';
    protected $_arr = array();

    public function __construct(){
        parent::__construct();
    }

    public function getList($where = null, $id = null){
        $this->db->select('*');
        if ($where && $id) {
            $this->db->where($where, $id);
        }
        return $this->db->get($this->_table)->result_array();
    }

    public function getLatestUpdate($type,$limit = null, $start = 0){
        $this->db->select('*');
        $this->db->where('SYSTEMTYPE', $type);
        $this->db->order_by('SYSTEMID', 'DESC');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    }

    public function getNumRowsLatestUpdate($type,$limit = null, $start = 0){
        $this->db->select('*');
        $this->db->where('SYSTEMTYPE', $type);
        $this->db->order_by('SYSTEMID', 'DESC');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->num_rows();
    }

    public function countAll(){
        return $this->db->count_all($this->_table);
    }

    public function countDefaultSetup() {
        $this->db->select('*');
        $this->db->where('SYSTEMTYPE', 'default');
        return $this->db->get($this->_table)->num_rows();
    }

    public function getById($id){
        $this->db->where("SYSTEMID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getValueByKey($key){
        $this->db->select("SYSTEMLINK");
        $this->db->where("SYSTEMTITLE", $key);
        return $this->db->get($this->_table)->row_array();
    }

    public function getSystemByType($type,$limit = 5, $start = 0){
        $this->db->select("*");
        $this->db->where("SYSTEMTYPE", $type);
        $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    }

    public function getSystemWithTitle($type,$key){
        $this->db->select("*");
        $this->db->where("SYSTEMTYPE", $type);
        $this->db->where("SYSTEMTITLE", $key);
        return $this->db->get($this->_table)->row_array();
    }

    public function getSystemWithId($type,$id){
        $this->db->select("*");
        $this->db->where("SYSTEMTYPE", $type);
        $this->db->where("SYSTEMID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function insertSystem($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateSystemById($data_update, $id){
        $this->db->where("SYSTEMID", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function updateSystemByKey($data_update, $key){
        $this->db->where("SYSTEMTITLE", $key);
        $this->db->update($this->_table, $data_update);
    }

    public function updateSystemOptions($data_update){
      foreach ($data_update as $key => $value) {
        // code...
        $sql_query = "UPDATE `SYSTEM` SET `SYSTEMLINK`='$value' WHERE `SYSTEMTITLE`='$key';";
        $this->db->query($sql_query);
      }
    }

    public function updateMultiSystem($data_update){
      $num_rows = $this->countDefaultSetup();
      foreach ($data_update as $key => $data) {
        // code...
        if($num_rows > 0) {
          // code...
          $key = $data['SYSTEMTITLE'];
          $this->updateSystemByKey($data,$key);
        } else {
          // code...
          $this->insertSystem($data);
        }
      }
    }

    public function deleteSystem($id){
        $this->db->where("SYSTEMID", $id);
        return $this->db->delete($this->_table);
    }
}
