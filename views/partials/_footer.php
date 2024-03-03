<script>
    <?php
        if(isset($_SESSION['success'])){ ?>
            toastr.success('<?php echo $_SESSION['success']; ?>')
            <?php unset($_SESSION['success']);
        }?>
</script>
</body>
</html>