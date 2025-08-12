# Instalação do PHP no Windows
LINGUAGEM E TÉCNICAS DE PROGRAMAÇÃO  
Prof. Flores

## Objetivos da Aula
- Compreender os pré-requisitos para instalação do PHP
- Escolher entre instalação standalone do PHP ou pacote XAMPP
- Realizar o download e instalação do PHP no Windows OU XAMPP
- Configurar as variáveis de ambiente (se necessário)
- Testar a instalação
- Configurar um servidor web básico

## ⚠️ IMPORTANTE: Duas Formas de Instalação


### **Opção A: Instalação Standalone do PHP**
- Instala apenas o PHP
- Requer configuração manual
- Mais controle sobre configurações
- Recomendado para: desenvolvedores experientes

### **Opção B: Instalação via XAMPP (Recomendado para Iniciantes)**
- Instala PHP + Apache + MySQL + phpMyAdmin automaticamente
- **NÃO requer instalação prévia do PHP**
- Configuração automática
- Ambiente completo de desenvolvimento
- Recomendado para: iniciantes e desenvolvimento rápido

**👉 Se você escolher o XAMPP (Opção B), pode pular diretamente para a Seção 7.**

---

## 1. Pré-requisitos

### Sistema Operacional
- Windows 10 ou Windows 11 (64-bit recomendado)
- Privilégios de administrador
- Conexão com a internet

### Ferramentas Necessárias
- Navegador web
- Editor de texto (Notepad++, VS Code, ou similar)
- Prompt de comando ou PowerShell

---

## 2. Download do PHP

### Passo 1: Acessar o Site Oficial
1. Abra seu navegador e acesse: **https://www.php.net/downloads**
2. Localize a seção "Current Stable PHP" 

### Passo 2: Escolher a Versão Correta
Para Windows, você verá várias opções:
- **VC15 x64 Non Thread Safe** - Recomendado para uso com IIS
- **VC15 x64 Thread Safe** - Recomendado para uso com Apache
- **VC15 x86** - Para sistemas 32-bit (menos comum)

**Recomendação:** Baixe a versão **Thread Safe x64** mais recente.

### Passo 3: Realizar o Download
1. Clique no link "Zip" da versão Thread Safe
2. Salve o arquivo (geralmente algo como `php-8.x.x-Win32-vs16-x64.zip`)
3. Aguarde o download concluir

---

## 3. Instalação do PHP

### Passo 1: Extrair os Arquivos
1. Navegue até a pasta onde o arquivo foi baixado
2. Clique com o botão direito no arquivo ZIP
3. Selecione "Extrair tudo..." ou use um programa como WinRAR/7-Zip
4. Extraia para: **`C:\php`** (crie esta pasta se não existir)


### Passo 2: Verificar a Estrutura de Pastas
Após a extração, a pasta `C:\php` deve conter:
- `php.exe` (executável principal)
- `php.ini-development` e `php.ini-production` (arquivos de configuração)
- Pasta `ext` (extensões)
- Pasta `extras`
- Diversos arquivos DLL

---

## 4. Configuração das Variáveis de Ambiente

### Passo 1: Acessar as Configurações do Sistema
1. Pressione `Windows + R`
2. Digite `sysdm.cpl` e pressione Enter
3. Clique na aba "Avançado"
4. Clique em "Variáveis de Ambiente"

### Passo 2: Modificar a Variável PATH
1. Na seção "Variáveis do sistema", localize e selecione "Path"
2. Clique em "Editar..."
3. Clique em "Novo"
4. Digite: **`C:\php`**
5. Clique em "OK" em todas as janelas


### Passo 3: Verificar a Configuração
1. Abra o Prompt de Comando (`cmd`)
2. Digite: `php --version`
3. Você deve ver informações sobre a versão do PHP instalada


---

## 5. Configuração Inicial do PHP

