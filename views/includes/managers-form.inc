<form action="../controllers/manager.php" method="POST" enctype="multipart/form-data" class="s-form">
    <div class="msg-fixed warning">Os campos com * são obrigatórios.</div>
    <?php if(isset($manager)): ?>
        <button id="form-control" type="button" class="btn warning" href="#">Alterar senha?</button>
        <div class="form-controled invisible">
            <div class="msg-fixed warning">A senha deve conter de 6 a 20 caracteres.</div>
            <div class="field has-label">
                <label for="new">Nova Senha*</label>
                <input id="new" type="password" title="6 a 20 caracteres" pattern=".{6,20}">
            </div>
            <div class="field has-label">
                <label for="confirm">Confirmar Senha*</label>
                <input id="confirm" type="password" name="password" title="6 a 20 caracteres" pattern=".{6,20}">
            </div>
        </div>
    <?php endif; ?>
    <div class="field has-label">
        <label for="name">Nome*</label>
        <input type="text" name="name" <?php if (isset($manager)): ?> value="<?php echo $manager->name; ?>"<?php endif; ?> required>
    </div>
    <div class="field has-label">
        <label for="email">E-mail*</label>
        <input type="email" name="email" <?php if (isset($manager)): ?> value="<?php echo $manager->email; ?>"<?php endif; ?> required>
    </div>
    <div class="btn-pair">
        <a href="managers" class="btn cancel">Voltar</a>
        <input type="hidden" name="id" value="<?php echo $manager->id; ?>">
        <button name="action" type="submit" class="btn send" value="<?php echo $action; ?>">Salvar</button>
    </div>
</form>
