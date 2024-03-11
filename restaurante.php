<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gorjeta</title>
    <style>
		 body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f4f4f4;
		}

		.container {
			max-width: 400px;
			margin: 50px auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		h2 {
			color: #333;
			margin-bottom: 20px;
		}

		form {
			margin-top: 20px;
		}

		input[type="number"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type="radio"] {
			margin-right: 10px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type="submit"]:hover {
			background-color: #45a049;
		}

		/* Estilização para o resumo */
		.resumo {
			margin-top: 30px;
			padding: 20px;
			background-color: #ddd; /* Alterando a cor de fundo para um tom mais escuro */
			border-radius: 8px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
			line-height: 0.5; /* Defina o espaçamento entre as linhas aqui */
		}

		.resumo h3 {
			margin-top: 0;
			color: #333;
		}

		.resumo p {
			margin-bottom: 10px; /* Adicionando margem inferior */
		}

		.resumo strong {
			font-weight: bold;
		}
	</style>
</head>
<body>
    <div class="container">
        <h2>Calculadora de Gorjeta</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Valor da Conta: <input type="number" name="valor_conta" min="0" step="0.01" required><br>
            Percentual de Gorjeta:
            <input type="radio" name="percentual_gorjeta" value="0.10" required> 10%
            <input type="radio" name="percentual_gorjeta" value="0.15"> 15%
            <input type="radio" name="percentual_gorjeta" value="0.20"> 20%<br>
            <input type="submit" name="submit" value="Calcular">
        </form>

        <?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $valor_compra = $_POST["valor_conta"];
                $opcao_pagamento = $_POST["percentual_gorjeta"];
        
                $desconto = $valor_compra * $opcao_pagamento;
                $total_a_pagar = $valor_compra + $desconto;
        
                echo "<div class='resumo'>";
                echo "<h3>Resumo</h3>";
                echo "<p><strong>Total: </strong> R$ " . number_format($valor_compra, 2, ',', '.') . "</p>";
                echo "<p><strong>Gorjeta: </strong> ";
                if ($opcao_pagamento == 0.10) {
                    echo "10%";
                } elseif ($opcao_pagamento == 0.15) {
                    echo "15%";
                } elseif ($opcao_pagamento == 0.20) {
                    echo "20%";
                }
                echo "</p>";  
                echo "<p><strong>Valor da Gorjeta:</strong> R$ " . number_format($desconto, 2, ',', '.') . "</p>";
                echo "<p><strong>Total a Pagar:</strong> R$ " . number_format($total_a_pagar, 2, ',', '.') . "</p>";
                echo "</div>";
            }		
		
			/*Código aqui*/
			
		
		?>
    </div>
</body>
</html>
