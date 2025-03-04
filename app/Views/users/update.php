<?php $this->layout('layouts/master', ['title' => 'Create User']) ?>

<h1>Update User</h1>

<form action="/users/update" method="post">
    <input type="hidden" name="_METHOD" value="PUT"/>
    <button type="submit">Atualizar</button>
</form>