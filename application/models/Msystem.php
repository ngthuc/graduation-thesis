<?php
class Msystem extends CI_Model{
    protected $_table = 'system';
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
        $this->db->where('type', $type);
        $this->db->order_by('id', 'DESC');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    }

    public function getNumRowsLatestUpdate($type,$limit = null, $start = 0){
        $this->db->select('*');
        $this->db->where('type', $type);
        $this->db->order_by('id', 'DESC');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->num_rows();
    }

    public function countAll(){
        return $this->db->count_all($this->_table);
    }

    public function countDefaultSetup() {
        $this->db->select('*');
        $this->db->where('type', 'default');
        return $this->db->get($this->_table)->num_rows();
    }

    public function countFollowType($type) {
        $this->db->select('*');
        $this->db->where('type', $type);
        return $this->db->get($this->_table)->num_rows();
    }

    public function getById($id){
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByKey($key){
        $this->db->select("*");
        $this->db->where("title", $key);
        return $this->db->get($this->_table)->row_array();
    }

    public function getValueByKey($key){
        $this->db->select("link");
        $this->db->where("title", $key);
        return $this->db->get($this->_table)->row_array();
    }

    public function getSystemByType($type,$limit = null, $start = 0){
        $this->db->select("*");
        $this->db->where("type", $type);
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    }

    public function getSystemWithTitle($type,$key){
        $this->db->select("*");
        $this->db->where("type", $type);
        $this->db->where("title", $key);
        return $this->db->get($this->_table)->row_array();
    }

    public function getSystemWithId($type,$id){
        $this->db->select("*");
        $this->db->where("type", $type);
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function insertSystem($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateSystemById($data_update, $id){
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function updateSystemByKey($data_update, $key){
        $this->db->where("title", $key);
        $this->db->update($this->_table, $data_update);
    }

    public function updateSystemOptions($data_update){
      foreach ($data_update as $key => $value) {
        // code...
        $sql_query = "UPDATE `system` SET `link`='$value' WHERE `title`='$key';";
        $this->db->query($sql_query);
      }
    }

    public function updateMultiSystem($data_update){
      $num_rows = $this->countDefaultSetup();
      foreach ($data_update as $key => $data) {
        // code...
        if($num_rows > 0) {
          // code...
          $key = $data['title'];
          $this->updateSystemByKey($data,$key);
        } else {
          // code...
          $this->insertSystem($data);
        }
      }
    }

    public function updateMultiTheme($data_update){
      foreach ($data_update as $key => $data) {
        // code...
        if($this->getByKey($data['title'])) {
          // code...
          $this->updateSystemByKey($data,$data['title']);
        } else {
          // code...
          $this->insertSystem($data);
        }
      }
    }

    public function deleteSystem($id){
        $this->db->where("id", $id);
        return $this->db->delete($this->_table);
    }
}
