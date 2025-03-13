<?php $this->layout('layouts/master', ['title' => 'Login']) ?>

<div class="card p-4 shadow" style="width: 300px;">
    <h3 class="text-center mb-3">Login</h3>
    <form action="/login" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" 
            placeholder="Digite seu e-mail" value="leo@example.com">
            <?= $messages['email']['message']?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" name="password"
            placeholder="Digite sua senha" value="senha123">
            <?= $messages['password']['message']?>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
        <a href="/users/create" class="btn btn-secondary w-100 mt-3">Criar Conta</a>
    </form>
</div>
