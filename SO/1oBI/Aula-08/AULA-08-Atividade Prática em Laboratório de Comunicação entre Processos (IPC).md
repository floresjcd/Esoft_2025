
> **Disciplina:** Sistemas Operacionais  
> **Tema:** Atividade Prática em Laboratório de Comunicação entre Processos (IPC)  
> **Professor:** José Carlos Flores  
> **Curso:** Engenharia de Software  
> 
---



# Atividade Prática em Laboratório de Comunicação entre Processos (IPC)  

## Guia didático para execução no Windows
**Requisito:** Python 3.10 ou superior  
**Sistema Operacional:** Windows  
Criar uma pasta chamada `examples` e criar os códigos nessa pasta. 

## Como usar este material

Este documento apresenta oito exemplos de Comunicação entre Processos (IPC). Cada seção começa com a explicação do problema e do mecanismo utilizado. Em seguida, apresenta o código completo, acompanhado de comentários. Ao final de cada seção, há um comando de execução para Windows.

Abra o PowerShell na pasta que contém a subpasta `examples` e execute os arquivos usando o comando `python`. Caso o comando `python` não esteja disponível, tente `py`, por exemplo: `py examples\01_pipe.py`.

## Regra essencial para multiprocessing no Windows

O Windows utiliza principalmente o método `spawn` para iniciar processos. O novo processo importa o módulo principal novamente, em vez de simplesmente duplicar o processo atual. Por essa razão, o código que cria processos deve ficar protegido por:

```python
if __name__ == "__main__":
    ...
```

Os exemplos que usam `multiprocessing` também chamam `freeze_support()` e definem o método `spawn` explicitamente. Essa estrutura evita a criação recursiva de processos e torna o comportamento mais previsível durante as aulas.

## 1. Pipes com multiprocessing.Pipe()

### Antes de executar

Um pipe é um canal de comunicação entre dois processos. Neste exemplo, o processo principal cria um pipe bidirecional, inicia um processo filho e envia uma mensagem pelo endpoint do pai. O filho recebe a mensagem, transforma o texto em letras maiúsculas e devolve a resposta pelo mesmo canal.

No Windows, novos processos são iniciados pelo método `spawn`. Por isso, todo código que cria processos deve estar dentro de `if __name__ == "__main__":`. O `freeze_support()` também permite compatibilidade com programas empacotados como executáveis.

### Código Python

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

### Execução e resultado esperado

Execute com `python examples\01_pipe.py`. A saída esperada contém a mensagem recebida pelo filho e a resposta em letras maiúsculas.

### Pontos para observar

- Identifique quem produz a informação e quem a consome.
- Observe qual objeto coordena o acesso ou a espera.
- Verifique onde o programa pode bloquear.
- Relacione o mecanismo usado ao problema que ele resolve.

## 2. Sockets TCP

### Antes de executar

Um socket é um ponto de comunicação que pode ser usado localmente ou pela rede. O servidor cria um socket TCP, associa-o ao endereço local e a uma porta livre, aguarda uma conexão e responde com um reconhecimento (`ACK`). O cliente conecta-se, envia bytes e lê a resposta.

O exemplo usa uma thread para manter servidor e cliente no mesmo programa. Essa abordagem funciona no Windows porque as threads compartilham o espaço de memória do processo e não exigem serialização das funções.

### Código Python

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

### Execução e resultado esperado

Execute com `python examples\02_socket_tcp.py`. O programa deve imprimir `ACK:mensagem TCP`.

### Pontos para observar

- Identifique quem produz a informação e quem a consome.
- Observe qual objeto coordena o acesso ou a espera.
- Verifique onde o programa pode bloquear.
- Relacione o mecanismo usado ao problema que ele resolve.

## 3. Filas de mensagens entre processos

### Antes de executar

Uma fila de mensagens permite que um produtor coloque itens e que um consumidor os retire posteriormente. A fila esconde detalhes de sincronização e é apropriada quando os processos não precisam conversar diretamente.

O valor `None` é usado como sentinela. Ele não é um dado de trabalho; indica ao consumidor que não haverá mais itens. Essa técnica evita que o consumidor fique bloqueado indefinidamente esperando uma nova mensagem.

### Código Python

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

### Execução e resultado esperado

Execute com `python examples\03_queue_processos.py`. O consumidor deverá processar os itens `A`, `B` e `C`.

### Pontos para observar

- Identifique quem produz a informação e quem a consome.
- Observe qual objeto coordena o acesso ou a espera.
- Verifique onde o programa pode bloquear.
- Relacione o mecanismo usado ao problema que ele resolve.

## 4. Memória compartilhada protegida por Lock

### Antes de executar

Processos normalmente têm espaços de memória independentes. `multiprocessing.Value` cria um valor que pode ser acessado por processos diferentes. Entretanto, compartilhar memória não torna operações compostas atômicas. O incremento `valor.value += 1` envolve leitura, soma e escrita.

O `Lock` protege essa seção crítica. O bloco `with lock:` garante que somente um processo por vez leia e atualize o contador. Sem o lock, algumas atualizações poderiam ser perdidas.

### Código Python

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

### Execução e resultado esperado

Execute com `python examples\04_shared_memory.py`. O resultado esperado é `40000`, pois quatro processos incrementam o contador dez mil vezes cada.

### Pontos para observar

- Identifique quem produz a informação e quem a consome.
- Observe qual objeto coordena o acesso ou a espera.
- Verifique onde o programa pode bloquear.
- Relacione o mecanismo usado ao problema que ele resolve.

## 5. Notificação portátil com multiprocessing.Event

### Antes de executar