### Passo 1: Criar o Arquivo php.ini
1. Navegue até `C:\php`
2. Copie o arquivo `php.ini-development`
3. Renomeie a cópia para `php.ini`


### Passo 2: Configurações Básicas
Abra o arquivo `php.ini` em um editor de texto e localize/modifique:

```ini
; Definir o diretório de extensões
extension_dir = "C:/php/ext"

; Habilitar extensões comuns (remova o ; do início da linha)
extension=curl
extension=gd
extension=mbstring
extension=mysql
extension=mysqli
extension=pdo_mysql
extension=openssl
```

### Passo 3: Configurar Timezone
Localize e configure:
```ini
; Definir timezone
date.timezone = "America/Sao_Paulo"
```

---

## 6. Testando a Instalação

### Teste 1: Verificação via Linha de Comando
```bash
php --version
php -m
```


### Teste 2: Criar um Arquivo PHP de Teste
1. Crie uma pasta: `C:\xampp\htdocs` (ou qualquer pasta para seus projetos)
2. Crie um arquivo `info.php` com o conteúdo:

```php
<?php
phpinfo();
?>
```

### Teste 3: Executar via Servidor Embutido
1. Abra o prompt de comando
2. Navegue até a pasta do seu projeto:
   ```bash
   cd C:\xampp\htdocs
   ```
3. Execute o servidor embutido:
   ```bash
   php -S localhost:8000
   ```
4. Abra o navegador e acesse: `http://localhost:8000/info.php`


---

## 7. Instalação de um Servidor Web (Opcional)

### Opção 1: Usar o Servidor Embutido do PHP
```bash
php -S localhost:8000 -t C:\meus-projetos
```

### Opção 2: Instalar XAMPP (Recomendado para Iniciantes)

> **🔥 ATENÇÃO:** Se você escolher instalar o XAMPP, **NÃO é necessário** fazer a instalação standalone do PHP descrita nas seções anteriores (2-6). O XAMPP já inclui o PHP e faz toda a configuração automaticamente.

#### O que é o XAMPP?
XAMPP é um pacote de software livre que inclui:
- **Apache** - Servidor web
- **MySQL/MariaDB** - Sistema de gerenciamento de banco de dados
- **PHP** - Linguagem de programação
- **Perl** - Linguagem de programação adicional
- **phpMyAdmin** - Interface web para administração do MySQL

#### Passo 1: Download do XAMPP

1. **Acesse o site oficial:** https://www.apachefriends.org/
2. Clique no botão "Download" para Windows
3. Escolha a versão mais recente (geralmente a primeira opção)
4. O arquivo será algo como `xampp-windows-x64-8.x.x-0-VS16-installer.exe`


#### Passo 2: Executar o Instalador

1. **Localizar o arquivo baixado** e executar como administrador
2. Se aparecer um aviso do Windows Defender, clique em "Mais informações" → "Executar assim mesmo"
3. Se aparecer aviso sobre UAC (Controle de Conta de Usuário), clique em "OK"

#### Passo 3: Assistente de Instalação

**Tela 1 - Bem-vindo**
- Clique em "Next >"

**Tela 2 - Seleção de Componentes**
Marque os componentes que deseja instalar:
- ✅ **Apache** (obrigatório)
- ✅ **MySQL** (recomendado)
- ✅ **PHP** (obrigatório)
- ✅ **phpMyAdmin** (recomendado para gerenciar bancos)
- ⬜ **Perl** (opcional)
- ⬜ **Tomcat** (opcional - apenas se precisar de Java)
- ⬜ **Webalizer** (opcional - estatísticas web)
- ⬜ **Fake Sendmail** (opcional - para testes de email)


**Tela 3 - Pasta de Instalação**
- Pasta padrão: `C:\xampp`
- **Recomendação:** Mantenha a pasta padrão
- Clique em "Next >"


**Tela 4 - Idioma**
- Selecione "English" (interface mais estável)
- Clique em "Next >"

