<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Categories extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\UserModel';
 
    public function index()
    {
        return $this->respond($this->model->select('username, email, fullname')->findAll(), 200);
    }

    public function search()
    {
       
    }

    public function create()
    {
        var_dump($_POST);
        $name   = $this->request->getPost('name');
        return $this->respond($this->model->where('username',$name)->findAll(), 200);
    }
}