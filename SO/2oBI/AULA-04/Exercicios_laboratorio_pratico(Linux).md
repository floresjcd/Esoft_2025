> **Disciplina:** Sistemas Operacionais  
> **Tema:** Linux - Comandos Básicos  
> **Professor:** José Carlos Flores  
> **Curso:** Engenharia de Software  
> 
---


## Instruções Gerais

Antes de iniciar os exercícios, certifique-se de que você tem acesso a um terminal Linux. Você pode usar:

- Uma máquina virtual com Linux (VirtualBox, VMware)
- Uma distribuição Live (Ubuntu, Fedora, Debian em pen drive)
- Windows Subsystem for Linux (WSL)
- Um servidor Linux remoto via SSH

**Importante:** Leia cada exercício com atenção e execute os comandos exatamente como solicitado. Anote os resultados obtidos para comparação com o gabarito.

---

## PARTE 1: COMANDOS DE NAVEGAÇÃO

### Exercício 1.1: Descobrir o diretório atual

**Objetivo:** Aprender a usar o comando `pwd` para identificar sua localização no sistema de arquivos.

**Tarefa:**

1. Abra um terminal
2. Execute o comando `pwd` e anote o resultado
3. Qual é o diretório atual do seu usuário?

**Resultado esperado:** O caminho completo do seu diretório pessoal (ex: `/home/seu_usuario`)

---

### Exercício 1.2: Listar conteúdo do diretório

**Objetivo:** Usar o comando `ls` para visualizar os arquivos e pastas.

**Tarefas:**

1. Execute `ls` para listar o conteúdo do diretório atual
2. Execute `ls -l` para listar em formato longo
3. Execute `ls -a` para listar todos os arquivos, incluindo ocultos
4. Qual é a diferença entre os três comandos?

**Resultado esperado:** Listagens diferentes mostrando arquivos, permissões e datas.

---

### Exercício 1.3: Navegar para diferentes diretórios

**Objetivo:** Usar o comando `cd` para mudar de diretório.

**Tarefas:**

1. Execute `pwd` para confirmar sua posição atual
2. Execute `cd /home` para ir ao diretório /home
3. Execute `pwd` novamente para confirmar a mudança
4. Execute `cd /etc` para ir ao diretório /etc
5. Execute `ls` para ver o conteúdo de /etc
6. Execute `cd /` para ir à raiz do sistema
7. Execute `pwd` para confirmar que está na raiz

**Resultado esperado:** Você deve estar na raiz (/) ao final do exercício.

---

### Exercício 1.4: Voltar ao diretório anterior

**Objetivo:** Usar `cd ..` para subir um nível na hierarquia de diretórios.

**Tarefas:**

1. Certifique-se de que está em um diretório que não seja a raiz
2. Execute `pwd` para confirmar sua posição
3. Execute `cd ..` para subir um nível
4. Execute `pwd` novamente
5. Execute `cd ..` mais uma vez
6. Execute `pwd` para ver onde você está agora

**Resultado esperado:** Você deve ter subido dois níveis na hierarquia.

---

### Exercício 1.5: Ir diretamente para o diretório pessoal

**Objetivo:** Usar `cd ~` para voltar rapidamente ao seu diretório pessoal.

**Tarefas:**

1. Execute `cd /var/log` para ir para um diretório distante
2. Execute `pwd` para confirmar
3. Execute `cd ~` para voltar ao seu diretório pessoal
4. Execute `pwd` para confirmar que está em /home/seu_usuario

**Resultado esperado:** Você deve estar no seu diretório pessoal (/home/seu_usuario).

---

## PARTE 2: COMANDOS DE MANIPULAÇÃO

### Exercício 2.1: Criar um diretório

**Objetivo:** Usar o comando `mkdir` para criar diretórios.

**Tarefas:**

1. Certifique-se de que está em seu diretório pessoal (`cd ~`)
2. Execute `mkdir Projetos` para criar um diretório chamado Projetos
3. Execute `ls` para confirmar que o diretório foi criado
4. Execute `mkdir Projetos/Python Projetos/Java` para criar dois diretórios dentro de Projetos
5. Execute `ls Projetos` para listar o conteúdo de Projetos

**Resultado esperado:** Três diretórios criados: Projetos, Projetos/Python, Projetos/Java.

---

### Exercício 2.2: Criar arquivos vazios

**Objetivo:** Usar o comando `touch` para criar arquivos vazios.

**Tarefas:**

1. Navegue para o diretório Projetos criado no exercício anterior (`cd ~/Projetos`)
2. Execute `touch nota.txt` para criar um arquivo vazio
3. Execute `touch lista_tarefas.txt` para criar outro arquivo
4. Execute `ls -l` para ver os detalhes dos arquivos criados
5. Qual é o tamanho dos arquivos criados?

**Resultado esperado:** Dois arquivos vazios (0 bytes) criados em ~/Projetos.

