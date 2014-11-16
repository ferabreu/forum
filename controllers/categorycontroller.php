<?php

class CategoryController extends Controller
{
    public function __construct($model, $action)
    {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }
    
    public function index()
    {
        try {
            
            $category = $this->_model->getCategoryList();
            $this->_view->set('category', $category);
            $this->_view->set('title', 'F O R U M');
            
            return $this->_view->output();
            
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
}
