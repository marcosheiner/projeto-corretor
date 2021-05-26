<?php 
session_start();

?>


<?php include_once '../includes/menu.php'; ?>
<div class="area-login">
    <div class="box-login shadow-lg">
        <span class="float-right"><i class="fas fa-sign-in-alt"></i></span>
        <h1 class="h3">Login</h1>
        <form action="../routes/login_check.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?=$_GET['error'] ?>
                </div>
            <?php } ?>

            <label>Usuário:</label><br>
            <input class="form-control" type="text" name="usuario" value="" placeholder="Usuário" required><br>

            <label>Senha:</label><br>
            <input class="form-control" type="password" name="senha" placeholder="Senha" required>

            <br>
            <label>Função:</label>
            <select class="form-control" name="funcao">
                <option value="funcionário">Funcionário</option>
                <option value="admin">Admin</option>
            </select>

            <br>
            <button class="w-100 btn btn-login btn-lg" type="submit">Entrar</button>
        </form>
    </div>
</div>



<?php include_once '../includes/footer.php'; ?>