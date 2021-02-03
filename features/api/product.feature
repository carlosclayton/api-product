# language: pt
Funcionalidade: Gerenciamento de produtos
    Como cliente do Sistema, gostaria de gerenciar os dados do produto

    Cenário: Lista de produtos
        Dados Que eu faço um "GET" no endpoint "/api/products"
        Entao Eu devo receber o código "200"


    Cenário: Novo produto
        Dados que eu tenha um produto
        E faço um "POST" no endpoint "/api/products"
        Entao Eu devo receber o código "200"


    Cenário: Visualizar produto
        Dados Que eu faço um "GET" no endpoint "/api/products/12"
        Entao Eu devo receber o código "200"

    Cenário: Editar produto
        Dados que eu tenha um produto
        E faço um "PUT" no endpoint "/api/products/12"
        Entao Eu devo receber o código "200"


    Cenário: Deletar produto
        E faço um "DELETE" no endpoint "/api/products/25"
        Entao Eu devo receber o código "201"
