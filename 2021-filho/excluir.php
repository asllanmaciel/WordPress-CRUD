<?php

    if(isset($_POST['id']) && !empty($_POST['id'])){

        $sql = "DELETE FROM clientes WHERE id=?";

        if($stmt = mysqli_prepare($con, $sql)){

            mysqli_stmt_bind_param($stmt, 'i', $param_id);
            
            $param_id = trim($_POST['id']);

            if(mysqli_stmt_execute($stmt)){

                echo 'Excluído!';

            }else{
                echo 'Erro2';
            }

        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($con);

        //wp_redirect( home_url($wp->request) );
        echo("<script>location.href = '".home_url($wp->request)."'</script>");

    }else{

        if(empty(trim($_GET['id']))){

            //echo 'Erro: Cliente não identificado!';
            echo("<script>location.href = '".home_url($wp->request)."?acao=erro'</script>");

            exit;

        }

    }

?>

<form action="<?php echo home_url($wp->request) ?>?acao=<?php echo $_GET['acao'] ?>" method="POST">

    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

    <p>Tem certeza que quer apagar esse cliente?</p>
    <input type="submit" value="Sim!">
    <a href="<?php echo home_url($wp->request) ?>">Não</a>
    
</form>