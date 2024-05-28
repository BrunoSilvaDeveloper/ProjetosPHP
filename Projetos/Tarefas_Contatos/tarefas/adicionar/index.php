<?php 
    session_start();

    $tarefas = $_SESSION['tarefas'];
    $pattern = '/^\(\d{2}\) \d{5}-\d{4}$/';
    $nome = '';
    $phone = '';
    $tarefa = '';


    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = strip_tags(trim($_POST['nome']));
        $phone = strip_tags(trim($_POST['phone']));
        $tarefa = strip_tags(trim($_POST['tarefa']));
        $concluida = 'Não';
        
        if (!empty($nome) && !empty($phone) && !empty($tarefa) ){
            if (preg_match($pattern, $phone)){
                $_SESSION['tarefas'][] = [
                    'nome' => $nome,
                    'phone' => $phone,
                    'tarefa' => $tarefa,
                    'concluida' => $concluida,
                ];
                header('location: /Projetos/Tarefas_Contatos');
                exit();
            }else{
                $error = "Telefone incorreto";
            }
        
        }else{
            $error = "Campo obrigatório";
        }
        
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/Projetos/Tarefas_Contatos/style.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <div class="card-3d-wrap">
                <div class="card-3d-wrapper adicionar">
                    <div class="card-front card-adicionar">
						<header class="header-conteudo">
							<div class="container-index-header">
								<h1>Adicionar Tarefa</h1>
							</div>
						</header>
						<section class="container-conteudo">
                            <div class="container-card">
                                <div class="container-form">
                                    <form action="" method="post" class="form">

                                        <!--Imput Nome-->

                                        <input type="text" name="nome" value="<?= isset($error) && $error == 'Telefone incorreto' || isset($error) && !empty($nome) ? $nome : '' ?>" placeholder="<?= isset($error) && $error == 'Telefone incorreto' ? 'Nome' : (isset($error) ? $error : "Nome") ?>" required style="<?= isset($error) && empty($nome) ? "border: 1px solid red;": "" ?>">

                                        <!--Imput Telefone-->
                                        <input type="text" name="phone" value="<?= isset($error) && $error != 'Telefone incorreto' && !empty($phone) ? $phone : '' ?>" placeholder="<?= isset($error) && $error == 'Telefone incorreto' ? $error . ' (xx) xxxxx-xxxx' : (isset($error) ? $error : "Telefone (xx) xxxxx-xxxx") ?>" required style="<?= isset($error) && $error == 'Telefone incorreto' ? "border: 1px solid red;": (isset($error) && empty($phone) ? "border: 1px solid red;": "") ?>">
                                        
                                        <!--Imput tarefa-->

                                        <input type="text" name="tarefa" value="<?= isset($error) && $error == 'Telefone incorreto' || isset($error) && !empty($tarefa) ? $tarefa : '' ?>" placeholder="<?= isset($error) && $error == 'Telefone incorreto' ? 'Tarefa' : (isset($error) ? $error : "Tarefa") ?>" required style="<?= isset($error) && empty($tarefa) ? "border: 1px solid red;": "" ?>">
                                        <!--Botao-->
                                        <button type="submit">Enviar</button>

                                    </form>
                                </div>
                                <div class="container-home">
                                    <h1>Mais opções</h1>
                                    <a href="/Projetos/Tarefas_Contatos"><button>Voltar</button></a>
                                </div>
                            </div>
						</section>
					</div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
