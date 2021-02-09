<?php namespace App\Controllers;

    use CodeIgniter\RESTful\ResourceController;
    use CodeIgniter\API\ResponseTrait;
    use App\Models\TestModel;
    
    class Tests extends ResourceController {
        use ResponseTrait;
        // get all product

        public function index() {
            $model = new TestModel();
            $data = $model->findAll();
            // return $this->respond('can hear you', 200);
            return $this->respond($data, 200);
        }
    
        // // get single product
        // public function show($id = null)
        // {
        //     $model = new ProductModel();
        //     $data = $model->getWhere(['product_id' => $id])->getResult();
        //     if($data){
        //         return $this->respond($data);
        //     }else{
        //         return $this->failNotFound('No Data Found with id '.$id);
        //     }
        // }
    
        // // create a product
        // public function create()
        // {
        //     $model = new ProductModel();
        //     $data = [
        //         'product_name' => $this->request->getPost('product_name'),
        //         'product_price' => $this->request->getPost('product_price')
        //     ];
        //     $data = json_decode(file_get_contents("php://input"));
        //     //$data = $this->request->getPost();
        //     $model->insert($data);
        //     $response = [
        //         'status'   => 201,
        //         'error'    => null,
        //         'messages' => [
        //             'success' => 'Data Saved'
        //         ]
        //     ];
            
        //     return $this->respondCreated($data, 201);
        // }
    
        // // update product
        // public function update($id = null)
        // {
        //     $model = new ProductModel();
        //     $json = $this->request->getJSON();
        //     if($json){
        //         $data = [
        //             'product_name' => $json->product_name,
        //             'product_price' => $json->product_price
        //         ];
        //     }else{
        //         $input = $this->request->getRawInput();
        //         $data = [
        //             'product_name' => $input['product_name'],
        //             'product_price' => $input['product_price']
        //         ];
        //     }
        //     // Insert to Database
        //     $model->update($id, $data);
        //     $response = [
        //         'status'   => 200,
        //         'error'    => null,
        //         'messages' => [
        //             'success' => 'Data Updated'
        //         ]
        //     ];
        //     return $this->respond($response);
        // }
    
        // // delete product
        // public function delete($id = null)
        // {
        //     $model = new ProductModel();
        //     $data = $model->find($id);
        //     if($data){
        //         $model->delete($id);
        //         $response = [
        //             'status'   => 200,
        //             'error'    => null,
        //             'messages' => [
        //                 'success' => 'Data Deleted'
        //             ]
        //         ];
                
        //         return $this->respondDeleted($response);
        //     }else{
        //         return $this->failNotFound('No Data Found with id '.$id);
        //     }
            
        // }
    
    }

    // class Testdata extends CI_Controller {
    //     public function __construct()
    //     {
    //         parent::__construct();
    //         $this->load->model("product_model");
    //         $this->load->library('form_validation');
    //     }

    //     public function index()
    //     {
    //         $data["tests"] = $this->datatest_model->getAll();
    //         $this->load->view("test/list", $data);
    //     }

    //     // public function add()
    //     // {
    //     //     $product = $this->product_model;
    //     //     $validation = $this->form_validation;
    //     //     $validation->set_rules($product->rules());

    //     //     if ($validation->run()) {
    //     //         $product->save();
    //     //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     //     }

    //     //     $this->load->view("admin/product/new_form");
    //     // }

    //     // public function edit($id = null)
    //     // {
    //     //     if (!isset($id)) redirect('admin/products');
        
    //     //     $product = $this->product_model;
    //     //     $validation = $this->form_validation;
    //     //     $validation->set_rules($product->rules());

    //     //     if ($validation->run()) {
    //     //         $product->update();
    //     //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     //     }

    //     //     $data["product"] = $product->getById($id);
    //     //     if (!$data["product"]) show_404();
            
    //     //     $this->load->view("admin/product/edit_form", $data);
    //     // }

    //     // public function delete($id=null)
    //     // {
    //     //     if (!isset($id)) show_404();
            
    //     //     if ($this->product_model->delete($id)) {
    //     //         redirect(site_url('admin/products'));
    //     //     }
    //     // }
    // }