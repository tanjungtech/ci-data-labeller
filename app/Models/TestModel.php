<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class TestModel extends Model {
    protected $table = 'datatest';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'description', 'created_at'];
}

// class Datatest extends CI_Model {
//     private $_table = "datatest";

//     use CodeIgniter\Model;
 
//     class ProductModel extends Model {
//         protected $table = 'product';
//         protected $primaryKey = 'product_id';
//         protected $allowedFields = ['product_name','product_price'];
//     }

//     // public function save()
//     // {
//     //     $post = $this->input->post();
//     //     $this->product_id = uniqid();
//     //     $this->name = $post["name"];
//     //     $this->price = $post["price"];
//     //     $this->description = $post["description"];
//     //     return $this->db->insert($this->_table, $this);
//     // }

//     // public function update()
//     // {
//     //     $post = $this->input->post();
//     //     $this->product_id = $post["id"];
//     //     $this->name = $post["name"];
//     //     $this->price = $post["price"];
//     //     $this->description = $post["description"];
//     //     return $this->db->update($this->_table, $this, array('product_id' => $post['id']));
//     // }

//     // public function delete($id)
//     // {
//     //     return $this->db->delete($this->_table, array("product_id" => $id));
//     // }
// }