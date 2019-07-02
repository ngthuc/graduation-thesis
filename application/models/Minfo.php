<?php
class Minfo extends CI_Model{
    protected $_table = 'info';
    protected $_arr = array();

    public function __construct(){
        parent::__construct();
    }

    public function getInfo($user,$where = null, $id = null){
        $this->db->select('*');
        $this->db->where('userId', $user);
        if ($where && $id) {
            $this->db->where($where, $id);
        }
        return $this->db->get($this->_table)->result_array();
    }

    public function getSortInfo($user,$where = 'id', $sort = 'ASC'){
        $this->db->select('*');
        $this->db->where('userId', $user);
        $this->db->order_by($where, $sort);
        return $this->db->get($this->_table)->result_array();
    }

    public function getInfoByUser($user,$type=null,$title=null){
        $this->db->select('*');
        $this->db->where('userId', $user);
        if(isset($title)) $this->db->where('type', $type);
        if(isset($title)) {
            $this->db->where('title', $title);
            return $this->db->get($this->_table)->row_array();
        }
        return $this->db->get($this->_table)->result_array();
    }

    public function getInfoDashboardByUser($user,$type=null){
        $this->db->select('*');
        $this->db->where('id', $user);
        $this->db->where('type', $type);
        $this->db->order_by('infoDate','DESC');
        $this->db->limit(5,0);
        return $this->db->get($this->_table)->result_array();
    }

    public function statisticInfo($user=null,$year=null,$type=null,$org=null,$publish=1){
        $this->db->select('*');
        if($user!=null ) $this->db->where('userId', $user);
        if($year!=null) $this->db->where('infoDate', $year);
        if($type!=null) $this->db->where('type', $type);
        if($org!=null) $this->db->where('ownedBy', $org);
        if($publish!=null) $this->db->where('isPublish', $publish);
        return $this->db->get($this->_table)->result_array();
    }

    public function getPersonInfoByUser($user = null){
        $this->db->select('*');
        $this->db->where('userId', $user);
        $this->db->where('isPublish', 0);
        return $this->db->get($this->_table)->result_array();
    }

