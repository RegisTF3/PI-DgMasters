<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gshop.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Lista de Clientes</title>
</head>
<body style="background-color: #8C5535;">
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a href="Home.html">
                <img src="./Imagens/Logo.png" class="log" alt="DragonsClub Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="form-inline my-2 my-lg-0 mr-auto">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div id="navbarDiv" class="navbar-collapse collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="ClienteCadastro.html"><i class="fas fa-user"></i> Usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="#"><i class="fas fa-shopping-cart"></i> Carrinho</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav>
            <div class="teste">
                <ul class="testea">
                    <li class="lidown">Miniaturas</li>
                    <li class="lidown">Torre de Dados</li>
                    <li class="lidown">Mapas/Grids</li>
                    <li class="lidown">Dados</li>
                </ul>
            </div>
        </nav>
        
    </header>
<div class="form-container">
    <div class="table-container">
        <h2>Listagem de Clientes</h2>
        <?php
            include("../controller/controllerCliente.php");
            $res = controllerCliente::listarCliente();
            $qtd = $res->rowCount();
            if ($qtd > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>#</th>";
                echo "<th>Nome do Cliente</th>";
                echo "<th>CPF</th>";
                echo "<th>E-mail</th>";
                echo "<th>Cidade</th>";
                echo "<th>Endereço</th>";
                echo "<th>Senha</th>";
                echo "<th>Ações</th>";
                echo "</tr>";
                $count = 1;
                while ($row = $res->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>".$count."</td>";
                    echo "<td>".$row->nome."</td>";
                    echo "<td>".$row->cpf."</td>";
                    echo "<td>".$row->email."</td>";
                    echo "<td>".$row->cidade."</td>";
                    echo "<td>".$row->endereco."</td>";
                    echo "<td>".$row->senha."</td>";
                    echo "<td>
                            <form action='paginaAlterarCliente.php' method='get' style='display:inline;'>
                                <input type='hidden' name='id' value='".$row->id."'>
                                <button type='submit'>Alterar</button>
                            </form>
                            <form action='excluirCliente.php' method='post' style='display:inline;'>
                                <input type='hidden' name='id' value='".$row->id."'>
                                <button type='submit' onclick=\"return confirm('Você tem certeza que deseja excluir este cliente?');\">Excluir</button>
                            </form>
                          </td>";
                    echo "</tr>";
                    $count++;
                }
                echo "</table>";
            } else {
                echo "Nenhum cliente cadastrado.";
            }
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
     let lastScrollTop = 0;

window.addEventListener("scroll", function(){
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop){
        // Scroll down
        document.querySelector('.teste').style.transform = 'translateY(-100%)'; // Esconde .teste ao rolar para baixo
    } else {
        // Scroll up
        document.querySelector('.teste').style.transform = 'translateY(0)'; // Mostra .teste ao rolar para cima
    }
    lastScrollTop = scrollTop;
});
window.addEventListener('scroll', function() {
    var footer = document.querySelector('footer');
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        footer.style.display = 'block';
    } else {
        footer.style.display = 'none';
    }
});
    </script>
<footer>
            <nav class="footer-navbar">
                <a class="footer-brand" href="#">Brand</a>
                <div class="footer-links">
                    <a class="footer-link" href="#">Link 1</a>
                    <a class="footer-link" href="#">Link 2</a>
                    <a class="footer-link" href="#">Link 3</a>
                </div>
                <button class="footer-toggler" type="button">
                    <span class="footer-toggler-icon">☰</span>
                </button>
            </nav>
        </footer>   
</body>
</html>