---

### Exercício 2.3: Copiar arquivos

**Objetivo:** Usar o comando `cp` para copiar arquivos.

**Tarefas:**

1. Certifique-se de que está em ~/Projetos
2. Execute `cp nota.txt nota_backup.txt` para copiar o arquivo
3. Execute `ls -l` para confirmar que ambos os arquivos existem
4. Execute `cp nota.txt Python/` para copiar o arquivo para o diretório Python
5. Execute `ls Python/` para confirmar que o arquivo foi copiado

**Resultado esperado:** Arquivo copiado em dois locais diferentes.

---

### Exercício 2.4: Renomear arquivos

**Objetivo:** Usar o comando `mv` para renomear arquivos.

**Tarefas:**

1. Certifique-se de que está em ~/Projetos
2. Execute `mv lista_tarefas.txt tarefas.txt` para renomear o arquivo
3. Execute `ls` para confirmar o novo nome
4. Execute `mv tarefas.txt Python/` para mover o arquivo para o diretório Python
5. Execute `ls` para confirmar que o arquivo foi removido de Projetos
6. Execute `ls Python/` para confirmar que o arquivo está em Python

**Resultado esperado:** Arquivo renomeado e movido para outro diretório.

---

### Exercício 2.5: Remover arquivos

**Objetivo:** Usar o comando `rm` para remover arquivos.

**Tarefas:**

1. Certifique-se de que está em ~/Projetos
2. Execute `ls` para listar os arquivos
3. Execute `rm nota_backup.txt` para remover o arquivo de backup
4. Execute `ls` para confirmar que o arquivo foi removido
5. **Cuidado:** Não há "Lixeira" no Linux. Os arquivos deletados são permanentes!

**Resultado esperado:** Arquivo removido permanentemente.

---

### Exercício 2.6: Remover diretórios

**Objetivo:** Usar o comando `rm -r` para remover diretórios e seu conteúdo.

**Tarefas:**

1. Certifique-se de que está em ~/Projetos
2. Execute `mkdir temp` para criar um diretório temporário
3. Execute `touch temp/arquivo1.txt temp/arquivo2.txt` para criar arquivos dentro
4. Execute `ls -R` para ver a estrutura completa
5. Execute `rm -r temp` para remover o diretório e todo seu conteúdo
6. Execute `ls` para confirmar que o diretório foi removido

**Resultado esperado:** Diretório e todo seu conteúdo removidos.

---

## PARTE 3: COMANDOS DE VISUALIZAÇÃO

### Exercício 3.1: Visualizar conteúdo de arquivo com cat

**Objetivo:** Usar o comando `cat` para exibir o conteúdo de um arquivo.

**Preparação:**

1. Navegue para seu diretório pessoal (`cd ~`)

2. Crie um arquivo de teste com conteúdo:
   
   ```
   echo "Linha 1: Introdução ao Linux" > teste.txt
   echo "Linha 2: Aprendendo comandos" >> teste.txt
   echo "Linha 3: Terminal é poderoso" >> teste.txt
   ```

**Tarefas:**

1. Execute `cat teste.txt` para exibir o conteúdo
2. Execute `cat teste.txt teste.txt` para exibir o arquivo duas vezes
3. Qual é o conteúdo do arquivo?

**Resultado esperado:** Conteúdo do arquivo exibido no terminal.

---

### Exercício 3.2: Visualizar arquivo com less (Paginação)

**Objetivo:** Usar o comando `less` para visualizar arquivos grandes com paginação.

**Preparação:**

1. Crie um arquivo com mais conteúdo:
   
   ```
   for i in {1..50}; do echo "Linha $i: Conteúdo de exemplo"; done > grande.txt
   ```

**Tarefas:**

1. Execute `less grande.txt`
2. Use as seguintes teclas para navegar:
   - **Espaço:** Avança uma página
   - **b:** Volta uma página
   - **g:** Vai para o início do arquivo
   - **G:** Vai para o final do arquivo
   - **q:** Sai do less
3. Quantas linhas tem o arquivo?

**Resultado esperado:** Arquivo visualizado com paginação.

---

### Exercício 3.3: Ver as primeiras linhas com head

**Objetivo:** Usar o comando `head` para visualizar as primeiras linhas de um arquivo.

**Tarefas:**

1. Execute `head grande.txt` para ver as primeiras 10 linhas
2. Execute `head -n 5 grande.txt` para ver apenas as primeiras 5 linhas
3. Execute `head -n 1 grande.txt` para ver apenas a primeira linha
4. Qual é a primeira linha do arquivo?

**Resultado esperado:** Primeiras linhas do arquivo exibidas.

---

### Exercício 3.4: Ver as últimas linhas com tail

**Objetivo:** Usar o comando `tail` para visualizar as últimas linhas de um arquivo.

**Tarefas:**

