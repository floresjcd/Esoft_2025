
> **Disciplina:** Linguagem e Técnicas de Programação    
> **Tema:** Manipulação de dados em Entrada e Saída  
> **Professor:** José Carlos Flores  
> **Curso:** Engenharia de Software  
> **Objetivo:** Manipulação de dados em Entrada e Saída(Conversão de tipos em PHP)

---

## **Objetivos da aula**
Ao final desta aula, o aluno será capaz de:
- Compreender o conceito de tipagem dinâmica e fraca no PHP.
- Identificar os tipos de dados primitivos em PHP.
- Realizar conversões explícitas e implícitas entre tipos.
- Utilizar funções e operadores para manipular tipos.
- Prever comportamentos inesperados em conversões.
- Aplicar boas práticas ao lidar com tipos em aplicações reais.

---

## **Estrutura da Aula**

|Tópico  | Atividade |
|--------|---------|
|   1    | Introdução e objetivos |
|   2    | Revisão de tipos de dados em PHP |
|   3    | Conversão implícita (coerção automática) |
|   4    | Conversão explícita (casting) |
|   5    | Funções de verificação e conversão |
|   6    | Boas práticas e armadilhas comuns |
|   7    | Exercícios e correção |

---

## **1. Introdução**

O PHP é uma linguagem de programação com **tipagem dinâmica e fraca**, ou seja:

- As variáveis não precisam ter seu tipo declarado explicitamente.
- O tipo de uma variável pode mudar durante a execução.
- O PHP realiza **conversões automáticas** entre tipos em muitos contextos.

Essa flexibilidade é poderosa, mas também perigosa se mal compreendida. Entender como o PHP converte tipos é essencial para escrever código previsível e seguro.

---

## **2. Tipos de dados em PHP**

Os principais tipos de dados em PHP são:

| Tipo | Exemplo |
|------|--------|
| `int` (inteiro) | `42`, `-7` |
| `float` (ponto flutuante) | `3.14`, `-0.001` |
| `string` (texto) | `"Olá"`, `'123'` |
| `bool` (booleano) | `true`, `false` |
| `null` | `null` |
| `array` | `[1, 2, 3]` |
| `object` | `new DateTime()` |

### Exemplo:
```php
<?php
$idade = 25;           // int
$peso = 70.5;          // float
$nome = "Ana";         // string
$ativo = true;         // bool
$vazio = null;         // null
?>
```

---

## **3. Conversão Implícita (Coerção Automática)**

O PHP converte automaticamente tipos em certos contextos. Isso se chama **coerção de tipo**.

### Regras comuns de coerção:

#### 3.1. String + Número
```php
<?php
echo "10" + 5;     // Saída: 15 → string "10" convertida para int
echo "10abc" + 5;  // Saída: 15 → "10abc" vira 10 (parte numérica)
echo "abc" + 5;    // Saída: 5 → "abc" vira 0
?>
```

> ⚠️ Cuidado: strings não numéricas são convertidas para `0`.

#### 3.2. Booleanos em operações numéricas
```php
<?php
echo true + 5;     // Saída: 6 (true → 1)
echo false * 10;   // Saída: 0 (false → 0)
?>
```

#### 3.3. Comparação com `==` (comparação solta)
```php
<?php
var_dump(0 == "abc");      // true! (string "abc" → 0)
var_dump("0" == false);     // true
var_dump("" == 0);          // true
var_dump(null == "");       // true
?>
```

> 🔴 Nunca use `==` quando quiser comparar valor e tipo. Use `===`.

#### 3.4. Em contexto booleano (valores falsy)
Valores que avaliam como `false` em condições:
- `false`
- `0`, `0.0`
- `""`, `"0"`
- `null`
- `[]` (array vazio)

```php
<?php
if ("0") {
    echo "Isso NÃO será impresso";
} else {
    echo "String '0' é falsy!";
}
?>
```

---

## **4. Conversão Explícita (Casting)**

Podemos forçar a conversão de tipos usando **casting**.

### Sintaxe:
```php
(tipo) $variavel
```

Tipos válidos: `(int)`, `(float)`, `(string)`, `(bool)`, `(array)`, `(object)`, `(unset)` (equivalente a `null`)

### Exemplos:

#### 4.1. Para inteiro
```php
<?php
echo (int)"123";        // 123
echo (int)"12.9";       // 12 (trunca decimal)
echo (int)"abc";        // 0
echo (int)true;         // 1
echo (int)null;         // 0
?>
```

#### 4.2. Para float
```php
<?php
echo (float)"3.14";     // 3.14
echo (float)"5";        // 5.0
echo (float)true;       // 1.0
echo (float)[];         // 0.0
?>
```

#### 4.3. Para string
```php
<?php
echo (string)123;       // "123"
echo (string)true;      // "1"
echo (string)false;     // ""
echo (string)null;      // ""
echo (string)[1,2];     // "Array" (cuidado!)
?>
```

> ⚠️ Converter array para string gera `"Array"` e um aviso!

#### 4.4. Para booleano
```php
<?php
var_dump((bool)1);      // true
var_dump((bool)0);      // false
var_dump((bool)"");     // false
var_dump((bool)" ");    // true (espaço conta!)
var_dump((bool)"0");    // false
var_dump((bool)[]);     // false
var_dump((bool)[1]);    // true
?>
```

#### 4.5. Usando `settype()`
Modifica a variável original.

```php
<?php
$valor = "123";
settype($valor, "int");
echo gettype($valor);   // integer
echo $valor;            // 123
?>
```

---

## **5. Funções de Verificação e Conversão**

