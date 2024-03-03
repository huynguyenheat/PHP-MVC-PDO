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
            <form action="/crudpdo/posts/store" method="post" enctype="multipart/form-data" class="postcontainer">
                <label for="username" class="post-label">Title:</label>
                <input type="text" id="username" name="title" class="post-input" placeholder="Enter title" required>

                <label for="slug" class="post-label">Slug:</label>
                <input type="text" id="slug" name="slug" class="post-input" placeholder="Enter slug" required>

                <label for="body" class="post-label">Body:</label>
                <textarea id="body" name="body" class="post-textarea" placeholder="Enter body" required></textarea>

                <label for="thumbnail" class="post-label">Thumbnail:</label>
                <input type="file" id="thumbnail" name="thumbnail" class="post-file-input" accept="image/*">
                <div class="preview-container">
                    <div class="thumbnail-preview">No image</div>
                </div>

                <input type="submit" value="Save Data" class="save-button">
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