<?php

namespace Arden;

class ProductsController extends BaseController
{
    public function __construct()
    {
        $model = new ProductsModel();
        $this->modelData = $model->getData();

    }

    public function getModelData() {
        return $this->modelData;
    }

    public function insertData($name, $email, $msg) { 
    	$model = new ProductsModel();  
    	$this->insertData = $model->insertData($name, $email, $msg);    
		return $this->insertData;
    }
}