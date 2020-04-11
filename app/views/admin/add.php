<div class="container">
    <form action="/panel/add-license" method="post">
        <h5>Добавить лицензию</h5>
        <input type="text" class="input-field" name="name" placeholder="Наименование продукта" required>
        <input type="text" class="input-field" name="license_key" placeholder="Ключ продукта" required>
        <input type="number" class="input-field" name="count" placeholder="Количество лицензии" required>
        <input type="text" class="input-field" name="link" placeholder="Ссылка на дистрибутив" required>
        <input type="submit" class="input-field btn" value="Добавить">

    </form>
</div>

