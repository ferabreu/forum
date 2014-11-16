<?php

class PostModel extends Model
{

    private $_threadId;
    private $_postId;
    private $_userId;
    private $_contents;

    public function getPostList($id)
    {
        $sql = "SELECT
                    p.id,
                    p.thread_id,
                    p.user_id,
                    p.contents
                FROM
                    post p
                INNER JOIN
                    thread t
                    ON p.thread_id = t.id
                WHERE
                    p.thread_id = ?
                ORDER BY
                    p.id";
        
        $this->_setSql($sql);
        $post = $this->getAll(array($id));
        
        if (empty($post))
        {
            return false;
        }
        
        return $post;
    }

    public function setThreadId($threadId)
    {
        $this->_threadId = $threadId;
    }
     
    public function setUserId($userId)
    {
        $this->_userId = $userId;
    }
     
    public function setContents($contents)
    {
        $this->_contents = $contents;
    }
      
    public function store()
    {
        $sql = "INSERT INTO post
                    (thread_id, user_id, contents)
                VALUES
                    (?, ?, ?)";
         
        $data = array(
            $this->_threadId,
            $this->_userId,
            $this->_contents
        );
         
        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }
}
