<?php $this->layout('layouts/master', ['title' => 'User']) ?>

<h1>User Profile</h1>

<div>
    <?= $message['message'] ?? '' ?>
</div>

<ul>
    <?php foreach ($users as $user): ?>
        <li><?= $user->name ?> - <?= $user->email ?></li>
    <?php endforeach ?>
</ul>