1. Execute `tail grande.txt` para ver as últimas 10 linhas
2. Execute `tail -n 3 grande.txt` para ver apenas as últimas 3 linhas
3. Execute `tail -n 1 grande.txt` para ver apenas a última linha
4. Qual é a última linha do arquivo?

**Resultado esperado:** Últimas linhas do arquivo exibidas.

---

### Exercício 3.5: Monitorar arquivo em tempo real

**Objetivo:** Usar `tail -f` para monitorar mudanças em um arquivo em tempo real.

**Preparação:**

1. Abra dois terminais (ou use split screen)

**Tarefas (Terminal 1):**

1. Execute `tail -f grande.txt` para monitorar o arquivo

**Tarefas (Terminal 2):**

1. Execute `echo "Nova linha adicionada" >> grande.txt`
2. Execute novamente `echo "Outra linha" >> grande.txt`
3. Observe o Terminal 1 para ver as mudanças em tempo real

**Resultado esperado:** Novas linhas aparecem automaticamente no Terminal 1 conforme são adicionadas.

---

### Exercício 3.6: Contar linhas, palavras e caracteres

**Objetivo:** Usar o comando `wc` para contar informações sobre um arquivo.

**Tarefas:**

1. Execute `wc grande.txt` para ver linhas, palavras e caracteres
2. Execute `wc -l grande.txt` para contar apenas linhas
3. Execute `wc -w grande.txt` para contar apenas palavras
4. Execute `wc -c grande.txt` para contar apenas caracteres
5. Quantas linhas tem o arquivo grande.txt?

**Resultado esperado:** Diferentes contagens do arquivo.

---

## PARTE 4: EXERCÍCIOS COMBINADOS

### Exercício 4.1: Criar estrutura de projeto

**Objetivo:** Combinar vários comandos para criar uma estrutura de projeto realista.

**Tarefas:**

1. Navegue para seu diretório pessoal (`cd ~`)

2. Crie a seguinte estrutura de diretórios:
   
   ```
   MeuProjeto/
   ├── src/
   ├── docs/
   ├── testes/
   └── dados/
   ```

3. Crie um arquivo README.md em MeuProjeto

4. Crie um arquivo main.py em src/

5. Crie um arquivo teste.py em testes/

6. Liste toda a estrutura usando `ls -R MeuProjeto`

**Resultado esperado:** Estrutura de projeto completa criada.

---

### Exercício 4.2: Copiar estrutura completa

**Objetivo:** Copiar um diretório inteiro com todo seu conteúdo.

**Tarefas:**

1. Copie o diretório MeuProjeto para MeuProjeto_backup usando `cp -r MeuProjeto MeuProjeto_backup`
2. Execute `ls -R` para confirmar que ambos os diretórios existem
3. Modifique um arquivo em MeuProjeto (ex: `echo "modificado" >> MeuProjeto/README.md`)
4. Verifique que MeuProjeto_backup não foi modificado usando `cat MeuProjeto_backup/README.md`

**Resultado esperado:** Cópia completa e independente do diretório.

---

### Exercício 4.3: Limpeza de arquivos antigos

**Objetivo:** Remover múltiplos arquivos e diretórios.

**Tarefas:**

1. Crie vários arquivos de teste: `touch arquivo1.txt arquivo2.txt arquivo3.txt`
2. Crie um diretório temporário: `mkdir temp_files`
3. Mova os arquivos para o diretório: `mv arquivo*.txt temp_files/`
4. Verifique o conteúdo: `ls temp_files/`
5. Remova o diretório inteiro: `rm -r temp_files`
6. Confirme que foi removido: `ls`

**Resultado esperado:** Diretório e arquivos removidos.

---

### Exercício 4.4: Análise de arquivo de Log

**Objetivo:** Usar comandos de visualização para analisar um arquivo de log.

**Preparação:**

1. Crie um arquivo de log simulado:
   
   ```
   cat > sistema.log << 'EOF'
   [2024-01-15 08:00:00] Sistema iniciado
   [2024-01-15 08:05:00] Usuário login
   [2024-01-15 08:10:00] Aplicação iniciada
   [2024-01-15 08:15:00] Processamento em andamento
   [2024-01-15 08:20:00] Erro detectado
   [2024-01-15 08:25:00] Erro corrigido
   [2024-01-15 08:30:00] Processamento concluído
   [2024-01-15 08:35:00] Usuário logout
   [2024-01-15 08:40:00] Sistema encerrado
   EOF
   ```

**Tarefas:**

1. Exiba todo o arquivo: `cat sistema.log`
2. Veja apenas as primeiras 3 linhas: `head -n 3 sistema.log`
3. Veja apenas as últimas 3 linhas: `tail -n 3 sistema.log`
4. Conte o número de linhas: `wc -l sistema.log`
5. Procure por "Erro": `grep "Erro" sistema.log`

**Resultado esperado:** Análise completa do arquivo de log.

---

### Exercício 4.5: Comparação de arquivos

