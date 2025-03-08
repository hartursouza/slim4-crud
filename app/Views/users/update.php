<?php $this->layout('layouts/master', ['title' => 'Create User']) ?>

<h1>Update User</h1>

<form action="/users/update" method="post" class="m-3">
    <input type="hidden" name="_METHOD" value="PUT"/>
    <div class="form-group col-sm-5">
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group col-sm-5">
        <label for="email">Email</ladbel>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group col-sm-5">
        <label for="password">Senha</label>
        <input type="password" name="password"   class="form-control">
    </div>
    <input type="hidden" name="id" value="<?=$user->id?>">
    <button type="submit" class="btn btn-primary my-3">Atualizar</button>
</form>