<?php $this->layout('layouts/master', ['title' => 'Cadastrar']) ?>

<h1>Cadastrar novo usuário</h1>

<form action="/users/store" method="post">
    <div class="form-group col-sm-12 col-md-6">
        <label for="name">Nome</label>
        <input type="text" name="name" class="form-control">
        <?= $messages['name']['message']?>
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control">
        <?= $messages['email']['message']?>
    </div>
    <div class="form-group col-sm-12 col-md-6">
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control">
        <?= $messages['password']['message']?>
    </div>
    <button type="submit" class="btn btn-primary my-3">Cadastrar</button>
</form>