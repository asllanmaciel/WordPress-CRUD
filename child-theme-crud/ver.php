<?php
if( isset($_GET['id']) && !empty(trim($_GET['id'])) ){
		
    $sql = "SELECT * FROM clientes WHERE id = ?";

    if($stmt = mysqli_prepare($con, $sql)){

        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_GET['id']);

        if(mysqli_stmt_execute($stmt)){

            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){

                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                
                echo "<table>";

                    echo "<thead>";

                        echo "<tr><th>Nome</th><th>E-mail</th><tr>";

                    echo "</thead>";

                    echo "<tbody>";                

                        echo '<tr>';
                    
                            echo '<td>'.$row['nome'].' </td>';
                            echo '<td>'.$row['email'].'</td>';

                        echo '</tr>';

                    echo "</tbody>";

                echo "</table>";


            }else{
                echo 'Erro 1';
            }

        }else{
            echo "Erro 2";
        }


    }

    mysqli_stmt_close($stmt);

    mysqli_close($con);

}else{
    echo "Erro 3";
}