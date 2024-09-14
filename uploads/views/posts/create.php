<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
   </head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Create a New Post</h1>
        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>
        <form action="/posts/store" method="POST" enctype="multipart/form-data" class="form">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" placeholder="Enter content" required></textarea>
            </div>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <input type="text" name="author_name" id="author_name" class="form-control" placeholder="Enter author_name" required>
            </div>
            <button type="submit" class="btn btn-success">Create Post</button>
        </form>
    </div>
</body>
</html>