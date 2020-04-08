<?php

class PostModel extends CI_Model{
    public function get_posts($limit, $offset) {
		
        if ($offset > 0) { //create offset using limit
            $offset = ($offset - 1) * $limit;
        }
		
        // $result['rows'] = $this->db->get('posts', $limit, $offset); //get data from posts table using limit and offset
        // $result['num_rows'] = $this->db->count_all_results('posts'); //count all data from table posts
        $query1 = "SELECT * FROM posts LIMIT $limit OFFSET $offset";
        $query2 = "SELECT COUNT(*) FROM posts";

        $result['rows'] = $this->db->query($query1); //get data from users table using limit and offset
        $result['num_rows'] = $this->db->count_all_results('posts'); //count all data from table users
		
        return $result; //return value to controller
    }

    public function add_new_post($data){
        //get the data from controller and insert into the table 'posts'
        $title = $data['title'];
        $body = $data['body'];
        $user_id = $data['user_id'];
        $created = $data['created'];
        $modified = $data['modified'];
        $sql = "INSERT INTO posts(title, body, user_id, created, modified) VALUES('$title', '$body', '$user_id', '$created', '$modified')";
        $query = $this->db->query($sql);
        return $query;
    }

    public function updatepost($post, $id){
		    //search the id in posts table which sends from controller and update the rows with new post values
			$title = $post['title'];
            $body = $post['body'];
            $user_id = $post['user_id'];
            $modified = $post['modified'];
            $sql = "UPDATE posts SET title = '$title', body = '$body', user_id = '$user_id', modified = '$modified' WHERE id = '$id'";
            $query = $this->db->query($sql);
            return $query;
	}

	public function deletepost($id){
		    //delete the entire row of id from posts table which sends from controller 
			$sql = "DELETE FROM posts WHERE id = '$id'";
            $query = $this->db->query($sql);
            return $query;
	}

	public function get_count_post() {
        return $this->db->count_all('posts');
    }

}