**Objetivo:** Criar e comparar versões diferentes de um arquivo.

**Tarefas:**

1. Crie um arquivo original: `echo -e "Linha A\nLinha B\nLinha C" > original.txt`
2. Copie para criar uma versão modificada: `cp original.txt modificado.txt`
3. Modifique a cópia: `echo "Linha D" >> modificado.txt`
4. Veja o conteúdo de ambos: `cat original.txt` e `cat modificado.txt`
5. Use `diff` para comparar: `diff original.txt modificado.txt`

**Resultado esperado:** Diferenças entre os arquivos exibidas.

---

## PARTE 5: DESAFIOS AVANÇADOS

### Desafio 5.1: Organizar arquivos por tipo

**Objetivo:** Criar uma estrutura de diretórios e organizar arquivos.

**Tarefas:**

1. Crie um diretório chamado `Arquivos`

2. Crie subdiretórios: `Documentos`, `Imagens`, `Videos`

3. Crie vários arquivos de teste com extensões diferentes:
   
   ```
   touch Arquivos/relatorio.txt Arquivos/apresentacao.txt
   touch Arquivos/foto.jpg Arquivos/imagem.png
   touch Arquivos/video.mp4 Arquivos/filme.mkv
   ```

4. Mova os arquivos para seus respectivos diretórios

5. Liste a estrutura final

**Resultado esperado:** Arquivos organizados por tipo em diretórios específicos.

---

### Desafio 5.2: Criar backup de diretório

**Objetivo:** Criar um backup completo de um diretório com timestamp.

**Tarefas:**

1. Crie um diretório com alguns arquivos
2. Crie um backup usando: `cp -r MeuProjeto MeuProjeto_backup_$(date +%Y%m%d)`
3. Verifique que o backup foi criado com o nome correto
4. Modifique um arquivo no original
5. Confirme que o backup não foi modificado

**Resultado esperado:** Backup criado com timestamp no nome.

---

### Desafio 5.3: Limpeza Segura

**Objetivo:** Remover arquivos antigos mantendo um registro.

**Tarefas:**

1. Crie vários arquivos de teste
2. Antes de remover, crie um arquivo listando o que será removido: `ls > arquivos_a_remover.txt`
3. Visualize o arquivo: `cat arquivos_a_remover.txt`
4. Remova os arquivos
5. Mantenha o registro em um arquivo chamado `limpeza_log.txt`

**Resultado esperado:** Registro de limpeza mantido para auditoria.

---

---

# GABARITO

## PARTE 1: COMANDOS DE NAVEGAÇÃO

### Gabarito 1.1: Descobrir o diretório atual

**Comando executado:**

```bash
$ pwd
```

**Resultado esperado:**

```
/home/seu_usuario
```

**Explicação:** O comando `pwd` (Print Working Directory) exibe o caminho completo do diretório atual. Cada usuário tem seu próprio diretório pessoal em `/home/nome_do_usuario`.

---

### Gabarito 1.2: Listar conteúdo do diretório

**Comandos executados:**

```bash
$ ls
$ ls -l
$ ls -a
```

**Resultados esperados:**

1. **`ls`** - Lista simples de arquivos e diretórios

2. **`ls -l`** - Lista em formato longo com detalhes:
   
   - Permissões
   - Número de links
   - Proprietário
   - Grupo
   - Tamanho
   - Data e hora
   - Nome do arquivo

3. **`ls -a`** - Lista todos os arquivos, incluindo os ocultos (que começam com `.`)

**Explicação:** O comando `ls` tem várias opções. A opção `-l` fornece informações detalhadas, enquanto `-a` mostra arquivos ocultos que normalmente não aparecem.

---

### Gabarito 1.3: Navegar para diferentes diretórios

**Comandos executados:**

```bash
$ pwd
/home/seu_usuario

$ cd /home
$ pwd
/home

$ cd /etc
$ ls
# (lista de arquivos de configuração)

$ cd /
$ pwd
/
```

**Explicação:** O comando `cd` (Change Directory) permite navegar entre diretórios. Você pode usar caminhos absolutos (começando com `/`) ou relativos. A raiz do sistema é `/`, onde todos os outros diretórios estão localizados.

---

### Gabarito 1.4: Voltar ao diretório anterior

**Comandos executados:**

```bash
$ pwd
# (diretório atual, ex: /home/seu_usuario)

$ cd ..
$ pwd
# (diretório pai, ex: /home)

$ cd ..
$ pwd
# (diretório avô, ex: /)
```

**Explicação:** O comando `cd ..` sobe um nível na hierarquia de diretórios. Cada `..` representa o diretório pai. Se você estiver em `/home/seu_usuario/Projetos`, `cd ..` o levará a `/home/seu_usuario`.

---

### Gabarito 1.5: Ir diretamente para o diretório pessoal

**Comandos executados:**

