
> **Curso:** Engenharia de Software 
> **Disciplina:** Sistemas Operacionais  
> **Tema:** Atividade Prática em Laboratório de Comunicação entre Processos (IPC)  
> **Professor:** José Carlos Flores  
> 
---

## Comunicação entre Processos para estudantes de Sistemas Operacionais

**Professor:** José Carlos Flores  
**Plataforma considerada:** Windows  
**Python recomendado:** 3.10 ou superior  
**Bibliotecas:** somente biblioteca padrão

## 1. Como estudar este material

Este material combina duas perspectivas. A primeira é conceitual: explica por que um mecanismo existe e qual problema de Sistemas Operacionais ele resolve. A segunda é operacional: interpreta as principais instruções Python presentes nos programas. O objetivo é que o estudante consiga ler, executar, modificar e justificar cada exemplo.

Em todos os capítulos, siga esta sequência mental:

1. Identifique os participantes: processos, threads, produtor, consumidor, cliente ou servidor.
2. Identifique o recurso compartilhado: canal, fila, socket, memória ou estado de sincronização.
3. Identifique a operação de bloqueio: `recv()`, `get()`, `wait()`, aquisição de lock ou semáforo.
4. Identifique como a comunicação termina: fechamento, sentinela, evento, `join()` ou saída normal.
5. Pergunte o que ocorre em caso de atraso, falha ou ordem diferente de execução.

## 2. Preparação no Windows

Abra o PowerShell na pasta que contém `examples` e confira o Python:

```bash
python --version
```

Se necessário, use:

```bash
py --version
```

Os exemplos que utilizam `multiprocessing` possuem a proteção abaixo:

```python
if __name__ == "__main__":
    ...
```

Essa proteção é essencial no Windows. O método `spawn` inicia um novo interpretador, que importa o módulo principal. Sem a proteção, o módulo poderia criar novos processos novamente, provocando recursão ou erro de inicialização.

## 3. Mapa das principais instruções de IPC (Python)

| Instrução ou objeto | Função | Pergunta que o estudante deve fazer |
|---|---|---|
| `multiprocessing.Process` | Cria um processo independente | Qual função será executada pelo novo processo? |
| `start()` | Solicita o início de um processo ou thread | A tarefa já pode executar em paralelo? |
| `join()` | Aguarda a conclusão | O programa precisa esperar antes de terminar? |
| `Pipe()` | Cria endpoints para comunicação direta | Quem envia e quem recebe? |
| `send()` / `recv()` | Envia e recebe dados no pipe | A operação pode bloquear? |
| `Queue()` | Cria uma fila de mensagens | Qual é o protocolo de produção e consumo? |
| `put()` / `get()` | Insere e retira itens | Como indicar que não há mais itens? |
| `socket()` | Cria um endpoint de comunicação | O endpoint será cliente ou servidor? |
| `bind()` | Associa servidor a endereço e porta | Em qual endereço o serviço escuta? |
| `listen()` / `accept()` | Aguarda e aceita conexões TCP | O servidor está pronto antes do cliente? |
| `sendall()` / `recv()` | Troca bytes pelo socket | Como os bytes representam uma mensagem? |
| `Value()` | Cria valor compartilhado entre processos | O acesso composto precisa de lock? |
| `Lock()` | Garante exclusão mútua | Qual é a seção crítica? |
| `Semaphore(n)` | Controla até `n` acessos simultâneos | Quantas unidades do recurso existem? |
| `Event()` | Sinaliza que um estado ou evento ocorreu | Quem espera e quem sinaliza? |
| `Condition()` | Coordena espera por um predicado | Qual condição deve ser verdadeira? |
| `wait()` | Bloqueia até um evento ou condição | O que acordará a tarefa? |
| `notify_all()` | Acorda tarefas que aguardam uma condição | Elas testarão novamente o predicado? |
| `with` | Garante aquisição e liberação de recurso | O recurso será liberado mesmo em caso de erro? |
| `timeout` | Limita o tempo de espera | Qual será a recuperação se falhar? |
| `flush=True` | Força saída imediata no terminal | A saída precisa aparecer em processos concorrentes? |

## 4. Conceitos que aparecem em todos os exemplos

### Processo e thread

