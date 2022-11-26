<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Conent-Type" content="text/html; charset=utf-8"/>
    <title>Aula 36 de PHP - MySQL: Deletando registros selecionados</title>
</head>
<body>

<form name="f_excluir" method="post" action="index.php">

    <table border="1">

        <tr>
          <td>Código</td><td>Nome</td><td>Selecionar</td>
        </tr>

        <?php 

            include("../conexao/index.php");

            $sql = "SELECT * FROM `tb_cadastro` ORDER BY `cod`";
            $res=mysqli_query($conexoes,$sql);

            while($vreg=mysqli_fetch_row($res)){
                $vcod=$vreg[0];
                $vnome=$vreg[1];


                echo "<tr/>";
                    echo "<td>$vcod</td><td>$vnome</td>"; 
                    echo "<td align=center><input type=checkbox value=$vcod name=sel[]></td>";
                    echo "</tr>";
                
            }

            mysqli_close($conexoes);

        ?>
    </table>        

    <br/>    
    <input type="submit" value="Excluir" name="btn_excluir"/>

</form>

</body>
</html>