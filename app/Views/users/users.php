<?php $this->layout('layouts/master', ['title' => 'User']) ?>

<h1>Users</h1>

<a href="/users/create" class="btn btn-primary my-2">Novo Usuário</a>

<?php if (!empty($messages['message']['message'])): ?>
    <span class="alert alert-<?= $messages['message']['alert']?>">
        <?= $messages['message']['message'] ?>
    </span>
<?php endif; ?>

<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <?= $user->name ?> - <?= $user->email ?>
            <a href="/users/update/<?= $user->id ?>" class="btn btn-primary py-0">Editar</a>
            <form action="/users/delete/<?= $user->id ?>" method="post" class="d-inline">
                <input type="hidden" name="_METHOD" value="DELETE"/>
                <button class="btn btn-danger py-0">Deletar</button>
            </form>
        </li>
    <?php endforeach ?>
</ul>