Um processo possui espaço de endereçamento próprio. Por isso, duas instâncias de processo não compartilham variáveis comuns automaticamente. Uma thread pertence a um processo e compartilha a memória desse processo, mas ainda pode sofrer condições de corrida quando várias threads acessam o mesmo estado.

### Comunicação e sincronização

Comunicação transporta dados ou notificações. Sincronização coordena a ordem de execução e protege invariantes. Uma fila, por exemplo, pode realizar comunicação; um lock pode realizar sincronização. Muitos programas precisam dos dois.

### Bloqueio

Uma chamada bloqueante pausa a tarefa até que uma condição seja atendida. `recv()` pode esperar dados; `get()` pode esperar uma mensagem; `wait()` pode esperar um evento. Bloqueio não é necessariamente um erro. Ele se torna um problema quando não existe protocolo de despertar ou quando produz deadlock.

### Protocolo de encerramento

Todo programa concorrente precisa explicar como termina. Exemplos de protocolos são fechar um pipe, colocar uma sentinela na fila, chamar `set()` em um evento, liberar um lock e usar `join()` para aguardar a tarefa.

## 1. Pipe com `multiprocessing.Pipe()`

**Foco do exemplo:** comunicação direta.

### O problema que o código resolve

Este programa foi escolhido para representar o mecanismo de **comunicação direta**. Antes de estudar a sintaxe, identifique os participantes e pergunte qual informação ou recurso precisa atravessar a fronteira de execução. A estrutura do arquivo separa a definição das funções, o bloco principal e o protocolo de encerramento.

### Código completo

```python
"""Pipe bidirecional entre processos, compatível com Windows."""
import multiprocessing as mp

def trabalhador(conn):
    try:
        mensagem = conn.recv()
        print(f"Filho recebeu: {mensagem}")
        conn.send(mensagem.upper())
    finally:
        conn.close()

if __name__ == "__main__":
    mp.freeze_support()
    mp.set_start_method("spawn", force=True)
    pai, filho = mp.Pipe()
    processo = mp.Process(target=trabalhador, args=(filho,))
    processo.start()
    filho.close()
    pai.send("dados via pipe")
    print("Pai recebeu:", pai.recv())
    pai.close()
    processo.join()

```

### Explicação das principais instruções

#### ``import multiprocessing as mp``

Importa o módulo de processos e cria o apelido `mp`, usado para escrever chamadas mais curtas.

#### ``def trabalhador(conn):``

Define a função que será executada pelo processo filho. O parâmetro `conn` é a extremidade do pipe entregue ao filho.

#### ``conn.recv()``

Recebe um objeto enviado pela outra extremidade. A chamada pode bloquear até que exista uma mensagem.

#### ``conn.send(...)``

Envia um objeto pela conexão. A biblioteca se encarrega de serializar o objeto para atravessar o limite entre processos.

#### ``try ... finally` e `conn.close()``

Garante que a conexão seja fechada mesmo se ocorrer uma exceção.

#### ``mp.Pipe()``

Retorna duas extremidades relacionadas. A convenção `pai, filho` ajuda a documentar quem usará cada uma.

#### ``mp.Process(target=..., args=...)``

Cria um processo. `target` indica a função inicial e `args` fornece seus argumentos.

#### ``start()` e `join()``

Inicia o processo e depois aguarda sua conclusão. `start()` não executa a função no mesmo fluxo do pai.

#### ``filho.close()` no processo principal`

Fecha a cópia da extremidade que o pai não usará. Isso reduz referências abertas e facilita o encerramento correto.

### Leitura do fluxo de execução

Leia o código nesta ordem:

1. Localize as importações e identifique quais objetos pertencem à comunicação e quais pertencem à sincronização.
2. Localize a função executada pela tarefa concorrente.
3. Localize a criação do recurso IPC no bloco principal.
4. Observe o momento em que a tarefa é iniciada.
5. Observe as chamadas que podem bloquear.
6. Identifique como o recurso é fechado ou liberado.
7. Verifique onde `join()` garante que o programa não termine prematuramente.

### Perguntas para discussão 

- Qual é o participante produtor e qual é o participante consumidor neste exemplo?
- Qual instrução pode bloquear e qual evento permite que ela continue?
- O que aconteceria se o protocolo de encerramento fosse removido?
- O mecanismo apresentado transporta dados, sincroniza acesso ou faz as duas coisas?
- Qual mudança seria necessária para tratar uma falha do outro participante?

