<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit name</title>
</head>
<body>
    <h1>Edit</h1>
    <form action="handleEdit" method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="<?php echo $post['title']; ?>">
        <input type="text" name="content" value="<?php echo $post['content']; ?>">
        <input type="file" name="image" value="image" >
        <input type="text" name="author_name" value="<?php echo $post['author_name']; ?>">
        <input type="submit" name="Save">
    </form>
</body>
</html>