function selecionarTodos(obj) {
	var bool = $(obj).prop("checked");
	var inputs = $('table').find("input");
	inputs.each(function(){
		$(this).prop("checked", bool);
	});
}

function consultaCep (obj) {
	
	if (obj.value.indexOf("_") == -1) {
	
		$("#notfind").remove();
		$(".loader").css("display", "inline");
		
		var cep = "";
		
		for (var i = 0; i < obj.value.length; i++) {
			if (isInt(obj.value[i])){
				cep = cep + obj.value[i];
			}
		}

		$.ajax({
			url: "http://localhost/cpbquirophp/cep.php?cep="+cep,
			dataType: "json",
			success: function(json){
				
				if (json.logradouro) {
					$("#endereco").val(json.logradouro);
					$("#bairro").val(json.bairro);
					$("#cidade").val(json.cidade);
					$("#uf").val(json.estado);
				}
				else {
					var span = $('<span id="notfind" style="display:block; color:red; font-size:12px; margin-top:10px; margin-left:210px;">CEP não encontrado!</span>');
					$(".ajax-loader").before(span);
					$(obj).focus();
				}
				
				$(".loader").css("display", "none");
				
			}
		});
		
	}
	
}

function isInt(value) {
	return !isNaN(value) && parseInt(value) == value;
}

function calculaIdade(obj, hoje) {
	if ($(obj).val() != null) {
		var hojeArray = hoje.split('/');
		var anoHoje = hojeArray[2];
		var dataArray = $(obj).val().split('/');
		var anoData = parseInt(dataArray[2].trim());
		if(isInt(anoData)) {
			var diferenca = anoHoje - anoData;
			var mesHoje = hojeArray[1];
			var mesData = dataArray[1];
			
			switch (true) {
				
				case mesHoje < mesData :
					diferenca-=1;
				break;
				
				case mesHoje == mesData :
					var diaHoje = hojeArray[0];
					var diaData = dataArray[0];
					if (diaHoje < diaData) {
						diferenca-=1;
					}
				break
				
			}
		}
		$("#idade").val(diferenca);
	}
}

function calculaImc() {
	var altura = parseFloat($("#altura").val().replace(",", "."));
	var peso = parseFloat($("#peso").val().replace(",", "."));
	if (altura > 0 && peso > 0) {
		var imc = peso / (altura * altura);
		imc = String(Math.round(imc * 100) / 100);
		$("#imc").val(imc.replace(".", ","));
	}
}

function excluir (modulo, queryString) {
	if (confirm("Tem certeza que deseja excluir?")) {
		var url = "?modulo=" + modulo;
		for (var qStr in queryString) {
			url += "&" + qStr + "=" + queryString[qStr];
		}
		redirect(url);
	}
	return false;
}

function redirect(url){
    location.href = url;
}

function criaElemento(tipo, atributos) {
	var elemento = document.createElement(tipo);
	for (var att in atributos) {
		elemento.setAttribute(att, atributos[att]);
	}
	return elemento;
}

function criaElementoTexto(texto) {
	return document.createTextNode(texto);
}

function maisArquivos() {
	var container = $('#enviar');
	var quantidade = $(container).find('div.arquivo').length + 1;
	var divGrid = criaElemento('div', {'class' : 'grid arquivo'});
	var divCol312 = criaElemento('div', {'class' : 'col-3-12'});
	var divCol312Content = criaElemento('div', {'class' : 'content', 'id' : 'fcontainer' + quantidade});
	var input = criaElemento('input', {'type' : 'file', 'class' : 'form-control', 'id' : 'arquivo-' + quantidade, 'name' : 'arquivo' + quantidade});
	divCol312Content.appendChild(input);
	divCol312.appendChild(divCol312Content);
	divGrid.appendChild(divCol312);
	var divCol912 = criaElemento('div', {'class' : 'col-9-12'});
	var divCol912Content = criaElemento('div', {'class' : 'content'});
	var img = criaElemento('img', {'src' : 'imagens/ajax-loader-file.gif', 'class' : 'file-loader', 'id' : 'floader' + quantidade, 'alt' : ''});
	divCol912Content.appendChild(img);
	divCol912.appendChild(divCol912Content);
	divGrid.appendChild(divCol912);
	$(container).append(divGrid);
	$('input[type=file]').on('change', prepareUpload);
}

