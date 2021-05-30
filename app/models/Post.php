<?php
class Post {
    private $db;
//========================================================
    public function __construct(){
        // $this->db = new MyDb();
        $this->db = new Database;
    }

//================================================================

    // Regsiter user
    public function insertMultiPosts($data){

        foreach ($data as $val) {

            if ($this->findPostByTitle($val->title) == false) {


                $this->db->query('INSERT INTO posts (title, user_id, body) VALUES(:title, :user_id, :body)');
                // Bind values
                $this->db->bind(':title', $val->title);
                $this->db->bind(':user_id', $val->userId);
                $this->db->bind(':body', $val->body);

                // Execute
                if ($this->db->execute()) {
                    continue;
                } else {
                    return false;
                }
            }
        }
    }



//=======================================================
    public function getUserByPostsId($id)
    {
        global $db;
        $my_db = new MyDb();


        $sql = "SELECT *,
                posts.id as postId,
                users.id as userId,
                posts.created_at as postCreated,
                users.created_at as userCreated
                FROM posts
                INNER JOIN users
                ON posts.user_id = users.id
                WHERE posts.id = $id
                ORDER BY posts.created_at DESC";


        if ($rows = $my_db->queryObjectArray($sql)) {

           // $rows = $rows[0];
            return $rows;
        }
    }


//========================================================
    public function getPostsByUserId($id){
        global $db;
        $my_db = new MyDb();


        $sql="SELECT *,
                posts.id as postId,
                users.id as userId,
                posts.created_at as postCreated,
                users.created_at as userCreated
                FROM posts
                INNER JOIN users
                ON posts.user_id = users.id
                WHERE users.id = $id
                ORDER BY posts.created_at DESC";



        if($rows=$my_db->queryObjectArray($sql)){

            //$rows = $rows[0];
            return $rows;
        }






//
// $this->db->query('SELECT *,
//                   posts.id as postId,
//                   users.id as userId,
//                   posts.created_at as postCreated,
//                   users.created_at as userCreated
//                   FROM posts
//                   INNER JOIN users
//                   ON posts.user_id = users.id
//                   WHERE users.id = :id
//                   ORDER BY posts.created_at DESC
//                   ');
// $this->db->bind(':users.id', $id,'is_int');
//
// $results = $this->db->resultSet();
//
// return $results;
    }


//========================================================
//========================================================
    public function getUserPosts($id)
    {
        global $db;
        $my_db = new MyDb();


        $sql = "SELECT *,
                posts.id as postId,
                users.id as userId,
                posts.created_at as postCreated,
                users.created_at as userCreated
                FROM posts
                INNER JOIN users
                ON posts.user_id = users.id
                WHERE users.id = $id
                ORDER BY posts.created_at DESC";



        if ($rows = $my_db->queryObjectArray($sql)) {
            return $rows;
        }else {
            return false;
        }

    }


//========================================================



        public function getPostsById($id){
        // global $db;

        $this->db->query('SELECT *,
                      posts.id as postId,
                      users.id as userId,
                      posts.created_at as postCreated,
                      users.created_at as userCreated
                      FROM posts
                      INNER JOIN users
                      ON posts.user_id = users.id
                      ORDER BY posts.created_at DESC
                      ');

        $results = $this->db->resultSet();

        return $results;
    }


//========================================================

    public function findPostByTitle($title){
        $this->db->query('SELECT * FROM posts WHERE title = :title');
        // Bind value
        $this->db->bind(':title', $title);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

//========================================================

    public function getPosts(){
        //   global $db;
        $this->db->query('SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC
                        ');

        $results = $this->db->resultSet();

        return $results;
    }
//========================================================
    public function addPost($data){
        global $db;

        $data['user_id'] = $data['user_id'] ? $data['user_id'] : 1;

        $date = $data['created_at'];
        $timestamp = strtotime($date);
        $new_date = date("y-m-d H:i:s", $timestamp);
        $data['created_at'] = $new_date;


//        if (empty ($data['user_id']) && $data['user_id'] == false){
//            $this->db->query('INSERT INTO posts (title, user_id, body, created_at ) VALUES(:title, :user_id, :body, :ceaeted_at)');
//            // Bind values
//            $this->db->bind(':title', $data['title']);
//            $this->db->bind(':user_id', $data['user_id']);
//            $this->db->bind(':body', $data['body']);
//            $this->db->bind(':created_at', $data['created_at']);
//        }else{
//            $this->db->query('INSERT INTO posts (title, user_id, body, created_at ) VALUES(:title, :user_id, :body, :ceaeted_at)');
//            // Bind values
//            $this->db->bind(':title', $data['title']);
//            $this->db->bind(':user_id', $data['user_id'],'is_int');
//            $this->db->bind(':body', $data['body']);
//            $this->db->bind(':created_at', $data['created_at']);
//        }



        $this->db->query('INSERT INTO posts (title, user_id, body, created_at ) VALUES(:title, :user_id, :body, :ceaeted_at)');

        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id'],'is_int');
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':created_at', $data['created_at']);



        $sql="INSERT INTO posts (title, user_id, body, created_at ) VALUES( " .
            $db->sql_string($data['title']) . ", " .
            $db->sql_string($data['user_id']) . ", " .
            $db->sql_string($data['body']) . ", " .
            $db->sql_string($data['created_at']) . ") " ;


            if($db->execute ($sql) ){
                $postId = $db->insertId() ;
                return true;
            }else{
                return false;
            }




        //  $this->db->query (  'INSERT INTO posts (title, user_id, body, created_at ) VALUES(\'gsdfgsdfgsdfg\',\'33\',\'ttttttttttttttttttt\',\'21-05-28 00:00:00\')';
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }


    }
//========================================================
    public function updatePost($data){

        $date = $data['created_at'];
        $timestamp = strtotime($date);
        $new_date = date("y-m-d H:i:s", $timestamp);
        $data['created_at'] = $new_date;

        $this->db->query('UPDATE posts SET title = :title, body = :body , created_at = :created_at WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':created_at', $data['created_at']);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
//========================================================
    public function getPostById($id){
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
//========================================================
    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
//================================================================
    public function getMonthlyAvg(){

//
//        $this->db->query('
//                        SELECT created_at, AVG(posts)
//                        FROM posts
//                        GROUP BY YEAR(created_at), MONTH(created_at)
//                        HAVING COUNT(created_at) = DAY(LAST_DAY(created_at));
//                        ORDER BY posts.created_at DESC
//                        ');





        $this->db->query("SELECT SUBSTRING(created_at,1,7) as month, (COUNT(DISTINCT id) / COUNT(DISTINCT user_id)) as average 
                              FROM posts GROUP BY SUBSTRING(created_at,1,7)");

        

        $results = $this->db->resultSet();

        return $results;


    }
//=============================================================


}

