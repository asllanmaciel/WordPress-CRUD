<?php

    $param_email = $param_email = '';

    if($_SERVER["REQUEST_METHOD"] == 'POST'){

        $var_nome = trim($_POST['nome']);
        $var_email = trim($_POST['email']);

        $sql = "INSERT INTO clientes (nome,email) VALUES (?, ?)";

        if($stmt = mysqli_prepare($con, $sql)){

            mysqli_stmt_bind_param($stmt, 'ss', $param_nome, $param_email);

            $param_nome = $var_nome;
            $param_email = $var_email;

            if(mysqli_stmt_execute($stmt)){

                echo 'Gravado!';

            }else{
                echo 'Erro2';
            }

        }else{
            echo 'Erro1';
        }

        mysqli_stmt_close($stmt);

    }

    mysqli_close($con);

    global $wp;

?>
<form action="<?php echo home_url($wp->request) ?>?acao=<?php echo $_GET['acao'] ?>" method="POST">
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="<?php echo $param_nome; ?>">
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <input type="text" name="email" class="form-control" value="<?php echo $param_email; ?>">
    </div>
    <input type="submit" value="Gravar!">
    <input type="hidden" name="gravar" value="1">
</form>