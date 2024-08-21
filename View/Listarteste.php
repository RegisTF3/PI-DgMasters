<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gshop.css">
    <title>Listagem de Produtos</title>
    
</head>
<body>
<header>
        <div class="container-image-h">
            <div class="esquerd">
        <img class="cabeca" src="./Imagens/Glogo.png"/>
        <h1 class="game">GameShop</h1>
    
    <div class="buscas ">
         <input type="text"  id="txtBusca" placeholder="Buscar"/>
        </div>
    
        <div class="usu">
         <img class="cabeca" src="./Imagens/iconeUsu.png"/>
         <button class="button" onclick="window.location.href = 'GameCraftHome.html';">Pagina Inicial</button>
        </div>
    </div>
        </div>
        <ul>
            <li>Dados</li>
            <li>Mapas/Grids</li>
            <li>Lançador de Dados</li>
            <li>Miniaturas</li>
        </ul>
        
   </header>
   <div class="form-container">
        <div class="table-container">
    <h2>Listagem de Produtos</h2>
    <?php
    include("../controller/produtoController.php");
    $res = produtoController::listarProduto();
    $qtd = $res->rowCount();
    if ($qtd > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Nome do Produto</th>";
        echo "<th>Quantidade</th>";
        echo "<th>Tipo</th>";
        echo "<th>Valor</th>";
        echo "</tr>";
        $count = 1;
        while ($row = $res->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
            echo "<td>".$count."</td>";
            echo "<td>".$row->nomeProduto."</td>";
            echo "<td>".$row->quantidade."</td>";
            echo "<td>".$row->tipo."</td>";
            echo "<td>".$row->valor."</td>";
            echo "<td>
                    <form action='../controller/processaDados.php' method='post'>
                        <input type='hidden' name='id' value='".$row->id."'>
                        <input type='hidden' name='op' value='Alterar'>
                    </form>
                  </td>";
            echo "</tr>";
            $count++;
        }
        echo "</table>";
    } else {
        echo "Nenhum produto cadastrado.";
    }
    ?>
      </div>
    </div>
  
</body>
</html>