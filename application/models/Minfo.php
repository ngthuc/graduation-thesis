<?php
class Minfo extends CI_Model{
    protected $_table = 'INFO';
    protected $_arr = array();

    public function __construct(){
        parent::__construct();
    }

    public function getInfo($where = null, $id = null){
        $this->db->select('*');
        if ($where && $id) {
            $this->db->where($where, $id);
        }
        return $this->db->get($this->_table)->result_array();
    }

    public function getInfoByUser($user,$type,$title=null){
        $this->db->select('*');
        $this->db->where('USERID', $user);
        $this->db->where('INFOTYPE', $type);
        if(isset($title)) {
            $this->db->where('INFOTITLE', $title);
            return $this->db->get($this->_table)->row_array();
        }
        return $this->db->get($this->_table)->result_array();
    }

    public function getPersonInfoByUser($user = null){
        $this->db->select('*');
        $this->db->where('USERID', $user);
        $this->db->where('INFOTYPE', 'person');
        return $this->db->get($this->_table)->result_array();
    }

    public function getScienceResearhByUser($user = null){
        $this->db->select('*');
        $this->db->where('USERID', $user);
        $this->db->where('INFOTYPE', 'research');
        $this->db->order_by('INFOID', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    public function getLatestList(){
        $this->db->select('*');
        $this->db->order_by('INFOID', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    public function getPageByCategory($cate_id){
        $this->db->select('*');
        $this->db->where('CATEID', $cate_id);
        $this->db->where('INFOTYPE', 'page');
        $this->db->order_by('INFOID', 'DESC');
        $this->db->limit(1,0);
        return $this->db->get($this->_table)->row_array();
    }

    public function getLatestPosts($limit=6,$start=0,$order_name = 'ARTICLEID',$order_type = 'DESC',$where = null, $id = null){
        $this->db->select('*');
        if ($where && $id) {
            $this->db->where($where, $id);
        }
        $this->db->where('ARTICLETYPE', 'article');
        $this->db->order_by($order_name, $order_type);
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    }

    public function getFiveLatestArticle(){
        $this->db->select('*');
        $this->db->where('ARTICLETYPE', 'article');
        $this->db->order_by('ARTICLEID', 'DESC');
        $this->db->limit(5,0);
        return $this->db->get($this->_table)->result_array();
    }

    public function getFiveMostView(){
        $this->db->select('*');
        $this->db->where('ARTICLETYPE', 'article');
        $this->db->order_by('ARTICLECOUNT', 'DESC');
        $this->db->limit(5,0);
        return $this->db->get($this->_table)->result_array();
    }

    public function getById($id){
        $this->db->where("INFOID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByAuthor($user, $limit=null, $start=null){
        $this->db->where("USERID", $user);
        $this->db->where('ARTICLETYPE', 'article');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    }

    public function getByCategory($idcate, $limit=null, $start=null){
        $this->db->where("CATEID", $idcate);
        $this->db->where('ARTICLETYPE', 'article');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    }

    public function getPopularOfCategory(){
        $this->db->distinct();
        $this->db->select('CATEID');
        $this->db->order_by("CATEID", "ASC");
        $this->db->limit(6,0);
        return $this->db->get($this->_table)->result_array();
    }

    public function getPopularOfAuthor(){
        $this->db->distinct();
        $this->db->select('USERID');
        $this->db->order_by("USERID", "ASC");
        $this->db->limit(5,0);
        return $this->db->get($this->_table)->result_array();
    }

    public function countAll(){
        return $this->db->count_all($this->_table);
    }

    public function countPersonInfo() {
        $this->db->select('*');
        $this->db->where('INFOTYPE', 'person');
        return $this->db->get($this->_table)->num_rows();
    }

    public function getNumRowsLatestPost($order_name = 'ARTICLEID',$order_type = 'DESC',$where = null, $id = null,$limit = null,$start = null) {
        $this->db->select('*');
        if ($where && $id) {
            $this->db->where($where, $id);
        }
        $this->db->where('ARTICLETYPE', 'article');
        $this->db->order_by($order_name, $order_type);
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->num_rows();
    }

    public function getNumRowsByAuthor($user, $limit = null,$start = null){
        $this->db->where("USERID", $user);
        $this->db->where('ARTICLETYPE', 'article');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->num_rows();
    }

    public function getNumRowsByCategory($idcate, $limit = null,$start = null){
        $this->db->where("CATEID", $idcate);
        $this->db->where('ARTICLETYPE', 'article');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->num_rows();
    }

    public function findId($string_post){
        $list_post = $this->getLatestList();
        foreach ($list_post as $key => $value) {
          // code...
          $string_search = convert_url($value['ARTICLETITLE']);
          if($string_search == $string_post) {
            return $value['ARTICLEID'];
          }
        }
    }

    public function findCategory($string_post){
        $list_post = $this->getLatestList();
        foreach ($list_post as $key => $value) {
          // code...
          $string_search = convert_url($value['ARTICLETITLE']);
          if($string_search == $string_post) {
            return $value['CATEID'];
          }
        }
    }

    public function insertInfo($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateInfoById($data_update, $id){
        $this->db->where("INFOID", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function updatePersonInfoByUserAndKey($data_update, $uid, $key){
        $this->db->where("USERID", $uid);
        $this->db->where("INFOTITLE", $key);
        $this->db->update($this->_table, $data_update);
    }

    public function updateMultiInfo($data_update){
      $num_rows = $this->countPersonInfo();
      foreach ($data_update as $key => $data) {
        // code...
        if($num_rows > 0) {
          // code...
          $uid = $data['USERID'];
          $key = $data['INFOTITLE'];
          $this->updateInfoById($data,get_person_info_id($uid,$key));
        } else {
          // code...
          $this->insertInfo($data);
        }
      }
    }

    public function deleteInfo($id){
        $this->db->where("INFOID", $id);
        return $this->db->delete($this->_table);
    }

    public function hasView($id){
        $Post = $this->getById($id);
        return $Post['ARTICLECOUNT'];
    }

    public function updateCountView($id){
        $_current_view = ($this->hasView($id) == NULL) ? 0 : $this->hasView($id);
        $_update_view = array('ARTICLECOUNT' => ($_current_view + 1));
        $this->db->where("ARTICLEID", $id);
        $this->db->update($this->_table, $_update_view);
    }
}