### 5.1. Funções de verificação de tipo
```php
<?php
is_int($x), is_float($x), is_string($x), is_bool($x), is_null($x), is_array($x)
?>

Exemplo:
```php
<?php
$x = "100";
var_dump(is_string($x));   // true
var_dump(is_int($x));      // false
$x = (int)$x;
var_dump(is_int($x));      // true
?>
```

### 5.2. Funções de conversão seguras
Além do casting explícito, o PHP oferece uma série de funções nativas que podem ser
usadas para converter tipos de dados ou para inspecionar o tipo de uma variável.
Essas funções fornecem uma alternativa mais legível e, em alguns casos, mais robusta
para a conversão de tipos.

#### `intval()`, `floatval()`, `strval()`, `boolval()`

Essas funções são usadas para obter o valor inteiro, float, string ou booleano de uma variável,
respectivamente. Elas são frequentemente preferidas ao casting explícito em
situações onde a legibilidade do código é uma prioridade ou quando se deseja um
comportamento mais previsível para certos tipos de entrada.

```php
<?php
echo intval("123.99");     // 123
echo floatval("3.14");     // 3.14
echo strval(42);           // "42"
echo boolval(0);           // false
?>
```

> ✅ Preferível usar essas funções do que casting direto em alguns casos.

### 5.3. Validação antes de converter

```php
<?php
function safeConvertToInt($input) {
    if (is_numeric($input)) {
        return (int)$input;
    } else {
        throw new InvalidArgumentException("Não é um número válido.");
    }
}

// Uso
try {
    echo safeConvertToInt("123abc"); // lança exceção
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
```

---

## **6. Boas Práticas e Armadilhas**

### ❌ Armadilhas comuns:
- Usar `==` em vez de `===`.
- Assumir que toda string pode ser convertida em número.
- Converter arrays para string sem tratamento.
- Não validar entrada do usuário antes de converter.

### ✅ Boas práticas:
- Sempre use `===` para comparação estrita.
- Valide entradas com `filter_var()` ou expressões regulares.
- Use `is_numeric()` antes de converter para número.
- Trate `null` e valores vazios com cuidado.
- Prefira funções como `intval()` e `floatval()` para clareza.

---

## **7. Exercícios**

### Exercício 1
Qual será a saída?
```php
<?php
$a = "10abc";
$b = 5;
echo $a + $b;
?>
```

### Exercício 2
Converta a string `"3.1415"` para inteiro e depois para booleano. Mostre os resultados.

### Exercício 3
Escreva uma função que receba uma variável e retorne seu tipo atual e seu valor convertido para string.

### Exercício 4
Corrija o código abaixo para evitar erros:
```php
<?php
$idade = "vinte e cinco";
$total = $idade + 10;
echo $total;
?>
```

---

## **Gabarito dos Exercícios**

### Exercício 1
**Saída:** `15`  
Explicação: `"10abc"` é convertida para `10` na soma.

---

### Exercício 2
```php
<?php
$str = "3.1415";
$int = (int)$str;        // 3
$bool = (bool)$int;      // true
echo "Inteiro: $int, Booleano: " . ($bool ? 'true' : 'false');
?>
```
**Saída:** `Inteiro: 3, Booleano: true`

---

### Exercício 3
```php
<?php
function mostrarTipoEString($valor) {
    $tipo = gettype($valor);
    $comoString = (string)$valor;
    return "Tipo: $tipo, Valor como string: '$comoString'";
}

echo mostrarTipoEString(true);     // Tipo: boolean, Valor como string: '1'
echo mostrarTipoEString([]);       // Tipo: array, Valor como string: 'Array'
?>
```

---

### Exercício 4
**Problema:** `"vinte e cinco"` não é um número, então será convertido para `0`.  
**Solução:**
```php
<?php
$idade = "vinte e cinco";

// Opção 1: Validar
if (is_numeric($idade)) {
    $total = $idade + 10;
    echo $total;
} else {
    echo "Idade inválida.";
}

// Opção 2: Mapear texto (exemplo simplificado)
$mapeamento = [
    "vinte e cinco" => 25,
    "trinta" => 30
];
$valorNumerico = $mapeamento[$idade] ?? null;

if ($valorNumerico !== null) {
    echo $valorNumerico + 10; // 35
} else {
    echo "Idade não reconhecida.";
}
?>
```

---

## **Material da aula (Resumo para os alunos)**

### 📄 **Tópicos Principais**
- PHP tem tipagem **dinâmica e fraca**.
- Conversão **implícita** ocorre automaticamente em operações.
- Use `===` para evitar surpresas com comparação.
- Conversão **explícita** com `(int)`, `(string)`, etc.
- Funções como `intval()`, `is_numeric()` ajudam na segurança.
- Arrays e objetos não devem ser convertidos para string diretamente.

### 🛠️ **Funções Úteis**
| Função | Uso |
|-------|-----|
| `(int)` | Converte para inteiro |
| `intval($x)` | Converte para inteiro (mais seguro) |
| `is_numeric($x)` | Verifica se é número ou string numérica |
| `gettype($x)` | Retorna o tipo atual |
| `settype($x, 'int')` | Altera o tipo da variável |

### ⚠️ **Cuidados**
- `"0"` é `false` em booleano.
- `"abc"` vira `0` em número.
- Array → string = `"Array"` (não útil).
- Sempre valide entradas do usuário.

---

## **Recursos Adicionais**
- [Documentação PHP: Type Juggling](https://www.php.net/manual/en/language.types.type-juggling.php)
- [PHP: The Right Way - Types](https://phptherightway.com/#types)

---

## **Pontos Importantes para não esquecer**
Dominar a conversão de tipos em PHP é fundamental para evitar bugs sutis. Embora a linguagem seja flexível, essa flexibilidade exige disciplina do programador. Sempre valide, teste e prefira comparações estritas (`===`) para maior previsibilidade.

--- 

📚 **Fim da Aula**