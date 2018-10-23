<?php
class Mposts extends CI_Model{
    protected $_table = 'ARTICLE';
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

    public function getLatestList(){
        $this->db->select('*');
        $this->db->order_by('ARTICLEID', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    public function getPageByCategory($cate_id){
        $this->db->select('*');
        $this->db->where('CATEID', $cate_id);
        $this->db->where('ARTICLETYPE', 'page');
        $this->db->order_by('ARTICLEID', 'DESC');
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

    public function getFiveLatestPosts(){
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
        $this->db->where("ARTICLEID", $id);
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

    public function getCountView() {
        $this->db->select_sum('ARTICLECOUNT');
        return $this->db->get($this->_table)->row()->ARTICLECOUNT;
    }

    public function getCountPost() {
        $this->db->select('*');
        $this->db->where('ARTICLETYPE', 'article');
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
          $string_search = convert_vi($value['ARTICLETITLE']);
          if($string_search == $string_post) {
            return $value['ARTICLEID'];
          }
        }
    }

    public function findCategory($string_post){
        $list_post = $this->getLatestList();
        foreach ($list_post as $key => $value) {
          // code...
          $string_search = convert_vi($value['ARTICLETITLE']);
          if($string_search == $string_post) {
            return $value['CATEID'];
          }
        }
    }

    public function insertArticle($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateArticle($data_update, $id){
        $this->db->where("ARTICLEID", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteArticle($id){
        $this->db->where("ARTICLEID", $id);
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
