<form action="../controllers/user.php" method="POST" enctype="multipart/form-data" class="s-form">
    <div class="msg-fixed warning">Os campos com * são obrigatórios.</div>
    <div class="field has-label">
        <label for="name">Nome*</label>
        <input type="text" name="name" <?php if (isset($user)): ?> value="<?php echo $user->name; ?>"<?php endif; ?> required>
    </div>
    <div class="field has-label">
        <label for="email">E-mail*</label>
        <input type="email" name="email" <?php if (isset($user)): ?> value="<?php echo $user->email; ?>"<?php endif; ?> required>
    </div>
    <div class="field has-label">
        <label for="user_telefone">Telefone *</label>
        <input name="phone" <?php if (isset($user)): ?> value="<?php echo $user->phone; ?>"<?php endif; ?> required title="Exemplo: 071999008877">
    </div>
    <div class="field has-label">
        <label for="registry">Matricula*</label>
        <input type="text" name="registry" <?php if (isset($user)): ?> value="<?php echo $user->registry; ?>"<?php endif; ?> required>
    </div>
    <div class="select-group">
        <label>Semestre*</label>
        <select name="semester">
            <?php for($i = 1; $i<5; $i++): ?>
                <option value="<?php echo $i; ?>" <?php if(isset($user) && $i == $user->semester) echo "selected"; ?>><?php echo $i; ?>º</option>
            <?php endfor; ?>
            <option value="A4" <?php if(isset($user) && '0' == $user->semester) echo "selected"; ?>>Acima do 4º semestre</option>
        </select>
    </div>
    <div class="select-group">
        <label>Curso*</label>
        <select name="course">
            <option value="CC" <?php if(isset($user) && 'CC' == $user->course) echo "selected"; ?>>Ciência da Computação</option>
            <option value="SI" <?php if(isset($user) && 'SI' == $user->course) echo "selected"; ?>>Sistemas de Informação</option>
            <option value="LC" <?php if(isset($user) && 'LC' == $user->course) echo "selected"; ?>>Licenciatura em Computação</option>
            <option value="EC" <?php if(isset($user) && 'EC' == $user->course) echo "selected"; ?>>Engenharia de Computação</option>
            <option value="BI" <?php if(isset($user) && 'BI' == $user->course) echo "selected"; ?>>Bacharelado Interdisciplinar C&T</option>
            <option value="OT" <?php if(isset($user) && 'OT' == $user->course) echo "selected"; ?>>Outro</option>
        </select>
    </div>
    <div class="select-group">
        <label>Status*</label>
        <select name="status">
            <option value="0" <?php if(isset($user) && '0' == $user->status) echo "selected"; ?>>Inscrito</option>
            <option value="1" <?php if(isset($user) && '1' == $user->status) echo "selected"; ?>>Participante</option>
        </select>
    </div>
    <div class="btn-pair">
        <a href="subscribers" class="btn cancel">Voltar</a>
        <input type="hidden" name="id" value="<?php echo $user->id; ?>">
        <button name="action" type="submit" class="btn send" value="<?php echo $action; ?>">Salvar</button>
    </div>
</form>
