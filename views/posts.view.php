<?php
    require __DIR__ . '/partials/_header.php';
?>
    <div class="container">
        <!-- Sidebar -->
        <?php
            require __DIR__ . '/partials/_nav.php';
        ?>
        <!-- List Post -->
        <div class="content">
            <div class="header">
                <div class="user-info">
                    <span>Welcome, John Doe</span>
                </div>
            </div>
            <a href="/crudpdo/posts/create">Add Post</a>
            <!-- Add content here -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $post): ?>
                            <tr>
                                <td><img src="<?php echo $post->thumbnail; ?>" alt="Sample Image"></td>
                                <td><?php echo $post->title; ?></td>
                                <td><?php echo $post->slug; ?></td>
                                <td>
                                    <form action="/crudpdo/posts/edit" method="get" style="display: inline;">
                                        <input type="hidden" name="id" value="<?php echo $post->id; ?>">
                                        <button type="submit" style="border: none; background-color: transparent;"><i class="fas fa-edit"></i></button>
                                    </form>
                                    <form action="/crudpdo/posts/delete" method="post" style="display: inline;">
                                        <input type="hidden" name="id" value="<?php echo $post->id; ?>">
                                        <button type="submit" style="border: none; background-color: transparent;"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    <form action="/crudpdo/posts/view" method="get" style="display: inline;">
                                        <input type="hidden" name="id" value="<?php echo $post->id; ?>">
                                        <button type="submit" style="border: none; background-color: transparent;"><i class="fas fa-search"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- <tr>
                            <td><img src="sample-image.jpg" alt="Sample Image"></td>
                            <td>Sample Title 1</td>
                            <td>Active</td>
                            <td>
                                <form action="edit_action_url" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="edit_id_value">
                                    <button type="submit" style="border: none; background-color: transparent;"><i class="fas fa-edit"></i></button>
                                </form>
                                <form action="delete_action_url" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="delete_id_value">
                                    <button type="submit" style="border: none; background-color: transparent;"><i class="fas fa-trash-alt"></i></button>
                                </form>
                                <form action="search_action_url" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="search_id_value">
                                    <button type="submit" style="border: none; background-color: transparent;"><i class="fas fa-search"></i></button>
                                </form>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
    require __DIR__ . '/partials/_footer.php';
?>