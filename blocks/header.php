<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Мой первый PHP-сайт</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="index.php">Главная</a>
        <a class="p-2 text-dark" href="contact.php">Контакты</a>
        <a class="p-2 text-dark" href="posts.php">Посты</a>
    </nav>
    <?php if(isset($_SESSION['user_name'])): ?>
    <a class="btn btn-outline-primary" href="auth.php">Здравствуйте, <?php echo $_SESSION['user_name']; ?></a>
    <?php else: ?>
    <a class="btn btn-outline-primary" href="auth.php">Присоединиться</a>
    <?php endif; ?>
</div>