Em sistemas Unix, sinais como `SIGUSR1` podem notificar processos. Esse sinal não está disponível de forma uniforme no Windows. Por isso, este exemplo usa `multiprocessing.Event`, uma primitiva portátil que representa um evento compartilhado entre processos.

O trabalhador chama `evento.wait()` e permanece bloqueado até que o processo principal execute `evento.set()`. A técnica é adequada para notificar encerramento, início de uma etapa ou disponibilidade de dados.

### Código Python

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

### Execução e resultado esperado

Execute com `python examples\05_signal.py`. O processo trabalhador aguardará por aproximadamente um segundo e depois informará que recebeu a notificação.

### Pontos para observar

- Identifique quem produz a informação e quem a consome.
- Observe qual objeto coordena o acesso ou a espera.
- Verifique onde o programa pode bloquear.
- Relacione o mecanismo usado ao problema que ele resolve.

## 6. Semáforo para limitar concorrência

### Antes de executar

Um semáforo mantém um contador de permissões. Neste exemplo, o semáforo é criado com três permissões, portanto no máximo três processos podem executar a região protegida ao mesmo tempo. Cada tarefa adquire uma permissão ao entrar e devolve-a ao sair.

O bloco `with semaforo:` realiza a aquisição e a liberação automaticamente, inclusive quando ocorre uma exceção. Essa técnica é útil para limitar o número de conexões, tarefas ou acessos simultâneos a um recurso.

### Código Python

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

### Execução e resultado esperado

Execute com `python examples\06_semaphore.py`. Observe que os processos entram em grupos de, no máximo, três tarefas simultâneas.

### Pontos para observar

- Identifique quem produz a informação e quem a consome.
- Observe qual objeto coordena o acesso ou a espera.
- Verifique onde o programa pode bloquear.
- Relacione o mecanismo usado ao problema que ele resolve.

## 7. Produtor-consumidor com Condition

### Antes de executar

Uma variável de condição coordena threads que compartilham um buffer. O produtor deve esperar quando o buffer está cheio. O consumidor deve esperar quando o buffer está vazio.

A condição é sempre testada em um laço `while`. Isso é importante porque uma thread acordada deve verificar novamente se o predicado continua verdadeiro. O método `notify_all()` acorda as threads que podem reavaliar sua condição.

### Código Python

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

### Execução e resultado esperado

Execute com `python examples\07_condition_buffer.py`. A saída mostrará cinco itens produzidos e consumidos, respeitando a capacidade máxima do buffer.

### Pontos para observar

- Identifique quem produz a informação e quem a consome.
- Observe qual objeto coordena o acesso ou a espera.
- Verifique onde o programa pode bloquear.
- Relacione o mecanismo usado ao problema que ele resolve.

## 8. Prevenção de deadlock com timeout e ordem global

### Antes de executar

Deadlock ocorre quando threads ou processos ficam esperando indefinidamente por recursos uns dos outros. Uma estratégia de prevenção é impor uma ordem global para adquirir locks. Neste exemplo, ambas as threads tentam obter primeiro `LOCK_A` e depois `LOCK_B`, evitando uma espera circular.

O `timeout` acrescenta uma camada de segurança: se um lock não for obtido dentro do tempo definido, a tarefa abandona a tentativa e informa a possível espera circular. Em sistemas reais, a recuperação pode incluir rollback, liberação de recursos ou reinício de uma tarefa.

### Código Python

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

### Execução e resultado esperado

Execute com `python examples\08_deadlock_timeout.py`. As duas threads devem concluir sem bloqueio permanente.

### Pontos para observar

- Identifique quem produz a informação e quem a consome.
- Observe qual objeto coordena o acesso ou a espera.
- Verifique onde o programa pode bloquear.
- Relacione o mecanismo usado ao problema que ele resolve.

## Quadro comparativo

| Mecanismo | Unidade de comunicação | Uso típico | Atenção principal |
|---|---|---|---|
| Pipe | Fluxo de dados | Relação simples entre processos | Fechamento dos endpoints e bloqueio |
| Socket TCP | Bytes em uma conexão | IPC local ou comunicação em rede | Protocolo, timeout e encerramento |
| Queue | Mensagens discretas | Produtor-consumidor | Capacidade e sentinela de encerramento |
| Shared memory | Dados compartilhados | Alto desempenho | Exclusão mútua e atomicidade |
| Event | Notificação de estado | Acordar ou encerrar tarefas | Não transporta dados complexos |
| Semaphore | Permissões contadas | Limitar concorrência | Não confundir com exclusão mútua simples |
| Condition | Predicado de estado | Buffer e coordenação | Testar a condição em `while` |
| Lock + timeout | Exclusão e falha controlada | Prevenção de espera indefinida | Ordem consistente de aquisição |

## Checklist de execução no Windows

1. Instale o Python 3.10 ou superior e marque a opção de adicionar o Python ao `PATH`.
2. Abra o PowerShell na pasta `ipc_aula`.
3. Verifique a instalação com `python --version`.
4. Execute um arquivo por vez, começando por `python examples\01_pipe.py`.
5. Não remova a proteção `if __name__ == "__main__":` dos exemplos com processos.
6. Interrompa um programa bloqueado com `Ctrl+C` no PowerShell.

## Referências

https://docs.python.org/3/library/multiprocessing.html "Python multiprocessing — Process-based parallelism"  
https://docs.python.org/3/library/socket.html "Python socket — Low-level networking interface"  
https://docs.python.org/3/library/threading.html "Python threading — Thread-based parallelism"  
https://docs.python.org/3/library/signal.html "Python signal — Set handlers for asynchronous events"  

---

## 👤 GitHub

[![Foto de Perfil](https://github.com/floresjcd.png?size=50)](https://github.com/floresjcd) 
**[@floresjcd](https://github.com/floresjcd)**

