<?php

class UserModel extends Model
{

    private $_userId;
    private $_username;
    private $_email;


    public function getUserList()
    {
        $sql = "SELECT
                    u.id,
                    u.username,
                    u.password,
                    u.email
                FROM
                    user u";
        
        $this->_setSql($sql);
        $user = $this->getAll();
        
        if (empty($user))
        {
            return false;
        }
        
        return $user;
    }
    
    public function getUserById($id)
    {
        $sql = "SELECT
                    u.id,
                    u.username,
                    u.password,
                    u.email
                FROM
                    user u
                WHERE
                    u.id = ?";
        
        $this->_setSql($sql);
        $user = $this->getAll(array($id));
        
        if (empty($user))
        {
            return false;
        }
        
        return $user;
    }
    
    public function getUserByUsername($username)
    {
        $sql = "SELECT
                    u.id,
                    u.username,
                    u.password,
                    u.email
                FROM
                    user u
                WHERE
                    u.username = ?";
        
        $this->_setSql($sql);
        $user = $this->getAll(array($username));
        
        if (empty($user))
        {
            return false;
        }
        
        return $user;
    }
    
    public function setUserId($userId)
    {
        $this->_userId = $userId;
    }

    public function setUsername($username)
    {
        $this->_username = $username;
    }
     
    public function setEmail($email)
    {
        $this->_email = $email;
    }
    
    public function setPassword($password)
    {
        $hasher = new PasswordHash($hash_cost_log2, $hash_portable);
        $hash = $hasher->HashPassword($password);
        /*if (strlen($hash) < 20)
        	fail('Failed to hash new password');*/
        unset($hasher);

        $this->_password = $hash;
    }
      
    public function store()
    {
        $sql = "INSERT INTO user
                    (username, email, password)
                VALUES
                    (?, ?, ?)";
         
        $data = array(
            $this->_username,
            $this->_email,
            $this->_password
        );
         
        $sth = $this->_db->prepare($sql);
        $check = $sth->execute($data);
        return $this->_db->lastInsertId();
    }
}