### Como executar no Windows

A partir da pasta `ipc_aula`, use:

```powershell
python examples\01_pipe.py
```

Se necessário, substitua `python` por `py`.

## 2. Socket TCP com cliente e servidor

**Foco do exemplo:** comunicação orientada a conexão.

### O problema que o código resolve

Este programa foi escolhido para representar o mecanismo de **comunicação orientada a conexão**. Antes de estudar a sintaxe, identifique os participantes e pergunte qual informação ou recurso precisa atravessar a fronteira de execução. A estrutura do arquivo separa a definição das funções, o bloco principal e o protocolo de encerramento.

### Código completo

```python
"""Cliente e servidor TCP local, compatível com Windows."""
import socket
import threading

def servidor(pronto):
    with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
        s.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
        s.bind(("127.0.0.1", 0))
        s.listen(1)
        pronto.append(s.getsockname()[1])
        evento.set()
        conn, _ = s.accept()
        with conn:
            dados = conn.recv(1024)
            conn.sendall(b"ACK:" + dados)

if __name__ == "__main__":
    evento = threading.Event()
    porta = []
    thread = threading.Thread(target=servidor, args=(porta,), daemon=True)
    thread.start()
    evento.wait()
    with socket.create_connection(("127.0.0.1", porta[0]), timeout=5) as cliente:
        cliente.sendall(b"mensagem TCP")
        print(cliente.recv(1024).decode("utf-8"))
    thread.join()

```

### Explicação das principais instruções

#### ``socket.socket(socket.AF_INET, socket.SOCK_STREAM)``

`AF_INET` seleciona endereços IPv4 e `SOCK_STREAM` seleciona o fluxo TCP.

#### ``setsockopt(... SO_REUSEADDR ...)``

Permite reutilizar o endereço local em situações comuns de reinicialização do servidor.

#### ``bind(("127.0.0.1", 0))``

Associa o socket ao loopback local. A porta zero solicita ao sistema uma porta livre.

#### ``getsockname()``

Consulta o endereço efetivamente escolhido, incluindo a porta dinâmica.

#### ``listen(1)``

Coloca o socket em modo servidor e define uma fila inicial de conexões pendentes.

#### ``accept()``

Bloqueia até chegar uma conexão e retorna um novo socket dedicado àquela conexão.

#### ``create_connection(...)``

Cria um cliente TCP e conecta-o ao endereço informado, com limite de tempo.

#### ``sendall()` e `recv()``

Enviam todos os bytes fornecidos e recebem até a quantidade solicitada. TCP transporta bytes, não mensagens prontas.

#### ``decode("utf-8")``

Converte bytes recebidos para texto Unicode usando UTF-8.

#### ``threading.Event``

Coordena o instante em que o servidor terminou de preparar a porta e o cliente pode conectar.

### Leitura do fluxo de execução

Leia o código nesta ordem:

1. Localize as importações e identifique quais objetos pertencem à comunicação e quais pertencem à sincronização.
2. Localize a função executada pela tarefa concorrente.
3. Localize a criação do recurso IPC no bloco principal.
4. Observe o momento em que a tarefa é iniciada.
5. Observe as chamadas que podem bloquear.
6. Identifique como o recurso é fechado ou liberado.
7. Verifique onde `join()` garante que o programa não termine prematuramente.

### Perguntas para discussão 

- Qual é o participante produtor e qual é o participante consumidor neste exemplo?
- Qual instrução pode bloquear e qual evento permite que ela continue?
- O que aconteceria se o protocolo de encerramento fosse removido?
- O mecanismo apresentado transporta dados, sincroniza acesso ou faz as duas coisas?
- Qual mudança seria necessária para tratar uma falha do outro participante?

### Como executar no Windows

A partir da pasta `ipc_aula`, use:

```powershell
python examples\02_socket_tcp.py
```

Se necessário, substitua `python` por `py`.

## 3. Fila de mensagens com `multiprocessing.Queue`

**Foco do exemplo:** produtor-consumidor.

### O problema que o código resolve

