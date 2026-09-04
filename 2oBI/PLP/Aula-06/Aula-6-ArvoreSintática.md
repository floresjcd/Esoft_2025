Pense na **Árvore Sintática (Parse Tree)** como um **mapa que mostra como uma frase ou expressão é construída de acordo com as regras de uma linguagem**.

Ela é muito usada em **Compiladores, Linguagens Formais, Inteligência Artificial e Processamento de Linguagem Natural**.

### 1. A ideia básica

Imagine a expressão matemática:

**3 + 5 × 2**

Você sabe que a multiplicação deve ser feita antes da soma. Portanto, a expressão pode ser entendida como:

**3 + (5 × 2)**

A árvore sintática representa justamente essa estrutura:

```text
          +
        /   \
       3     ×
            / \
           5   2
```

Observe que o `+` está no topo porque ele representa a operação principal. Seus filhos são `3` e a expressão `5 × 2`.

---

### 2. Por que uma árvore?

Porque uma árvore permite representar **relações hierárquicas**.

Nesse exemplo:

```text
          +
        /   \
       3     ×
            / \
           5   2
```

* `+` é a **raiz**;
* `×`, `3`, `5` e `2` são **nós**;
* `3`, `5` e `2` são **folhas**, porque não possuem filhos;
* `×` é filho de `+`;
* `5` e `2` são filhos de `×`.

Essa hierarquia é importante porque mostra **qual operação está dentro de qual outra operação**.

---

### 3. Em linguagens formais

Agora vamos para um exemplo mais próximo de **Computação**.

Considere uma gramática simples:

```text
Expressão → Número + Número
Número    → 3
Número    → 5
```

Para a expressão:

```text
3 + 5
```

podemos construir:

```text
             Expressão
             /   |   \
         Número  +  Número
           |             |
           3             5
```

A árvore mostra que `3 + 5` é uma **Expressão**, formada por:

1. um `Número`;
2. o símbolo `+`;
3. outro `Número`.

---

### 4. E qual é a relação com um compilador?

Essa é uma das partes mais importantes.

Quando você escreve um programa, o computador precisa descobrir **a estrutura do código**, e não apenas ler os caracteres um por um.

Por exemplo:

```c
x = 10 + 20 * 3;
```

O compilador precisa entender algo semelhante a:

```text
             =
           /   \
          x     +
               / \
             10   *
                 / \
                20  3
```

Assim, ele consegue perceber que:

```text
20 * 3
```

deve ser calculado antes de:

```text
10 + (...)
```

A árvore, portanto, representa a **estrutura sintática** do programa.

---

### 5. Parse Tree ≠ simplesmente "árvore da expressão"

Uma **Parse Tree** é construída a partir das **regras de uma gramática**.

Por exemplo, podemos ter:

```text
E → E + T
E → T
T → T * F
T → F
F → número
```

Para:

```text
3 + 5 * 2
```

uma árvore de derivação pode ser:

```text
                E
              / | \
             E  +  T
             |    /|\
             T   T * F
             |   |   |
             F   F  2
             |   |
             3   5
```

As letras `E`, `T` e `F` são **símbolos não terminais** da gramática.

Já `3`, `5`, `2`, `+` e `*` são **terminais**.

---

### 6. Terminais e não terminais

Essa distinção costuma causar bastante dúvidas.

**Não terminal:** representa uma categoria da linguagem e pode ser expandido por uma regra.

Exemplos:

```text
Expressão
Termo
Número
```

**Terminal:** é um elemento que aparece efetivamente na entrada.

Exemplos:

```text
3
5
+
*
```

Uma forma simples de memorizar:

> **Não terminal = categoria/estrutura.**
> **Terminal = elemento final da expressão.**

---

### 7. Parse Tree e derivação

A árvore também pode ser vista como o resultado visual de uma **derivação**.

Suponha:

```text
E → E + T
E → T
T → número
```

Queremos gerar:

```text
3 + 5
```

Podemos começar com:

```text
E
```

Depois:

```text
E → E + T
```

E então:

```text
E → T + T
```

Finalmente:

```text
E → número + número
```

Substituindo os números:

```text
3 + 5
```

A **Parse Tree organiza visualmente todas essas substituições**.

---

### 8. Um ponto muito importante: sintaxe ≠ significado

Considere:

```text
3 + 5 * 2
```

A árvore nos diz **como a expressão está estruturada**.

Ela não está, por si só, dizendo qual é o resultado final.

A análise do **significado** da expressão está relacionada à **semântica**.

Podemos resumir:

| Conceito      | Pergunta                                |
| ------------- | --------------------------------------- |
| **Léxico**    | Quais são os elementos?                 |
| **Sintaxe**   | Como esses elementos estão organizados? |
| **Semântica** | O que essa estrutura significa?         |

---

### 9. Uma analogia simples

Imagine que você recebeu uma frase:

> **"O aluno estudou programação."**

Uma árvore sintática poderia representar algo como:

```text
              Frase
             /     \
       Sintagma     Sintagma
       Nominal      Verbal
         /            /   \
      aluno        estudou programação
```

É como desmontar a frase em **partes que possuem funções diferentes**.

Por isso, uma boa maneira de pensar em uma Parse Tree é:

> **Ela é um mapa hierárquico que mostra como uma sequência de símbolos pode ser construída a partir das regras de uma gramática.**

---

### 10. O que você deve lembrar

Se você está começando a estudar o assunto, eu priorizaria estas cinco ideias:

**1.** Uma Parse Tree é uma **árvore hierárquica**.

**2.** A **raiz** representa o símbolo inicial da gramática.

**3.** Os **nós internos** geralmente representam símbolos não terminais.

**4.** As **folhas** correspondem aos símbolos terminais da entrada.

**5.** A árvore mostra **como a entrada foi gerada pelas regras da gramática**.

Em uma frase:

> **Parse Tree é a representação em forma de árvore da estrutura sintática de uma sequência, construída a partir das regras de uma gramática.**
