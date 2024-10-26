# Desafio Técnico para SRE / DevOps Júnior

Bem-vindo ao desafio técnico para a vaga de SRE / DevOps Júnior. Este teste tem como objetivo avaliar suas habilidades em automação, provisionamento de infraestrutura e CI/CD. O desafio consiste em configurar e provisionar um ambiente de produção para uma aplicação Laravel usando Docker, Terraform, e Github Actions. Abaixo, você encontrará todos os detalhes necessários para completar o desafio.

---

## Objetivo do Desafio

Queremos avaliar suas habilidades nas seguintes áreas:
- Configuração de containers Docker para um ambiente de produção com PHP-FPM e Nginx.
- Provisionamento de infraestrutura na AWS usando Terraform.
- Automação de provisionamento de servidor usando Infrastructure as Code (IaC).
- Configuração de uma pipeline de CI/CD para validar o build do Docker.
- Documentação clara e detalhada do processo.

> **Nota:** Garanta que a rota `/health-check` esteja funcionando ao finalizar o provisionamento. Somente iremos avaliar as suas habilidades de deployment e automação. 

## Tarefas

### 1. Configuração do Ambiente de Produção com Docker e Docker-Compose

- **Objetivo**: Configurar um ambiente de produção para a aplicação Laravel usando Docker.
- **Requisitos**:
  - Criar um Dockerfile para configurar PHP-FPM e Nginx para servir a aplicação Laravel.
  - Criar um arquivo `docker-compose.yml` para gerenciar os containers.
  - Configurar os containers para que a aplicação Laravel esteja pronta para um ambiente de produção.
  - Mapear a porta `80` como porta externa do ambiente.

**Avaliaremos:**
  - Estrutura e clareza do Dockerfile e do `docker-compose.yml`.
  - Habilidade em configurar corretamente PHP-FPM e Nginx para produção.

### 2. Provisionamento de Infraestrutura na AWS com Terraform

- **Objetivo**: Configurar a infraestrutura na AWS usando Terraform.
- **Requisitos**:
  - Criar uma configuração Terraform para provisionar uma instância EC2 para o servidor.
  - Provisionar um banco de dados RDS (PostgreSQL) para a aplicação Laravel.
  - Garantir que as credenciais e outras variáveis sensíveis não estejam hardcoded no código (use variáveis de ambiente).
  - Garantir que essa instância possua acesso SSH para o seu IP e HTTP aberto.

**Avaliaremos:**
  - Segurança e uso correto de configurações da AWS.

### 3. Provisionamento do Servidor com Infrastructure as Code (IaC)

- **Objetivo**: Automatizar a configuração da instância EC2 para que ela esteja pronta para rodar a aplicação Laravel.
- **Requisitos**:
  - Utilizar a ferramenta de sua escolha para automação (Ansible, Bash, etc.).
  - Configurar o servidor para instalar e configurar todos os pacotes necessários para rodar a aplicação Laravel em produção.

**Avaliaremos:**
  - Clareza e organização do script de provisionamento.
  - Capacidade de reutilização do script.

### 4. Configuração de um Pipeline de CI/CD com Github Actions

- **Objetivo**: Configurar uma pipeline CI/CD que valide o build do Docker sempre que houver um commit na branch `main`.
- **Requisitos**:
  - Configurar uma ação no Github Actions que seja executada em todos os commits na branch `main`.
  - A ação deve fazer o build do Docker e verificar se não há erros no processo.

**Avaliaremos:**
  - Configuração da pipeline e clareza do workflow.
  - Manutenção e confiabilidade do processo de CI/CD.

### 5. Documentação

- **Objetivo**: Criar uma documentação clara de todo o processo de configuração e provisionamento.
- **Requisitos**:
  - Documentar todos os passos e decisões tomadas no projeto.
  - Incluir um guia rápido para manutenção do seu código.

**Avaliaremos:**
  - Clareza e completude da documentação.
  - Organização e facilidade de entendimento do processo.

---

## Instruções Finais

1. **Setup**: Para clonar e configurar o projeto/repositório, siga os seguintes passos:
	1. Crie um repositório privado no seu Github, ele **deve** estar vazio.
	2. Rode os seguintes comandos:
		```bash
		git clone https://github.com/Equipe-Proesc/desafio_tecnico_devops_sre.git
		cd desafio_tecnico_devops_sre.git
		rm -rf .git/
		git init
		git remote add origin git@github.com:{seuUsuario}/{nomeRepositorioPrivado}.git
		git add .
		git commit -m 'first commit :)'
		git branch -M main
		git push -u origin main
		```
> Esses comandos irão sincronizar o projeto do desafio com o seu repositório privado, assim pode já começar a desenvolver a solução e não se preocupar com esse setup do Github.
2. **Entrega**: Inclua os usuários `shadodan` e `Lorenalgm` no repositório privado. O repositório deve incluir todos os arquivos de configuração, scripts de provisionamento e workflows do Github Actions.
3. **Documentação**: Crie uma pasta `docs/` no repositório com todas as instruções e explicações do projeto.
4. **Prazos**: O tempo estimado para a execução deste desafio é de 5 a 7 dias, mas você pode entregar antes se desejar.

---

## Critérios de Avaliação

Iremos avaliar seu trabalho com base nos seguintes critérios:

- **Organização e Clareza**: Código limpo e organizado, com estrutura bem definida.
- **Aderência aos Requisitos**: Atendimento a todos os requisitos especificados.
- **Segurança**: Manipulação segura de credenciais e configuração de variáveis sensíveis.
- **Automação e Reutilização**: Habilidade em criar scripts e configurações que possam ser reutilizados em outros projetos.
- **Documentação**: Documentação clara, concisa e bem organizada.

---

Desejamos que esse desafio seja uma oportunidade de demonstrar suas habilidades e também um aprendizado. Boa sorte! Qualquer dúvida, não hesite em entrar em contato conosco.
