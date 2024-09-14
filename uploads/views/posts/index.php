<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <a href="/posts/create">Create New Post</a>
</head>
<body>
    <h1>Posts</h1>
    <?php foreach($posts as $post): ?>
        <h1><?php echo $post['title'];?></h1>
        <h1><?php echo $post['content'];?></h1>
        <h1><?php echo $post['image'];?></h1>
        <h1><?php echo $post['author_name'];?></h1>
        <h1><?php echo $post['created_at']; ?></h1>   
        <h1><?php echo $post['updated_at']; ?></h1>
        <a href="/posts/show?id=<?php echo $post['id']; ?>">View Post</a>
        <a href="/posts/edit?id=<?php echo $post['id']; ?>">Edit</a>
        <a href="/posts/delete?id=<?php echo $post['id']; ?>">Delete</a>
  <?php endforeach;?>
    </body>
</html>