**Tela 5 - Pronto para Instalar**
- Clique em "Next >" para iniciar a instalação
- Aguarde o processo (pode levar alguns minutos)


#### Passo 4: Configuração Inicial

**Finalização da Instalação:**
1. ✅ Marque "Do you want to start the Control Panel now?"
2. Clique em "Finish"

#### Passo 5: Usando o Painel de Controle do XAMPP

**Interface Principal:**
O painel de controle mostra uma lista de serviços:
- **Apache** - Servidor web
- **MySQL** - Banco de dados
- **FileZilla** - Servidor FTP (se instalado)
- **Mercury** - Servidor de email (se instalado)
- **Tomcat** - Servidor Java (se instalado)


**Iniciando os Serviços:**
1. **Para Apache:** Clique no botão "Start" ao lado de Apache
   - Status mudará para "Running" com fundo verde
   - Mostrará as portas em uso (geralmente 80 e 443)

2. **Para MySQL:** Clique no botão "Start" ao lado de MySQL
   - Status mudará para "Running" com fundo verde
   - Mostrará a porta em uso (geralmente 3306)


#### Passo 6: Testando a Instalação

**Teste 1: Verificar o Apache**
1. Abra o navegador
2. Digite: `http://localhost` ou `http://127.0.0.1`
3. Deve aparecer a página de boas-vindas do XAMPP


**Teste 2: Verificar o PHP**
1. No navegador, acesse: `http://localhost/dashboard/`
2. Clique em "PHPInfo" no menu
3. Deve mostrar todas as informações do PHP


**Teste 3: Verificar o MySQL**
1. No painel do XAMPP, clique em "Admin" ao lado de MySQL
2. Ou acesse: `http://localhost/phpmyadmin/`
3. Deve abrir a interface do phpMyAdmin

#### Passo 7: Configurações Importantes

**Configurar Portas (se necessário):**
1. No painel XAMPP, clique em "Config" → "Service and Port Settings"
2. **Apache:** Porta padrão 80 (HTTP) e 443 (HTTPS)
3. **MySQL:** Porta padrão 3306
4. Altere apenas se houver conflitos


**Pasta de Projetos:**
- Seus arquivos PHP devem ficar em: `C:\xampp\htdocs\`
- Exemplo: `C:\xampp\htdocs\meu-projeto\index.php`
- Acessível via: `http://localhost/meu-projeto/`

#### Passo 8: Criando seu Primeiro Projeto

1. **Criar pasta:** `C:\xampp\htdocs\teste\`
2. **Criar arquivo:** `index.php` com o conteúdo:

```php
<!DOCTYPE html>
<html>
<head>
    <title>Meu Primeiro PHP</title>
</head>
<body>
    <h1>Olá, PHP!</h1>
    <?php
        echo "<p>PHP está funcionando!</p>";
        echo "<p>Data/Hora atual: " . date('d/m/Y H:i:s') . "</p>";
        
        // Testar conexão com MySQL
        $conexao = new mysqli("localhost", "root", "", "");
        if ($conexao->connect_error) {
            echo "<p style='color: red;'>Erro na conexão: " . $conexao->connect_error . "</p>";
        } else {
            echo "<p style='color: green;'>Conexão com MySQL OK!</p>";
        }
        $conexao->close();
    ?>
</body>
</html>
```

3. **Acessar:** `http://localhost/teste/`


#### Configurações Avançadas do XAMPP

**Configurar como Serviço do Windows:**
1. No painel XAMPP, clique no "X" vermelho ao lado de Apache/MySQL
2. Isso instalará como serviço do Windows
3. Os serviços iniciarão automaticamente com o Windows

**Configurar Virtual Hosts: (não é necessário nesse momento)**
1. Edite: `C:\xampp\apache\conf\extra\httpd-vhosts.conf`
2. Adicione:
```apache
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/meu-site"
    ServerName meu-site.local
</VirtualHost>
```
3. Edite: `C:\Windows\System32\drivers\etc\hosts` (como admin)
4. Adicione: `127.0.0.1 meu-site.local`

