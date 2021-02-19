<?php
    define('PUBPATH',str_replace(SELF,'',FCPATH));
    class Dbclass extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }

        function index()
        {

        }

        function select($tbl)
        {
            $query = $this->db->get($tbl);
            return $query->result_array();
        }

        function select_where($fields, $tbl, $where)
        {
            $this->db->select($fields);
            $this->db->where($where);
            $query = $this->db->get($tbl);
            return $query->result_array();
        }

        function insert($tbl, $data)
        {
            
            unset($data['/super_admin/add_employee_data']);
            unset($data['/super_admin/add_admin_data']);
            unset($data['/admin/add_employee_data']);
            unset($data['/submit']);

            if($this->db->insert($tbl, $data))
            {
                $data = array(
                    'user_email' => $data['reg_email'],
                    'role_id' => $data['role_id']
                );
                
                $this->db->insert('tbl_user_data', $data);
                return TRUE;
            }
        }

        function update($flds, $tbl, $where)
        {
            $this->db->where($where);
            $this->db->update($tbl, $flds);
        }

        function delete_fields($flds, $tbl, $where)
        {
            $this->db->where($where);
            $this->db->update($tbl, $flds);
        }

        function join_role_table()
        {
            $this->db->select('tr.*, ur.user_role');
            $this->db->from('tbl_registration as tr');
            $this->db->join('tbl_user_role as ur',"tr.role_id = ur.role_id");
            $this->db->where('tr.reg_id != 1');
            $this->db->order_by('tr.reg_id','asc');

            $result = $this->db->get();

            
            return $result->result_array();
        }
    }
?>