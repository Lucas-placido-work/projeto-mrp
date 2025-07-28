## Como Usar

1. **Clone o repositório**  
  Faça o download ou clone este repositório em sua máquina local:
  ```bash
  git clone https://github.com/seu-usuario/projeto-mrp.git
  ```

2. **Configure o Banco de Dados**  
  - Importe o arquivo `componentes.sql` para criar o banco de dados e as tabelas necessárias.  
  - Utilize o phpMyAdmin ou o terminal MySQL:
    ```bash
    mysql -u root -p < componentes.sql
    ```

3. **Configure o Servidor**  
  - Certifique-se de que o XAMPP está instalado e em execução.
  - Copie os arquivos do projeto para a pasta `htdocs` do XAMPP (ex: `C:/xampp/htdocs/projeto-mrp`).
  - Inicie os serviços Apache e MySQL pelo painel do XAMPP.

4. **Acesse o Sistema**  
  - Abra o navegador e acesse:  
    ```
    http://localhost/projeto-mrp
    ```

## Funcionalidades

- Cadastro, edição e exclusão de componentes.
- Visualização de listas de componentes.
- Integração com banco de dados MySQL.
- Interface web simples e intuitiva.

## Estrutura do Projeto

```
projeto-mrp/
├── componentes.sql
├── index.php
├── includes/
│   └── conexao.php
├── css/
│   └── style.css
└── README.md
```

## Ferramentas Utilizadas

- **XAMPP**: Pacote com servidores Apache, MySQL, PHP e Perl.
- **PHP**: Linguagem principal do backend.
- **MySQL**: Banco de dados relacional.
- **HTML/CSS**: Estrutura e estilo das páginas.
- **phpMyAdmin**: Gerenciamento do banco de dados (opcional).

## Requisitos

- XAMPP instalado (ou Apache, PHP e MySQL configurados manualmente)
- Navegador web atualizado