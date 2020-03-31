<?php

class PostModel extends CI_Model{
    public function get_posts($limit, $offset) {
		
        if ($offset > 0) { //create offset using limit
            $offset = ($offset - 1) * $limit;
        }
		
        $result['rows'] = $this->db->get('posts', $limit, $offset); //get data from posts table using limit and offset
        $result['num_rows'] = $this->db->count_all_results('posts'); //count all data from table posts
		
        return $result; //return value to controller
    }

    public function add_new_post($data){
        //get the data from controller and insert into the table 'posts'
        return $this->db->insert('posts', $data);
    }

    public function get_single_post($id){
			//create a join query using the data send from controller
			$this->db->select('a.*,b.name'); 
            $this->db->from('posts a');            
            $this->db->join('users b', 'b.id = a.user_id', 'left'); 
            $this->db->where('a.id', $id);
            //get the value from tables using join query and return to controller
            $query = $this->db->get();
            return $query->row_array();
	}

	public function updatepost($post, $id){
		    //search the id in posts table which sends from controller and update the rows with new post values
			$this->db->where('posts.id', $id);
			return $this->db->update('posts', $post);
	}

	public function deletepost($id){
		    //delete the entire row of id from posts table which sends from controller 
			$this->db->where('posts.id', $id);
			return $this->db->delete('posts');
	}

	public function get_count_post() {
        return $this->db->count_all('posts');
    }

}