Este programa foi escolhido para representar o mecanismo de **produtor-consumidor**. Antes de estudar a sintaxe, identifique os participantes e pergunte qual informação ou recurso precisa atravessar a fronteira de execução. A estrutura do arquivo separa a definição das funções, o bloco principal e o protocolo de encerramento.

### Código completo

```python
"""Fila de mensagens entre processos, compatível com Windows."""
import multiprocessing as mp

def produtor(fila):
    for item in ["A", "B", "C"]:
        fila.put(item)
    fila.put(None)

def consumidor(fila):
    while True:
        item = fila.get()
        if item is None:
            break
        print("Consumidor processou", item)

if __name__ == "__main__":
    mp.freeze_support()
    mp.set_start_method("spawn", force=True)
    fila = mp.Queue()
    p1 = mp.Process(target=produtor, args=(fila,))
    p2 = mp.Process(target=consumidor, args=(fila,))
    p1.start(); p2.start()
    p1.join(); p2.join()
    fila.close(); fila.join_thread()

```

### Explicação das principais instruções

#### ``mp.Queue()``

Cria uma fila segura para comunicação entre processos.

#### ``fila.put(item)``

Coloca uma mensagem na fila. Dependendo da capacidade e da configuração, pode esperar espaço.

#### ``fila.get()``

Retira a próxima mensagem. Sem argumentos adicionais, pode bloquear até haver um item.

#### ``None` como sentinela`

Representa o fim do fluxo. Não é uma tarefa; é uma convenção do protocolo.

#### ``while True` com `break``

Mantém o consumidor ativo até encontrar a sentinela.

#### ``fila.close()` e `join_thread()``

Fecham a fila e aguardam o encerramento do mecanismo auxiliar que transporta os dados.

### Leitura do fluxo de execução

Leia o código nesta ordem:

1. Localize as importações e identifique quais objetos pertencem à comunicação e quais pertencem à sincronização.
2. Localize a função executada pela tarefa concorrente.
3. Localize a criação do recurso IPC no bloco principal.
4. Observe o momento em que a tarefa é iniciada.
5. Observe as chamadas que podem bloquear.
6. Identifique como o recurso é fechado ou liberado.
7. Verifique onde `join()` garante que o programa não termine prematuramente.

### Perguntas para discussão 

- Qual é o participante produtor e qual é o participante consumidor neste exemplo?
- Qual instrução pode bloquear e qual evento permite que ela continue?
- O que aconteceria se o protocolo de encerramento fosse removido?
- O mecanismo apresentado transporta dados, sincroniza acesso ou faz as duas coisas?
- Qual mudança seria necessária para tratar uma falha do outro participante?

### Como executar no Windows

A partir da pasta `ipc_aula`, use:

```powershell
python examples\03_queue_processos.py
```

Se necessário, substitua `python` por `py`.

## 4. Memória compartilhada com `Value` e `Lock`

**Foco do exemplo:** estado compartilhado.

### O problema que o código resolve

Este programa foi escolhido para representar o mecanismo de **estado compartilhado**. Antes de estudar a sintaxe, identifique os participantes e pergunte qual informação ou recurso precisa atravessar a fronteira de execução. A estrutura do arquivo separa a definição das funções, o bloco principal e o protocolo de encerramento.

### Código completo

```python
"""Memória compartilhada protegida por Lock, compatível com Windows."""
import multiprocessing as mp

def incrementar(valor, lock, vezes):
    for _ in range(vezes):
        with lock:
            valor.value += 1

if __name__ == "__main__":
    mp.freeze_support()
    mp.set_start_method("spawn", force=True)
    valor = mp.Value("i", 0)
    lock = mp.Lock()
    processos = [mp.Process(target=incrementar, args=(valor, lock, 10000)) for _ in range(4)]
    for p in processos: p.start()
    for p in processos: p.join()
    print("Valor final esperado=40000; obtido=", valor.value)

```

### Explicação das principais instruções

#### ``mp.Value("i", 0)``

Cria um valor inteiro compartilhado. O código de tipo `i` representa um inteiro.

#### ``mp.Lock()``

Cria um lock entre processos. Ele permite que somente um participante entre na seção crítica.

#### ``for _ in range(vezes)``

Repete o incremento sem precisar usar o valor da variável de controle.

#### ``with lock:``

