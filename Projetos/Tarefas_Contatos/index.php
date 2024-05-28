<?php 

	session_start();

	// Inicializa a sessão 'tarefas' se não estiver definida
	if (!isset($_SESSION['tarefas'])){
		$_SESSION['tarefas'] = [];
	}

	// Inicializa a sessão 'contacts' se não estiver definida
	if (!isset($_SESSION['contacts'])) {
		$_SESSION['contacts'] = [];
	}

	$tarefas = $_SESSION['tarefas'];
	$contacts = $_SESSION['contacts'];
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tarefas e Contatos</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/Projetos/Tarefas_Contatos/style.css">
</head>
<body>
    <section class="section section-index">
		<div class="home"><a href="../../index.html"><button>Home</button></a></div>
        <div class="container">
            <h6><span>Tarefas</span><span>Contatos</span></h6>
            <div class="card-3d-wrap">
                <div class="card-3d-wrapper">
                    <div class="card-front">
						<header class="header-conteudo">
							<div class="container-index-header">
								<h1>Gerenciador de Tarefas</h1>
							</div>
						</header>
						<section class="container-conteudo">
							<div class="container-index-main">
								<div class="container-index-adicionar"><a href="/Projetos/Tarefas_Contatos/tarefas/adicionar"><button>Adicionar Tarefas</button></a></div>
								<div class="container-index-tabela">
									<table>
										<thead>
											<tr>
												<th>Funcionario</th>
												<th>Telefone</th>
												<th>Tarefa</th>  
												<th>Concluída</th>                      
												<th>Ações</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($tarefas as $id => $tarefa): ?>
											<tr>
												<td><?= htmlspecialchars($tarefa['nome']) ?></td>
												<td><?= htmlspecialchars($tarefa['phone']) ?></td>
												<td><?= htmlspecialchars($tarefa['tarefa']) ?></td>
												<td><?= htmlspecialchars($tarefa['concluida']) ?></td>
												<td>
													<a href="/Projetos/Tarefas_Contatos/tarefas/visualizar?id=<?= $id ?>"><button><i class="fas fa-eye"></i></button></a>
													<a href="/Projetos/Tarefas_Contatos/tarefas/editar?id=<?= $id ?>"><button><i class="fas fa-pencil-alt"></i></button></a>
													<a href="/Projetos/Tarefas_Contatos/tarefas/deletar?id=<?= $id ?>" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')"><button><i class="fas fa-trash-alt"></i></button></a>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</section>
					</div>
                    <div class="card-back">
						<header class="header-conteudo">
							<div class="container-index-header">
								<h1>Gerenciador de contatos</h1><p>Primeiro projeto, sem validação de dados</p>
							</div>
						</header>
						<section class="container-conteudo">
							<div class="container-index-main">
								<div class="container-index-adicionar"><a href="/Projetos/Tarefas_Contatos/contatos/adicionar"><button>Adicionar Contatos</button></a></div>
								<div class="container-index-tabela">
									<table>
										<thead>
											<tr>
												<th>Nome</th>
												<th>Sobrenome</th>
												<th>Telefone</th>
												<th>Ações</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($contacts as $id => $contact): ?>
											<tr>
												<td><?= htmlspecialchars($contact['nome']) ?></td>
												<td><?= htmlspecialchars($contact['sobrenome']) ?></td>
												<td><?= htmlspecialchars($contact['phone']) ?></td>
												<td>
													<a href="/Projetos/Tarefas_Contatos/contatos/editar?id=<?= $id ?>"><button>Editar</button></a>
													<a href="/Projetos/Tarefas_Contatos/contatos/deletar?id=<?= $id ?>" onclick="return confirm('Tem certeza que deseja excluir este contato?')"><button>Excluir</button></a>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
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
