<?php
session_start();
require_once('./config.php');

    if (!isset($_SESSION['user_id'])) {
        header("Location: ../index.php");
        exit();

}

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['is_admin'];


$user_name = 1;
$sql = "SELECT name FROM users WHERE id = $user_name";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row["name"];
}else{
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--IMAGEM ABA-->
    <link rel="icon" href="./IMGs/LOGOS/ICONE_MS_ABA_32.png" type="image/png">

    <title>Dashboard</title>

    <!--CSS BOODSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--CSS-->
    <link rel="stylesheet" href="./CSS/dashboard.css">

</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
            </div>
                <div class="col-md-auto">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                        <?php if ($user_type === '1') { ?>
                            <h5 class="card-title">OLÁ!! SEJA BEM VINDO(A) <br><?php echo $username; ?></h5>
                            <p class="card-text">Qual página deseja ir?</p>
                            <hr>
                            <a href="../admin_index.php" class="card-link"><button class="btnCardBody">Ir Para a Página de Inicio do Sistema Web</button></a>
                            <hr>
                            <a href="./admin_product.php" class="card-link"><button class="btnCardBody">Adicionar Novos Produtos Ou Quantidade Ao Site</button></a>
                            <hr>
                            <a href="./admin_dashboard.php" class="card-link"><button class="btnCardBody">Cadastrar Novo Usuario ou Novo Administrador</button></a>
                            <hr>
                            <a href="./admin_listauser.php" class="card-link"><button class="btnCardBody">Lista de Usuários Cadastrados e Administradores</button></a>
                            <?php 
                            } else { ?>
                                <!--aqui vai o layout do user-->            
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <div class="col col-lg-2">
            </div>
        </div>
    </div>
    
<footer>
    <a href="./logout.php" title="Deslogar da Conta">
        <button class="Btn">
            <div class="sign">
                <svg viewBox="0 0 512 512">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                    </path>
                </svg>
            </div>
            <div class="text">Sair</div>
        </button>
    </a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>