<?php
require_once 'models/Post.php';
class PostController
{
    private $model;
    public function __construct()
    {
        $this->model = new Post(); 
        session_start();
    }
    public function index(){
      $posts = $this->model->all();
      require_once  'views/posts/index.php';
    } 
    public function create()
    {
        require 'views/posts/create.php';
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            require 'views/utilities/404.php';
            return;
        }
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author_name = $_POST['author_name'];
        $image = $_FILES['image']['name'];
        if (empty($title) || empty($content)) {
            $_SESSION['message'] = 'Title and Content cannot be empty';
            require 'views/posts/create.php';
            return;
        }
        if ($image) {
            $target_dir = "uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $target_file = $target_dir . basename($image);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            } else {
                $_SESSION['message'] = 'Failed to upload image.';
                require 'views/posts/create.php';
                return;
            }
        }
        $data = [
            'title' => $title,
            'content' => $content,
            'image' => $image,
            'author_name' => $author_name,
        ];
    
        if ($this->model->create($data)) {
            $_SESSION['message'] = 'Post created successfully';
            header('Location: /posts');
            exit;
        }
    }
    public function show(){
      $id = $_GET['id'];
      $post = $this->model->find($id);
      
      require 'views/posts/show.php';
    }
    public function edit()
    {
        $id = $_GET['id'];
        $post = $this->model->find($id);
    
        if (!$post) {
            require 'views/utilities/404.php'; // Show 404 if the post isn't found
            return;
        }
    
        require 'views/posts/edit.php'; // Load the edit view
    }
    public function handleEdit()
{
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_name = $_POST['author_name'];
    $image = $_FILES['image']['name'];
    $id = $_SESSION['posts']['id'];
    $existingPost = $this->model->find($id);
    $old_image = $existingPost['image'];
    $target_dir = "uploads/";
    if ($old_image && file_exists($target_dir . $old_image)) {
        unlink($target_dir . $old_image);
    }
    if ($image) {
        $target_file = $target_dir . basename($image);
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $_SESSION['message'] = 'Failed to upload image.';
            require 'views/posts/edit.php';
            return;
        }
    } else {
        $image = $old_image;
    }

    $data = [
        'title' => $title,
        'content' => $content,
        'image' => $image,
        'author_name' => $author_name,
    ];

    if ($this->model->update($id, $data)) {
        $_SESSION['message'] = 'Post has been updated';
        header('Location: /posts');
        exit;
    } else {
        $_SESSION['message'] = 'Failed to update post.';
        require 'views/posts/edit.php';
    }
}
public function delete()
{
    $id = $_GET['id'];
    $post = $this->model->find($id);

    if (!$post) {
        require 'views/utilities/404.php';
        return;
    }
    $imagePath = 'uploads/' . $post['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath); // Deletes the image file
    }
    if ($this->model->delete($id)) {
        $_SESSION['message'] = 'Post and associated image deleted successfully';
        header('Location: /posts');
        exit();
    } else {
        $_SESSION['message'] = 'Failed to delete the post';
        header('Location: /posts');
    }
}
}
