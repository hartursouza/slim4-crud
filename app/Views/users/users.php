<?php $this->layout('layouts/master', ['title' => 'User']) ?>

<h1>Users</h1>

<a href="/users/create" class="btn btn-primary my-2">Novo Usuário</a>

<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <?= $user->name ?> - <?= $user->email ?>
            <a href="/users/update" class="btn btn-primary py-0">Editar</a>
        </li>
    <?php endforeach ?>
</ul>
