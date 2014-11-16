<?php

class UserController extends Controller
{
    public function __construct($model, $action)
    {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }
    
    public function index()
    {
        try {
            
            $user = $this->_model->getUser();
            $this->_view->set('user', $user);
            $this->_view->set('title', 'F O R U M');
            
            return $this->_view->output();
            
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
    
    public function signup()
    {
        $this->_view->set('title', 'F O R U M');
        return $this->_view->output();
    }
    
    public function save()
    {
        if (!isset($_POST['userformsubmit']))
        {
            header('Location: /forum/user/signup');
        }
         
        $errors = array();
        $check = true;
             
        //$threadId = isset($_POST['thread_id']) ? trim($_POST['thread_id']) : "";
        //$threadId = $id;
        //$userId = isset($_POST['user_id']) ? trim($_POST['user_id']) : "";
        //$contents = isset($_POST['contents']) ? trim($_POST['contents']) : "";
        $username        = isset($_POST['username']) ? trim($_POST['username']) : "";
        $email           = isset($_POST['email']) ? trim($_POST['email']) : "";
        $password        = isset($_POST['password']) ? trim($_POST['password']) : "";
        $passwordConfirm = isset($_POST['passwordconfirm']) ? trim($_POST['passwordconfirm']) : "";
        
        /*if (!isset($_POST['username']))
        {
            $check = false;
            array_push($errors, "Username is required.");
        }    
        if (!isset($_POST['email']))
        {
            $check = false;
            array_push($errors, "Email is required.");
        }
        if (!isset($_POST['password']))
        {
            $check = false;
            array_push($errors, "Password is required.");
        }
        if (!isset($_POST['passwordconfirm']))
        {
            $check = false;
            array_push($errors, "Passwords don't match'.");
        }*/
        
        if (empty($_POST['username']))
        {
            $check = false;
            array_push($errors, "Username is required.");
        }    
        if (empty($_POST['email']))
        {
            $check = false;
            array_push($errors, "Email is required.");
        }
        if (empty($_POST['password']))
        {
            $check = false;
            array_push($errors, "Password is required.");
        }
        else if ($passwordConfirm !== $password)
        {
            $check = false;
            array_push($errors, "Passwords don't match'.");
        }
        
        if (!$check)
        {
            $this->_setView('signup');
            $this->_view->set('title', 'Invalid form data!');
            $this->_view->set('errors', $errors);
            $this->_view->set('formData', $_POST);
            return $this->_view->output();
        }
        
        $category = new CategoryController('Category', 'index');
             
        try {
            $user = new UserModel();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($password);
            $userId = $user->store();
                     
            /*$this->_setView('success');
            $this->_view->set('title', 'Store success!');
            //$user = $this->_model->getPostList($id);
            $this->_setView('index');
            $this->_view->set('id', $userId);
            $this->_view->set('user', $user);
            $this->_view->set('title', 'F O R U M');*/
            


            $data = array(
                'username' => $username,
                'email' => $email
            );
                     
            $this->_view->set('userData', $data);
                     
        } catch (Exception $e) {
            $this->_setView('signup');
            $this->_view->set('title', 'There was an error saving the user data.');
            $this->_view->set('formData', $_POST);
            $this->_view->set('saveError', $e->getMessage());
        }
     
        return $category->index();
    }
}
