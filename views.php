<?php

require_once('config.php');

$conexao = new Conexao();

$conexao->getConexao()->execute("drop view if exists vw_usuarios");

$sql = "create view vw_usuarios as "; 
$sql .= "select ";
$sql .= "usuarios.id, ";
$sql .= "usuarios.nome, ";
$sql .= "usuarios.email, ";
$sql .= "usuarios.data, ";
$sql .= "DATE_FORMAT(usuarios.data, '%d/%m/%Y') as dataFormatada, ";
$sql .= "usuarios.permissao, ";
$sql .= "permissoes.nome as nomePermissao ";
$sql .= "from usuarios ";
$sql .= "join permissoes on permissoes.id = usuarios.permissao ";
$conexao->getConexao()->execute($sql);

$conexao->getConexao()->execute("drop view if exists vw_pacientes_atendimentos");

$sql = "create view vw_pacientes_atendimentos as "; 
$sql .= "select ";
$sql .= "pacientes.id, ";
$sql .= "pacientes.nome, ";
$sql .= "pacientes.sexo, ";
$sql .= "pacientes.idade, ";
$sql .= "pacientes.estadoCivil, ";
$sql .= "pacientes.cpf, ";
$sql .= "pacientes.dataNascimento, ";
$sql .= "pacientes.mesNascimento, ";
$sql .= "pacientes.endereco, ";
$sql .= "pacientes.numero, ";
$sql .= "pacientes.complemento, ";
$sql .= "pacientes.bairro, ";
$sql .= "pacientes.cidade, ";
$sql .= "pacientes.uf, ";
$sql .= "pacientes.cep, ";
$sql .= "pacientes.telefoneResidencial, ";
$sql .= "pacientes.telefoneCelular, ";
$sql .= "pacientes.email, ";
$sql .= "pacientes.profissao, ";
$sql .= "DATE_FORMAT(pacientes.data, '%d/%m/%Y') as dataFormatada, ";
$sql .= "pacientes.observacoes, ";
$sql .= "pacientes.status, ";
$sql .= "pacientes.tratamentos, ";
$sql .= "atendimentos.altura, ";
$sql .= "atendimentos.peso, ";
$sql .= "atendimentos.imc, ";
$sql .= "atendimentos.hda, ";
$sql .= "atendimentos.avaliacaoPostural, ";
$sql .= "atendimentos.evolucao, ";
$sql .= "DATE_FORMAT(atendimentos.data, '%d/%m/%Y') as dataAtendimentoFormatada ";
$sql .= "from pacientes ";
$sql .= "join atendimentos on pacientes.id = atendimentos.paciente ";
$conexao->getConexao()->execute($sql);

$conexao->getConexao()->execute("drop view if exists vw_agenda");

$sql = "create view vw_agenda as "; 
$sql .= "SELECT ";
$sql .= "agenda.id, ";
$sql .= "agenda.tipo, ";
$sql .= "agenda.telefoneResidencial, ";
$sql .= "agenda.telefoneCelular, ";
$sql .= "agenda.lembrete, ";
$sql .= "agenda.data, ";
$sql .= "agenda.hora, ";
$sql .= "DAY(agenda.data) AS diaCompromisso, ";
$sql .= "MONTH(agenda.data) AS mesCompromisso, ";
$sql .= "YEAR(agenda.data) AS anoCompromisso, ";
$sql .= "DATE_FORMAT(agenda.data, '%d/%m/%Y') as dataFormatada, ";
$sql .= "SUBSTR(agenda.hora, 1, 5) as horaFormatada, ";
$sql .= "agenda.dataC, ";
$sql .= "agenda.timestampC, ";
$sql .= "DATE_FORMAT(agenda.dataC, '%d/%m/%Y') as dataCFormatada, ";
$sql .= "pacientes.id as idPaciente, ";
$sql .= "pacientes.nome as nomePaciente ";
$sql .= "FROM agenda ";
$sql .= "LEFT JOIN pacientes ";
$sql .= "ON pacientes.id = agenda.paciente";
$conexao->getConexao()->execute($sql);

$conexao->getConexao()->commit();

?>