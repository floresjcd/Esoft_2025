
> **Curso:** Engenharia de Software / Tecnologia em Análise e Desenvolvimento de Sistemas  
> **Disciplina:** Linguagem e Técnicas de Programação    
> **Tema:**  Estruturas Condicionais em PHP     
> **Professor:** José Carlos Flores  
---


# Estruturas Condicionais em PHP

As estruturas de controle de fluxo direcionam a execução do código com base em condições lógicas (`true` ou `false`). Abaixo está o guia visual e estruturado das principais abordagens em PHP.

---

### Visão Geral e Comparativo

| Estrutura | Propósito Principal | Melhor Cenário de Uso |
| --- | --- | --- |
| **`if`** | Execução condicional simples | Disparar uma ação única apenas se a condição for satisfeita. |
| **`if...else`** | Bifurcação binária | Alternativa de dois caminhos (ou faz **A**, ou faz **B**). |
| **`if...elseif...else`** | Múltiplas faixas/regras | Validação de intervalos, faixas de notas ou condições lógicas complexas. |
| **`switch`** | Comparação de valor exato | Avaliação de uma única variável contra múltiplos valores pontuais. |
| **Ternário (`?:`)** | Expressão inline concisa | Atribuição condicional direta de variáveis ou renderização curta. |

---

## 1. Condicional Simples: `if`

Executa o bloco interno apenas se a expressão lógica for avaliada como **verdadeira** (`true`).

```php
<?php
$media = 7.5;

if ($media >= 7.0) {
    echo "Aluno aprovado!";
}
?>

```

* **Comportamento:** Se a condição for falsa, o interpretador ignora o bloco e segue para a linha seguinte.

---

## 2. Condicional Composta: `if...else`

Garante que exatamente um de dois caminhos seja executado.

```php
<?php
$idade = 16;

if ($idade >= 18) {
    echo "Acesso liberado.";
} else {
    echo "Acesso bloqueado: menor de idade.";
}
?>

```

* **Comportamento:** O bloco `else` é acionado sempre que a condição do `if` resultar em `false`.

---

## 3. Múltiplas Condições: `if...elseif...else`

Avalia condições sequenciais em cascata. O primeiro bloco que atender ao critério é executado, ignorando os demais.

```php
<?php
$nota = 85;

if ($nota >= 90) {
    echo "Conceito: A";
} elseif ($nota >= 80) {
    echo "Conceito: B";
} elseif ($nota >= 70) {
    echo "Conceito: C";
} else {
    echo "Conceito: Insuficiente";
}
?>

```

* **Comportamento:** Ideal para faixas de valores e comparações relacionais (`>`, `<`, `>=`).

---

## 4. Seleção Múltipla: `switch`

Compara uma mesma variável ou expressão contra vários casos literais (`case`).

```php
<?php
$tipoUsuario = "admin";

switch ($tipoUsuario) {
    case "admin":
        echo "Painel completo liberado.";
        break;
    case "editor":
        echo "Permissão de edição concedida.";
        break;
    case "visitante":
        echo "Acesso apenas para leitura.";
        break;
    default:
        echo "Perfil não reconhecido.";
        break;
}
?>

```

* **Atenção:** O comando `break` é fundamental para interromper a execução e evitar o efeito de *fall-through* (execução contínua dos casos seguintes).

---

## 5. Operador Ternário (`?:`)

Sintaxe reduzida indicada para atribuições ou retornos baseados em uma condição simples: `condição ? valor_se_verdadeiro : valor_se_falso;`.

```php
<?php
$status = 1;

// Sintaxe: (condição) ? verdadeiro : falso;
$mensagem = ($status === 1) ? "Ativo" : "Inativo";

echo $mensagem; // Imprime: Ativo
?>

```

* **Vantagem:** Reduz a verbosidade em lógicas de atribuição rápida.


---

## 👤 GitHub

[![Foto de Perfil](https://github.com/floresjcd.png?size=50)](https://github.com/floresjcd) 
**[@floresjcd](https://github.com/floresjcd)**