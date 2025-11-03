
> **Disciplina:** Paradigmas de Linguagens de Programação    
> **Tema:** Linguagem Prolog   
> **Professor:** José Carlos Flores  
> **Curso:** Engenharia de Software  
> **Objetivo:** Exercícios focados nos conceitos fundamentais de Prolog: **Fatos**, **Regras**, e **Consultas**.
---



# Exercícios: O Paradigma Lógico de Programação

---

## Parte 1: Domínio de Animais

### Fatos e Regras

```prolog
% Fatos
animal(cachorro).
animal(gato).
animal(passaro).
animal(peixe).
animal(cobra).

mamifero(cachorro).
mamifero(gato).

voa(passaro).

vive_na_agua(peixe).

perigoso(cobra).
perigoso(cachorro).

gosta_de(joao, cachorro).
gosta_de(maria, gato).
gosta_de(pedro, passaro).

% Regras
animal_domestico(X) :- mamifero(X), gosta_de(_, X).
animal_selvagem(X) :- animal(X), \+ animal_domestico(X).
```

### Exercícios 1-15

**Exercício 1:** Verifique se gato é um animal.
```prolog
?- animal(gato).
```
**Gabarito:** `true.`

---

**Exercício 2:** Verifique se um pássaro é um mamífero.
```prolog
?- mamifero(passaro).
```
**Gabarito:** `false.`

---

**Exercício 3:** Encontre qual animal voa.
```prolog
?- voa(X).
```
**Gabarito:** `X = passaro.`

---

**Exercício 4:** Verifique se um gato é perigoso.
```prolog
?- perigoso(gato).
```
**Gabarito:** `false.`

---

**Exercício 5:** Encontre o que João gosta.
```prolog
?- gosta_de(joao, X).
```
**Gabarito:** `X = cachorro.`

---

**Exercício 6:** Encontre quem gosta de gato.
```prolog
?- gosta_de(Y, gato).
```
**Gabarito:** `Y = maria.`

---

**Exercício 7:** Verifique se cachorro é um animal doméstico.
```prolog
?- animal_domestico(cachorro).
```
**Gabarito:** `true.`

---

**Exercício 8:** Verifique se peixe é um animal doméstico.
```prolog
?- animal_domestico(peixe).
```
**Gabarito:** `false.`

---

**Exercício 9:** Verifique se cobra é um animal selvagem.
```prolog
?- animal_selvagem(cobra).
```
**Gabarito:** `true.`

---

**Exercício 10:** Verifique se gato é um animal selvagem.
```prolog
?- animal_selvagem(gato).
```
**Gabarito:** `false.`

---

**Exercício 11:** Encontre todos os animais que não são mamíferos.
```prolog
?- animal(X), \+ mamifero(X).
```
**Gabarito:** `X = passaro ; X = peixe ; X = cobra.`

---

**Exercício 12:** Encontre quais animais perigosos são gostados por alguém.
```prolog
?- perigoso(X), gosta_de(Y, X).
```
**Gabarito:** `X = cachorro, Y = joao.`

---

**Exercício 13:** Encontre todos os animais que não são perigosos e não voam.
```prolog
?- animal(X), \+ perigoso(X), \+ voa(X).
```
**Gabarito:** `X = gato ; X = peixe.`

---

**Exercício 14:** Encontre todos os animais que vivem na água.
```prolog
?- animal(X), vive_na_agua(X).
```
**Gabarito:** `X = peixe.`

---

**Exercício 15:** Encontre todos os animais que não vivem na água e não voam.
```prolog
?- animal(X), \+ vive_na_agua(X), \+ voa(X).
```
**Gabarito:** `X = cachorro ; X = gato ; X = cobra.`

---

## Parte 2: Domínio de Geografia

### Fatos e Regras

```prolog
% Fatos
pais(brasil).
pais(argentina).
pais(chile).
pais(uruguai).

fronteira(brasil, argentina).
fronteira(argentina, chile).
fronteira(brasil, uruguai).
fronteira(argentina, uruguai).

% Regras
vizinho(X, Y) :- fronteira(X, Y).
vizinho(X, Y) :- fronteira(Y, X).
```

### Exercícios 16-20

**Exercício 16:** Liste todos os países.
```prolog
?- pais(X).
```
**Gabarito:** `X = brasil ; X = argentina ; X = chile ; X = uruguai.`

---

**Exercício 17:** Verifique se Chile faz fronteira com Brasil.
```prolog
?- fronteira(chile, brasil).
```
**Gabarito:** `false.`

---

**Exercício 18:** Verifique se Brasil e Chile são vizinhos.
```prolog
?- vizinho(brasil, chile).
```
**Gabarito:** `false.`

---

**Exercício 19:** Encontre todos os vizinhos da Argentina.
```prolog
?- vizinho(argentina, X).
```
**Gabarito:** `X = brasil ; X = chile ; X = uruguai.`

---

**Exercício 20:** Existe um país X que faz fronteira com o Brasil e com o Chile?
```prolog
?- vizinho(brasil, X), vizinho(X, chile).
```
**Gabarito:** `false.`

---

## Resumo dos Conceitos Testados

| Conceito | Exercícios |
| :--- | :--- |
| **Consultas Simples (Fatos)** | 1, 2, 4, 14, 17 |
| **Consultas com Variáveis** | 3, 5, 6, 16, 19 |
| **Regras e Inferência** | 7, 8, 9, 10, 18, 20 |
| **Negação (NOT)** | 11, 13, 15 |
| **Múltiplas Condições** | 12, 19, 20 |

---

## Instruções para Praticar

1. **Crie um arquivo Prolog** com extensão `.pl` (ex: `exercicios.pl`)
2. **Copie os fatos e regras** fornecidos acima no arquivo
3. **Execute as consultas** usando SWI-Prolog ou plataforma online
4. **Compare seus resultados** com o gabarito
5. **Experimente variações** das consultas para aprofundar o aprendizado

---

## Dicas para Sucesso

- **Comece simples:** Domine os exercícios 1-6 antes de passar para os mais complexos
- **Entenda o backtracking:** Veja como o sistema busca múltiplas soluções
- **Teste variações:** Modifique as consultas para explorar diferentes cenários
- **Crie seus próprios fatos:** Pratique criando novos domínios e regras
- **Use a negação com cuidado:** `\+` nega uma condição, mas pode ser contra-intuitivo

---

## Recursos Adicionais

- **SWI-Prolog Online:** [https://swish.swi-prolog.org/](https://swish.swi-prolog.org/)
- **Try Prolog:** [http://tryprolog.pl/](http://tryprolog.pl/)
- **Replit:** [https://replit.com/](https://replit.com/)
- **OnlineGBD:** [https://www.onlinegdb.com/](https://www.onlinegdb.com/)

---
