<?php $this->layout('layouts/master', ['title' => 'Create User']) ?>

<h1>Delete User</h1>

<form action="/users/delete" method="post">
    <input type="hidden" name="_METHOD" value="DELETE"/>
    <button type="submit">Deletar</button>
</form>