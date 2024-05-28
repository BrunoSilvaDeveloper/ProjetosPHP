<?php 

    session_start();

    $pattern = '/^\(\d{2}\) \d{5}-\d{4}$/';

    if (!isset($_SESSION['tarefas']) || !isset($_SESSION['tarefas'][$_GET['id']])){
        header('location: /Projetos/Tarefas_Contatos');
        exit();
    }

    $id = $_GET['id'];
    $nome = $_SESSION['tarefas'][$id]['nome'];
    $phone = $_SESSION['tarefas'][$id]['phone'];
    $tarefa = $_SESSION['tarefas'][$id]['tarefa'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = strip_tags(trim($_POST['nome']));
        $phone = strip_tags(trim($_POST['phone']));
        $tarefa = strip_tags(trim($_POST['tarefa']));
        $concluida = strip_tags(trim($_POST['concluida']));

        if (!empty($nome) && !empty($phone) && !empty($tarefa) ){
            if (preg_match($pattern, $phone)){
                $_SESSION['tarefas'][$id] = [
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
                                    <form action="?id=<?= $id ?>" method="post" class="form">

                                        <!--Imput Nome-->

                                        <input type="text" name="nome" value="<?= isset($error) && $error == 'Telefone incorreto' || isset($error) && !empty($nome) ? $nome : $nome ?>" placeholder="<?= isset($error) && $error == 'Telefone incorreto' ? 'Nome' : (isset($error) ? $error : "Nome") ?>" required style="<?= isset($error) && empty($nome) ? "border: 1px solid red;": "" ?>">

                                        <!--Imput Telefone-->
                                        <input type="text" name="phone" value="<?= isset($error) && $error != 'Telefone incorreto' && !empty($phone) ? $phone : $phone ?>" placeholder="<?= isset($error) && $error == 'Telefone incorreto' ? $error .' (xx) xxxxx-xxxx' : (isset($error) ? $error : "Telefone (xx) xxxxx-xxxx") ?>" required style="<?= isset($error) && $error == 'Telefone incorreto' ? "border: 1px solid red;": (isset($error) && empty($phone) ? "border: 1px solid red;": "") ?>">
                                        
                                        <!--Imput tarefa-->

                                        <input type="text" name="tarefa" value="<?= isset($error) && $error == 'Telefone incorreto' || isset($error) && !empty($tarefa) ? $tarefa : $tarefa ?>" placeholder="<?= isset($error) && $error == 'Telefone incorreto' ? 'Tarefa' : (isset($error) ? $error : "Tarefa") ?>" required style="<?= isset($error) && empty($tarefa) ? "border: 1px solid red;": "" ?>">

                                        <div class="concluida">
                                            <p>Concluída: </p>
                                            <div class="radio"><input type="radio" name="concluida" value="Sim" required ><label for="concluida">Sim</label></div>
                                            <div class="radio"><input type="radio" name="concluida" value="Não" required  checked ><label for="concluida">Não</label></div>
                                        </div>
                                            
                                        <!--Botao-->
                                        <button type="submit" class="btn-editar"   >Enviar</button>

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
