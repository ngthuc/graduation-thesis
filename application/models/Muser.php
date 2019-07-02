<?php
class Muser extends CI_Model{
    protected $_table = 'user';

    public function __construct(){
        parent::__construct();
    }

    public function getUsers($order_name = 'id',$order_type = 'DESC',$where = null, $id = null){
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
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByEmail($email){
        $this->db->where("email", $email);
        $this->db->or_where("subEmail", $email);
        return $this->db->get($this->_table)->row_array();
    }

    public function getNumRowsByEmail($email){
        $this->db->where("email", $email);
        $this->db->or_where("subEmail", $email);
        return $this->db->get($this->_table)->num_rows();
    }

    public function getStatusByEmail($email){
        $this->db->select('accounStatus');
        $this->db->where("email", $email);
        $this->db->or_where("subEmail", $email);
        return $this->db->get($this->_table)->row_array();
    }

    public function getStatusByUsername($username){
        $this->db->select('accounStatus');
        $this->db->where("id", $username);
        return $this->db->get($this->_table)->row_array();
    }

    public function getRoleByEmail($email){
        $this->db->select('role');
        $this->db->where("email", $email);
        $this->db->or_where("subEmail", $email);
        return $this->db->get($this->_table)->row_array();
    }

    public function getRoleByUsername($username){
        $this->db->select('role');
        $this->db->where("id", $username);
        return $this->db->get($this->_table)->row_array();
    }

    public function getByRole($role){
        $this->db->where("role", $role);
        return $this->db->get($this->_table)->result_array();
    }

    public function getByStatus($status){
        $this->db->where("accounStatus", $status);
        return $this->db->get($this->_table)->result_array();
    }

    public function getPasswordById($id){
        $this->db->select('password');
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getNameById($id){
        $this->db->select('fullname');
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->row_array();
    }

    public function getIdWhere($where){
        // $where is array
        $this->db->where($where);
        return $this->db->get($this->_table)->result_array();
    }

    public function insertUser($data_insert){
        $this->db->insert($this->_table,$data_insert);
    }

    public function updateUser($data_update, $id){
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data_update);
    }

    public function deleteUser($id){
        $this->db->where("id", $id);
        return $this->db->delete($this->_table);
    }

    public function checkUserWithPass($username,$password)
    {
      $this->db->where('id', $username);
      $this->db->where('password', $password);
      return $this->db->get($this->_table)->num_rows();
    }

    // public function CheckRole( $UserInfo )
    // {
    //   $Role	=	$this->db->select()
    //             ->where('USERID', $UserInfo['USERID'])
    //             ->get($this->_table)
    //             ->row_array();
    //   return (count($Role) > 0) ? $Role['USERROLE'] : false;
    // }
    //
    // public function HasRole( $User, $RoleName )
    // {
    //   return ($RoleName == $this->CheckRole($User)) ? true : false;
    // }
}
