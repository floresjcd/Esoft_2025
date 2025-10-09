
> **Disciplina:** Sistemas Operacionais  
> **Tema:** Gerenciamento de Memória em Sistemas Operacionais  
> **Professor:** José Carlos Flores  
> **Curso:** Engenharia de Software  
> 
---

# Aula Laboratório: Gerenciamento de Memória em Sistemas Operacionais

## 1. Introdução ao Gerenciamento de Memória

O gerenciamento de memória é uma das funções mais críticas e complexas de um sistema operacional. Ele atua como o maestro que orquestra o uso da memória principal do computador, garantindo que múltiplos programas e processos possam coexistir e executar de forma eficiente, segura e sem conflitos. Em um ambiente computacional moderno, onde a multiprogramação é a norma, a capacidade de gerenciar a memória de forma eficaz é fundamental para o desempenho e a estabilidade do sistema.

Essencialmente, o gerenciamento de memória se concentra em duas tarefas primárias [1]:

*   **Alocação**: Atribuir blocos de memória aos programas e processos que os solicitam para armazenar suas instruções e dados.
*   **Reciclagem**: Recuperar e disponibilizar blocos de memória que não estão mais sendo utilizados por nenhum processo, prevenindo o esgotamento dos recursos de memória.

Sem um gerenciamento adequado, a memória se tornaria um recurso caótico, levando a falhas de programa, lentidão e instabilidade geral do sistema. É por isso que o sistema operacional assume a responsabilidade de gerenciar a memória, abstraindo os detalhes complexos dos aplicativos [1].

## 2. Hierarquia de Memória

Para otimizar o desempenho e o custo, os sistemas computacionais utilizam uma **hierarquia de memória**, que organiza os diferentes tipos de armazenamento com base em sua velocidade, custo e capacidade. Quanto mais próximo do processador, mais rápida e cara é a memória, mas menor sua capacidade. Inversamente, memórias mais distantes são mais lentas e baratas, mas oferecem maior capacidade. A Figura 1 ilustra essa hierarquia.

