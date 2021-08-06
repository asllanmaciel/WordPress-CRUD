<?php

    $nome = $email = '';

    if(isset($_POST['id']) && !empty($_POST['id'])){

        $id = $_POST['id'];

        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);

        $sql = "UPDATE clientes SET nome=?,email=? WHERE id=?";

        if($stmt = mysqli_prepare($con, $sql)){

            mysqli_stmt_bind_param($stmt, 'ssi', $param_nome, $param_email,$param_id);

            $param_nome = $nome;
            $param_email = $email;
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){

                echo 'Gravado!';

            }else{
                echo 'Erro2';
            }

        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($con);

    }else{

        if(isset($_GET['id']) && !empty(trim($_GET['id']))){

            $id = trim($_GET['id']);

            $sql = "SELECT * FROM clientes WHERE id = ?";

            if($stmt = mysqli_prepare($con, $sql)){

                mysqli_stmt_bind_param($stmt, "i", $param_id);

                $param_id = trim($_GET['id']);

                if(mysqli_stmt_execute($stmt)){

                    $result = mysqli_stmt_get_result($stmt);

                    if(mysqli_num_rows($result) == 1){

                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        
                        $nome = $row['nome'];
                        $email = $row['email'];


                    }else{
                        echo 'Erro 1';
                    }

                }else{
                    echo "Erro 2";
                }


            }

            mysqli_stmt_close($stmt);

            mysqli_close($con);

        }

    }

    global $wp;

?>
<form action="<?php echo home_url($wp->request) ?>?acao=<?php echo $_GET['acao'] ?>" method="POST">
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
    </div>
    <input type="submit" value="Gravar!">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
</form>