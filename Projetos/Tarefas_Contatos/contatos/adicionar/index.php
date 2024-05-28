<?php 
    session_start();
    $contacts = $_SESSION['contacts'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = strip_tags(trim($_POST['nome'])); // retira as tags de html ou js e remove os espacos em branco
        $sobrenome = strip_tags(trim($_POST['sobrenome']));
        $phone = strip_tags(trim($_POST['phone']));

        if (!empty($nome) && !empty($phone)){ //verifica se o nome ou telefone possuem algum valor
            $_SESSION['contacts'][] = [
                'nome' => $nome,
                'sobrenome' => $sobrenome,
                'phone' => $phone
            ];
            header('Location: /Projetos/Tarefas_Contatos');
            exit;
        }
        else{
            $error =  "Preencha todos os campos!";
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
								<h1>Adicionar Contatos</h1>
							</div>
						</header>
						<section class="container-conteudo">
                            <div class="container-card">
                                <div class="container-form">
                                    <form action="" method="post" class="form">

                                        <!--Imput Nome-->
                                        <?php if (isset($error)): ?>
                                            <input type="text" name="nome" placeholder="Nome é obrigatório" required style="border: 1px solid red;">
                                        <?php else: ?>
                                            <input type="text" name="nome" placeholder="Nome" required>
                                        <?php endif; ?>
                                        
                                        <!--Imput Sobrenome-->
                                        <input type="text" name="sobrenome" placeholder="Sobrenome">
                                        
                                        <!--Imput Telefone-->
                                        <?php if (isset($error)): ?>
                                            <input type="text" name="phone" placeholder="Telefone (xx) xxxxx-xxxx" required style="border: 1px solid red;">
                                        <?php else: ?>
                                            <input type="text" name="phone" placeholder="Telefone (xx) xxxxx-xxxx" require>
                                        <?php endif; ?>
                                        
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