Adquire o lock ao entrar e libera-o ao sair, inclusive em caso de exceção.

#### ``valor.value += 1``

Atualiza o valor compartilhado. A proteção é necessária porque ler, somar e escrever é uma sequência de operações.

#### `lista de `Process` e dois laços `for``

Primeiro cria processos; depois inicia todos e aguarda todos. Separar essas fases facilita o paralelismo.

### Leitura do fluxo de execução

Leia o código nesta ordem:

1. Localize as importações e identifique quais objetos pertencem à comunicação e quais pertencem à sincronização.
2. Localize a função executada pela tarefa concorrente.
3. Localize a criação do recurso IPC no bloco principal.
4. Observe o momento em que a tarefa é iniciada.
5. Observe as chamadas que podem bloquear.
6. Identifique como o recurso é fechado ou liberado.
7. Verifique onde `join()` garante que o programa não termine prematuramente.

### Perguntas para discussão 

- Qual é o participante produtor e qual é o participante consumidor neste exemplo?
- Qual instrução pode bloquear e qual evento permite que ela continue?
- O que aconteceria se o protocolo de encerramento fosse removido?
- O mecanismo apresentado transporta dados, sincroniza acesso ou faz as duas coisas?
- Qual mudança seria necessária para tratar uma falha do outro participante?

### Como executar no Windows

A partir da pasta `ipc_aula`, use:

```powershell
python examples\04_shared_memory.py
```

Se necessário, substitua `python` por `py`.

## 5. `multiprocessing.Event` como sinalização portátil

**Foco do exemplo:** notificação de estado.

### O problema que o código resolve

Este programa foi escolhido para representar o mecanismo de **notificação de estado**. Antes de estudar a sintaxe, identifique os participantes e pergunte qual informação ou recurso precisa atravessar a fronteira de execução. A estrutura do arquivo separa a definição das funções, o bloco principal e o protocolo de encerramento.

### Código completo

```python
"""Notificação de evento sem SIGUSR1, compatível com Windows e Unix.

No Windows, SIGUSR1 não existe. Este exemplo usa Event entre processos,
uma alternativa portátil para sinalizar encerramento ou mudança de estado.
"""
import multiprocessing as mp
import time

def trabalhador(evento):
    print("Trabalhador aguardando uma notificação...")
    evento.wait()
    print("Notificação recebida; encerrando com segurança.")

if __name__ == "__main__":
    mp.freeze_support()
    mp.set_start_method("spawn", force=True)
    evento = mp.Event()
    processo = mp.Process(target=trabalhador, args=(evento,))
    processo.start()
    time.sleep(1)
    print("Processo principal enviando a notificação")
    evento.set()
    processo.join()

```

### Explicação das principais instruções

#### ``mp.Event()``

Cria um evento inicialmente não sinalizado.

#### ``evento.wait()``

Bloqueia o trabalhador até que outro processo sinalize o evento.

#### ``evento.set()``

Muda o estado para sinalizado e libera os participantes que aguardam.

#### ``time.sleep(1)``

Simula tempo de trabalho ou atraso antes de o principal enviar a notificação.

#### `Por que não usar `SIGUSR1`?`

Esse sinal é típico de sistemas Unix e não oferece a mesma disponibilidade no Windows. `Event` é uma alternativa multiplataforma para esse caso didático.

### Leitura do fluxo de execução

Leia o código nesta ordem:

1. Localize as importações e identifique quais objetos pertencem à comunicação e quais pertencem à sincronização.
2. Localize a função executada pela tarefa concorrente.
3. Localize a criação do recurso IPC no bloco principal.
4. Observe o momento em que a tarefa é iniciada.
5. Observe as chamadas que podem bloquear.
6. Identifique como o recurso é fechado ou liberado.
7. Verifique onde `join()` garante que o programa não termine prematuramente.

### Perguntas para discussão 

- Qual é o participante produtor e qual é o participante consumidor neste exemplo?
- Qual instrução pode bloquear e qual evento permite que ela continue?
- O que aconteceria se o protocolo de encerramento fosse removido?
- O mecanismo apresentado transporta dados, sincroniza acesso ou faz as duas coisas?
- Qual mudança seria necessária para tratar uma falha do outro participante?

### Como executar no Windows

A partir da pasta `ipc_aula`, use:

