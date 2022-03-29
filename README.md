Guia de integração - Paciente 360
=============

- [Autenticação](#autenticação)
- [Casos clinicos](#casos-clinicos)
- [Webhook](#webhook)

# Autenticação

- Do lado do cliente acessar o link passando de parâmetro a hash de acesso 
- Do nosso lado, recebemos a hash e verificamos se ela é válida.
- Após a verificação da hash, a api pesquisa no banco de dados por um usuário com o e-mail informado e caso seja encontrado realiza o login automático, caso não encontre, efetua o cadastro com os dados informados e realiza o login automático.

```js
var data = {
    // id do cliente fornecido pelo Paciente 360
    "client_id":"",

    // Chave de acesso fornecida pelo Paciente 360
    "client_key":"",

    // Código do caso a ser executado após a autenticação do usuário (Opcional)
    "curso_id":"",

    // URL que o usuário sera redirecionado após finalizar o caso (Opcional)
    "back_url":"",

    // Informações do Usuário
    "user":{
        // Nome do usuário (Obrigatório)
        "name": "Fulano de da Silva",

        // E-mail do usuário (Obrigatório)
        "email": "fulano@google.com.br",

        // CRM do médico (Configurável de acordo com o cliente)
        "crm": "",

        // CRM UF do médico (Configurável de acordo com o cliente)
        "crm_uf": "",

        // Turma do aluno (Configurável de acordo com o cliente)
        "client_class":"",

        // Idioma do usuário ["pt-br","es","en"] (Configurável de acordo com o cliente)
        "client_lang":""
    }
}

// Para gerar a hash é necessário enviar as informações em formato json criptografadas em AES_256 
var hash = CryptoJS.AES.encrypt(JSON.stringify(data), data.client_key).toString();

// URL de acesso do usuário
var _url = 'https://api.paciente360.com.br/integration?h='+hash;

// Biblioteca utilizada para criptografia no exemplo acima
// https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js

```

# Casos clinicos

API de consulta que retorna todos os casos liberados para a empresa.

```js
$.ajax({
    url: 'https://api.paciente360.com.br/integration/casos', // Endpoint da API
    type: 'GET',
    dataType: 'json', //Formato de retorno dos dados
    headers: {
        "client_id":"", // id do cliente fornecido pelo Paciente 360
        "client_key":"" // Chave de acesso fornecida pelo Paciente 360
    },
    success:function(response){
        callback(response);
    }
});

// No exemplo acima foi utilizada a biblioteca jQuery
// https://code.jquery.com/jquery-3.5.1.min.js
```

# Webhook
