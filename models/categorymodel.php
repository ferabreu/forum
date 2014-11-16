<?php

class CategoryModel extends Model
{

    private $_categoryId;

    public function getCategoryList()
    {
        $sql = "SELECT
                    c.id,
                    c.subject,
                    c.description
                FROM
                    category c";
        
        $this->_setSql($sql);
        $category = $this->getAll();
        
        if (empty($category))
        {
            return false;
        }
        
        return $category;
    }
}
