<div class="bg_menu">
        <div class="container bg_menu">
            <div class="d-flex">
                <div class="ms-auto text-white nome-topo pt-2">Olá: <?php echo \Source\Controller\UtilController::RetornarNomeLogado();  ?></div>
            </div>
        </div>

    <nav class="navbar navbar-expand-lg bg_menu justify-content-end navbar-dark" id="menu">
        <div class="container">
            <?php \Source\Controller\UtilController::RetornaLogo('claro'); ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <ul class="navbar-nav me-auto mx-4 mx-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="https://gentedevalor.agenciamango.com.br/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="https://gentedevalor.agenciamango.com.br/view/linha-industrial.php">Linha Industrial</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="https://gentedevalor.agenciamango.com.br/view/linha-administrativa.php">Linha Administrativa</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="https://gentedevalor.agenciamango.com.br/view/taquari.php">Taquari</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="https://gentedevalor.agenciamango.com.br/view/campo.php">Campo</a>
                        </li>
                        <?php echo $_SESSION['tipo_pessoa']; if(isset($_SESSION['tipo_pessoa']) && $_SESSION['tipo_pessoa'] == 3) {?>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="http://gentedevalor.agenciamango.com.br/admin/cadastro.php">Cadastro</a></li>
                                <li><a class="dropdown-item" href="http://gentedevalor.agenciamango.com.br/admin/colaboradores.php">Colaboradores</a></li>
                                <li><a class="dropdown-item" href="http://gentedevalor.agenciamango.com.br/admin/cadastro-categoria.php">Cadastrar Categoria</a></li>
                                <li><a class="dropdown-item" href="http://gentedevalor.agenciamango.com.br/admin/cadastro-valor.php">Cadastrar Valor</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><form method="POST" action="">
                                        <input type="submit" name="deslogar" class="btn btn-link dropdown-item" value="Sair">
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <?php }?>
                        <li class="nav-item"><form method="POST" action="">
                                <input type="submit" name="deslogar" class="btn btn-link nav-link active" value="Sair">
                            </form>
                        </li>
                    <ul>
                </div>
            </div>
        </div>
    </nav>
</div>