```bash
$ cd /var/log
$ pwd
/var/log

$ cd ~
$ pwd
/home/seu_usuario
```

**Explicação:** O símbolo `~` (til) é um atalho para o diretório pessoal do usuário. É equivalente a `/home/seu_usuario`. Você também pode usar `cd` sem argumentos para ir ao diretório pessoal.

---

## PARTE 2: COMANDOS DE MANIPULAÇÃO

### Gabarito 2.1: Criar um diretório

**Comandos executados:**

```bash
$ cd ~
$ mkdir Projetos
$ ls
# Projetos aparece na listagem

$ mkdir Projetos/Python Projetos/Java
$ ls Projetos
Java  Python
```

**Explicação:** O comando `mkdir` (Make Directory) cria novos diretórios. Você pode criar múltiplos diretórios em uma única linha separando-os com espaço. Também é possível criar diretórios aninhados.

---

### Gabarito 2.2: Criar arquivos vazios

**Comandos executados:**

```bash
$ cd ~/Projetos
$ touch nota.txt
$ touch lista_tarefas.txt
$ ls -l
-rw-r--r-- 1 usuario usuario 0 Jan 15 10:00 nota.txt
-rw-r--r-- 1 usuario usuario 0 Jan 15 10:01 lista_tarefas.txt
```

**Explicação:** O comando `touch` cria um arquivo vazio ou atualiza a data de modificação se o arquivo já existe. Os arquivos criados têm tamanho 0 bytes. As permissões padrão são `-rw-r--r--`, significando que o proprietário pode ler e escrever, enquanto outros apenas podem ler.

---

### Gabarito 2.3: Copiar arquivos

**Comandos executados:**

```bash
$ cd ~/Projetos
$ cp nota.txt nota_backup.txt
$ ls -l
-rw-r--r-- 1 usuario usuario 0 Jan 15 10:00 nota.txt
-rw-r--r-- 1 usuario usuario 0 Jan 15 10:00 nota_backup.txt

$ cp nota.txt Python/
$ ls Python/
nota.txt
```

**Explicação:** O comando `cp` (Copy) copia arquivos. Você pode copiar para um novo nome no mesmo diretório ou para outro diretório. Se o destino for um diretório, o arquivo mantém seu nome original.

---

### Gabarito 2.4: Renomear arquivos

**Comandos executados:**

```bash
$ cd ~/Projetos
$ mv lista_tarefas.txt tarefas.txt
$ ls
nota.txt  nota_backup.txt  tarefas.txt  Java  Python

$ mv tarefas.txt Python/
$ ls
nota.txt  nota_backup.txt  Java  Python

$ ls Python/
nota.txt  tarefas.txt
```

**Explicação:** O comando `mv` (Move) serve para mover ou renomear arquivos. Se o destino for um diretório, o arquivo é movido para lá. Se for um nome de arquivo, o arquivo é renomeado.

---

### Gabarito 2.5: Remover arquivos

**Comandos executados:**

```bash
$ cd ~/Projetos
$ ls
nota.txt  nota_backup.txt  Java  Python

$ rm nota_backup.txt
$ ls
nota.txt  Java  Python
```

**Explicação:** O comando `rm` (Remove) remove arquivos permanentemente. Diferente do Windows/Mac, não existe "Lixeira" no Linux. Uma vez removido, o arquivo não pode ser recuperado facilmente. Sempre verifique o que está removendo!

---

### Gabarito 2.6: Remover diretórios

**Comandos executados:**

```bash
$ cd ~/Projetos
$ mkdir temp
$ touch temp/arquivo1.txt temp/arquivo2.txt
$ ls -R
.:
Java  Python  nota.txt  temp

./Java:

./Python:
nota.txt  tarefas.txt

./temp:
arquivo1.txt  arquivo2.txt

$ rm -r temp
$ ls
Java  Python  nota.txt
```

**Explicação:** O comando `rm -r` (Remove Recursive) remove um diretório e todo seu conteúdo. A opção `-r` significa "recursivamente", ou seja, remove o diretório e todos os arquivos e subdiretórios dentro dele. **Cuidado extremo ao usar este comando!**

---

## PARTE 3: COMANDOS DE VISUALIZAÇÃO

### Gabarito 3.1: Visualizar conteúdo de arquivo com cat

**Preparação:**

```bash
$ echo "Linha 1: Introdução ao Linux" > teste.txt
$ echo "Linha 2: Aprendendo comandos" >> teste.txt
$ echo "Linha 3: Terminal é poderoso" >> teste.txt
```

**Comandos executados:**

```bash
$ cat teste.txt
Linha 1: Introdução ao Linux
Linha 2: Aprendendo comandos
Linha 3: Terminal é poderoso

$ cat teste.txt teste.txt
Linha 1: Introdução ao Linux
Linha 2: Aprendendo comandos
Linha 3: Terminal é poderoso
Linha 1: Introdução ao Linux
Linha 2: Aprendendo comandos
Linha 3: Terminal é poderoso
```

