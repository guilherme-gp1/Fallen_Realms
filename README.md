# ⚔️ Fallen Realms

<p align="center">
  <img src="LINK_DA_LOGO_DO_PROJETO" alt="Fallen Realms Logo" width="400">
</p>

<p align="center">
  <strong>Explore um mundo de fantasia, crie seu personagem e construa sua própria jornada.</strong>
</p>

---

## 📖 Sobre o Projeto

**Fallen Realms** é um projeto de RPG medieval desenvolvido com o objetivo de proporcionar uma experiência de aventura e interpretação de personagens em um universo de fantasia.

No jogo, os jogadores poderão criar seus próprios personagens, escolher suas raças e classes, desenvolver seus atributos e selecionar habilidades e técnicas para construir seu próprio estilo de combate.

O projeto busca combinar elementos clássicos dos RPGs com funcionalidades de sistemas web, proporcionando uma experiência interativa e expansível.

## 🎮 Funcionalidades

- [x] Sistema de cadastro de usuários.
- [x] Sistema de login e autenticação.
- [x] Criação de personagens.
- [x] Seleção de raças e classes.
- [x] Distribuição de atributos do personagem.
- [ ] Sistema de seleção de habilidades.
- [ ] Sistema de seleção de técnicas.
- [ ] Sistema de gerenciamento de personagens.
- [ ] Sistema de combate.
- [ ] Sistema de experiência e evolução de nível.

*Observação: a lista representa o planejamento e o desenvolvimento do projeto. Os itens devem ser atualizados conforme as funcionalidades forem concluídas.*

## 🛠️ Tecnologias Utilizadas

As principais tecnologias utilizadas no desenvolvimento são:

| Tecnologia | Utilização |
|---|---|
| PHP | Linguagem de programação do backend |
| Laravel | Framework para desenvolvimento web |
| MySQL | Banco de dados relacional |
| JavaScript | Interatividade e funcionalidades dinâmicas |
| HTML5 | Estrutura das páginas |
| CSS3 | Estilização das páginas |
| Bootstrap 5 | Framework de interface |
| jQuery | Manipulação do DOM e requisições AJAX |

## 🗄️ Banco de Dados

O projeto utiliza MySQL para armazenar e organizar as informações do sistema.

Entre as principais entidades do banco de dados estão:

- Usuários
- Personagens
- Raças
- Classes
- Habilidades
- Técnicas
- Atributos e status dos personagens

O relacionamento entre essas entidades permite organizar os dados dos jogadores e suas respectivas escolhas durante a criação e evolução dos personagens.

## 💻 Como executar o projeto

### Pré-requisitos

Antes de iniciar, você precisará ter instalado:

- PHP
- Composer
- MySQL
- Node.js e NPM
- Laravel Herd (opcional, recomendado para ambiente local)

### 1. Clonar o repositório

```bash
git clone URL_DO_REPOSITORIO
```

### 2. Entrar na pasta do projeto

```bash
cd Fallen_Realms
```

### 3. Instalar as dependências

```bash
composer install
```

```bash
npm install
```

### 4. Configurar o ambiente

Crie seu arquivo `.env` a partir do modelo:

```bash
cp .env.example .env
```

Configure as informações do banco de dados no arquivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fallen_realms
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Gerar a chave da aplicação

```bash
php artisan key:generate
```

### 6. Executar as migrations

```bash
php artisan migrate
```

### 7. Iniciar o projeto

```bash
npm run dev
```

Em outro terminal, execute:

```bash
php artisan serve
```

A aplicação estará disponível em:

```text
http://127.0.0.1:8000
```

## 🖼️ Demonstração

*Em breve: imagens das principais telas do Fallen Realms.*

- Tela de login
- Menu principal
- Criação de personagem
- Seleção de habilidades e técnicas

## 🚧 Status do Projeto

<em>Em desenvolvimento.</em>

O Fallen Realms está em constante desenvolvimento, com novas funcionalidades sendo implementadas e melhorias sendo realizadas na estrutura do sistema.

## 👨‍💻 Desenvolvedor

Projeto desenvolvido por **[Guilherme de Oliveira Pinheiro]**.

## 📄 Licença

Este projeto foi desenvolvido para fins educacionais e de aprendizado.

---

<p align="center">
  <strong>⚔️ Fallen Realms — Sua jornada começa aqui.</strong>
</p>
