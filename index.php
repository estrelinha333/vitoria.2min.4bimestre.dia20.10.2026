<?php 

include("insert.php"); 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>

    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

    <div class="container">
        <form id="formCadastro">
            <div class="input-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
            </div>

            <div class="input-group">
                <label for="gmail">G-mail</label>
                <input type="email" id="gmail" name="gmail" placeholder="seu@gmail.com" required>
            </div>

            <button id="gravar" type="button">Gravar</button>
            <button id="limpar" type="reset">Limpar</button>
        </form>
    </div>

    <div class="input-group" id="div">
        <p id="mensagemStatus"></p>
    </div>


<script>  
$(document).ready(function(){
    
    $("#gravar").on('click', function(){
        
        var nome     = $("#nome").val();
        var gmail    = $("#gmail").val();

        
        if(nome === "" || gmail === "") {
            alert("Por favor, preencha todos os campos.");
            return false;
        }
        
        var request = $.ajax({
            url: "insert.php", 
            type: "POST",
            data: {
                nome: nome,
                gmail: gmail
            },
            dataType: "html"
        });

        request.done(function(resposta) {
            alert(resposta); 
            $("#mensagemStatus").html(resposta); 
        });

        request.fail(function(jqXHR, textStatus) {
            console.log("Erro na requisição: " + textStatus);
        });
    });
});
</script> 

</body>
</html>