**Explicação:** O comando `cat` (Concatenate) exibe o conteúdo de um arquivo. Se você fornecer múltiplos arquivos, ele concatena e exibe todos. É útil para visualizar arquivos pequenos, mas para arquivos grandes, use `less` ou `more`.

---

### Gabarito 3.2: Visualizar arquivo com less (Paginação)

**Preparação:**

```bash
$ for i in {1..50}; do echo "Linha $i: Conteúdo de exemplo"; done > grande.txt
```

**Comandos executados:**

```bash
$ less grande.txt
# (abre o arquivo em modo paginado)
```

**Navegação:**

- **Espaço:** Avança uma página
- **b:** Volta uma página
- **g:** Vai para o início (first page)
- **G:** Vai para o final (last page)
- **q:** Sai do less

**Explicação:** O comando `less` permite visualizar arquivos grandes com paginação. É muito útil para ler logs e arquivos de configuração. O arquivo tem 50 linhas.

---

### Gabarito 3.3: Ver as primeiras linhas com head

**Comandos executados:**

```bash
$ head grande.txt
Linha 1: Conteúdo de exemplo
Linha 2: Conteúdo de exemplo
Linha 3: Conteúdo de exemplo
Linha 4: Conteúdo de exemplo
Linha 5: Conteúdo de exemplo
Linha 6: Conteúdo de exemplo
Linha 7: Conteúdo de exemplo
Linha 8: Conteúdo de exemplo
Linha 9: Conteúdo de exemplo
Linha 10: Conteúdo de exemplo

$ head -n 5 grande.txt
Linha 1: Conteúdo de exemplo
Linha 2: Conteúdo de exemplo
Linha 3: Conteúdo de exemplo
Linha 4: Conteúdo de exemplo
Linha 5: Conteúdo de exemplo

$ head -n 1 grande.txt
Linha 1: Conteúdo de exemplo
```

**Explicação:** O comando `head` exibe as primeiras linhas de um arquivo. Por padrão, mostra 10 linhas. Use `-n` para especificar um número diferente.

---

### Gabarito 3.4: Ver as últimas linhas com tail

**Comandos executados:**

```bash
$ tail grande.txt
Linha 41: Conteúdo de exemplo
Linha 42: Conteúdo de exemplo
Linha 43: Conteúdo de exemplo
Linha 44: Conteúdo de exemplo
Linha 45: Conteúdo de exemplo
Linha 46: Conteúdo de exemplo
Linha 47: Conteúdo de exemplo
Linha 48: Conteúdo de exemplo
Linha 49: Conteúdo de exemplo
Linha 50: Conteúdo de exemplo

$ tail -n 3 grande.txt
Linha 48: Conteúdo de exemplo
Linha 49: Conteúdo de exemplo
Linha 50: Conteúdo de exemplo

$ tail -n 1 grande.txt
Linha 50: Conteúdo de exemplo
```

**Explicação:** O comando `tail` exibe as últimas linhas de um arquivo. Por padrão, mostra 10 linhas. Use `-n` para especificar um número diferente. É muito útil para monitorar logs em tempo real.

---

### Gabarito 3.5: Monitorar arquivo em tempo real

**Terminal 1:**

```bash
$ tail -f grande.txt
Linha 41: Conteúdo de exemplo
Linha 42: Conteúdo de exemplo
...
Linha 50: Conteúdo de exemplo
Nova linha adicionada
Outra linha
```

**Terminal 2:**

```bash
$ echo "Nova linha adicionada" >> grande.txt
$ echo "Outra linha" >> grande.txt
```

**Explicação:** O comando `tail -f` (follow) monitora um arquivo em tempo real. Sempre que novas linhas são adicionadas, elas aparecem automaticamente. É muito usado para monitorar logs de aplicações e do sistema.

---

### Gabarito 3.6: Contar linhas, palavras e caracteres

**Comandos executados:**

```bash
$ wc grande.txt
 50 300 1650 grande.txt
# (50 linhas, 300 palavras, 1650 caracteres)

$ wc -l grande.txt
50 grande.txt

$ wc -w grande.txt
300 grande.txt

$ wc -c grande.txt
1650 grande.txt
```

**Explicação:** O comando `wc` (Word Count) conta linhas, palavras e caracteres. As opções são:

- `-l`: Conta apenas linhas
- `-w`: Conta apenas palavras
- `-c`: Conta apenas caracteres

---

## PARTE 4: EXERCÍCIOS COMBINADOS

### Gabarito 4.1: Criar estrutura de projeto

**Comandos executados:**

```bash
$ cd ~
$ mkdir -p MeuProjeto/{src,docs,testes,dados}
$ touch MeuProjeto/README.md
$ touch MeuProjeto/src/main.py
$ touch MeuProjeto/testes/teste.py
$ ls -R MeuProjeto
MeuProjeto/:
README.md  dados  docs  src  testes

MeuProjeto/dados:

MeuProjeto/docs:

MeuProjeto/src:
main.py

MeuProjeto/testes:
teste.py
```

