function valida(){
			
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;
    
    if(nome == "") {
        alert("Preencha o nome");
        cadastro.nome.focus();
        return false;
    } else  if (email == "") {
        alert("Preencha o email");
        cadastro.email.focus();
        return false;
    } else  if (senha == "") {
        alert("Preencha a senha");
        cadastro.senha.focus();
        return false;
    }

}

function validaLivro(){
			
    var nome = document.getElementById('nome').value;
    var autor = document.getElementById('autor').value;
    var ano = document.getElementById('ano').value;
    var lugar = document.getElementById('lugar').value;
    
    if(nome == "") {
        alert("Preencha o nome");
        cadastra.nome.focus();
        return false;
    } else  if (autor == "") {
        alert("Preencha o autor");
        cadastra.autor.focus();
        return false;
    } else  if (ano == "") {
        alert("Preencha o ano");
        cadastra.ano.focus();
        return false;
    } else  if (lugar == "") {
        alert("Preencha o Local");
        cadastra.lugar.focus();
        return false;
    }

}

function validaLogin(){

    var emailLogin = login.emailLogin.value;
    var senhaLogin = login.senhaLogin.value;
    
    if(emailLogin == "") {
        alert("Preencha o email de login");
        login.emailLogin.focus();
        return false;
    } else  if (senhaLogin == "") {
        alert("Preencha a senha de login");
        login.senhaLogin.focus();
        return false;
    }

}