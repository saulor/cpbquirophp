<?php // You need to add server side validation and better error handling here

$data = array();

if(isset($_GET['files'])) {	
	require_once("../../config.php");
	$error = false;
	$files = array();
	$uploaddir = DIR_UPLOADS . SEPARADOR_DIRETORIO . 'atendimentos' . SEPARADOR_DIRETORIO . $_GET['id'] . SEPARADOR_DIRETORIO;
	
	if (!existeDiretorio($uploaddir)) {
		if (!criaDiretorio($uploaddir)) {
			$data = array('error' => 'Erro ao tentar criar diretório');
		}
	}
	else {
		foreach($_FILES as $file) {
			if(move_uploaded_file($file['tmp_name'], $uploaddir . basename($file['name']))) {
				$files[] = $uploaddir . $file['name'];
			}
			else {
			    $error = true;
			}
		}
		$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
	}
	
}
else {
	$data = array('success' => 'Form was submitted', 'formData' => $_POST);
}

echo json_encode($data);

?>