<?php
class Menu extends CI_Model{
    protected $_table = 'MENU';
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
        $this->db->where("MENUID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByUser($uid){
        $this->db->where("USERID", $uid);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByType($type='primary'){
        $this->db->where("MENUTYPE", $type);
        return $this->db->get($this->_table)->result_array();
    }

    public function getTypeByUser($uid){
        $this->db->distinct();
        $this->db->select('MENUTYPE');
        $this->db->where("USERID", $uid);
        return $this->db->get($this->_table)->result_array();
    }

    public function findId($string_menu){
        $list_menu = $this->getList();
        foreach ($list_menu as $key => $value) {
          // code...
          $string_search = convert_url($value['MENUNAME']);
          if($string_search == $string_menu) {
            return $value['MENUID'];
          }
        }
    }

    public function getNameById($id){
        $this->db->select('MENUNAME');
        $this->db->where("MENUID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getParentById($id){
        $this->db->select('MENUPARENT');
        $this->db->where("MENUID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByParent($idparent){
        $this->db->where("MENUPARENT", $idparent);
        return $this->db->get($this->_table)->result_array();
    }

    public function getSortByParent($uid,$idparent,$type=null,$where=null,$type_sort=null){
        $this->db->where("USERID", $uid);
        $this->db->where("MENUPARENT", $idparent);
        if(isset($type)) $this->db->where("MENUTYPE", $type);
        if(isset($where) && isset($type_sort)) $this->db->order_by($where,$type_sort);
        $this->db->order_by("MENUTYPE","ASC");
        return $this->db->get($this->_table)->result_array();
    }

    public function insertMenu($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateMenu($data_update, $id){
        $this->db->where("MENUID", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteMenu($id){
        $this->db->where("MENUID", $id);
        return $this->db->delete($this->_table);
    }

    public function findNodeLevel($id,$level=1) {
        $findIt = $this->getParentById($id);
        if($findIt['MENUPARENT'] == 0) {
          return $level;
        } else {
          return $this->findNodeLevel($findIt['MENUPARENT'],$level+1);
        }
    }

    public function getListOnlyRoot() {
        $findIt = $this->getList();
        foreach ($findIt as $key => $value) {
          // code...
          if($value['MENUID'] == $value['MENUPARENT']) {
            array_push($this->_arr,$findIt[$key]);
          }
        }
        return $this->_arr;
    }

    public function getListOnlyNode() {
        $findIt = $this->getByParent();
        foreach ($findIt as $key => $value) {
          // code...
          if($value['MENUID'] != $value['MENUPARENT']) {
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
        $query = $this->getSortByParent(0,'MENUID','ASC');
        if (count($query) > 0) {
          if($type == 'menu') {
            // Hiển thị dữ liệu từ database
            foreach ($query as $key => $node) {
              // code...
              // Trả lại tất cả menu cha
              if($this->hasChild($node['MENUID'])) {
                echo '<li>
                <a href="'.base_url('article/category/'.$node['MENUID']).'" class="dropdown-toggle" data-toggle="dropdown">'.$node['MENUNAME'].' <b class="caret"></b></a>';
              } else {
                  echo '<li><a href="'.base_url('article/category/'.$node['MENUID']).'">' . $node['MENUNAME'] . '</a>';
              }
              $this->getSubmenu($node['MENUID'],'menu'); // Nếu có menu con thì sẽ được hiển thị
              echo '</li>';
            }
          } else {
            foreach ($query as $key => $node) {
              // code...
              array_push($this->_arr,$query[$key]); // Trả lại tất cả menu cha
              $this->getSubmenu($node['MENUID']); // Nếu có menu con thì sẽ được hiển thị
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
            if($this->hasChild($node['MENUID'])) {
                echo '<li class="dropdown-submenu">
                  <a href="'.base_url('article/category/'.$node['MENUID']).'">' . $node['MENUNAME'] . '</a>';
            } else {
                echo '<li><a href="'.base_url('article/category/'.$node['MENUID']).'">' . $node['MENUNAME'] . '</a>';
            }
      			$this->getSubmenu($node['MENUID'],'menu');
      			echo '</li>';
          }
      		echo '</ul>';
        } else {
          foreach ($query as $key => $node) {
            // code...
            array_push($this->_arr,$query[$key]);
      			$this->getSubmenu($node['MENUID']);
          }
        }
    	}
      if($type == 'arr') return $this->_arr;
    }
}
