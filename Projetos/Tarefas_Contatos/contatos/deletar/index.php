<?php
session_start();

if (isset($_GET['id']) && isset($_SESSION['contacts'][$_GET['id']])) {
    unset($_SESSION['contacts'][$_GET['id']]);
}

header('Location: /Projetos/Tarefas_Contatos');
exit;