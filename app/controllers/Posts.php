<?php
class Posts extends Controller {
    public function __construct(){
        // if(!isLoggedIn()){
        //   redirect('users/login');
        // }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }
//========================================================
    public function index(){
        // Get posts
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

//========================================================
    public function insertGetCurl($data){
        $this->postModel->insertMultiPosts($data);
    }

//========================================================
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_POST['form']['user_post'],// $_SESSION['user_id'],
                'created_at' => $_POST['form']['created_at'],
                'title_err' => '',
                'body_err' => ''
            ];

            // Validate data
            if(empty($data['title'])){
                $data['title_err'] = 'Please enter title';
            }
            if(empty($data['body'])){
                $data['body_err'] = 'Please enter body text';
            }

            // Make sure no errors
            if(empty($data['title_err']) && empty($data['body_err'])){
                // Validated
                if($this->postModel->addPost($data)){
                    flash('post_message', 'Post Added');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/add', $data);
            }

        } else {
            $data = [
                'title' => '',
                'body' => ''
            ];

            $this->view('posts/add', $data);
        }
    }
//========================================================
    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'created_at' => $_POST['form']['created_at'],
                'title_err' => '',
                'body_err' => ''
            ];

            // Validate data
            if(empty($data['title'])){
                $data['title_err'] = 'Please enter title';
            }
            if(empty($data['body'])){
                $data['body_err'] = 'Please enter body text';
            }

            // Make sure no errors
            if(empty($data['title_err']) && empty($data['body_err'])){
//---------------------------------------------------------------
                $edit_post = explode('/',$_SERVER['REQUEST_URI']) ;
                $tmp_edit_post = $edit_post;
                $edit_post = $edit_post[1];
                if($edit_post == "posts" ){
                    $data['id'] = $tmp_edit_post[3];
                    if($this->postModel->updatePost($data)){
                        flash('post_message', 'Post Updated');
                        redirect('posts');
                    } else {
                        die('Something went wrong');
                    }

                }else{

//------------------------------------------------------------------------
                // Validated
                if($this->postModel->updatePost($data)){
                    flash('post_message', 'Post Updated');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
                }
            } else {
                // Load view with errors
                $this->view('posts/edit', $data);
            }

        } else {

            $edit = explode('/',$_SERVER['REQUEST_URI']) ;
            $tmp_edit = $edit;
            $edit = $edit[1];
            if($edit == "posts" ){
                $post_id = $tmp_edit[3];
                $post = $this->postModel->getPostById($post_id);

                $data = [
                    'id' => $post_id,
                    'title' => $post->title,
                    'body' => $post->body,
                    'created_at' => $post->datepicker

                ];

                $this->view('posts/edit', $data);

            }else {

                // Get existing post from model
                $post = $this->postModel->getPostById($id);

                // Check for owner
                if ($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }

                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body
                ];

                $this->view('posts/edit', $data);
            }
        }
    }
//========================================================
    public function show($id){
        $show = explode('/',$_SERVER['REQUEST_URI']) ;
        $tmp_show = $show ;
        $tmp_show_id = $tmp_show[3];
        $show = $show[1];
        if($show == "users" ){

            $user_post = $this->postModel->getPostsByUserId($tmp_show_id);
            $user = $this->userModel->getUserById($tmp_show_id);

            $data = [
                'post' => $user_post,
                'user' => $user
            ];

            $this->view('posts/show', $data);

        }   if($show == "posts" ){

            $user_post = $this->postModel->getUserByPostsId($tmp_show_id);
           // $user_post = $this->postModel->getPostsByUserId($tmp_show_id);
             $id = $user_post->user_id;
             $this->userModel = $this->model('User');
            $user = $this->userModel->getUserById($id);

            $data = [
                'post' => $user_post,
                'user' => $user
            ];

            $this->view('posts/show', $data);

        }


        else{

            $user_post = $this->postModel->getPostsById($id);
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user
            ];

            $this->view('posts/show', $data);
        }
    }
//========================================================
    public function delete($id){




        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $del = explode('/',$_SERVER['REQUEST_URI']) ;
            $tmp_del = $del ;
            $tmp_del_id = $tmp_del[3];
            $del = $del[1];

            if($del == "posts" ) {
                $post = $this->postModel->getPostById($tmp_del_id);

//                // Check for owner
//                if ($post->user_id != $_SESSION['user_id']) {
//                    redirect('posts');
//                }

                if ($this->postModel->deletePost($tmp_del_id)) {
                    flash('post_message', 'Post Removed');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }

            } else{

                // Get existing post from model
                $post = $this->postModel->getPostById($id);

                // Check for owner
                if ($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }

                if ($this->postModel->deletePost($id)) {
                    flash('post_message', 'Post Removed');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }

            }

        }

        else {
            redirect('posts');
        }
    }

//===================================================================================

    public function user_show_post($id){
        $show = explode('/',$_SERVER['REQUEST_URI']) ;
        $tmp_show = $show ;
        $tmp_show_id = $tmp_show[3];
        $show = $show[1];




        if($_SESSION['user_id'] == false){


            flash('login_message', 'Need to log in!!!');
            redirect('users/login');
        }else {

            $user_id = $_SESSION['user_id'];
            $user_post = $this->postModel->getUserPosts($user_id);
            if (count($user_post) == 0 && !isset($_SESSION['user_id'])) {
                echo "You need to log in and create you own post!";
            } else {

                $data = [
                    'posts' => $user_post,
                ];

                $this->view('posts/user_show', $data);
            }
        }
    }
//========================================================



}
