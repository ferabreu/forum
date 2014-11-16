<?php

class ThreadModel extends Model
{

    private $_categoryId;
    private $_threadId;
    private $_userId;
    private $_title;

    public function getThreadList($id)
    {
        $sql = "SELECT
                    t.id,
                    t.category_id,
                    t.user_id,
                    t.title
                FROM
                    thread t
                INNER JOIN
                    category c
                    ON t.category_id = c.id
                WHERE
                    t.category_id = ?
                ORDER BY
                    t.id";
        
        $this->_setSql($sql);
        $thread = $this->getAll(array($id));
        
        if (empty($thread))
        {
            return false;
        }
        
        return $thread;
    }

    public function setCategoryId($categoryId)
    {
        $this->_categoryId = $categoryId;
    }

    public function setUserId($userId)
    {
        $this->_userId = $userId;
    }
     
    public function setTitle($title)
    {
        $this->_title = $title;
    }
      
    public function store()
    {
        $sql = "INSERT INTO thread
                    (category_id, user_id, title)
                VALUES
                    (?, ?, ?)";
         
        $data = array(
            $this->_categoryId,
            $this->_userId,
            $this->_title
        );
         
        $sth = $this->_db->prepare($sql);
        $check = $sth->execute($data);
        return $this->_db->lastInsertId();
    }
}
