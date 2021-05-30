 <?php
class Pages extends Controller {


    public function __construct() {
        //$this->userModel = $this->model('Product');
    //echo "loaded";

        $this->userModel = $this->model('User');
        $this->postModel = $this->model('Post');

    }

//=====================================================================

     public function get_average() {
         $postByMonthAvg = $this->postModel->getMonthlyAvg();

         $data = [
             // 'title' => 'Home page',
             'postByMonthAvg' => $postByMonthAvg,

         ];

         $this->view('pages/avg', $data);
     }


//======================================================================
     public function get_json()
     {
         if($_SERVER['REQUEST_METHOD'] == 'POST'){

             $user_id = $_POST['user_id'];
             $post_id = $_POST['post_id'];


             $posts = json_encode($this->postModel->getPosts());
             $users = json_encode($this->userModel->getusers());

             $post = json_encode($this->postModel->getPostsById($user_id));
             $user = json_encode($this->userModel->getUserById($user_id));

             $data = [
                 'users' => $users,
                 'posts' => $posts,
                 'user' => $user,
                 'post' => $post,
             ];
             $this->view('pages/output_toJson', $data);;
         }else{
             $this->view('pages/toJson');
         }
     }
//======================================================================
    public function create() {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $title = $_POST['title'];
            $body = $_POST['body'];


            $user_data = [
              'name' =>  $name,
              'email' =>  $email ,
              'password' => $password

            ];



            $post_data = [
                'title' =>  $title,
                'body' =>  $body
            ];

            $this->userModel->addUser($user_data);
            $this->postModel->addPost($post_data);

      flash('post_message', 'Post and User been inserted');
                        redirect('posts');

        }else {

            $this->view('pages/create' );
        }
    }

//======================================================================

    public function index() {
       $users = $this->userModel->getUsers();
        $data = [
            // 'title' => 'Home page',
              'users' => $users

         ];

         $this->view('index', $data);
    }

//======================================================================
    public function about(){

      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

       $this->view('pages/about', $data);
    }

//======================================================================

    public function get_curl(){


        $user_url = 'https://jsonplaceholder.typicode.com/users';
        $user_data = json_decode($this->file_get_contents_curl($user_url));


        $post_url = 'https://jsonplaceholder.typicode.com/posts';
        $post_data = json_decode($this->file_get_contents_curl($post_url));


        $users = $this->userModel->insertMultiUsers($user_data);

        $posts = $this->postModel->insertMultiPosts($post_data);




        $data = [
            'title' => 'Fetch data',
            'description' => 'Store data from remote url by Curl'
        ];

        $this->view('pages/about', $data);
    }


//===================================================================================
    function file_get_contents_curl($url) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

//======================================================================






}