    public function getScienceResearhByUser($user = null){
        $this->db->select('*');
        $this->db->where('userId', $user);
        $this->db->where('type', 'research');
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    public function getLatestList(){
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    public function getPageByCategory($cate_id){
        $this->db->select('*');
        $this->db->where('cateId', $cate_id);
        $this->db->where('type', 'page');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1,0);
        return $this->db->get($this->_table)->row_array();
    }

//    public function getLatestPosts($limit=6,$start=0,$order_name = 'ARTICLEID',$order_type = 'DESC',$where = null, $id = null){
//        $this->db->select('*');
//        if ($where && $id) {
//            $this->db->where($where, $id);
//        }
//        $this->db->where('ARTICLETYPE', 'article');
//        $this->db->order_by($order_name, $order_type);
//        if(isset($limit)) $this->db->limit($limit,$start);
//        return $this->db->get($this->_table)->result_array();
//    }
//
//    public function getFiveLatestArticle(){
//        $this->db->select('*');
//        $this->db->where('ARTICLETYPE', 'article');
//        $this->db->order_by('ARTICLEID', 'DESC');
//        $this->db->limit(5,0);
//        return $this->db->get($this->_table)->result_array();
//    }
//
//    public function getFiveMostView(){
//        $this->db->select('*');
//        $this->db->where('INFOTYPE', 'article');
//        $this->db->order_by('INFOCOUNT', 'DESC');
//        $this->db->limit(5,0);
//        return $this->db->get($this->_table)->result_array();
//    }

    public function getById($id){
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByAuthor($user, $limit=null, $start=null){
        $this->db->where("userId", $user);
        $this->db->where('type', 'article');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    }

    public function getByCategory($user, $idcate, $limit=null, $start=null,$order_name = null,$order_type = null){
        $this->db->where("userId", $user);
        $this->db->where("cateId", $idcate);
        if(isset($limit)) $this->db->limit($limit,$start);
        if(isset($order_name)) $this->db->order_by($order_name, $order_type);
        return $this->db->get($this->_table)->result_array();
    }

    public function getByType($user, $type, $limit=null, $start=null,$order_name = null,$order_type = null){
        $this->db->where("userId", $user);
        $this->db->where("type", $type);
        if(isset($limit)) $this->db->limit($limit,$start);
        if(isset($order_name)) $this->db->order_by($order_name, $order_type);
        return $this->db->get($this->_table)->result_array();
    }

    public function getPopularOfCategory(){
        $this->db->distinct();
        $this->db->select('cateId');
        $this->db->order_by("cateId", "ASC");
        $this->db->limit(6,0);
        return $this->db->get($this->_table)->result_array();
    }

    public function getPopularOfAuthor(){
        $this->db->distinct();
        $this->db->select('userId');
        $this->db->order_by("userId", "ASC");
        $this->db->limit(5,0);
        return $this->db->get($this->_table)->result_array();
    }

    public function countAll(){
        return $this->db->count_all($this->_table);
    }

    public function countInfo($user) {
        $this->db->select('*');
        $this->db->where("userId", $user);
        return $this->db->get($this->_table)->num_rows();
    }

    public function countPersonInfo($user,$type='person') {
        $this->db->select('*');
        $this->db->where("userId", $user);
        $this->db->where('type', $type);
        return $this->db->get($this->_table)->num_rows();
    }

    public function countInfoByType($user, $type){
        $this->db->select('*');
        $this->db->where("userId", $user);
        $this->db->where("type", $type);
        return $this->db->get($this->_table)->num_rows();
    }

    public function getNumRowsLatestPost($order_name = 'id',$order_type = 'DESC',$where = null, $id = null,$limit = null,$start = null) {
        $this->db->select('*');
        if ($where && $id) {
            $this->db->where($where, $id);
        }
        $this->db->where('type', 'article');
        $this->db->order_by($order_name, $order_type);
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->num_rows();
    }

    public function getNumRowsByAuthor($user, $limit = null,$start = null){
        $this->db->where("userId", $user);
        $this->db->where('type', 'article');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->num_rows();
    }

    public function getNumRowsByCategory($idcate, $limit = null,$start = null){
        $this->db->where("cateId", $idcate);
        $this->db->where('type', 'article');
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->num_rows();
    }

    public function findId($string_post){
        $list_post = $this->getLatestList();
        foreach ($list_post as $key => $value) {
          // code...
          $string_search = convert_url($value['title']);
          if($string_search == $string_post) {
            return $value['id'];
          }
        }
    }

    public function findCategory($string_post){
        $list_post = $this->getLatestList();
        foreach ($list_post as $key => $value) {
          // code...
          $string_search = convert_url($value['title']);
          if($string_search == $string_post) {
            return $value['cateId'];
          }
        }
    }

    public function insertInfo($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateInfoById($data_update, $id){
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function updatePersonInfoByUserAndKey($data_update, $uid, $key){
        $this->db->where("userId", $uid);
        $this->db->where("title", $key);
        $this->db->update($this->_table, $data_update);
    }

    public function updateMultiInfo($data_update){
      $num_rows = $this->countPersonInfo($data_update[0]['userId']); // minimum 1 row
      foreach ($data_update as $key => $data) {
        // code...
        if($num_rows > 0) {
          // code...
          $uid = $data['userId'];
          $key = $data['title'];
          $this->updateInfoById($data,get_person_info_id($uid,$key));
        } else {
          // code...
          $this->insertInfo($data);
        }
      }
    }

    public function deleteInfo($id){
        $this->db->where("id", $id);
        return $this->db->delete($this->_table);
    }

    public function hasView($id){
        $Post = $this->getById($id);
        return $Post['count'];
    }

    public function updateCountView($id){
        $_current_view = ($this->hasView($id) == NULL) ? 0 : $this->hasView($id);
        $_update_view = array('count' => ($_current_view + 1));
        $this->db->where("id", $id);
        $this->db->update($this->_table, $_update_view);
    }
}
