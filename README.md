# Buscalab - por Techplan
 Este é um projeto universitário, feito pela equipe Techplan, formada na disciplina de Projeto Integrado I.

 ## O que é?
 O Buscalab é um sistema que almeja atender aos requisitos de transparência do MEC, à respeito dos itens contidos nos inventários do curso de Sistemas e Mídias Digitais.

 Além disso, também será uma plataforma de integração do usuário geral ao suporte técnico, visto que o sistema possibilitará que reclamações sobre equipamentos dos laboratórios sejam feitas diretamente a eles.
 
 ## Integrantes:
 - Jamile Sales
 - João Gabriel
 - Kauã Souza
 - Natan Fonseca
 - Pedro Enrico 
 - Rafí Mota

</br>

---

## Instalação


 Para instalar o projeto em seu computador, é necessário ter instalado o XAMMP : https://www.apachefriends.org/pt_br/index.html
 
 Após isso, insira o repositório baixado na pasta "htdocs", dentro da pasta "xammp".
 
 Em seguida abra o aplicativo e dê <strong>"start"</strong> nas opções Apache e MySQL e clique na opção "admin" em mysql.
 
 Após isso, no PHPMyadmin, crie um banco de dados com o nome "inventario_labs" e importe o arquivo .sql nesse banco.
 
 Por fim, vá no seu navegador e coloque o link "http://localhost/front-projeto-integrado/index.php"

</br>

 ## Tecnologias escolhidas
 </br>

[![Tecnologias escolhidas](https://skills.thijs.gg/icons?i=php,html,css,js,tailwind&theme=dark)](https://skills.thijs.gg)

PHP, HTML5, CSS3, JavaScript e Tailwind CSS.

 ## Tabela de requisitos

| Código [RFXXXXX]         | Tipo/Origem do requisito     | Funcionalidade | Situação |
|--------------|-----------|------------|------------|
| RFG0001 | Geral      | Visualização do inventário dos laboratórios        | Feito           |
| RFS0001      | **Suporte**  | Modificação do inventário dos laboratórios       | Feito           |
| RFS0002 | **Suporte**      | Login para perfil de administrador        | Feito           |
| RFS0003      | **Suporte**  | Logout       |  Feito          |
| RFG0002 | Geral      | Barra de pesquisa        |  Feito          |
| RFS0004      | **Suporte**  | Visualizar e gerenciar as reclamações       |   Feito         |
| RFA0001 | Geral      | "Reclame aqui" para notificar problemas diretamente ao suporte via site        | Feito           |
| RFG0003      | Geral  | Visualização dos softwares disponíveis       |  Feito          |
| RFS0005 | **Suporte**      | Modificação dos softwares disponíveis        |  Feito          |
| RFG0004      | Geral  | Visualização das regras de uso dos laboratórios       |  Feito          |