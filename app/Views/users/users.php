<?php $this->layout('layouts/master', ['title' => 'Usuários']) ?>

<h1>Usuários</h1>

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
            <a href="/users/update/<?= $user->id ?>" class="btn btn-primary py-0"><i class="bi bi-pencil"></i></a>
            <form action="/users/delete/<?= $user->id ?>" method="post" class="d-inline">
                <input type="hidden" name="_METHOD" value="DELETE"/>
                <button class="btn btn-danger py-0"><i class="bi bi-trash"></i></button>
            </form>
        </li>
    <?php endforeach ?>
</ul>
