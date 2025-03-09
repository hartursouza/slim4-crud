<?php $this->layout('layouts/master', ['title' => 'Editar']) ?>

<h1>Editar usuário</h1>

<form action="/users/update" method="post">
    <input type="hidden" name="_METHOD" value="PUT"/>
    <div class="form-group col-sm-12 col-md-6">
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control">
    </div>
    <input type="hidden" name="id" value="<?=$user->id?>">
    <button type="submit" class="btn btn-primary my-3">Atualizar</button>
</form>
