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

# Webhook