```powershell
python examples\05_signal.py
```

Se necessário, substitua `python` por `py`.

## 6. `Semaphore(3)` para limitar concorrência

**Foco do exemplo:** controle de capacidade.

### O problema que o código resolve

Este programa foi escolhido para representar o mecanismo de **controle de capacidade**. Antes de estudar a sintaxe, identifique os participantes e pergunte qual informação ou recurso precisa atravessar a fronteira de execução. A estrutura do arquivo separa a definição das funções, o bloco principal e o protocolo de encerramento.

### Código completo

```python
"""Semáforo limitando tarefas simultâneas, compatível com Windows."""
import multiprocessing as mp
import os
import time

def tarefa(semaforo, indice):
    with semaforo:
        print("Entrou", indice, "PID", os.getpid(), flush=True)
        time.sleep(1)
        print("Saiu", indice, flush=True)

if __name__ == "__main__":
    mp.freeze_support()
    mp.set_start_method("spawn", force=True)
    semaforo = mp.Semaphore(3)
    processos = [mp.Process(target=tarefa, args=(semaforo, i)) for i in range(8)]
    for p in processos: p.start()
    for p in processos: p.join()

```

### Explicação das principais instruções

#### ``mp.Semaphore(3)``

Cria três permissões. Até três processos podem passar pela região protegida simultaneamente.

#### ``with semaforo:``

Adquire uma permissão ao entrar e devolve-a ao sair.

#### ``os.getpid()``

Obtém o identificador do processo atual, útil para observar qual processo produziu cada saída.

#### ``print(..., flush=True)``

Força a escrita imediata no terminal. Isso facilita observar a ordem de eventos em processos concorrentes.

#### ``time.sleep(1)``

Mantém a tarefa dentro da região por tempo suficiente para observar o limite de três participantes.

### Leitura do fluxo de execução

Leia o código nesta ordem:

1. Localize as importações e identifique quais objetos pertencem à comunicação e quais pertencem à sincronização.
2. Localize a função executada pela tarefa concorrente.
3. Localize a criação do recurso IPC no bloco principal.
4. Observe o momento em que a tarefa é iniciada.
5. Observe as chamadas que podem bloquear.
6. Identifique como o recurso é fechado ou liberado.
7. Verifique onde `join()` garante que o programa não termine prematuramente.

### Perguntas para discussão 

- Qual é o participante produtor e qual é o participante consumidor neste exemplo?
- Qual instrução pode bloquear e qual evento permite que ela continue?
- O que aconteceria se o protocolo de encerramento fosse removido?
- O mecanismo apresentado transporta dados, sincroniza acesso ou faz as duas coisas?
- Qual mudança seria necessária para tratar uma falha do outro participante?

### Como executar no Windows

A partir da pasta `ipc_aula`, use:

```powershell
python examples\06_semaphore.py
```

Se necessário, substitua `python` por `py`.

## 7. Produtor-consumidor com `Condition`

**Foco do exemplo:** coordenação de threads.

### O problema que o código resolve

Este programa foi escolhido para representar o mecanismo de **coordenação de threads**. Antes de estudar a sintaxe, identifique os participantes e pergunte qual informação ou recurso precisa atravessar a fronteira de execução. A estrutura do arquivo separa a definição das funções, o bloco principal e o protocolo de encerramento.

### Código completo

```python
"""Produtor-consumidor com Condition; executa em Windows, sem subprocessos."""
from collections import deque
from threading import Condition, Thread
import time

buffer = deque()
condicao = Condition()
CAPACIDADE = 2

def produtor():
    for item in range(5):
        with condicao:
            while len(buffer) == CAPACIDADE:
                condicao.wait()
            buffer.append(item)
            print("produziu", item)
            condicao.notify_all()
        time.sleep(0.1)

def consumidor():
    for _ in range(5):
        with condicao:
            while not buffer:
                condicao.wait()
            item = buffer.popleft()
            print("consumiu", item)
            condicao.notify_all()
        time.sleep(0.2)

if __name__ == "__main__":
    produtor_thread = Thread(target=produtor)
    consumidor_thread = Thread(target=consumidor)
    produtor_thread.start(); consumidor_thread.start()
    produtor_thread.join(); consumidor_thread.join()

```

