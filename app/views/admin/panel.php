<h5>Доступные лицензии</h5>
<?php if (count($licenses) == 0) : ?>
    <h5>Лицензии нет</h5>
<?php else : ?>
    <table>
        <thead>
        <tr>
            <th></th>
            <th>Номер</th>
            <th>Наименование</th>
            <th>Ключ</th>
            <th>Количество лицензии</th>
            <th>Ссылка</th>
            <th>Владелец</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($licenses as $license) : ?>
                <tr>
                    <td><a href="/panel/delete/<?php echo $license['id']; ?>">Удалить</a></td>
                    <td><?php echo $license['id']; ?></td>
                    <td><?php echo $license['name']; ?></td>
                    <td><?php echo $license['license_key']; ?></td>
                    <td><?php echo $license['count']; ?></td>
                    <td><a href="<?php echo $license['link']; ?>" target="_blank">Перейти</a></td>
                    <td>
                        <?php if ($license['owner'] == null) : ?>
                            <a href="/panel/set-owner/<?php echo $license['id']; ?>">Прикрепить</a>
                        <?php else: ?>
                            <p>ID:
                                <a href="/panel/user/<?php echo $license['owner']; ?>"><?php echo $license['owner']; ?></a>
                            </p>
                            <a href="/panel/unset/<?php echo $license['id']; ?>">Открепить</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>