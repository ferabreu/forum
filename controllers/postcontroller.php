<?php

class PostController extends Controller
{
    public function __construct($model, $action)
    {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }
    
    public function index($id)
    {
        try {
            
            $post = $this->_model->getPostList($id);
            
            if ($post)
            {
                $this->_setView('index');
                $this->_view->set('id', $id);
                $this->_view->set('post', $post);
                $this->_view->set('title', 'F O R U M');
            }
            else
            {
                $this->_view->set('title', 'Invalid post id');
                //$this->_view->set('noPost', true);
            }
            
            return $this->_view->output();
            
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
    
    public function posting($id)
    {
        $this->_view->set('id', $id);
        $this->_view->set('title', 'F O R U M');
        return $this->_view->output();
    }
    
    public function save($id)
    {
        if (!isset($_POST['postFormSubmit']))
        {
            header('Location: /post/posting');
        }
         
        $errors = array();
        $check = true;
             
        //$threadId = isset($_POST['thread_id']) ? trim($_POST['thread_id']) : "";
        $threadId = $id;
        $userId = isset($_POST['user_id']) ? trim($_POST['user_id']) : "";
        $contents = isset($_POST['contents']) ? trim($_POST['contents']) : "";
        
        if (empty($threadId))
        {
            $check = false;
            array_push($errors, "Thread id is required!");
        }
             
        if (empty($userId))
        {
            $check = false;
            array_push($errors, "User Id is required!");
        }
             
        if (empty($contents))
        {
            $check = false;
            array_push($errors, "Message is required!");
        }
     
        if (!$check)
        {
            $this->_setView('posting');
            $this->_view->set('title', 'Invalid form data!');
            $this->_view->set('errors', $errors);
            $this->_view->set('formData', $_POST);
            return $this->_view->output();
        }
             
        try {
                     
            $post = new PostModel();
            $post->setThreadId($threadId);
            $post->setUserId($userId);
            $post->setContents($contents);
            $post->store();
                     
            /*$this->_setView('success');
            $this->_view->set('title', 'Store success!');*/
            $post = $this->_model->getPostList($id);
            $this->_setView('index');
            $this->_view->set('id', $id);
            $this->_view->set('post', $post);
            $this->_view->set('title', 'F O R U M');
                     
            $data = array(
                'threadId' => $threadId,
                'userId' => $userId,
                'contents' => $contents
            );
                     
            $this->_view->set('postData', $data);
                     
        } catch (Exception $e) {
            $this->_setView('posting');
            $this->_view->set('id', $id);
            $this->_view->set('title', 'There was an error saving the post!');
            $this->_view->set('formData', $_POST);
            $this->_view->set('saveError', $e->getMessage());
        }
     
        return $this->_view->output();
    }
}
