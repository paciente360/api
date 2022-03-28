Guia de integração - Paciente 360
=============

- [Introdução](#introdução)
- [Autenticação](#autenticação)
- [Casos clinicos](#casos-clinicos)
- [Webhook](#webhook)

# Introdução

Breve introdução explicando o uso da API

# Autenticação

Breve descrição explicando a autenticação

```js
var data = {
    // id do cliente fornecido pelo Paciente 360
    "client_id":"",

    // Chave de acesso fornecida pelo Paciente 360
    "client_key":"",

    // URL acessada após a autenticação do usuário (Opcional)
    "url":"",

    // Código do caso a ser executado após a autenticação do usuário (Opcional)
    "curso_id":1000,

    // URL que o usuário sera redirecionado após finalizar o caso (Opcional)
    "back_url":""

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

```

# Casos clinicos

A API retorna todos os casos liberados para a empresa.

```js
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">

    dados(function (callback){
        console.log(callback);
    })

    async function dados(callback){
        var response = await $.ajax({
            url: 'https://api.paciente360.com.br/integration/casos', // URL da api
            type: 'get', //método GET
            headers: {
                "client_id":"cursosactive", // id do cliente fornecido pelo Paciente 360
                "client_key":"12f41646537cbfd45b267451c152bbf3" // Chave de acesso fornecida pelo Paciente 360
            },
            dataType: 'json' //Formato de retorno dos dados
        });
        callback(response);
    }
   
 </script>
```

# Webhook
