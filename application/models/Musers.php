<?php
class Musers extends CI_Model{
    protected $_table = 'USERS';

    public function __construct(){
        parent::__construct();
    }

    public function getUsers($order_name = 'USERID',$order_type = 'DESC',$where = null, $id = null){
        $this->db->select('*');
        if ($where && $id) {
            $this->db->where($where, $id);
        }
        $this->db->order_by($order_name, $order_type);
        return $this->db->get($this->_table)->result_array();
    }

    public function countAll(){
        return $this->db->count_all($this->_table);
    }

    public function getById($id){
        $this->db->where("USERID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getNameById($id){
        $this->db->select('USERFULLNAME');
        $this->db->where("USERID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByRole($role){
        $this->db->where("USERROLE", $role);
        return $this->db->get($this->_table)->result_array();
    }

    public function getPasswordById($id){
        $this->db->select('USERPASSWORD');
        $this->db->where("USERID", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function insertUser($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateUser($data_update, $id){
        $this->db->where("USERID", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteUser($id){
        $this->db->where("USERID", $id);
        return $this->db->delete($this->_table);
    }

    public function CheckUser( $UserInfo )
    {
      $User	=	$this->db->select()
                ->where('USERID', $UserInfo['USERID'])
                ->where('USERPASSWORD', $UserInfo['USERPASSWORD'])
                ->get($this->_table)
                ->row_array();
      return (count($User) > 0) ? $User : false;
    }

    public function CheckRole( $UserInfo )
    {
      $Role	=	$this->db->select()
                ->where('USERID', $UserInfo['USERID'])
                ->get($this->_table)
                ->row_array();
      return (count($Role) > 0) ? $Role['USERROLE'] : false;
    }

    public function HasRole( $User, $RoleName )
    {
      return ($RoleName == $this->CheckRole($User)) ? true : false;
    }
}
