<!--PhP error handling(CodeWithAwa, 2022)-->
<!--Data is compared to ensure they match(CodeWithAwa, 2022)-->
<!--If the user has entered the incorrect information, the user will be notified(CodeWithAwa, 2022)-->
<!--If no errors were encountered,the user will be registered in the users table in the database with a hashed password(CodeWithAwa, 2022)-->
<?php if (!empty($errors)) {
    if (count($errors) > 0) : ?>
        <div class="error">
            <?php foreach ($errors as $error) : ?>
                <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
    <?php  endif;
} ?>
