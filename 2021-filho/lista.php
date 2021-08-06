<?php

echo '<a href="?acao=criar" class="btn btn-success pull-right"><i class="demo-icon eicon-plus-circle"></i> Novo Cliente</a>';

$sql = "SELECT * FROM clientes";

if($result = mysqli_query($con, $sql)){

    if(mysqli_num_rows($result) > 0){

        echo "<table>";

        echo "<thead>";

            echo "<tr><th>Nome</th><th>E-mail</th><th>Ações</th><tr>";

        echo "</thead>";

        echo "<tbody>";

        while($row = mysqli_fetch_array($result)){

            echo '<tr>';
            
            echo '<td>'.$row['nome'].' </td>';
            echo '<td>'.$row['email'].'</td>';

            echo '<td>';						
                echo '<a href=?acao=ver&id='.$row['id'].'><i class="demo-icon eicon-preview-medium"></i></a>&nbsp;&nbsp;';
                echo '<a href=?acao=editar&id='.$row['id'].'><i class="demo-icon eicon-edit"></i></a>&nbsp;&nbsp;';
                echo '<a href=?acao=excluir&id='.$row['id'].'><i class="demo-icon eicon-trash"></i></a>';					
            echo '</td>';
            
            echo '</tr>';

        }	
        echo "</tbody>";

        echo "</table>";
        
        mysqli_free_result($result);

    }else{
        echo "Erro 1";
    }

}else{
    echo "Erro 2";
}

mysqli_close($con);