<?php 
    session_start();

    if(!isset($_SESSION['tarefas']) || !isset($_SESSION['tarefas'][$_GET['id']])){
        header('location: /Projetos/Tarefas_Contatos');
        exit();
    }

    $id = $_GET['id'];
    $nome = $_SESSION['tarefas'][$id]['nome'];
    $phone = $_SESSION['tarefas'][$id]['phone'];
    $tarefa = $_SESSION['tarefas'][$id]['tarefa'];
    $concluida = $_SESSION['tarefas'][$id]['concluida'];

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

                                <div class="container-ver">

                                    <div class="ver-nome">
                                        <h4>Nome:</h4>
                                        <p><?= htmlspecialchars($nome) ?></p>
                                    </div>
                                    <div class="ver-telefone">
                                        <h4>Telefone:</h4>
                                        <p><?= htmlspecialchars($phone) ?></p>
                                    </div>
                                    <div class="ver-tarefa">
                                        <h4>Tarefa:</h4>
                                        <p><?= htmlspecialchars($tarefa) ?></p>
                                    </div>
                                    <div class="ver-concluida">
                                        <h4>Concluída:</h4>
                                        <p><?= htmlspecialchars($concluida) ?></p>
                                    </div>

                                </div>

                                <div class="container-home">
                                    <h1>Mais opções</h1>
                                    <div class="ver-buttons">
                                        <a href="/Projetos/Tarefas_Contatos"><button>Voltar</button></a>
                                        <a href="/Projetos/Tarefas_Contatos/tarefas/editar?id=<?= $id ?>"><button>Editar</button></a>
                                        <a href="/Projetos/Tarefas_Contatos//tarefas/deletar?id=<?= $id ?>" onclick="return confirm('Tem certeza que deseja excluir este contato?')"><button>Excluir</button></a>
                                    </div>
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
