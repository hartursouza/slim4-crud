<?php $this->layout('layouts/master', ['title' => 'Create User']) ?>

<h1>Create User</h1>

<form action="/users/store" method="post">
    <button type="submit">Cadastrar</button>
</form>