<?php

class ThreadController extends Controller
{
    public function __construct($model, $action)
    {
        parent::__construct($model, $action);
        $this->_setModel($model);
    }
    
    public function index($id)
    {
        try {
            
            $thread = $this->_model->getThreadList($id);
            
            if ($thread)
            {
                $this->_setView('index');
                $this->_view->set('id', $id);
                $this->_view->set('thread', $thread);
                $this->_view->set('title', 'F O R U M');
            }
            else
            {
                $this->_view->set('title', 'Invalid thread id');
                //$this->_view->set('noThread', true);
            }
            
            return $this->_view->output();
            
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }

    public function threading($id)
    {
        $this->_view->set('id', $id);
        $this->_view->set('title', 'F O R U M');
        return $this->_view->output();
    }
    
    public function save($id)
    {
        if (!isset($_POST['threadFormSubmit']))
        {
            header('Location: /thread/threading');
        }
         
        $errors = array();
        $check = true;
             
        $categoryId = $id;
        $userId = isset($_POST['user_id']) ? trim($_POST['user_id']) : "";
        $title = isset($_POST['title']) ? trim($_POST['title']) : "";
        $contents = isset($_POST['contents']) ? trim($_POST['contents']) : "";
        
        if (empty($categoryId))
        {
            $check = false;
            array_push($errors, "Category Id is required!");
        }
        
        if (empty($userId))
        {
            $check = false;
            array_push($errors, "User Id is required!");
        }
             
        if (empty($title))
        {
            $check = false;
            array_push($errors, "Title is required!");
        }
        
        if (empty($contents))
        {
            $check = false;
            array_push($errors, "Message is required!");
        }
     
        if (!$check)
        {
            $this->_setView('threading');
            $this->_view->set('title', 'Invalid form data!');
            $this->_view->set('errors', $errors);
            $this->_view->set('formData', $_POST);
            return $this->_view->output();
        }
             
        try {
                     
            $thread = new ThreadModel();
            $thread->setCategoryId($categoryId);
            $thread->setUserId($userId);
            $thread->setTitle($title);
            $threadId = $thread->store();
            
            /*$post = new PostModel();
            $post->setThreadId($threadId);
            $post->setUserId($userId);
            $post->setContents($contents);
            $post->store();*/
            
            $post = new PostController('Post', $threadId);
            $post->_model->setThreadId($threadId);
            $post->_model->setUserId($userId);
            $post->_model->setContents($contents);
            $post->_model->store();
            /*$post->_model->getPostList($threadId);
            $post->_setView('index');
            $post->_view->set('id', $threadId);
            $post->_view->set('post', $post->_model);
            $post->_view->set('title', 'F O R U M');*/

            /*$this->_setModel('Post');
            $post = $this->_model->getPostList($id);
            printf($post);
            $this->_setView('index');
            $this->_view->set('id', $id);
            $this->_view->set('post', $post);
            $this->_view->set('title', 'F O R U M');*/
            
            /*$postData = array(
                'threadId' => $threadId,
                'userId' => $userId,
                'contents' => $contents
            );
                     
            $post->_view->set('postData', $postData);*/
            
            $data = array(
                'threadId' => $threadId,
                'userId' => $userId,
                'title' => $title,
                'contents' => $contents
            );
                     
            $this->_view->set('threadData', $data);
                     
        } catch (Exception $e) {
            $this->_setView('threading');
            $this->_view->set('id', $id);
            $this->_view->set('title', 'There was an error saving the thread!');
            $this->_view->set('formData', $_POST);
            $this->_view->set('saveError', $e->getMessage());
        }
     
        //return $post->_view->output();
        return $post->index($threadId);
    }
}
