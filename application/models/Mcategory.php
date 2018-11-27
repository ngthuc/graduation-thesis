<?php
class Mcategory extends CI_Model{
    protected $_table = 'CATEGORY';
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

    public function countAll(){
        return $this->db->count_all($this->_table);
    }

    public function numRows($where = null, $value = null, $field = null){
        if ($where && $id) {
          if($field) {
            $sql_query = "SELECT $field FROM $this->_table WHERE $where = $value";
          } else {
            $sql_query = "SELECT * FROM $this->_table WHERE $where = $value";
          }
        } else {
          $sql_query = "SELECT * FROM $this->_table";
        }
        $query = $this->db->query($sql_query);
        return $this->$query->num_rows();
    }

    public function getById($id){
        $this->db->where("CATEID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function findId($user,$string_category){
        $list_category = $this->getArticleCateByUserId($user);
        foreach ($list_category as $key => $value) {
          // code...
          $string_search = convert_url($value['CATENAME']);
          if($string_search == $string_category) {
            return $value['CATEID'];
          }
        }
    }

    public function getArticleCateByUserId($uid){
        $this->db->where("USERID", $uid);
        $this->db->where("CATETYPE", 'article');
        return $this->db->get($this->_table)->result_array();
    }

    public function getArticleCateNameById($id){
        $this->db->select('CATENAME');
        $this->db->where("CATEID", $id);
        $this->db->where("CATETYPE", 'article');
        return $this->db->get($this->_table)->row_array();
    }

    public function getInfoCateNameById($id){
        $this->db->select('CATENAME');
        $this->db->where("CATEID", $id);
        $this->db->where("CATETYPE", 'info');
        return $this->db->get($this->_table)->row_array();
    }

    public function getParentById($id){
        $this->db->select('CAT_CATEID');
        $this->db->where("CATEID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByParent($user,$idparent){
        $this->db->where("USERID", $user);
        $this->db->where("CAT_CATEID", $idparent);
        return $this->db->get($this->_table)->result_array();
    }

    public function getSortByParent($user,$idparent,$where=null,$type_sort=null,$show=null){
        $this->db->where("USERID", $user);
        $this->db->where("CAT_CATEID", $idparent);
        if(isset($show)) $this->db->where("CATESHOWMENU", 1);
        if($where && $type_sort) $this->db->order_by($where,$type_sort);
        return $this->db->get($this->_table)->result_array();
    }

    public function getSortByParentForType($user,$idparent,$type=null,$where=null,$type_sort=null){
        $this->db->where("USERID", $user);
        $this->db->where("CAT_CATEID", $idparent);
        if($type) $this->db->where("CATETYPE", $type);
        if($where && $type_sort) $this->db->order_by($where,$type_sort);
        return $this->db->get($this->_table)->result_array();
    }

    public function insertCate($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateCate($data_update, $id){
        $this->db->where("CATEID", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteCate($id){
        $this->db->where("CATEID", $id);
        return $this->db->delete($this->_table);
    }

    public function findNodeLevel($id,$level=1) {
        $findIt = $this->getParentById($id);
        if($findIt['CAT_CATEID'] == 0) {
          return $level;
        } else {
          return $this->findNodeLevel($findIt['CAT_CATEID'],$level+1);
        }
    }

    public function getListOnlyRoot() {
        $findIt = $this->getList();
        foreach ($findIt as $key => $value) {
          // code...
          if($value['CATEID'] == $value['CAT_CATEID']) {
            array_push($this->_arr,$findIt[$key]);
          }
        }
        return $this->_arr;
    }

    public function getListOnlyNode($user) {
        $findIt = $this->getByParent($user);
        foreach ($findIt as $key => $value) {
          // code...
          if($value['CATEID'] != $value['CAT_CATEID']) {
            array_push($this->_arr,$findIt[$key]);
          }
        }
        return $this->_arr;
    }

    public function hasChild($user,$id) {
        $findIt = $this->getByParent($user,$id);
        if(count($findIt) >= 1) {
          return TRUE;
        } else {
          return FALSE;
        }
    }

    public function returnCategories($user,$type='info') {
        $query = $this->getSortByParentForType($user,0,$type,'CATEID','ASC');
        if (count($query) > 0) {
          foreach ($query as $key => $node) {
            // code...
            array_push($this->_arr,$query[$key]); // Trả lại tất cả menu cha
            $this->getSubmenu($user,$node['CATEID']); // Nếu có menu con thì sẽ được hiển thị
          }
        }
        return $this->_arr;
    }

    public function getSubmenu($user,$parent_id) {
    	$query = $this->getByParent($user,$parent_id);
    	if (count($query) > 0) {
        foreach ($query as $key => $node) {
          // code...
          array_push($this->_arr,$query[$key]);
          $this->getSubmenu($user,$node['CATEID']);
        }
    	}
      return $this->_arr;
    }
}
