<!DOCTYPE html>
<html>
<head>
    <title>Atualização de Dados</title>
</head>
<body>
    <h1>Atualização de Dados</h1>

    <?php
    // Verifica se o formulário foi submetido
    include_once "conexao.php";
    
    // Conexão com o banco de dados
    // Verifica se a conexão foi bem-sucedida
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Inicializa as variáveis
    $atv1_1 = "";
    $atv2_2 = "";
    $atv3_3 = "";
    
    // Verifica se 'id' está definido na URL
    
        // Obtém os valores atualizados do formulário
        if(isset($_POST['atualizar'])){
            $ent1 = $_POST["atv1_1"];
            $ent2 = $_POST["atv2_2"];
            $ent3 = $_POST["atv3_3"];



            if ($ent1 == "A" && $ent2 == "A" && $ent3 == "PA") {
                $resultado =  "D";
            } else if ($ent1 == "A" && $ent2 == "PA" && $ent3 == "NA") {
                $resultado = "ND";
            } else if ($ent1 == "A" && $ent2 == "A" && $ent3 == "A") {
                $resultado = "D";
            } else if ($ent1 == "PA" && $ent2 == "PA" && $ent3 == "A") {
                $resultado = "ND";
            } else if ($ent1 == "NA" && $ent2 == "NA" && $ent3 == "A") {
                $resultado = "ND";
            } else if ($ent1 == "A" && $ent2 == "A" && $ent3 == "NA") {
                $resultado = "Aprovado";
            } else if ($ent1 == "A" && $ent2 == "NA" && $ent3 == "A") {
                $resultado = "ND";
            } else if ($ent1 == "A" && $ent2 == "NA" && $ent3 == "NA") {
                $resultado = "ND";
            } else if ($ent1 == "A" && $ent2 == "NA" && $ent3 == "PA") {
                $resultado = "ND";
            } else if ($ent1 == "A" && $ent2 == "PA" && $ent3 == "A") {
                $resultado = "D";
            } else if ($ent1 == "A" && $ent2 == "PA" && $ent3 == "PA") {
                $resultado = "D";
            } else if ($ent1 == "NA" && $ent2 == "A" && $ent3 == "A") {
                $resultado = "ND";
            } else if ($ent1 == "NA" && $ent2 == "A" && $ent3 == "PA") {
                $resultado = "ND";
            } else if ($ent1 == "NA" && $ent2 == "NA" && $ent3 == "PA") {
                $resultado = "ND";
            } else if ($ent1 == "NA" && $ent2 == "PA" && $ent3 == "A") {
                $resultado = "ND";
            } else if ($ent1 == "NA" && $ent2 == "PA" && $ent3 == "NA") {
                $resultado = "ND";
            } else if ($ent1 == "NA" && $ent2 == "PA" && $ent3 == "PA") {
                $resultado = "ND";
            } else if ($ent1 == "PA" && $ent2 == "A" && $ent3 == "A") {
                $resultado = "D";
            } else if ($ent1 == "PA" && $ent2 == "A" && $ent3 == "NA") {
                $resultado = "ND";
            } else if ($ent1 == "PA" && $ent2 == "A" && $ent3 == "PA") {
                $resultado = "ND";
            } else if ($ent1 == "PA" && $ent2 == "NA" && $ent3 == "A") {
                $resultado = "ND";
            } else if ($ent1 == "PA" && $ent2 == "NA" && $ent3 == "NA") {
                $resultado = "ND";
            } else if ($ent1 == "PA" && $ent2 == "NA" && $ent3 == "PA") {
                $resultado = "ND";
            } else if ($ent1 == "PA" && $ent2 == "PA" && $ent3 == "NA") {
                $resultado = "ND";
            } else if ($ent1 == "PA" && $ent2 == "PA" && $ent3 == "PA") {
                $resultado = "ND";
            } else if ($ent1 == "PA" && $ent2 == "A" && $ent3 == "A") {
                $resultado = "D";
            } else if ($ent1 == "NA" && $ent2 == "NA" && $ent3 == "NA") {
                $resultado = "ND";
            }else if ($ent1 == "NA" && $ent2 == "A" && $ent3 == "NA") {
                $resultado = "ND";
            }else {
                $resultado = "";
            }
            

            if(isset( $_POST['id'])){
                $id = $_POST['id'];
            }

            if(isset( $_POST['parte'])){
                $parte = $_POST['parte'];
            }

            switch ($parte) {
                case 1:
                    $sql = "UPDATE terceito SET atv1_1 = ?, atv2_2 = ?, atv3_3 = ?, resultado_av1 = ? WHERE id_primeiro = ?";
                    break;
                case 2:
                    $sql = "UPDATE terceito SET atv2_1 = ?, atv2_2_2 = ?, atv2_3 = ?, resultado_av2 = ? WHERE id_primeiro = ?";
                    break;
                case 3:
                    $sql = "UPDATE terceito SET atv3_1 = ?, atv3_2 = ?, atv3_3_3 = ?, resultado_av3 = ? WHERE id_primeiro = ?";
                    break;
                // Adicione casos para outras partes, se necessário
                default:
                    echo "Parte inválida.";
                    exit;
            }
            // Atualiza os valores no banco de dados de forma segura usando consulta preparada
           
            
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ssssi", $ent1, $ent2, $ent3, $resultado, $id);

            if ($stmt->execute() === TRUE) {
                echo "Dados atualizados com sucesso!";
            } else {
                echo "Erro na atualização dos dados: " . $stmt->error;
            }

            $stmt->close();
        }
         else {
        echo "Parâmetro 'id' não definido na URL.";
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
    
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="atv1_1">atv1_1:</label>
        <input type="text" name="atv1_1" value="<?php echo $atv1_1; ?>"><br>

        <label for="atv2_2">atv2_2:</label>
        <input type="text" name="atv2_2" value="<?php echo $atv2_2; ?>"><br>

        <label for="atv3_3">atv3_3:</label>
        <input type="text" name="atv3_3" value="<?php echo $atv3_3; ?>"><br>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <input type="hidden" name="id" value="<?php echo $_GET['parte']; ?>">

        <input type="submit" value="Atualizar" name="atualizar">
    </form>
</body>
</html>