![Hierarquia de Memória](https://private-us-east-1.manuscdn.com/sessionFile/CUE0qCDnbD3cFIqLxCZeMH/sandbox/2HTGL1UvALIKUgLcG2u5n8-images_1760032739705_na1fn_L2hvbWUvdWJ1bnR1L2hpZXJhcnF1aWFfbWVtb3JpYQ.webp?Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cHM6Ly9wcml2YXRlLXVzLWVhc3QtMS5tYW51c2Nkbi5jb20vc2Vzc2lvbkZpbGUvQ1VFMHFDRG5iRDNjRklxTHhDWmVNSC9zYW5kYm94LzJIVEdMMVV2QUxJS1VnTGNHMnU1bjgtaW1hZ2VzXzE3NjAwMzI3Mzk3MDVfbmExZm5fTDJodmJXVXZkV0oxYm5SMUwyaHBaWEpoY25GMWFXRmZiV1Z0YjNKcFlRLndlYnAiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjE3OTg3NjE2MDB9fX1dfQ__&Key-Pair-Id=K2HSFNDJXOU9YS&Signature=i4p1dHPttULN1R-NRgsRVevseDlKqFIGwcMO5PY9NkIv5Poqs35F0TL9W~rPQfHaZrByaEiWoxs71ALsw9g1VtqYWuq6ITqkBD4sUyRP4sG25l6qLR2f2GbDxCb6wwBSHk8PE5RC3FXR5VAgJwD7tBcp57Bw1-KEenP~m7t-NLMwVJBSL7ayEZJez3bNc6Gp7lB4vhW5SwJilGnsdgVs16~Z6L~j~NJGwhW27CC0go3ZjmCEN78A5x~lO~mcv84yc9BIxir9OTev03hLOE2pHHvclugzdAvv8VkV8OVf~7PMc3emmkrIBFago2cYNeurb83SGbdNzfinEtuozwv3jw__)

**Figura 1:** Hierarquia de Memória [5]

A tabela a seguir resume as características dos principais níveis da hierarquia de memória:

| Nível         | Tipo de Memória      | Velocidade     | Custo por Bit  | Capacidade    | Volatilidade |
| :------------ | :------------------- | :------------- | :------------- | :------------ | :----------- |
| 1             | Registradores        | Mais Rápida    | Mais Alto      | Muito Baixa   | Volátil      |
| 2             | Cache (L1, L2, L3)   | Muito Rápida   | Alto           | Baixa         | Volátil      |
| 3             | RAM (Memória Principal)| Rápida         | Médio          | Média         | Volátil      |
| 4             | SSD/HD (Memória Secundária)| Lenta          | Baixo          | Alta          | Não Volátil  |

O gerenciador de memória do sistema operacional atua principalmente na interface entre a RAM e a memória secundária, utilizando técnicas para criar a ilusão de que há mais memória principal disponível do que realmente existe.

## 3. Tipos de Alocação de Memória

A forma como a memória é alocada para um programa pode variar significativamente, influenciando a flexibilidade e a eficiência do uso da memória. Existem três tipos principais de alocação [1]:

### 3.1. Alocação Estática

A alocação estática ocorre quando a quantidade de memória necessária para uma variável ou estrutura de dados é determinada e reservada durante a fase de compilação do programa. O tamanho do espaço de memória é fixo e não pode ser alterado durante a execução. Exemplos comuns incluem variáveis globais e arrays declarados com um tamanho fixo. A memória para esses elementos é geralmente alocada na seção de dados ou de código do programa.

**Exemplo em C:**
```c
// Variáveis globais são alocadas estaticamente
int variavelGlobal = 10;

int main() {
    // Array de tamanho fixo alocado estaticamente na pilha ou seção de dados
    int arrayEstatico[5];
    // ...
    return 0;
}
```

### 3.2. Alocação Dinâmica (Heap)

A alocação dinâmica permite que os programas solicitem e liberem memória durante sua execução, conforme a necessidade. Essa flexibilidade é crucial para lidar com estruturas de dados cujo tamanho não é conhecido em tempo de compilação (e.g., listas encadeadas, árvores, arrays de tamanho variável). A memória alocada dinamicamente reside em uma área conhecida como **heap**.

Em linguagens como C e C++, o programador é responsável por gerenciar explicitamente a memória alocada dinamicamente (usando funções como `malloc`, `calloc`, `realloc` e `free`). A falha em liberar a memória não utilizada pode levar a **vazamentos de memória (memory leaks)**. Já em linguagens como Java e Python, o gerenciamento da memória dinâmica é automatizado por um **Coletor de Lixo (Garbage Collector)**.

**Exemplo em C (Alocação Dinâmica):**
```c
#include <stdio.h>
#include <stdlib.h>

int main() {
    // Alocação dinâmica de um inteiro usando malloc
    int *ptr_int = (int *) malloc(sizeof(int));
    if (ptr_int == NULL) {
        printf("Erro na alocação de memória!\n");
        return 1;
    }
    *ptr_int = 100;
    printf("Valor alocado dinamicamente: %d (Endereço: %p)\n", *ptr_int, (void*)ptr_int);

    // Liberando a memória alocada
    free(ptr_int);
    printf("Memória de ptr_int liberada.\n");

    return 0;
}
```

### 3.3. Alocação Local (Pilha - Stack)

A alocação local, ou alocação na pilha, é utilizada para variáveis locais de funções e sub-rotinas. A pilha de execução (stack) é uma estrutura de dados LIFO (Last-In, First-Out) onde a memória é alocada automaticamente quando uma função é chamada e desalocada quando a função retorna. Isso inclui parâmetros de função e variáveis locais. É um método de alocação muito rápido e eficiente.

**Exemplo em C (Alocação na Pilha):**
```c
void minhaFuncao() {
    int x = 5; // 'x' é alocado na pilha
    char nome[] = "João"; // 'nome' é alocado na pilha
    // ...
} // Quando a função termina, 'x' e 'nome' são desalocados automaticamente
```

## 4. Problemas Comuns no Gerenciamento de Memória

Mesmo com técnicas avançadas, o gerenciamento de memória enfrenta desafios, sendo os mais proeminentes a fragmentação e os vazamentos de memória.

### 4.1. Fragmentação

A fragmentação ocorre quando a memória é dividida em blocos não contíguos, tornando difícil ou impossível alocar um bloco de memória de um determinado tamanho, mesmo que a quantidade total de memória livre seja suficiente. Existem dois tipos principais [2]:

*   **Fragmentação Interna**: Acontece quando um processo recebe um bloco de memória maior do que o que realmente precisa. O espaço não utilizado dentro desse bloco alocado é desperdiçado. Isso é comum em sistemas de paginação ou partições fixas, onde a memória é alocada em unidades de tamanho fixo.

*   **Fragmentação Externa**: Ocorre quando há espaço livre total suficiente na memória para satisfazer uma solicitação, mas esse espaço não é contíguo. Ele está espalhado em pequenos blocos por toda a memória, impedindo a alocação de um processo que requer um bloco contíguo maior. A Figura 2 ilustra ambos os tipos de fragmentação.

![Fragmentação de Memória](https://private-us-east-1.manuscdn.com/sessionFile/CUE0qCDnbD3cFIqLxCZeMH/sandbox/2HTGL1UvALIKUgLcG2u5n8-images_1760032739707_na1fn_L2hvbWUvdWJ1bnR1L2ZyYWdtZW50YWNhb19tZW1vcmlh.jpg?Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cHM6Ly9wcml2YXRlLXVzLWVhc3QtMS5tYW51c2Nkbi5jb20vc2Vzc2lvbkZpbGUvQ1VFMHFDRG5iRDNjRklxTHhDWmVNSC9zYW5kYm94LzJIVEdMMVV2QUxJS1VnTGNHMnU1bjgtaW1hZ2VzXzE3NjAwMzI3Mzk3MDdfbmExZm5fTDJodmJXVXZkV0oxYm5SMUwyWnlZV2R0Wlc1MFlXTmhiMTl0WlcxdmNtbGguanBnIiwiQ29uZGl0aW9uIjp7IkRhdGVMZXNzVGhhbiI6eyJBV1M6RXBvY2hUaW1lIjoxNzk4NzYxNjAwfX19XX0_&Key-Pair-Id=K2HSFNDJXOU9YS&Signature=rdzaAdk1gZ4sEU-7ophaO6cqREwbh6hxbWYIvFE3EXVBs6WduacECEe7WSiSiuvh64A6eJZJxWta6vtwsRaVCiuiocSFwMDqf4RXtVkZ2Np7Q9H~Ha5ZxAWKzsafY0OZ7LxxpDHSVejiTvgATg6WR2bgRdjVVSKC4eO2ijrwpF0bA3fG8lTzA8OmxbmeGK75WLmbqyF45u-LOnJV-NzTml-0lF4Oe3EgpAByfUMvJjWr7MNQGqjhLGc1VoWqRsknKHQS7anHjFqeRO4bkYZRiPW8N4bLw0ddksDwiKQjbr-t~pKNvee6bxFQFHtXE50KkPf~LzpZvyY-H57r6vMnZQ__)

**Figura 2:** Fragmentação Interna e Externa [6]

### 4.2. Vazamento de Memória (Memory Leak)

Um vazamento de memória ocorre quando um programa aloca memória dinamicamente, mas falha em liberá-la quando ela não é mais necessária. Com o tempo, esses blocos de memória não liberados se acumulam, reduzindo a quantidade de memória disponível para o sistema e outros programas. Isso pode levar a uma degradação do desempenho e, eventualmente, à falha do aplicativo ou do sistema operacional. Linguagens com coletor de lixo, como Java e Python, são menos suscetíveis a vazamentos de memória explícitos, mas ainda podem ocorrer devido a referências persistentes a objetos não utilizados.

## 5. Estratégias de Gerenciamento de Memória

Os sistemas operacionais desenvolveram diversas estratégias para lidar com os desafios do gerenciamento de memória, evoluindo de abordagens simples para complexos sistemas de memória virtual.

### 5.1. Monoprogramação

É a estratégia mais básica, onde a memória é dividida em duas seções: uma para o sistema operacional e outra para um único programa de usuário. Apenas um programa pode ser executado por vez. Se um novo programa precisa ser carregado, ele substitui o programa atualmente na memória. Esta abordagem é ineficiente para sistemas modernos que exigem a execução simultânea de múltiplos programas [3].

### 5.2. Multiprogramação com Partições Fixas

Nesta estratégia, a memória principal é dividida em um número fixo de partições, que podem ter tamanhos iguais ou diferentes. Cada partição pode conter um processo. Embora permita a execução de múltiplos programas, sofre de fragmentação interna (se o processo for menor que a partição) e limita o grau de multiprogramação ao número de partições [2].

### 5.3. Multiprogramação com Partições Dinâmicas

Ao contrário das partições fixas, as partições dinâmicas são criadas e ajustadas conforme a necessidade dos processos. Isso reduz a fragmentação interna, pois cada processo recebe exatamente a quantidade de memória que solicita. No entanto, essa abordagem é mais suscetível à fragmentação externa, pois a alocação e desalocação de processos ao longo do tempo criam pequenos buracos de memória livre espalhados. Algoritmos como First-Fit, Best-Fit e Worst-Fit são usados para decidir onde alocar um novo processo [2].

### 5.4. Memória Virtual: Paginação e Segmentação

A **memória virtual** é uma técnica avançada que permite que os programas utilizem um espaço de endereçamento lógico muito maior do que a memória física disponível. Ela combina a RAM com um espaço de armazenamento secundário (geralmente no disco rígido, conhecido como **área de troca** ou **swap space**) para criar a ilusão de uma memória principal vasta. As duas principais técnicas para implementar a memória virtual são a paginação e a segmentação [1, 2].

#### 5.4.1. Paginação

Na paginação, a memória física é dividida em blocos de tamanho fixo chamados **frames (quadros)**. O espaço de endereçamento lógico de um processo é dividido em blocos do mesmo tamanho chamados **páginas**. Quando um processo é executado, suas páginas são carregadas nos frames disponíveis na memória física. A grande vantagem é que as páginas de um processo não precisam ser contíguas na memória física. O sistema operacional mantém uma **tabela de páginas** para cada processo, que mapeia os endereços lógicos (página e offset) para os endereços físicos (frame e offset). A Figura 3 ilustra o conceito de paginação.

![Paginação de Memória](https://private-us-east-1.manuscdn.com/sessionFile/CUE0qCDnbD3cFIqLxCZeMH/sandbox/2HTGL1UvALIKUgLcG2u5n8-images_1760032739708_na1fn_L2hvbWUvdWJ1bnR1L3BhZ2luYWNhb19tZW1vcmlh.jpg?Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cHM6Ly9wcml2YXRlLXVzLWVhc3QtMS5tYW51c2Nkbi5jb20vc2Vzc2lvbkZpbGUvQ1VFMHFDRG5iRDNjRklxTHhDWmVNSC9zYW5kYm94LzJIVEdMMVV2QUxJS1VnTGNHMnU1bjgtaW1hZ2VzXzE3NjAwMzI3Mzk3MDhfbmExZm5fTDJodmJXVXZkV0oxYm5SMUwzQmhaMmx1WVdOaGIxOXRaVzF2Y21saC5qcGciLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjE3OTg3NjE2MDB9fX1dfQ__&Key-Pair-Id=K2HSFNDJXOU9YS&Signature=hT7WiQsH7h3zb9Mpov-8kfo2VfYd5~IZh7W2n~a339OwFgx6ASRQ~W4D7mhKCisOJ~7U~kOEjaTKZ7LBXBCHtaKhRIsOVdgzdd8IfbLd-B1-kviTK3ddwjlTDmYIvwA0KC6B~R-vNnf81muyAWVRB4drNICcaHKUu515ObIeB4m~Yj89a7a4sH9ADFRUyUHbap1CXhgGfugBEKxNTbJlTejpypnvhibUHH4kJMUuhsXfJv9aKCfG9o1FT5yBsl9yngrnbMB7O2Xt20ap~-k38V5laowdw-ovTYYS0oB~PNr7GoejMOdQjLA1iV6AK4vR~x0vNR0jqjy9Ts3TSkq5cA__)

**Figura 3:** Conceito de Paginação [7]

*   **Vantagens**: Elimina a fragmentação externa e permite que um processo seja carregado parcialmente na memória, facilitando a execução de programas maiores que a RAM disponível.
*   **Desvantagens**: Pode introduzir uma pequena fragmentação interna na última página de um processo e o gerenciamento das tabelas de páginas pode consumir recursos.

#### 5.4.2. Segmentação

A segmentação divide o espaço de endereçamento lógico de um processo em blocos de tamanho variável chamados **segmentos**. Cada segmento corresponde a uma unidade lógica do programa, como o código, a pilha, os dados ou uma sub-rotina. Cada segmento é carregado em um bloco contíguo na memória física. O sistema operacional mantém uma **tabela de segmentos** para cada processo, que armazena o endereço base e o limite de cada segmento na memória física. A Figura 4 mostra um exemplo de segmentação.

![Segmentação de Memória](https://private-us-east-1.manuscdn.com/sessionFile/CUE0qCDnbD3cFIqLxCZeMH/sandbox/2HTGL1UvALIKUgLcG2u5n8-images_1760032739709_na1fn_L2hvbWUvdWJ1bnR1L3NlZ21lbnRhY2FvX21lbW9yaWE.jpg?Policy=eyJTdGF0ZW1lbnQiOlt7IlJlc291cmNlIjoiaHR0cHM6Ly9wcml2YXRlLXVzLWVhc3QtMS5tYW51c2Nkbi5jb20vc2Vzc2lvbkZpbGUvQ1VFMHFDRG5iRDNjRklxTHhDWmVNSC9zYW5kYm94LzJIVEdMMVV2QUxJS1VnTGNHMnU1bjgtaW1hZ2VzXzE3NjAwMzI3Mzk3MDlfbmExZm5fTDJodmJXVXZkV0oxYm5SMUwzTmxaMjFsYm5SaFkyRnZYMjFsYlc5eWFXRS5qcGciLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjE3OTg3NjE2MDB9fX1dfQ__&Key-Pair-Id=K2HSFNDJXOU9YS&Signature=DKDmkvRLdniv-4yH6vTXlF-NAQBO-W0gg7nqMvgF-hxepnepu5llppb9PxIaKfoiNKXImK8k1wG6pX-f9I1SN6SdF3zJimxeShXgi1EWOgK4j2SRzE~TvjOVTuZHPG0NLi3VQhkMlfb9OjUmAkuVHOOpjfdxP1MVmZGU2jwhcc~Lqtbg9xhvOOh7JSGESE3h418Cg4IwUexcwpXcMWGqKQuXm~nrwfMgw94Xssr9y2UchlSCPLZ7MNoFsSZw9NN8IjS6efpVQ3NtysCkIfOLl8vMOwbUDP9oRO6T~ZSot1winFvwVm0Ig-t1-a-oPdsPhyxHh1MFv19pw9gU5DO4ZA__)

**Figura 4:** Conceito de Segmentação [8]

*   **Vantagens**: Facilita a proteção e o compartilhamento de memória entre processos, pois os segmentos representam unidades lógicas significativas para o programador.
*   **Desvantagens**: Sofre de fragmentação externa, similar às partições dinâmicas.

### 5.5. Swapping

O **swapping** é uma técnica que move processos inteiros (ou partes deles) entre a memória principal e o disco rígido. Quando a memória RAM fica cheia, processos inativos ou de baixa prioridade podem ser "trocados" (swapped out) para o disco para liberar espaço. Quando esses processos precisam ser executados novamente, eles são "trazidos de volta" (swapped in) para a RAM. Embora permita um grau maior de multiprogramação, o swapping pode introduzir uma sobrecarga significativa devido à lentidão das operações de E/S com o disco [2].

## 6. Algoritmos de Substituição de Página

Em sistemas de paginação, quando ocorre uma falta de página (page fault) e a memória física está cheia, o sistema operacional precisa decidir qual página residente na memória será removida para dar lugar à nova página. Essa decisão é tomada por um **algoritmo de substituição de página**. Alguns dos algoritmos mais comuns incluem:

*   **FIFO (First-In, First-Out)**: Substitui a página que está na memória há mais tempo. É simples de implementar, mas pode não ser eficiente, pois uma página antiga pode ainda ser muito utilizada.
*   **LRU (Least Recently Used)**: Substitui a página que não foi utilizada por mais tempo. É um algoritmo mais eficiente, pois assume que páginas usadas recentemente tendem a ser usadas novamente no futuro. No entanto, é mais complexo de implementar, pois requer o rastreamento do tempo de uso de cada página.
*   **Ótimo (Optimal)**: Substitui a página que não será usada por mais tempo no futuro. Este algoritmo é o ideal, mas é impossível de implementar na prática, pois exige conhecimento futuro sobre o acesso às páginas. Serve como um benchmark para comparar a eficiência de outros algoritmos.

## 7. Exercícios Práticos: Gerenciamento de Memória em Código

Para solidificar o entendimento, vamos explorar como o gerenciamento de memória se manifesta em diferentes linguagens de programação. Os exemplos abaixo demonstram alocação dinâmica, o conceito de pilha e heap, e o papel do coletor de lixo.

### 7.1. Linguagem C: Alocação e Desalocação Explícita

Em C, o programador tem controle direto sobre a alocação e desalocação de memória, o que exige cuidado para evitar vazamentos de memória e erros de acesso.

**`memoria_c.c`**
```c
#include <stdio.h>
#include <stdlib.h>

int main() {
    // --- Alocação Estática ---
    // Variáveis alocadas na pilha (stack). O espaço é reservado em tempo de compilação.
    int a = 10;
    char b = 'X';
    int static_array[5]; // Array de 5 inteiros alocado estaticamente

    printf("\n--- Alocação Estática ---\n");
    printf("Valor de a: %d (Endereço: %p)\n", a, (void*)&a);
    printf("Valor de b: %c (Endereço: %p)\n", b, (void*)&b);
    printf("Endereço do array estático: %p\n", (void*)static_array);

    // --- Alocação Dinâmica (Heap) ---
    // Usando malloc para alocar um único inteiro
    int *ptr_int = (int *) malloc(sizeof(int));
    if (ptr_int == NULL) {
        printf("Erro na alocação de memória para ptr_int!\n");
        return 1;
    }
    *ptr_int = 100;
    printf("\n--- Alocação Dinâmica (malloc) ---\n");
    printf("Valor alocado dinamicamente (int): %d (Endereço: %p)\n", *ptr_int, (void*)ptr_int);

    // Usando calloc para alocar um array de 3 inteiros e inicializá-los com zero
    int *ptr_array = (int *) calloc(3, sizeof(int));
    if (ptr_array == NULL) {
        printf("Erro na alocação de memória para ptr_array!\n");
        return 1;
    }
    printf("\n--- Alocação Dinâmica (calloc) ---\n");
    printf("Array alocado dinamicamente (calloc), valores iniciais:\n");
    for (int i = 0; i < 3; i++) {
        printf("ptr_array[%d]: %d (Endereço: %p)\n", i, ptr_array[i], (void*)&ptr_array[i]);
    }

    // Usando realloc para realocar o array para 5 inteiros
    ptr_array = (int *) realloc(ptr_array, 5 * sizeof(int));
    if (ptr_array == NULL) {
        printf("Erro na realocação de memória para ptr_array!\n");
        return 1;
    }
    // Os novos elementos (índices 3 e 4) terão valores indefinidos ou lixo de memória
    printf("\n--- Realocação Dinâmica (realloc) ---\n");
    printf("Array realocado dinamicamente (realloc), novos valores:\n");
    for (int i = 0; i < 5; i++) {
        printf("ptr_array[%d]: %d (Endereço: %p)\n", i, ptr_array[i], (void*)&ptr_array[i]);
    }

    // --- Desalocação Dinâmica ---
    // Liberando a memória alocada dinamicamente. Essencial para evitar vazamentos de memória.
    free(ptr_int);
    printf("\nMemória de ptr_int liberada.\n");

    free(ptr_array);
    printf("Memória de ptr_array liberada.\n");

    // Tentar acessar memória após free pode causar comportamento indefinido (segmentation fault)
    // printf("Valor após free: %d\n", *ptr_int); // NÃO FAÇA ISSO em código real!

    return 0;
}
```

### 7.2. Linguagem Python: Gerenciamento Automático (Garbage Collection)

Python, como muitas linguagens modernas, abstrai o gerenciamento de memória do programador, utilizando um coletor de lixo para liberar automaticamente a memória de objetos não mais referenciados.

**`memoria_python.py`**
```python
import sys
import gc

# --- Alocação Automática e Garbage Collection ---

# Python gerencia a memória automaticamente usando contagem de referências
# e um coletor de lixo geracional para ciclos de referência.

class ObjetoGrande:
    def __init__(self, tamanho_mb):
        self.dados = bytearray(tamanho_mb * 1024 * 1024) # Aloca 'tamanho_mb' de bytes
        self.id = id(self) # Obtém o endereço de memória do objeto
        print(f"ObjetoGrande criado com {tamanho_mb} MB. ID (endereço): {self.id}")

    def __del__(self):
        # Este método é chamado quando o objeto é destruído pelo coletor de lixo
        print(f"ObjetoGrande com ID {self.id} destruído.")

print("--- Gerenciamento Automático de Memória em Python ---")

# Criando um objeto grande
objeto1 = ObjetoGrande(10) # 10 MB
print(f"Tamanho de objeto1 na memória: {sys.getsizeof(objeto1.dados) / (1024*1024):.2f} MB")

# Criando outro objeto grande
objeto2 = ObjetoGrande(5)

# Referência circular para demonstrar o coletor de lixo geracional
# Python usa um coletor de lixo para detectar e coletar objetos com referências circulares
lista_ciclica = []
lista_ciclica.append(lista_ciclica)
print(f"\nObjeto com referência cíclica criado. ID: {id(lista_ciclica)}")

# Removendo a referência externa para objeto1
del objeto1
print("Referência a objeto1 removida. O objeto será destruído quando a contagem de referências chegar a zero.")

# Forçando a execução do coletor de lixo (geralmente não é necessário em Python)
# Isso pode ajudar a coletar objetos com referências circulares que não foram coletados
# pela contagem de referências.
print("\nForçando a execução do coletor de lixo...")
gc.collect()
print("Coletor de lixo executado.")

# Removendo a referência externa para objeto2
del objeto2
print("Referência a objeto2 removida.")
gc.collect()

# A referência cíclica ainda existe, mas se não houver referências externas, o GC a coletará.
del lista_ciclica
print("Referência a lista_ciclica removida.")
gc.collect()

print("\n--- Exemplo de Uso de Memória com Listas ---")
# Listas em Python são dinâmicas e alocam memória conforme necessário
minha_lista = []
print(f"Tamanho inicial da lista: {sys.getsizeof(minha_lista)} bytes")

for i in range(10):
    minha_lista.append(i)
    # O tamanho da lista aumenta, e Python realoca memória conforme necessário
    print(f"Tamanho da lista após adicionar {i}: {sys.getsizeof(minha_lista)} bytes")

# Quando a lista é descartada, sua memória é liberada automaticamente
del minha_lista
print("Lista descartada, memória liberada automaticamente.")

print("\nFim da simulação de gerenciamento de memória em Python.")
```

### 7.3. Linguagem Java: Pilha, Heap e Garbage Collector

Java também utiliza um coletor de lixo para gerenciar a memória do heap, enquanto a pilha é gerenciada automaticamente para chamadas de método e variáveis locais.

**`MemoriaJava.java`**
```java
// MemoriaJava.java

public class MemoriaJava {

    // Variável estática: alocada na área de dados estáticos (parte do heap, mas com tempo de vida da aplicação)
    private static String mensagemEstatica = "Esta é uma mensagem estática.";

    public static void main(String[] args) {
        System.out.println("--- Gerenciamento de Memória em Java ---");

        // --- Alocação na Pilha (Stack) ---
        // Variáveis locais e referências são alocadas na pilha.
        int numeroLocal = 10; // Variável primitiva, valor na pilha
        String textoLocal = "Hello Stack"; // Referência na pilha, objeto String no Heap

        System.out.println("\n--- Alocação na Pilha (Stack) ---");
        System.out.println("Variável local (int): " + numeroLocal);
        System.out.println("Variável local (String referência): " + textoLocal);

        // Chamada de método que usa a pilha
        metodoExemplo(5);

        // --- Alocação no Heap ---
        // Objetos são sempre alocados no heap.
        MinhaClasse objeto1 = new MinhaClasse("Objeto Um"); // Objeto no Heap, referência objeto1 na Stack
        MinhaClasse objeto2 = new MinhaClasse("Objeto Dois"); // Outro objeto no Heap

        System.out.println("\n--- Alocação no Heap ---");
        System.out.println("Objeto 1: " + objeto1.getNome());
        System.out.println("Objeto 2: " + objeto2.getNome());
        System.out.println("Mensagem Estática: " + mensagemEstatica);

        // --- Garbage Collection (Coleta de Lixo) ---
        // Java possui um coletor de lixo que automaticamente libera memória de objetos não referenciados.
        System.out.println("\n--- Demonstração de Garbage Collection ---");
        MinhaClasse objetoParaColetar = new MinhaClasse("Objeto para Coletar");
        System.out.println("Objeto 'objetoParaColetar' criado.");

        // Remover a referência para o objeto. Agora ele está elegível para coleta de lixo.
        objetoParaColetar = null;
        System.out.println("Referência para 'objetoParaColetar' removida (setado para null).");

        // Sugerir ao Garbage Collector para executar. Não há garantia de execução imediata.
        System.gc();
        System.out.println("Sugestão para o Garbage Collector executar enviada. Verifique a saída para 'Finalizando Objeto'.");

        // Criando mais objetos para possivelmente forçar a GC
        for (int i = 0; i < 100000; i++) {
            new MinhaClasse("Objeto Temporário " + i); // Criando objetos sem referência para serem coletados
        }

        System.out.println("\nFim da simulação de gerenciamento de memória em Java.");
    }

    public static void metodoExemplo(int valor) {
        // Variáveis dentro de métodos também são alocadas na pilha.
        boolean flag = true;
        String mensagemMetodo = "Dentro do método";
        System.out.println("  Dentro de metodoExemplo: " + mensagemMetodo + ", valor: " + valor);
        // Quando o método termina, suas variáveis locais são removidas da pilha.
    }
}

class MinhaClasse {
    private String nome;
    private byte[] dadosGrandes; // Para simular um objeto que ocupa mais memória

    public MinhaClasse(String nome) {
        this.nome = nome;
        // Aloca um array de bytes para simular um objeto maior no heap
        this.dadosGrandes = new byte[1024 * 1024]; // 1 MB
        System.out.println("  MinhaClasse: '" + nome + "' criada. Ocupando " + dadosGrandes.length / (1024*1024) + " MB.");
    }

    public String getNome() {
        return nome;
    }

    // O método finalize() é chamado pelo Garbage Collector antes de destruir o objeto.
    // É bom para demonstrar a ação do GC, mas não deve ser usado para liberar recursos críticos.
    @Override
    protected void finalize() throws Throwable {
        try {
            System.out.println("  Finalizando Objeto: '" + nome + "'");
        } finally {
            super.finalize();
        }
    }
}
```

## 8. Resumo

O gerenciamento de memória é um aspecto fundamental dos sistemas operacionais, essencial para a execução eficiente e segura de programas. Desde as técnicas mais simples de monoprogramação até os complexos sistemas de memória virtual com paginação e segmentação, o objetivo principal é otimizar o uso dos recursos de memória, minimizar a fragmentação e prevenir vazamentos. A compreensão desses conceitos é crucial para o desenvolvimento de software robusto e para a análise de desempenho de sistemas computacionais.

## 9. Referências

[1] Gerenciamento de memória – Wikipédia, a enciclopédia livre. Disponível em: [https://pt.wikipedia.org/wiki/Gerenciamento_de_mem%C3%B3ria](https://pt.wikipedia.org/wiki/Gerenciamento_de_mem%C3%B3ria)

[2] Sistemas Operacionais - Gerência de Memória. Gran Cursos Online. Disponível em: [https://blog.grancursosonline.com.br/sistemas-operacionais-gerencia-de-memoria/](https://blog.grancursosonline.com.br/sistemas-operacionais-gerencia-de-memoria/)

[3] IMDTEC/UFRN. Sistemas Operacionais - Aula 11 - Gerenciamento de memória. Disponível em: [https://imdtec.imd.ufrn.br/assets/download/sistemas-operacionais/11-gerenciamento-de-memoria-SISTEMAS-OPERACIONAIS-IMD.pdf](https://imdtec.imd.ufrn.br/assets/download/sistemas-operacionais/11-gerenciamento-de-memoria-SISTEMAS-OPERACIONAIS-IMD.pdf)

[4] Hierarquia de Memória. GeeksforGeeks. Disponível em: [https://www.geeksforgeeks.org/memory-hierarchy-design-and-its-characteristics/](https://www.geeksforgeeks.org/memory-hierarchy-design-and-its-characteristics/)

[5] Fragmentação Interna e Externa. Estudos em ciências da computação - WordPress.com. Disponível em: [https://computersciencestudies.wordpress.com/2016/06/15/gerenciamento-de-memoria-metodos-particoes-fixas-e-dinamicas/](https://computersciencestudies.wordpress.com/2016/06/15/gerenciamento-de-memoria-metodos-particoes-fixas-e-dinamicas/)

[6] Paginação de Memória. Memória Virtual Unisc. Disponível em: [https://memoriavirtualunisc.blogspot.com/2012/05/tipos-de-memoria-virtual.html](https://memoriavirtualunisc.blogspot.com/2012/05/tipos-de-memoria-virtual.html)

[7] Segmentação de Memória. Webnode. Disponível em: [https://sistemasdearquivos.webnode.com.br/segmentacao/](https://sistemasdearquivos.webnode.com.br/segmentacao/)

