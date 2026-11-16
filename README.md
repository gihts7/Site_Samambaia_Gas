# Samambaia Gás

Sistema web (Projeto Integrador) para uma revenda de gás de cozinha, água mineral e acessórios. O cliente consulta o catálogo, monta o pedido, escolhe entrega ou retirada e envia pelo WhatsApp da empresa. Há também uma área administrativa para gerenciar produtos, usuários e pedidos.

## Tecnologias

HTML, CSS, Bootstrap, JavaScript, PHP, MySQL, Docker e phpMyAdmin.

## Funcionalidades

**Cliente**
- Cadastro, login e logout
- Recuperação de senha
- Visualização, edição e exclusão da própria conta
- Catálogo por categorias e montagem do pedido
- Entrega ou retirada, com endereço cadastrado ou digitado
- Pedido salvo no banco e mensagem pronta para o WhatsApp

**Administrador** (acesso restrito)
- Painel geral
- Cadastro, edição, exclusão e ativação de produtos
- Gerenciamento de usuários
- Consulta dos pedidos e seus detalhes

## Como executar

Requisito: Ter o Docker Desktop instalado (https://www.docker.com/products/docker-desktop/)

```bash
git clone https://github.com/gihts7/Site_Samambaia_Gas.git
cd Site_Samambaia_Gas
docker compose up --build -d
```

| Serviço | Endereço |
|---|---|
| Site | http://localhost:8080 |
| phpMyAdmin | http://localhost:8081 |

O banco `site_projetoIntegrador` é criado na primeira inicialização, a partir do arquivo `site_projetoIntegrador.sql`. Se o banco já existia, recrie com `docker compose down -v` e suba de novo.

Para encerrar: `docker compose down`

## Estrutura

- `www/`: site (páginas PHP, `admin/`, `css/`, `js/`, `imagens/`, `includes/`)
- `Dockerfile` e `docker-compose.yml`: ambiente
- `site_projetoIntegrador.sql` e `criar_admin.sql`: banco de dados

## Observações

- As credenciais do MySQL (`root` / `1234`) servem apenas para o ambiente de desenvolvimento. Não use em produção.

**Desenvolvido por Giovanna Teles** — Projeto Integrador, Samambaia Gás.