**Explicação:** O comando `mkdir -p` cria diretórios aninhados em uma única linha. A sintaxe `{src,docs,testes,dados}` cria múltiplos diretórios. O comando `ls -R` lista recursivamente toda a estrutura.

---

### Gabarito 4.2: Copiar estrutura completa

**Comandos executados:**

```bash
$ cp -r MeuProjeto MeuProjeto_backup
$ ls -R
# (mostra ambos os diretórios)

$ echo "modificado" >> MeuProjeto/README.md
$ cat MeuProjeto/README.md
modificado

$ cat MeuProjeto_backup/README.md
# (arquivo vazio, não foi modificado)
```

**Explicação:** O comando `cp -r` copia um diretório inteiro com todo seu conteúdo. A cópia é independente, portanto modificações em um não afetam o outro.

---

### Gabarito 4.3: Limpeza de arquivos antigos

**Comandos executados:**

```bash
$ touch arquivo1.txt arquivo2.txt arquivo3.txt
$ mkdir temp_files
$ mv arquivo*.txt temp_files/
$ ls temp_files/
arquivo1.txt  arquivo2.txt  arquivo3.txt

$ rm -r temp_files
$ ls
# (temp_files não aparece mais)
```

**Explicação:** O padrão `arquivo*.txt` (glob pattern) corresponde a todos os arquivos que começam com "arquivo" e terminam com ".txt". Isso permite manipular múltiplos arquivos em uma única linha.

---

### Gabarito 4.4: Análise de arquivo de Log

**Preparação:**

```bash
$ cat > sistema.log << 'EOF'
[2024-01-15 08:00:00] Sistema iniciado
[2024-01-15 08:05:00] Usuário login
[2024-01-15 08:10:00] Aplicação iniciada
[2024-01-15 08:15:00] Processamento em andamento
[2024-01-15 08:20:00] Erro detectado
[2024-01-15 08:25:00] Erro corrigido
[2024-01-15 08:30:00] Processamento concluído
[2024-01-15 08:35:00] Usuário logout
[2024-01-15 08:40:00] Sistema encerrado
EOF
```

**Comandos executados:**

```bash
$ cat sistema.log
[2024-01-15 08:00:00] Sistema iniciado
[2024-01-15 08:05:00] Usuário login
[2024-01-15 08:10:00] Aplicação iniciada
[2024-01-15 08:15:00] Processamento em andamento
[2024-01-15 08:20:00] Erro detectado
[2024-01-15 08:25:00] Erro corrigido
[2024-01-15 08:30:00] Processamento concluído
[2024-01-15 08:35:00] Usuário logout
[2024-01-15 08:40:00] Sistema encerrado

$ head -n 3 sistema.log
[2024-01-15 08:00:00] Sistema iniciado
[2024-01-15 08:05:00] Usuário login
[2024-01-15 08:10:00] Aplicação iniciada

$ tail -n 3 sistema.log
[2024-01-15 08:30:00] Processamento concluído
[2024-01-15 08:35:00] Usuário logout
[2024-01-15 08:40:00] Sistema encerrado

$ wc -l sistema.log
9 sistema.log

$ grep "Erro" sistema.log
[2024-01-15 08:20:00] Erro detectado
[2024-01-15 08:25:00] Erro corrigido
```

**Explicação:** O comando `grep` procura por um padrão em um arquivo. Neste caso, encontra todas as linhas contendo "Erro". Isso é muito útil para análise de logs.

---

### Gabarito 4.5: Comparação de arquivos

**Comandos executados:**

```bash
$ echo -e "Linha A\nLinha B\nLinha C" > original.txt
$ cat original.txt
Linha A
Linha B
Linha C

$ cp original.txt modificado.txt
$ echo "Linha D" >> modificado.txt
$ cat modificado.txt
Linha A
Linha B
Linha C
Linha D

$ diff original.txt modificado.txt
3a4
> Linha D
```

**Explicação:** O comando `diff` compara dois arquivos e mostra as diferenças. A saída `3a4` significa "após a linha 3, adicione a linha 4". O `>` indica linhas presentes apenas no segundo arquivo.

---

## PARTE 5: DESAFIOS AVANÇADOS

### Gabarito Desafio 5.1: Organizar arquivos por tipo

**Comandos executados:**