#### Resolução de Problemas Específicos do XAMPP

**Problema: Porta 80 em uso**
- **Causa:** Skype, IIS ou outros programas
- **Solução:** Alterar porta do Apache para 8080 ou desativar o programa conflitante

**Problema: MySQL não inicia**
- **Causa:** Outro MySQL instalado ou porta em uso
- **Solução:** Alterar porta ou desinstalar outros MySQL

**Problema: Apache não inicia**
- **Causa:** Firewall ou antivírus bloqueando
- **Solução:** Adicionar exceção no firewall/antivírus


---

## 8. Resolução de Problemas Comuns

### Problema: "php não é reconhecido como comando"
**Solução:**
1. Verifique se C:\php está no PATH
2. Reinicie o prompt de comando
3. Verifique se o php.exe existe em C:\php

### Problema: Extensões não carregam
**Solução:**
1. Verifique o `extension_dir` no php.ini
2. Certifique-se de que os arquivos DLL existem em C:\php\ext
3. Remova o `;` antes do nome da extensão

### Problema: Erros de timezone
**Solução:**
1. Configure `date.timezone` no php.ini
2. Use uma timezone válida da lista PHP

---

## 9. Próximos Passos

### Ferramentas de Desenvolvimento Recomendadas
- **Visual Studio Code** com extensões PHP
- **PHPStorm** (IDE profissional)
- **Composer** (gerenciador de dependências)

### Frameworks PHP Populares para Estudar
- Laravel
- Symfony
- CodeIgniter

### Recursos de Aprendizado
- Documentação oficial: https://www.php.net/manual/pt_BR/
- Tutoriais online
- Comunidades PHP brasileiras

---

## 10. Perguntas Frequentes (FAQ)

### **P: Se instalar o XAMPP, preciso instalar o PHP separadamente?**
**R:** **NÃO!** O XAMPP já inclui o PHP. Se você escolher o XAMPP, pode pular as seções 2-6 desta aula.

### **P: Qual opção escolher: PHP standalone ou XAMPP?**
**R:** 
- **XAMPP:** Para iniciantes, desenvolvimento rápido, ou se você precisa de Apache + MySQL
- **PHP standalone:** Para desenvolvedores experientes, servidores de produção, ou controle total

### **P: Posso ter os dois instalados?**
**R:** Tecnicamente sim, mas pode causar conflitos. Recomenda-se escolher uma opção.

### **P: O XAMPP instala qual versão do PHP?**
**R:** O XAMPP sempre vem com uma versão específica do PHP. Verifique na página de download qual versão está incluída.

### **P: Como verificar se o PHP está funcionando no XAMPP?**
**R:** Acesse `http://localhost/dashboard/` e clique em "PHPInfo".

## 11. Checklist de Verificação

- [ ] PHP baixado e extraído em C:\php
- [ ] Variável PATH configurada
- [ ] Comando `php --version` funcionando
- [ ] Arquivo php.ini criado e configurado
- [ ] Extensões básicas habilitadas
- [ ] Teste com phpinfo() realizado
- [ ] Servidor web configurado (embutido ou XAMPP)

---

## Chegamos ao final!

Você concluiu a instalação do PHP no Windows. Agora você tem um ambiente de desenvolvimento funcional para começar a programar em PHP. Lembre-se de sempre manter o PHP atualizado e explorar as configurações do php.ini conforme suas necessidades específicas.

Para dúvidas ou problemas, consulte a documentação oficial do PHP ou comunidades de desenvolvedores brasileiros.

---

## 👤 GitHub

[![Foto de Perfil](https://github.com/floresjcd.png?size=50)](https://github.com/floresjcd) 
**[@floresjcd](https://github.com/floresjcd)**


