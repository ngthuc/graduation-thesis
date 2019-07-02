<?php
class Menu extends CI_Model{
    protected $_table = 'menu';
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
        if ($where) {
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
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByUser($uid){
        $this->db->where("userId", $uid);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByType($type='primary'){
        $this->db->where("type", $type);
        return $this->db->get($this->_table)->result_array();
    }

    public function getTypeByUser($uid){
        $this->db->distinct();
        $this->db->select('type');
        $this->db->where("userId", $uid);
        return $this->db->get($this->_table)->result_array();
    }

    public function findId($string_menu){
        $list_menu = $this->getList();
        foreach ($list_menu as $key => $value) {
          // code...
          $string_search = convert_url($value['name']);
          if($string_search == $string_menu) {
            return $value['id'];
          }
        }
    }

    public function getNameById($id){
        $this->db->select('name');
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getParentById($id){
        $this->db->select('parentId');
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByParent($idparent){
        $this->db->where("parentId", $idparent);
        return $this->db->get($this->_table)->result_array();
    }

    public function getSortByParent($uid,$idparent,$type=null,$where=null,$type_sort=null){
        $this->db->where("userId", $uid);
        $this->db->where("parentId", $idparent);
        if(isset($type)) $this->db->where("type", $type);
        if(isset($where) && isset($type_sort)) $this->db->order_by($where,$type_sort);
        $this->db->order_by("type","ASC");
        return $this->db->get($this->_table)->result_array();
    }

    public function insertMenu($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateMenu($data_update, $id){
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteMenu($id){
        $this->db->where("id", $id);
        return $this->db->delete($this->_table);
    }

    public function findNodeLevel($id,$level=1) {
        $findIt = $this->getParentById($id);
        if($findIt['parentId'] == 0) {
          return $level;
        } else {
          return $this->findNodeLevel($findIt['parentId'],$level+1);
        }
    }

    public function getListOnlyRoot() {
        $findIt = $this->getList();
        foreach ($findIt as $key => $value) {
          // code...
          if($value['id'] == $value['parentId']) {
            array_push($this->_arr,$findIt[$key]);
          }
        }
        return $this->_arr;
    }

    public function getListOnlyNode() {
        $findIt = $this->getByParent();
        foreach ($findIt as $key => $value) {
          // code...
          if($value['id'] != $value['parentId']) {
            array_push($this->_arr,$findIt[$key]);
          }
        }
        return $this->_arr;
    }

    public function hasChild($id) {
        $findIt = $this->getByParent($id);
        if(count($findIt) >= 1) {
          return TRUE;
        } else {
          return FALSE;
        }
    }

    public function returnCategories($type = 'arr') {
        $query = $this->getSortByParent(0,'id','ASC');
        if (count($query) > 0) {
          if($type == 'menu') {
            // Hiển thị dữ liệu từ database
            foreach ($query as $key => $node) {
              // code...
              // Trả lại tất cả menu cha
              if($this->hasChild($node['id'])) {
                echo '<li>
                <a href="'.base_url('article/category/'.$node['id']).'" class="dropdown-toggle" data-toggle="dropdown">'.$node['name'].' <b class="caret"></b></a>';
              } else {
                  echo '<li><a href="'.base_url('article/category/'.$node['id']).'">' . $node['name'] . '</a>';
              }
              $this->getSubmenu($node['id'],'menu'); // Nếu có menu con thì sẽ được hiển thị
              echo '</li>';
            }
          } else {
            foreach ($query as $key => $node) {
              // code...
              array_push($this->_arr,$query[$key]); // Trả lại tất cả menu cha
              $this->getSubmenu($node['id']); // Nếu có menu con thì sẽ được hiển thị
            }
          }
        }
        if($type == 'arr') return $this->_arr;
    }

    public function getSubmenu($parent_id, $type = 'arr') {
    	$query = $this->getByParent($parent_id);
    	if (count($query) > 0) {
        if($type == 'menu') {
          echo '<ul class="dropdown-menu multi-level">';
          foreach ($query as $key => $node) {
            // code...
            if($this->hasChild($node['id'])) {
                echo '<li class="dropdown-submenu">
                  <a href="'.base_url('article/category/'.$node['id']).'">' . $node['name'] . '</a>';
            } else {
                echo '<li><a href="'.base_url('article/category/'.$node['id']).'">' . $node['name'] . '</a>';
            }
      			$this->getSubmenu($node['id'],'menu');
      			echo '</li>';
          }
      		echo '</ul>';
        } else {
          foreach ($query as $key => $node) {
            // code...
            array_push($this->_arr,$query[$key]);
      			$this->getSubmenu($node['id']);
          }
        }
    	}
      if($type == 'arr') return $this->_arr;
    }
}
