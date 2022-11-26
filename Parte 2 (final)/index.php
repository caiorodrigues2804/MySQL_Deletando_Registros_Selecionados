<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Conent-Type" content="text/html; charset=utf-8"/>
    <title>MySQL: Deletando registros selecionados</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<form name="f_excluir" method="post" action="index.php">

    <table class="table" border="1">

        <tr  scope="row">
          <td>Código</td><td>Nome</td><td><center>Selecionar</center></td>
        </tr>

        <?php 

            include("../conexao/index.php");

            if(isset($_POST['f_del']) && isset($_POST['sel'])){
                foreach($_POST['sel'] as $codigo){
                    $sql="DELETE FROM `tb_cadastro` WHERE `cod` = '$codigo'";
                    $res=mysqli_query($conexoes,$sql);
                }
            }else{
                echo "form NÃO submetido";
            }

          

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
    
    <input type="hidden" name="f_del" value="f_del"/>
    <input style="margin: 10px;" type="submit" value="Excluir" name="btn_excluir"/>

</form>

</body>
</html>