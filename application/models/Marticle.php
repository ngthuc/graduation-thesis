<?php
class Marticle extends CI_Model{
    protected $_table = 'article';
    protected $_arr = array();

    public function __construct(){
        parent::__construct();
    }

    public function getPosts($where = null, $id = null){
        $this->db->select('*');
        if ($where && $id) {
            $this->db->where($where, $id);
        }
        return $this->db->get($this->_table)->result_array();
    }

    public function getLatestList($user){
        $this->db->select('*');
        $this->db->where('userId', $user);
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

    public function getLatestPosts($limit=6,$start=0,$order_name = 'id',$order_type = 'DESC',$where = null, $id = null){
        $this->db->select('*');
        if ($where && $id) {
            $this->db->where($where, $id);
        }
        $this->db->where('type', 'article');
        $this->db->order_by($order_name, $order_type);
        if(isset($limit)) $this->db->limit($limit,$start);
        return $this->db->get($this->_table)->result_array();
    }

    public function getFiveLatestArticle(){
        $this->db->select('*');
        $this->db->where('type', 'article');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5,0);
        return $this->db->get($this->_table)->result_array();
    }

    public function getFiveMostView(){
        $this->db->select('*');
        $this->db->where('type', 'article');
        $this->db->order_by('count', 'DESC');
        $this->db->limit(5,0);
        return $this->db->get($this->_table)->result_array();
    }

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

    public function getByCategory($idcate, $limit=null, $start=null){
        $this->db->where("cateId", $idcate);
        $this->db->where('type', 'article');
        if(isset($limit)) $this->db->limit($limit,$start);
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

    public function getCountView() {
        $this->db->select_sum('count');
        return $this->db->get($this->_table)->row()->count;
    }

    public function getCountPost() {
        $this->db->select('*');
        $this->db->where('type', 'article');
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

    public function findId($user,$string_post){
        $list_post = $this->getLatestList($user);
        foreach ($list_post as $key => $value) {
          // code...
          $string_search = convert_url($value['title']);
          if($string_search == $string_post) {
            return $value['id'];
          }
        }
    }

    public function findCategory($user,$string_post){
        $list_post = $this->getLatestList($user);
        foreach ($list_post as $key => $value) {
          // code...
          $string_search = convert_url($value['title']);
          if($string_search == $string_post) {
            return $value['cateId'];
          }
        }
    }

    public function insertArticle($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateArticle($data_update, $id){
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteArticle($id){
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