```bash
$ mkdir -p Arquivos/{Documentos,Imagens,Videos}
$ touch Arquivos/relatorio.txt Arquivos/apresentacao.txt
$ touch Arquivos/foto.jpg Arquivos/imagem.png
$ touch Arquivos/video.mp4 Arquivos/filme.mkv

$ mv Arquivos/relatorio.txt Arquivos/apresentacao.txt Arquivos/Documentos/
$ mv Arquivos/foto.jpg Arquivos/imagem.png Arquivos/Imagens/
$ mv Arquivos/video.mp4 Arquivos/filme.mkv Arquivos/Videos/

$ ls -R Arquivos
Arquivos/:
Documentos  Imagens  Videos

Arquivos/Documentos:
apresentacao.txt  relatorio.txt

Arquivos/Imagens:
foto.jpg  imagem.png

Arquivos/Videos:
filme.mkv  video.mp4
```

**Explicação:** Este desafio combina criação de diretórios, criação de arquivos e movimentação de arquivos. A estrutura final organiza os arquivos por tipo em diretórios específicos.

---

### Gabarito Desafio 5.2: Criar backup de diretório

**Comandos executados:**

```bash
$ cp -r MeuProjeto MeuProjeto_backup_20240115
$ ls -d MeuProjeto*
MeuProjeto  MeuProjeto_backup_20240115

$ echo "nova linha" >> MeuProjeto/README.md
$ cat MeuProjeto/README.md
nova linha

$ cat MeuProjeto_backup_20240115/README.md
# (arquivo original, não foi modificado)
```

**Explicação:** O comando `date +%Y%m%d` fornece a data no formato YYYYMMDD. Isso é útil para criar backups com timestamp no nome, permitindo manter múltiplas versões.

---

### Gabarito Desafio 5.3: Limpeza segura

**Comandos executados:**

```bash
$ ls > arquivos_a_remover.txt
$ cat arquivos_a_remover.txt
arquivo1.txt
arquivo2.txt
arquivo3.txt
...

$ rm arquivo1.txt arquivo2.txt arquivo3.txt
$ echo "Limpeza realizada em $(date)" > limpeza_log.txt
$ echo "Arquivos removidos:" >> limpeza_log.txt
$ cat arquivos_a_remover.txt >> limpeza_log.txt
$ cat limpeza_log.txt
Limpeza realizada em Jan 15 10:30:00 UTC 2024
Arquivos removidos:
arquivo1.txt
arquivo2.txt
arquivo3.txt
...
```

**Explicação:** Este desafio demonstra boas práticas de administração de sistemas: manter um registro antes de remover arquivos. O comando `$(date)` insere a data e hora atual no arquivo.

---

## Dicas Importantes para Resolver os Exercícios

### 1. Sempre confirme sua localização

Antes de executar qualquer comando destrutivo (como `rm`), sempre execute `pwd` para confirmar em qual diretório você está.

### 2. Use `ls` antes de `rm`

Sempre liste o conteúdo do diretório com `ls` antes de remover arquivos com `rm`. Isso evita acidentes.

### 3. Entenda os caminhos

- **Caminho absoluto:** Começa com `/` (ex: `/home/usuario/Projetos`)
- **Caminho relativo:** Não começa com `/` (ex: `Projetos` ou `../Projetos`)

### 4. Glob Patterns

- `*` - Corresponde a qualquer sequência de caracteres
- `?` - Corresponde a um único caractere
- `[abc]` - Corresponde a a, b ou c

### 5. Atalhos úteis

- `~` - Seu diretório pessoal
- `.` - Diretório atual
- `..` - Diretório pai
- `-` - Diretório anterior (com `cd`)

### 6. Histórico de comandos

- Use a seta para cima para acessar comandos anteriores
- Use `history` para ver o histórico completo
- Use `Ctrl+R` para buscar no histórico

### 7. Autocompletar

- Pressione `Tab` para autocompletar nomes de arquivos e diretórios
- Pressione `Tab` duas vezes para ver todas as opções disponíveis

---

## Checklist de aprendizado

Após completar todos os exercícios, você deve ser capaz de:

- [ ] Usar `pwd` para identificar sua localização
- [ ] Usar `ls` e suas opções (-l, -a, -R)
- [ ] Navegar com `cd` usando caminhos absolutos e relativos
- [ ] Usar `cd ..` para subir na hierarquia
- [ ] Usar `cd ~` para ir ao diretório pessoal
- [ ] Criar diretórios com `mkdir`
- [ ] Criar arquivos com `touch`
- [ ] Copiar arquivos com `cp`
- [ ] Copiar diretórios com `cp -r`
- [ ] Mover e renomear com `mv`
- [ ] Remover arquivos com `rm`
- [ ] Remover diretórios com `rm -r`
- [ ] Visualizar arquivos com `cat`
- [ ] Usar `less` para paginação
- [ ] Ver primeiras linhas com `head`
- [ ] Ver últimas linhas com `tail`
- [ ] Monitorar arquivos com `tail -f`
- [ ] Contar com `wc`
- [ ] Procurar com `grep`
- [ ] Comparar com `diff`

---

## 👤 GitHub

[![Foto de Perfil](https://github.com/floresjcd.png?size=50)](https://github.com/floresjcd) 
**[@floresjcd](https://github.com/floresjcd)**