function buscaAjax (url, dados) {
	return $.ajax({
		type: "POST",
		dataType : "json",
		url: url,
		data: { dados : dados }
	}).done(function() {
		$(".ajax-loader").css("display", "none");
	})
}

function pesquisaAjax(pagina, url) {
	
	$(".ajax-loader").css("display", "block");
	var exibir = ($("#exibir").val()) ? $("#exibir").val() : 10;
	
	var busca = {
		pagina : pagina,
		exibir : exibir
	};
	
	var href = [];
	
	var opcoesPesquisa = $('#buscaAjax input:hidden');
	$(opcoesPesquisa).each(function(){		
		busca[$(this).attr('name')] = $(this).val();
		href.push($(this).attr('name') + "=" + $(this).val());
	});
	
	var opcoesPesquisa = $('#buscaAjax input:text');
	$(opcoesPesquisa).each(function(){		
		busca[$(this).attr('name')] = $(this).val();
		href.push($(this).attr('name') + "=" + $(this).val());
	});
	
	opcoesPesquisa = $('#buscaAjax select');
	$(opcoesPesquisa).each(function(){
		busca[$(this).attr('name')] = $(this).val();
		href.push($(this).attr('name') + "=" + $(this).val());
	});
	
	opcoesPesquisa = $('#buscaAjax input:checkbox:checked');
	
	$(opcoesPesquisa).each(function(){
		var key = $(this).attr('name');
		if (!busca[key]) {
			busca[key] = [];
		} 
		busca[key].push($(this).val()); 
	});
	
	buscaAjax(url, busca).success(function (data) {
		
		
		i = 0;		
		var quantidade = data.quantidade;
		var inicio = data.inicio;
		var fim = data.fim;

		$("#quantidade").html(quantidade);
		$("#inicio").html(inicio);
		$("#fim").html(fim);
		
		$("tbody tr#buscaAjax").nextAll("tr").remove();
		$("tbody tr#buscaAjax").after(data.result);
		
		$(".pagination").html(paginacaoAjax(pagina, quantidade, inicio, fim, exibir));
		
		$(".pagination a").each(function(){
			var id = $(this).attr("id");
			var paginaArray = id.split("_");
			$(this).on("click", function(){
				pesquisaAjax (paginaArray[1], url);
				return false;
			});
		});
		
		//$(".ajax-loader").css("display", "none");
		
	});
		
}

function paginacaoAjax(pagina, quantidade, inicio, fim, exibir) {

	if (exibir === undefined) {
		exibir = 10
	}

	$("#quantidade").html(quantidade);
	$("#inicio").html(inicio);
	$("#fim").html(fim);
	
	var quantidadePaginas = Math.ceil(quantidade / exibir);
	
	var html = '';
	
	inicio = 0;
	fim = 0;
	pagina = parseInt(pagina);
	
	if (pagina % exibir == 0) {
		inicio = pagina;
	}
	else {
		inicio = pagina - (pagina % exibir) + 1;
	}
		
	if (parseInt(pagina) % exibir == 0) {
		fim = pagina + exibir;
	}
	else {
		fim = (pagina + exibir) - (pagina % exibir);
	}
	
	if (fim > quantidadePaginas) {
		fim = quantidadePaginas;
	}
		
	if (pagina > 1) {
		html += '<li title="Ir para a primeira página">';
		html += '<a href="#" id="pagina_1">«</a>';
		html += '</li>';
	}
		
	if (pagina > 1 && quantidade > quantidadePaginas) {
		html += '<li title="Ir para a página anterior">';
		html += '<a href="#" id="pagina_' + (pagina - 1) + '">‹</a>';
		html += '</li>';
	}
	
	i = 0;
	
	for (i=inicio; i<=fim; i++) {
		html += '<li title="Ir para a página '+i+'" id="p'+i+'"';
		if (i==pagina) {
			html += ' class="current"';
		}
		html += '><a href="#" id="pagina_' + i + '">'+i+'</a></li>';
	}
	
	if (pagina < quantidadePaginas) {
		html += '<li title="Ir para a próxima página">';
		html += '<a href="#" id="pagina_' + (pagina + 1) + '">›</a>';
		html += '</li>';
	}
	
	if (pagina < quantidadePaginas) {
		html += '<li title="Ir para a última página">';
		html += '<a href="#" id="pagina_' + quantidadePaginas + '">»</a>';
		html += '</li>';
	}
	
	return html;
}

