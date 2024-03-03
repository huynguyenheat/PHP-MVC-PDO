<?php
    require __DIR__ . '/partials/_header.php';
?>
    <div class="container">
        <!-- Sidebar -->
        <?php
            require __DIR__ . '/partials/_nav.php';
        ?>
        <!-- Create Post -->
        <div class="content">
            <div class="header">
                <div class="user-info">
                    <span>Welcome, John Doe</span>
                </div>
            </div>
            <h2>EDIT POST</h2>
            <form action="/crudpdo/posts/update" method="post" enctype="multipart/form-data" class="postcontainer">
                    <label for="username" class="post-label">Title:</label>
                    <input type="text" id="username" name="title" class="post-input" value="<?php echo $post->title; ?>">

                    <label for="slug" class="post-label">Slug:</label>
                    <input type="text" id="slug" name="slug" class="post-input" value="<?php echo $post->slug; ?>">

                    <label for="body" class="post-label">Body:</label>
                    <textarea id="body" name="body" class="post-textarea" ><?php echo $post->title; ?></textarea>

                    <label for="thumbnail" class="post-label">Thumbnail:</label>
                    <input type="file" id="thumbnail" name="thumbnail" class="post-file-input" accept="image/*">
                    <div class="preview-container">
                        <div class="thumbnail-preview"><img src="../<?php echo $post->thumbnail; ?>" alt="Sample Thumbnail"></div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $post->id; ?>">
                    <input type="hidden" name="isPublished" value="<?php echo $post->isPublished; ?>">
                    <input type="hidden" name="created_at" value="<?php echo $post->created_at; ?>">
                    <input type="submit" value="Update Post" class="save-button">
            </form>
        </div>
    </div>
<?php
    require __DIR__ . '/partials/_footer.php';
?>

<script>
    document.getElementById('thumbnail').addEventListener('change', function(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();

            reader.onload = function(e) {
                var preview = document.querySelector('.thumbnail-preview');
                preview.innerHTML = '<img src="' + e.target.result + '" alt="Thumbnail Preview">';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            document.querySelector('.thumbnail-preview').innerHTML = 'No image';
        }
    });
</script>