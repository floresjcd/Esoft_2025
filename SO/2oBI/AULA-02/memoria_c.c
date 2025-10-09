```c
#include <stdio.h>
#include <stdlib.h>

int main() {
    // --- Alocacao Estatica ---
    // Variaveis alocadas na pilha (stack). O espaco e reservado em tempo de compilacao.
    int a = 10;
    char b = 'X';
    int static_array[5]; // Array de 5 inteiros alocado estaticamente

    printf("\n--- Alocacao Estatica ---\n");
    printf("Valor de a: %d (Endereco: %p)\n", a, (void*)&a);
    printf("Valor de b: %c (Endereco: %p)\n", b, (void*)&b);
    printf("Endereco do array estatico: %p\n", (void*)static_array);

    // --- Alocacao Dinamica (Heap) ---
    // Usando malloc para alocar um unico inteiro
    int *ptr_int = (int *) malloc(sizeof(int));
    if (ptr_int == NULL) {
        printf("Erro na alocacao de memoria para ptr_int!\n");
        return 1;
    }
    *ptr_int = 100;
    printf("\n--- Alocacao Dinamica (malloc) ---\n");
    printf("Valor alocado dinamicamente (int): %d (Endereco: %p)\n", *ptr_int, (void*)ptr_int);

    // Usando calloc para alocar um array de 3 inteiros e inicializa-los com zero
    int *ptr_array = (int *) calloc(3, sizeof(int));
    if (ptr_array == NULL) {
        printf("Erro na alocacao de memoria para ptr_array!\n");
        return 1;
    }
    printf("\n--- Alocacao Dinamica (calloc) ---\n");
    printf("Array alocado dinamicamente (calloc), valores iniciais:\n");
    for (int i = 0; i < 3; i++) {
        printf("ptr_array[%d]: %d (Endereco: %p)\n", i, ptr_array[i], (void*)&ptr_array[i]);
    }

    // Usando realloc para redimensionar o array para 5 inteiros
    ptr_array = (int *) realloc(ptr_array, 5 * sizeof(int));
    if (ptr_array == NULL) {
        printf("Erro na realocacao de memoria para ptr_array!\n");
        return 1;
    }
    // Os novos elementos (indices 3 e 4) terao valores indefinidos ou lixo de memoria
    printf("\n--- Realocacao Dinamica (realloc) ---\n");
    printf("Array realocado dinamicamente (realloc), novos valores:\n");
    for (int i = 0; i < 5; i++) {
        printf("ptr_array[%d]: %d (Endereco: %p)\n", i, ptr_array[i], (void*)&ptr_array[i]);
    }

    // --- Desalocacao Dinamica ---
    // Liberando a memoria alocada dinamicamente. Essencial para evitar vazamentos de memoria.
    free(ptr_int);
    printf("\nMemoria de ptr_int liberada.\n");

    free(ptr_array);
    printf("Memoria de ptr_array liberada.\n");

    // Tentar acessar memoria apos free pode causar comportamento indefinido (segmentation fault)
    // printf("Valor apos free: %d\n", *ptr_int); // NAO FACA ISSO em codigo real!

    return 0;
}
```
