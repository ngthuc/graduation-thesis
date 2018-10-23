<?php
class Media extends CI_Model{
    protected $_table = 'MEDIA';
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
        $this->db->where('MEDIATYPE', $type);
        $this->db->order_by('MEDIAID', 'DESC');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    }

    public function getNumRowsLatestUpdate($type,$limit = null, $start = 0){
        $this->db->select('*');
        $this->db->where('MEDIATYPE', $type);
        $this->db->order_by('MEDIAID', 'DESC');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->num_rows();
    }

    public function countAll(){
        return $this->db->count_all($this->_table);
    }

    public function getById($id){
        $this->db->where("MEDIAID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getValueByKey($key){
        $this->db->select("MEDIAEMBEDDEDLINK");
        $this->db->where("MEDIATITLE", $key);
        return $this->db->get($this->_table)->row_array();
    }

    public function getMediaByType($type,$limit = 5, $start = 0){
        $this->db->select("*");
        $this->db->where("MEDIATYPE", $type);
        $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    }

    public function getMediaWithTitle($type,$key){
        $this->db->select("*");
        $this->db->where("MEDIATYPE", $type);
        $this->db->where("MEDIATITLE", $key);
        return $this->db->get($this->_table)->row_array();
    }

    public function getMediaWithId($type,$id){
        $this->db->select("*");
        $this->db->where("MEDIATYPE", $type);
        $this->db->where("MEDIAID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function insertMediaOption($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateMediaOptionById($data_update, $id){
        $this->db->where("MEDIAID", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function updateMediaOptionByKey($data_update, $key){
        $this->db->where("MEDIATITLE", $key);
        $this->db->update($this->_table, $data_update);
    }

    public function updateMediaOptions($data_update){
      foreach ($data_update as $key => $value) {
        // code...
        $sql_query = "UPDATE `MEDIA` SET `MEDIAEMBEDDEDLINK`='$value' WHERE `MEDIATITLE`='$key';";
        $this->db->query($sql_query);
      }
    }

    public function deleteMediaOption($id){
        $this->db->where("MEDIAID", $id);
        return $this->db->delete($this->_table);
    }
}