### Explicação das principais instruções

#### ``deque()``

Estrutura eficiente para inserir no final e retirar do início do buffer.

#### ``Condition()``

Combina lock e mecanismo de espera/notificação.

#### ``while len(buffer) == CAPACIDADE``

Define o predicado que impede o produtor de ultrapassar a capacidade.

#### ``condicao.wait()``

Libera o lock temporariamente e coloca a thread em espera.

#### ``buffer.append()` e `popleft()``

Inserem e retiram itens, representando produção e consumo.

#### ``condicao.notify_all()``

Acorda threads que podem reavaliar seus predicados.

#### `Por que `while` e não `if`?`

Depois de acordar, a thread precisa confirmar que a condição ainda é válida. Outra thread pode ter alterado o buffer antes que ela retome.

### Leitura do fluxo de execução

Leia o código nesta ordem:

1. Localize as importações e identifique quais objetos pertencem à comunicação e quais pertencem à sincronização.
2. Localize a função executada pela tarefa concorrente.
3. Localize a criação do recurso IPC no bloco principal.
4. Observe o momento em que a tarefa é iniciada.
5. Observe as chamadas que podem bloquear.
6. Identifique como o recurso é fechado ou liberado.
7. Verifique onde `join()` garante que o programa não termine prematuramente.

### Perguntas para discussão 

- Qual é o participante produtor e qual é o participante consumidor neste exemplo?
- Qual instrução pode bloquear e qual evento permite que ela continue?
- O que aconteceria se o protocolo de encerramento fosse removido?
- O mecanismo apresentado transporta dados, sincroniza acesso ou faz as duas coisas?
- Qual mudança seria necessária para tratar uma falha do outro participante?

### Como executar no Windows

A partir da pasta `ipc_aula`, use:

```powershell
python examples\07_condition_buffer.py
```

Se necessário, substitua `python` por `py`.

## 8. Deadlock, ordem global e timeout

**Foco do exemplo:** prevenção de espera circular.

### O problema que o código resolve

Este programa foi escolhido para representar o mecanismo de **prevenção de espera circular**. Antes de estudar a sintaxe, identifique os participantes e pergunte qual informação ou recurso precisa atravessar a fronteira de execução. A estrutura do arquivo separa a definição das funções, o bloco principal e o protocolo de encerramento.

### Código completo

```python
"""Prevenção de deadlock por ordem global e timeout, compatível com Windows."""
from threading import Lock, Thread
import time

LOCK_A = Lock()
LOCK_B = Lock()

def tarefa(nome, primeiro, segundo):
    with primeiro:
        time.sleep(0.05)
        if segundo.acquire(timeout=0.2):
            try:
                print(nome, "obteve os dois locks")
            finally:
                segundo.release()
        else:
            print(nome, "detectou possível espera circular; abortou")

if __name__ == "__main__":
    # As duas threads adquirem primeiro LOCK_A: a ordem global evita ciclo.
    t1 = Thread(target=tarefa, args=("T1", LOCK_A, LOCK_B))
    t2 = Thread(target=tarefa, args=("T2", LOCK_A, LOCK_B))
    t1.start(); t2.start(); t1.join(); t2.join()

```

### Explicação das principais instruções

#### ``Lock()``

Representa um recurso que pode ser ocupado por uma única thread por vez.

#### ``with primeiro:``

Adquire o primeiro lock e mantém sua posse durante a tentativa de obter o segundo.

#### ``time.sleep(0.05)``

Simula trabalho e torna a ordem de aquisição observável.

#### ``segundo.acquire(timeout=0.2)``

Tenta adquirir o segundo lock por tempo limitado. Retorna verdadeiro se obtiver o lock e falso se expirar.

#### ``try ... finally` com `release()``

Garante que o segundo lock seja liberado depois do uso.

#### `ordem global`

As duas threads recebem `LOCK_A` primeiro e `LOCK_B` depois. Essa regra evita que uma thread segure A esperando B enquanto outra segura B esperando A.

#### `limitação do timeout`

Timeout evita espera infinita, mas não decide sozinho como desfazer trabalho parcial. Sistemas reais precisam de rollback ou outra política de recuperação.

### Leitura do fluxo de execução

Leia o código nesta ordem:

