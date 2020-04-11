<?php if($user == []) : ?>
<div class="container">
    <a href="/panel">Назад</a>
    <p>Такого пользователя нет.</p>
</div>
<?php else : ?>
    <div class="container"><div class="card-action">
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title"><?php echo ucfirst($user['username']) . ' ' . ucfirst($user['surname']);?></span>
                        <p>ID: <?php echo $user['id'];?></p>
                        <p>E-mail: <?php echo $user['email'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h5>Лицензии пользователя</h5>
    <?php if (count($licenses) == 0) : ?>
        <h5>У пользователя нет прикрепленных лицензии</h5>
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
<?php endif; ?>



