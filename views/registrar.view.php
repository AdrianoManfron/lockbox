<div class="grid grid-cols-2">
    <div class="hero min-h-screen flex ml-40">
        <div class="hero-content -mt-32">
            <div>
                <p class="py-2 text-xl">Bem vindo ao</p>
                <h1 class="text-6xl font-bold">LockBox</h1>
                <p class="pt-2 pb-4 text-xl">onde você guarda <span class="italic">tudo</span> com segurança.</p>
            </div>
        </div>
    </div>
    <div class="bg-white hero min-h-screen mr-40 text-black">
        <div class="hero-content -mt-32">
            <form method="post" action="/registrar">
                <?php $validacoes = flash()->get('validacoes'); ?>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Crie sua conta</div>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Nome</span>
                            </div>
                            <input
                                type="text"
                                name="nome"
                                value="<?=old('nome')?>"
                                class="input input-bordered w-full max-w-xs bg-white"
                            />
                            <?php if(isset($validacoes['nome'])) : ?>
                                <div class="label text-xs text-error"><?= $validacoes['nome'][0] ?></div>
                            <?php endif; ?>
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">E-mail</span>
                            </div>
                            <input
                                type="text"
                                name="email"
                                value="<?=old('email')?>"
                                class="input input-bordered w-full max-w-xs bg-white"
                            />
                            <?php if(isset($validacoes['email'])) : ?>
                                <div class="label text-xs text-error"><?= $validacoes['email'][0] ?></div>
                            <?php endif; ?>
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Confirme seu e-mail</span>
                            </div>
                            <input
                                type="text"
                                name="email_confirm"
                                class="input input-bordered w-full max-w-xs bg-white"
                            />
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Senha</span>
                            </div>
                            <input
                                type="password"
                                name="senha"
                                class="input input-bordered w-full max-w-xs bg-white"
                            />
                            <?php if(isset($validacoes['senha'])) : ?>
                                <div class="label text-xs text-error"><?= $validacoes['senha'][0] ?></div>
                            <?php endif; ?>
                        </label>
                        <div class="card-actions">
                            <button class="btn btn-primary btn-block">Registrar</button>
                            <a href="/login" class="btn btn-link">Já tenho uma conta</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>