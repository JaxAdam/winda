<div class="container">
    <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
        <a href="/panel">Назад</a>
        <h5>Прикрепить пользователя к лицензии №<?php echo $id; ?></h5>
        <input type="text" class="input-field" name="id" placeholder="ID пользователя" required>
        <input type="submit" class="input-field btn" value="Прикрепить">
    </form>
</div>

