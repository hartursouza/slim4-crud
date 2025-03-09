# Projeto Slim com Plates Template

Este é um projeto simples utilizando o framework **Slim** para PHP e **Plates** como template engine. O projeto é containerizado usando **Docker** e gerenciado com **Composer**.

## Tecnologias

- **PHP** (com o framework Slim)
- **Plates** (template engine)
- **Docker** (para facilitar a configuração do ambiente)
- **Composer** (gerenciador de dependências PHP)

## Requisitos

Antes de rodar o projeto, você precisará ter as seguintes ferramentas instaladas em sua máquina:

- [Docker](https://www.docker.com/get-started)
- [Composer](https://getcomposer.org/)

## Como Rodar o Projeto

1. **Clone este repositório**:

   ```bash
   git clone https://github.com/hartursouza/slim4-crud.git
   cd seu-repositorio
   ```

2. **Construa e inicie o container Docker**:
   O Docker já está configurado com todos os requisitos necessários para rodar o projeto. O arquivo `docker-compose.yml` está configurado para usar o Dockerfile dentro da pasta `phpdocker`.

   ```bash
   docker-compose up --build
   ```

3. **Acesse o projeto**:
   Após a execução do comando acima, o projeto estará disponível no seu navegador em:
   ```
   http://localhost:8080
   ```

## Estrutura de Diretórios

- `app/`: Contém o código-fonte do projeto, como rotas, controladores e templates.
- `public/`: Contém os arquivos públicos, como o `index.php`, imagens, CSS e JavaScript.
- `phpdocker/`: Contém o `Dockerfile` e outros arquivos de configuração do Docker.
- `docker-compose.yml`: Arquivo de configuração do Docker Compose que define os serviços do Docker, incluindo o container PHP.

## Dependências

As dependências do projeto são gerenciadas pelo Composer. Para instalar as dependências, execute o seguinte comando dentro do container Docker:

```bash
docker-compose exec app composer install
```