/*






function getPaginacao2(pagina, quantidade, inicio, fim) {

	$("#quantidade").html(quantidade);
	$("#inicio").html(inicio);
	$("#fim").html(fim);
	var quantidadePaginas = Math.ceil(quantidade / 10);
	
	html = "<ul>";
	
	var inicio = 0;
	var fim = 0;
	
	if (pagina % 10 == 0)
		inicio = pagina;
	else
		inicio = pagina - (pagina%10) + 1;
		
	if (pagina % 10 == 0) 
		fim = pagina + 10;
	else
		fim = pagina + 10 - (pagina%10);
		
	if (fim > quantidadePaginas)
		fim = quantidadePaginas;
		
	if (pagina > 1) {
		html += '<li title="Ir para a primeira página">';
		html += '<a href="#" id="pagina_1">«</a>';
		html += '</li>';
	}
		
	if (pagina > 1 && quantidade > quantidadePaginas) {
		html += '<li title="Ir para a página anterior">';
		html += '<a href="#" id="pagina_' + (pagina - 1) + '">‹</a>';
		html += '</li>';
	}
	
	i = 0;
	for (i=inicio; i<=fim; i++) {
		html += '<li title="Ir para a página '+i+'" id="p'+i+'"';
		if (i==pagina)
			html += ' class="current"';
		html += '><a href="#" id="pagina_' + i + '">'+i+'</a></li>';
	}
	
	if (pagina < quantidadePaginas) {
		html += '<li title="Ir para a próxima página">';
		html += '<a href="#" id="pagina_' + (pagina + 1) + '">›</a>';
		html += '</li>';
	}
	
	if (pagina < quantidadePaginas) {
		html += '<li title="Ir para a última página">';
		html += '<a href="#" id="pagina_' + quantidadePaginas + '">»</a>';
		html += '</li>';
	}
	
	html += "</ul>";
	
	return html;
}



function montaTabela (dados, pagina) {

	var html = '';
	
	var modulo = dados[dados.length - 1].informacoes.modulo;
	var campos = dados[dados.length - 1].informacoes.campos;
	var objeto = '';

	for (i=0; i<dados.length-1; i++) {
	
		html += '<tr>';
		html += '<td>';
	    html += '<small>' + ( i + 1 + ((pagina - 1) * 10)) + '</small>';
	    html += '</td>';
	    
	    if (dados[dados.length - 1].informacoes.checkbox) {
		    html += '<td class="checkbox">';
		    html += '<input type="checkbox" name="' + modulo + '[]" value="' + dados[i].id + '" />';
		    html += '</td>';
	   	}
		
		// fields that will be writen in the table
		for (c1 in campos) {
			
			campo = campos[c1];
			objeto = dados[i][c1];
			
			html += '<td';
			html += ' align="' + campo["align"] + '"';
			
			if (c1 == "observacoes") {
				html += ' title="' + dados[i]["observacoesNaoCompactada"] + '"';
			}
			
			html += '>';
			
			if (c1 == "objeto") {
				html += '<span';
				if (dados[i]["objeto"]["nomeNaoCompactado"]) {
					html += ' class="hint--top hint--info" data-hint="' + dados[i]["objeto"]["nomeNaoCompactado"] + '"';
				}
				html += '>';
				
				if (dados[i]["objeto"]["link"]) {
					html += '<a ';
					if (dados[i]["objeto"]["hint"]) {
						var hint = dados[i]["objeto"]["hint"];
						var hintInfo = hint.split("|"); 
						html += 'class="hint--' + hintInfo[0] + ' hint--info" data-hint="' + hintInfo[1] + '" ';
					}
					html += 'href="' + dados[i]["objeto"]["link"] + '">';
				}
				
				html += '<strong>';
				objeto = dados[i]["objeto"]["nome"];
			}
			
			html += objeto;
			
			if (c1 == "objeto") {
			
				html += '</strong>';
				
				if (dados[i]["objeto"]["link"]) {
					html += '</a>';
				}	
				
				html += '</span>';
			
				if (dados[i]["objeto"]["informacoesAdicionais"]) {
					html += '<br /><small>';
					html += dados[i]["objeto"]["informacoesAdicionais"];
					html += '</small>';
				}
				
				if (dados[i]["objeto"]["acoes"]) {
					
					var acoes = dados[i]["objeto"]["acoes"];
					
					html += '<div>';
					
					var acoesArray = new Array();
					var acao = '';
					
					for (a in acoes) {
						
						acao += '<a href="' + acoes[a]["link"] + '" target="' + acoes[a]["target"] + '"';
						if (acoes[a]["onclick"]) {
							acao += ' onclick="return ' + acoes[a]["onclick"] + '"';
						}
						acao += '>';
						acao += a;
						acao += '</a> ';
						
						acoesArray.push(acao);
						acao = '';
						
					}
					
					html += acoesArray.join(" | ");
					html += '</div>';
				}
			
			}
			
			html += '</td>';

		}
		html += '</tr>';
	}
	return html;
}



function selecionarTodos(obj, target){
    var inputs = document.getElementById(target).getElementsByTagName('input');
    if(obj.checked){
        for(i=0;i<inputs.length;i++){
            if(!inputs[i].checked)
                inputs[i].checked = true;
        }
    }
    else{
        for(i=0;i<inputs.length;i++){
            if(inputs[i].checked)
                    inputs[i].checked = false;
        }
    }
}





function excluir(modulo, id, queryString) {
	if (confirm("Tem certeza que deseja excluir?")) {
		var url = "?modulo=" + modulo + "&acao=excluir&id=" + id + "&q=" + queryString;
		redirect(url);
	}
	return false;
}

/*


function definirCapa(obj, id, imagem, extensao) {
	var inputs = $("#imagens-galeria").find("input");
	inputs.each(function() {
		if (obj != this)
			$(this).attr("checked", false);
	});
	redirect("?modulo=galerias&acao=capa&id="+id+"&imagem="+imagem+"&extensao="+extensao);
}

function excluirImagem(nome, extensao, id){
    if(confirm('Deseja realmente excluir esta imagem?')){
        var url = '?modulo=galerias&acao=remover&galeria='+id+'&imagem='+nome+'&extensao='+extensao;
        redirect(url);
    }
}


		
function getRequest(){
    var request = null;
            
    try{
        request = new XMLHttpRequest();
    }
    catch(e){
        try{
            request = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e){
            try{
                request = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e){
                request = null;
            }
        }
    }
    return request;		
}

function criaLink(obj){
    var titulo = obj.value.toLowerCase();
    var target = document.getElementById('link');
    target.value = '';
    convertLowerHifen(titulo);
    for(i=0;i<titulo.length;i++){
        convertLowerHifen(titulo.charCodeAt(i));
    }
}

function convertLowerHifen(code){
    var letras = "áabcçdefghijklmnopqrstuvwxyz0123456789-";
    var letrasA = new Array(224,225,226,227);
    var letrasE = new Array(232,233,234);
    var letrasI = new Array(236,237,238);
    var letrasO = new Array(242,243,244,245);
    var letrasU = new Array(249,250,251);
    var target = document.getElementById('link');
    
    if (code == 45) // caractere hífen (-)
        target.value = target.value.substring(0, (target.value.length)-1).toLowerCase();
    else if(code == 231) // cedilha
        letra = 'c';
    else if (code == 32 && target.value.substring(target.value.length, (target.value.length)-1) != '-')  // backspace
        letra = '-';
    else if(in_array(code, letrasA)) // á â ã à
        letra = 'a';
    else if(in_array(code, letrasE)) // é è ê
        letra = 'e';
    else if(in_array(code, letrasI)) // í ì î
        letra = 'i';
    else if(in_array(code, letrasO)) // ó ò ô õ
        letra = 'o';
    else if(in_array(code, letrasU)) // ú ù û
        letra = 'u';
    else
        letra = String.fromCharCode(code).toLowerCase();
            
    if(letras.indexOf(letra) != -1) {
        target.value += letra;
    }
}

function in_array (needle, haystack) {
    var key = '';
    for (key in haystack) {
        if (haystack[key] === needle) {                
            return true;
        }
    }
    return false;
}



function adicionaInputFile(id) {
    var obj = document.getElementById(id);
	var input = criaElemento("input", {"type" : "file", "name" : "imagens[]"});
    obj.appendChild(input);  
}

function maisGraduacoesAtualizar(obj, name, size) {
    var input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("name", name+"[0]"+"[]");
	input.setAttribute("size", size);
    $(obj).before(input); 
}


function desmarcaUnidades(id) {
	var inputs = $("#unidades").find(":radio");
	$(inputs).each(function(){
		if($(this).attr('id') != 'unidade'+id) {
			$(this).attr("checked", false);
		}
	});
}

function marcaUnidade(obj, id) {
	var inputs = $("#unidades").find(":radio");
	$(inputs).each(function(){
		if($(this).attr('id') != obj.id) {
			$(this).attr("checked", false);
		}
	});
	$("#unidade"+id).attr("checked", true);
}

function adicionaInputText(obj, name) {
	var input = criaElemento("input", {"type" : "text", "name" : name+"[0]"});
    $(obj).before(input); 
}



function adicionarCidade() {
	var form = document.getElementById("cadastro");
	var quantidadeCidades = form.getElementsByTagName("fieldset").length;
	var fieldset = criaElemento("fieldset", {"id" : "c"+quantidadeCidades});
	var legend = criaElemento("legend");
	var legendTexto = criaElementoTexto("Cidade");
	var strong = criaElemento("strong");
	strong.appendChild(legendTexto);
	legend.appendChild(strong);
	var span = criaElemento("span", {
			"class" : "jvscrpt", 
			"onclick" : "excluirCidade("+quantidadeCidades+")"
		}
	);
	var spanTexto = criaElementoTexto("(Excluir)");
	var strong = criaElemento("strong");
	strong.appendChild(spanTexto);
	span.appendChild(strong);
	legend.appendChild(span);
	
	var ul = criaElemento("ul");
	var li = criaElemento("li");
	var label = criaElemento("label", {"class" : "tamanho1", "for" : "Cidade"});
	var texto = criaElementoTexto("Cidade:");
	var input = criaElemento("input", {
			"type" : "text", 
			"size" : "80", 
			"name" : "cidades["+quantidadeCidades+"][cidade]"
		}
	);
	
	label.appendChild(texto);
	li.appendChild(label);
	li.appendChild(input);
	ul.appendChild(li);
	
	var li = criaElemento("li", {"class" : "left"});
	var label = criaElemento("label", {"class" : "tamanho3", "for" : "Desconto (R$)"});
	var texto = criaElementoTexto("Desconto (R$):");
	var input = criaElemento("input", {
			"type" : "text", 
			"class" : "valor", 
			"size" : "10", 
			"name" : "cidades["+quantidadeCidades+"][valorDesconto]",
			"value" : "0,00"
		}
	);
	
	label.appendChild(texto);
	li.appendChild(label);
	li.appendChild(input);
	ul.appendChild(li);
	
	var li = criaElemento("li", {"class" : "left"});
	var label = criaElemento("label", {"class" : "tamanho3", "for" : "Matrícula (R$)"});
	var texto = criaElementoTexto("Matrícula (R$):");
	var input = criaElemento("input", {
			"type" : "text", 
			"class" : "valor", 
			"size" : "10", 
			"name" : "cidades["+quantidadeCidades+"][valorMatricula]",
			"value" : "0,00"
		}
	);
	
	label.appendChild(texto);
	li.appendChild(label);
	li.appendChild(input);
	ul.appendChild(li);
	
	var li = criaElemento("li", {"class" : "left"});
	var label = criaElemento("label", {"class" : "tamanho3", "for" : "Curso (R$)"});
	var texto = criaElementoTexto("Curso (R$):");
	var input = criaElemento("input", {
			"type" : "text", 
			"class" : "valor", 
			"size" : "10", 
			"name" : "cidades["+quantidadeCidades+"][valorCurso]",
			"value" : "0,00"
		}
	);
	
	label.appendChild(texto);
	li.appendChild(label);
	li.appendChild(input);
	ul.appendChild(li);
	
	var li = criaElemento("li", {"class" : "left"});
	var label = criaElemento("label", {"class" : "tamanho3", "for" : "Qtde. parcelas"});
	var texto = criaElementoTexto("Qtde. parcelas:");
	var input = criaElemento("input", {
			"type" : "text", 
			"size" : "10", 
			"name" : "cidades["+quantidadeCidades+"][quantidadeParcelas]"
		}
	);
	
	label.appendChild(texto);
	li.appendChild(label);
	li.appendChild(input);
	ul.appendChild(li);
	
	var li = criaElemento("li", {"class" : "left"});
	var label = criaElemento("label", {"class" : "tamanho3", "for" : "Qtde. módulos"});
	var texto = criaElementoTexto("Qtde. módulos:");
	var input = criaElemento("input", {"type" : "text", "size" : "10", "name" : "cidades["+quantidadeCidades+"][quantidadeModulos]"});
	
	var inputHidden = criaElemento("input", {
			"type" : "hidden", 
			"name" : "cidades["+quantidadeCidades+"][id]", 
			"value" : "0"
		}
	);
	
	label.appendChild(texto);
	li.appendChild(label);
	li.appendChild(input);
	ul.appendChild(li);	
	
	fieldset.appendChild(legend);
	fieldset.appendChild(ul);
	fieldset.appendChild(inputHidden);
	
	$("#maisCidades").before(fieldset);
	$(".valor").autoNumeric({aSep: ".", aDec: ","});
	
}

function excluirCidade(id) {
	$("#c"+id).remove();
}

function maisCursos (obj) {
	var ul = $("#cursos");
	var quantidade = $(ul).children().length;
	var li = criaElemento("li");
	var label = criaElemento("label", {"class" : "left", "for" : "Curso"});
	label.appendChild(criaElementoTexto("Curso:"));
	li.appendChild(label);
	li.appendChild(criaElemento("input", {"type" : "hidden", "name" : "cursosDisciplinas["+quantidade+"][id]", "value" : "0"}));
	li.appendChild(criaElemento("input", {"type" : "text", "class" : "medio2", "name" : "cursosDisciplinas["+quantidade+"][curso]"}))
	var div = criaElemento("div");
	var label = criaElemento("label", {"for" : "Disciplinas"});
	label.appendChild(criaElementoTexto("Disciplinas:"));
	div.appendChild(label);
	div.appendChild(criaElemento("input", {"type" : "hidden", "name" : "cursosDisciplinas["+quantidade+"][disciplinas][0][id]"}));
	div.appendChild(criaElemento("input", {"type" : "text", "name" : "cursosDisciplinas["+quantidade+"][disciplinas][0][disciplina]"}));
	var span = criaElemento("span", {"class" : "jvscrpt", "onclick" : "maisDisciplinas(this)"});
	var strong = criaElemento("strong");
	strong.appendChild(criaElementoTexto("Mais Disciplinas"));
	span.appendChild(strong);
	div.appendChild(span);
	li.appendChild(div);
	$(ul).append(li);	
}

function maisDisciplinas (obj) {
	var ul = $("#cursos");
	var quantidadeCursos = $(ul).children().length - 1;
	var div = $(obj).parent();
	var quantidadeDisciplinas = div.find("input:not(:hidden)").length;
	$(obj).before(criaElemento("input", {"type" : "hidden", "name" : "cursosDisciplinas["+quantidadeCursos+"][disciplinas]["+quantidadeDisciplinas+"][id]", "value" : "0"}));
	$(obj).before(criaElemento("input", {"type" : "text", "name" : "cursosDisciplinas["+quantidadeCursos+"][disciplinas]["+quantidadeDisciplinas+"][disciplina]"}));
}

function maisGraduacoes (obj) {
	var li = $(obj).parent();
	var quantidade = li.find("input:not(:hidden)").length;
	var input = criaElemento("input", {"type" : "hidden", "name" : "graduacoes["+quantidade+"][id]", "value" : "0"});
	$(obj).before(input);
	var input = criaElemento("input", {"type" : "text", "name" : "graduacoes["+quantidade+"][graduacao]", "style" : "float:left; width:90%;"});
	$(obj).before(input);
}

function maisGraduacoesSenior (obj) {
	var li = $(obj).parent();
	var quantidade = li.find("input:not(:hidden)").length;
	var input = criaElemento("input", {"type" : "hidden", "name" : "graduacoesSenior["+quantidade+"][id]", "value" : "0"});
	$(obj).before(input);
	var input = criaElemento("input", {"type" : "text", "name" : "graduacoesSenior["+quantidade+"][graduacaoSenior]", "style" : "float:left; width:90%;"});
	$(obj).before(input);
}

function prematriculaCertificadora(obj) {
	redirect("?modulo=prematriculas&acao=nova&curso="+obj.value);
}

*/