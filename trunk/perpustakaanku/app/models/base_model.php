<?php
/**
 * satiri.a@gmail.com
 * Database CRUD Model
 */
class Base_model extends Model {

    var $table_name;
    var $field_id;

	var $references;
	
    function __construct()
    {
        parent::Model();
		$this->references = array();
    }
	
	function add_reference($table_name,$ref_field,$this_field,$join_type="inner")
	{
		$this->references[] = array($table_name,$ref_field,$this_field,$join_type);
	}
	
    function init($table_name,$id_field)
    {
        $this->table_name = $table_name;
        $this->field_id = $id_field;
    }

    /**
     *
     * @param array $data
     */
    function save($data)
    {
		if(is_object($data))
		{
			$data = (array)$data;
		}
		
        $data["tgl_input"] = date("Y-m-d H:i:s");
        $data["ip_input"] = $_SERVER["HTTP_HOST"];
		$data["id_user"] = $this->session->userdata("id_user");
        $id = $this->db->insert($this->table_name,$data);
		return $id;
    }

    function delete($id)
    {
        $where = array("$this->field_id"=>$id);
        $result = $this->db->delete($this->table_name,$where);
		return $result;
    }

	function get_all($order_by=null)
	{
        $this->db->select("*")
                 ->from($this->table_name);
		
		if($order_by!=null)
		{
			$this->db->order_by($order_by,"asc");
		}
		
		if(count($this->references)>0)
		{
			foreach($this->references as $ref)
			{
				$table_name = $ref[0];
				$join = $ref[0].".".$ref[1]."=".$this->table_name.".".$ref[2];
				$this->db->join($table_name,$join,$ref[3]);
			}
		}
		
        $rec = $this->db->get();
		
		if($rec->num_rows()>0)
        {
            return $rec->result();
        }

        return FALSE;
	}
	
    /**
     * 
     * @param int $id
     * @return resultset
     */
    function get_by_id($id)
    {
        $where = array("$this->field_id"=>$id);
        $this->db->select("*")
                 ->from($this->table_name)
                 ->where($where);
				 
		if(count($this->references)>0)
		{
			foreach($this->references as $ref)
			{
				$table_name = $ref[0];
				$join = $ref[0].".".$ref[1]."=".$this->table_name.".".$ref[2];
				$this->db->join($table_name,$join,$ref[3]);
			}
		}
				 
        $rec = $this->db->get();

        if($rec->num_rows()>0)
        {
            return $rec->result();
        }

        return FALSE;
    }

	function get_like($field,$value)
	{
		$this->db->like($field,$value);
		
		if(count($this->references)>0)
		{
			foreach($this->references as $ref)
			{
				$table_name = $ref[0];
				$join = $ref[0].".".$ref[1]."=".$this->table_name.".".$ref[2];
				$this->db->join($table_name,$join,$ref[3]);
			}
		}
		
		$rec = $this->db->get($this->table_name); 
		
        if($rec->num_rows()>0)
        {
            return $rec->result();
        }		
	}
	
    /**
     *
     * @param Object $data
     * @param int $id
     */
    function update($data,$id)
    {
        $where = array("$this->field_id"=>$id);
        $this->db->where($where);
        $result = $this->db->update($this->table_name,$data);
		return $result;
    }
	
	function get_count()
	{
		$this->db->select("count(*) as 'c'")
				 ->from($this->table_name);
		$rec = $this->db->get();
		if($rec)
		{
			$row = $rec->row();
			return $row->c;
		}
		else
		{
			return FALSE;
		}
	}
	
	function get_paged($num, $offset)
	{
		$c = $this->get_count();
		
		$this->db->select("*");
		$this->db->from($this->table_name);
		
		if(count($this->references)>0)
		{
			foreach($this->references as $ref)
			{
				$table_name = $ref[0];
				$join = $ref[0].".".$ref[1]."=".$this->table_name.".".$ref[2];
				$this->db->join($table_name,$join,$ref[3]);
			}
		}

		if($num>$c)
		{
			$query = $this->db->get(null,$num);
		}
		else
		{
			$query = $this->db->get(null,$num,$offset);
		}
		
		if($query)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}	
	
}
?>
