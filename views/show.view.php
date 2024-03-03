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
            <div class="postcontainer">
                <div class="post-container">
                    <h2 class="post-title"><?php echo $post->title; ?></h2>
                    <p class="post-slug"><?php echo $post->slug; ?></p>
                    <div class="post-body">
                    <?php echo $post->body; ?>
                    </div>
                    <div class="post-thumbnail">
                        <img src="../<?php echo $post->thumbnail; ?>" alt="Sample Thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require __DIR__ . '/partials/_footer.php';
?>