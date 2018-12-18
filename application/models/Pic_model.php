<?php
class Pic_model extends CI_Model{
	
	//fetch all pictures from db
	function get_all_pics(){
		$all_pics = $this->db->get('pictures');
		return $all_pics->result();
	}

	//save picture data to db
	function store_pic_data($data){
		$insert_data['pic_title'] = $data['pic_title'];
		$insert_data['pic_desc'] = $data['pic_desc'];
		$insert_data['pic_file'] = $data['pic_file'];

		$query = $this->db->insert('pictures', $insert_data);
	}

	   public function get_data_by_id($pic_id = 0)
    {
        if ($pic_id === 0)
        {
            $query = $this->db->get('pictures');

            return $query->result_array();
        }
 
        $query = $this->db->get_where('pictures', array('pic_id' => $pic_id));

        return $query->row_array();
    }
    
//codigitor3

    public function delete_pic($pic_id)
    
    {
        $this->db->where('pic_id', $pic_id);

        return $this->db->delete('pictures');
    }
	
}