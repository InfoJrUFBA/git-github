
<?php $uri = $_SERVER['REQUEST_URI']; ?>
<?php $uri_exploded = explode('/', $uri); ?>
<?php $uri_replaced = str_replace('.php', '', $uri_exploded); ?>
<?php $page = $uri_exploded[count($uri_exploded)-2] . '/' . array_pop($uri_replaced); ?>
<header>
    <a href="../"><img src="../assets/img/professorctocat-git.svg" alt="PlugInfo"></a>
    <input type="checkbox" id="menu" class="toggle">
    <label id="menu-toggle" for="menu" onclick><i class="fa fa-bars"></i></label>
    <nav class="menu">
        <ul>
            <a href="subscribers"><li <?php if ($page=='views/subscribers') echo 'class="active"'; ?>><i class="fa fa-user"></i> Inscritos</li></a>
            <a href="candidates"><li  <?php if ($page=='views/candidates') echo 'class="active"'; ?>><i class="fa fa-user"></i> Candidatos</li></a>

            <a href="managers"><li  <?php if ($page=='views/managers') echo 'class="active"'; ?>><i class="fa fa-user"></i> Membros</li></a>
            <a href="../helpers/logout"><li><i class="fa fa-sign-out"></i> Sair</li></a>
        </ul>
    </nav>
</header>
