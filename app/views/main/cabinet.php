<div class="container">
    <main class="main">
        <div class="container">
            <div class="main__title">
                <h2>Добро пожаловать в Личный кабинет</h2>
            </div>


            <div class="main__title">
                <h3><?php echo $name; ?></h3>
            </div>

            <p class="cabinet_verify"><?php echo $verified; ?></p>
            <p class="cabinet_id"><?php echo $id; ?></p>

            <a href="/logout">Выйти</a>
        </div>


        <div class="mobileTable">
            <?php if (count($licenses) == 0) : ?>
                <p>У вас нет действующих лицензии.</p>
            <?php else : ?>
                <table class="cwdtable" cellspacing="0" cellpadding="1" border="1">
                    <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Наименованование продукта</th>
                        <th>Лицензионный ключ</th>
                        <th>Количество лицензий</th>
                        <th>Ссылка на скачивание</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($licenses as $license) : ?>
                    <tr>
                        <td><?php echo $license['id'];?></td>
                        <td><?php echo $license['name'];?></td>
                        <td><?php echo $license['license_key'];?></td>
                        <td><?php echo $license['count'];?></td>
                        <td><a href="<?php echo $license['link'];?>">Скачать</a></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </main>


    <!-- Main end -->


    <div class="container">
        <div class="footer">
            <div style="float: right;">
                <a href="#?"><img src="/public/img/Microsoft-Logo-Gray.png" alt="Корпорация Майкрософт" class="clear"
                                  style="margin-right:2em;"></a>
            </div>
            <span class="fR clear" style="margin-right:2em; margin-top:.5em;">
                    <a class="black" title="Справка" href="#?">Справка</a><span>&nbsp;|&nbsp;</span>
                    <a class="black" title="Условия использования" href="#?">Условия использования</a>
                    <span>&nbsp;|&nbsp;</span><a class="black" title="Товарные знаки" href="#?">Товарные знаки</a>
                    <span>&nbsp;|&nbsp;</span><a class="black" title="Заявление о конфиденциальности" href="#?">Заявление о конфиденциальности</a>
                <span style="margin-left:1em">© 2020 Microsoft</span>
            </span>

        </div>
    </div>


    <div class="bodyBottom"></div>
</div>