1. Localize as importações e identifique quais objetos pertencem à comunicação e quais pertencem à sincronização.
2. Localize a função executada pela tarefa concorrente.
3. Localize a criação do recurso IPC no bloco principal.
4. Observe o momento em que a tarefa é iniciada.
5. Observe as chamadas que podem bloquear.
6. Identifique como o recurso é fechado ou liberado.
7. Verifique onde `join()` garante que o programa não termine prematuramente.

### Perguntas para discussão 

- Qual é o participante produtor e qual é o participante consumidor neste exemplo?
- Qual instrução pode bloquear e qual evento permite que ela continue?
- O que aconteceria se o protocolo de encerramento fosse removido?
- O mecanismo apresentado transporta dados, sincroniza acesso ou faz as duas coisas?
- Qual mudança seria necessária para tratar uma falha do outro participante?

### Como executar no Windows

A partir da pasta `ipc_aula`, use:

```powershell
python examples\08_deadlock_timeout.py
```

Se necessário, substitua `python` por `py`.

## 5. Padrões de projeto presentes nos exemplos

### Produtor-consumidor

Um produtor cria dados e um consumidor processa dados. Uma fila ou buffer intermediário desacopla as velocidades. O protocolo precisa definir capacidade, encerramento e tratamento de erro.

### Cliente-servidor

O servidor aguarda pedidos; o cliente inicia a comunicação. Em sockets TCP, `bind`, `listen` e `accept` pertencem ao lado servidor, enquanto `connect` ou `create_connection` pertence ao cliente.

### Seção crítica protegida

Quando várias tarefas acessam o mesmo estado, a seção crítica deve ser pequena e claramente definida. O lock não deve proteger trechos de código que não precisam do estado compartilhado.

### Espera por predicado

Uma condição de espera deve ser expressa como predicado: “o buffer não está vazio”, “há espaço disponível” ou “o evento foi sinalizado”. A thread espera enquanto o predicado for falso e reavalia depois de acordar.

### Regra de ordem global

Se vários locks precisam ser adquiridos, estabeleça uma ordem única. Por exemplo, sempre adquirir A antes de B. A consistência da regra é mais importante do que os nomes dos locks.

## 6. Erros frequentes

| Erro | Consequência | Correção |
|---|---|---|
| Criar processos fora do bloco principal | Recursão ou erro no Windows | Usar `if __name__ == "__main__":` |
| Usar função local como alvo de `Process` | Função não pode ser serializada pelo `spawn` | Definir a função no nível do módulo |
| Esquecer `join()` | Programa termina antes da tarefa | Aguardar os participantes |
| Usar `if` para testar `Condition` | A thread pode prosseguir com estado inválido | Testar em `while` |
| Incrementar valor compartilhado sem lock | Perda de atualizações | Proteger a seção crítica |
| Fechar o socket sem protocolo | Mensagem truncada ou erro de conexão | Definir encerramento e timeouts |
| Esperar por fila sem sentinela | Consumidor bloqueado indefinidamente | Enviar marcador de término |
| Adquirir locks em ordens diferentes | Possível deadlock | Definir ordem global |

## 7. Exercício integrador (Desafio)

Projete uma aplicação de processamento de arquivos com três componentes: um produtor que encontra arquivos, uma fila de tarefas e dois consumidores que processam os arquivos. Explique qual mecanismo seria usado para comunicação, qual mecanismo limitaria o número de tarefas simultâneas, como o programa indicaria o fim da entrada e como trataria uma falha de consumidor.

Uma resposta adequada deve mencionar pelo menos: `multiprocessing.Queue`, sentinelas, `join()`, tratamento de exceções, limite de concorrência e uma estratégia de encerramento.

## Referências

https://docs.python.org/3/library/multiprocessing.html "Python multiprocessing — Process-based parallelism"  
https://docs.python.org/3/library/socket.html "Python socket — Low-level networking interface"  
https://docs.python.org/3/library/threading.html "Python threading — Thread-based parallelism"  
https://docs.python.org/3/library/signal.html "Python signal — Set handlers for asynchronous events"  

---

## 👤 GitHub

[![Foto de Perfil](https://github.com/floresjcd.png?size=50)](https://github.com/floresjcd) 
**[@floresjcd](https://github.com/floresjcd)**