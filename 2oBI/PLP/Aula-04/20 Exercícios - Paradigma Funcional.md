
> **Disciplina:** Paradigmas de Linguagens de Programação    
> **Tema:** Paradigma Funcional   
> **Professor:** José Carlos Flores  
> **Curso:** Engenharia de Software  
> **Objetivo:** Exercícios focados nos conceitos fundamentais utilizando as **4 linguagens modernas** (Haskell, Scala, Elixir e Clojure).
---


# 20 Exercícios - Paradigma Funcional
## Linguagens: Haskell, Scala, Elixir e Clojure

---

## Instruções Gerais

Para cada exercício, você deve implementar a solução nas **4 linguagens modernas** (Haskell, Scala, Elixir e Clojure). Os exercícios estão organizados do mais simples ao mais complexo, permitindo uma progressão natural no aprendizado.

**Plataformas recomendadas para testar seu código:**
- **Haskell:** Try Haskell (https://www.tryhaskell.org/)
- **Scala:** Scastie (https://scastie.scala-lang.org/)
- **Elixir:** Elixir Playground (https://elixirplayground.com/)
- **Clojure:** Repl.it (https://repl.it/) ou Clojure Online (https://clojure.online/)

---

## Exercícios

### Exercício 1: Dobrar um Número
**Descrição:** Crie uma função que recebe um número inteiro e retorna o dobro desse número.

**Requisitos:**
- A função deve ser pura (sem efeitos colaterais)
- Deve funcionar com números positivos, negativos e zero

**Assinatura esperada:**
- Haskell: `dobrar :: Int -> Int`
- Scala: `def dobrar(n: Int): Int`
- Elixir: `def dobrar(n)`
- Clojure: `(defn dobrar [n])`

**Exemplos de teste:**
```
dobrar(5) => 10
dobrar(-3) => -6
dobrar(0) => 0
```

---

### Exercício 2: Verificar se um Número é Positivo
**Descrição:** Crie uma função que verifica se um número é positivo (maior que zero).

**Requisitos:**
- Retorne `true` se o número é positivo
- Retorne `false` caso contrário

**Assinatura esperada:**
- Haskell: `ehPositivo :: Int -> Bool`
- Scala: `def ehPositivo(n: Int): Boolean`
- Elixir: `def eh_positivo(n)`
- Clojure: `(defn eh-positivo [n])`

**Exemplos de teste:**
```
ehPositivo(5) => true
ehPositivo(-3) => false
ehPositivo(0) => false
```

---

### Exercício 3: Calcular a Área de um Quadrado
**Descrição:** Crie uma função que calcula a área de um quadrado dado o lado.

**Requisitos:**
- A função deve usar a fórmula: A = lado²
- Deve retornar um número decimal (Float/Double)

**Assinatura esperada:**
- Haskell: `areaQuadrado :: Float -> Float`
- Scala: `def areaQuadrado(lado: Double): Double`
- Elixir: `def area_quadrado(lado)`
- Clojure: `(defn area-quadrado [lado])`

**Exemplos de teste:**
```
areaQuadrado(5) => 25.0
areaQuadrado(2.5) => 6.25
areaQuadrado(0) => 0.0
```

---

### Exercício 4: Converter Celsius para Fahrenheit
**Descrição:** Crie uma função que converte uma temperatura em Celsius para Fahrenheit.

**Requisitos:**
- Use a fórmula: F = (C × 9/5) + 32
- Retorne um número decimal

**Assinatura esperada:**
- Haskell: `celsiusParaFahrenheit :: Float -> Float`
- Scala: `def celsiusParaFahrenheit(celsius: Double): Double`
- Elixir: `def celsius_para_fahrenheit(celsius)`
- Clojure: `(defn celsius-para-fahrenheit [celsius])`

**Exemplos de teste:**
```
celsiusParaFahrenheit(0) => 32.0
celsiusParaFahrenheit(100) => 212.0
celsiusParaFahrenheit(-40) => -40.0
```

---

### Exercício 5: Contar Caracteres em uma String
**Descrição:** Crie uma função que conta o número de caracteres em uma string.

**Requisitos:**
- Retorne um número inteiro representando o tamanho da string
- Inclua espaços na contagem

**Assinatura esperada:**
- Haskell: `contarCaracteres :: String -> Int`
- Scala: `def contarCaracteres(s: String): Int`
- Elixir: `def contar_caracteres(s)`
- Clojure: `(defn contar-caracteres [s])`

**Exemplos de teste:**
```
contarCaracteres("Olá") => 3
contarCaracteres("Olá Mundo") => 9
contarCaracteres("") => 0
```

---

### Exercício 6: Concatenar Duas Strings
**Descrição:** Crie uma função que concatena duas strings com um espaço entre elas.

**Requisitos:**
- Receba duas strings como argumentos
- Retorne as strings concatenadas com um espaço

**Assinatura esperada:**
- Haskell: `concatenar :: String -> String -> String`
- Scala: `def concatenar(s1: String, s2: String): String`
- Elixir: `def concatenar(s1, s2)`
- Clojure: `(defn concatenar [s1 s2])`

**Exemplos de teste:**
```
concatenar("Olá", "Mundo") => "Olá Mundo"
concatenar("Bom", "dia") => "Bom dia"
```

---

### Exercício 7: Elevar um Número ao Quadrado
**Descrição:** Crie uma função que eleva um número ao quadrado.

**Requisitos:**
- Receba um número como argumento
- Retorne o número elevado ao quadrado

**Assinatura esperada:**
- Haskell: `quadrado :: Int -> Int`
- Scala: `def quadrado(n: Int): Int`
- Elixir: `def quadrado(n)`
- Clojure: `(defn quadrado [n])`

**Exemplos de teste:**
```
quadrado(5) => 25
quadrado(-3) => 9
quadrado(0) => 0
```

---

### Exercício 8: Verificar se um Número é Par
**Descrição:** Crie uma função que verifica se um número é par.

**Requisitos:**
- Retorne `true` se o número é par
- Retorne `false` se o número é ímpar

**Assinatura esperada:**
- Haskell: `ehPar :: Int -> Bool`
- Scala: `def ehPar(n: Int): Boolean`
- Elixir: `def eh_par(n)`
- Clojure: `(defn eh-par [n])`

**Exemplos de teste:**
```
ehPar(4) => true
ehPar(7) => false
ehPar(0) => true
```

---

### Exercício 9: Calcular o Valor Absoluto
**Descrição:** Crie uma função que retorna o valor absoluto de um número.

**Requisitos:**
- Se o número é negativo, retorne seu oposto
- Se o número é positivo ou zero, retorne o próprio número

**Assinatura esperada:**
- Haskell: `valorAbsoluto :: Int -> Int`
- Scala: `def valorAbsoluto(n: Int): Int`
- Elixir: `def valor_absoluto(n)`
- Clojure: `(defn valor-absoluto [n])`

**Exemplos de teste:**
```
valorAbsoluto(-5) => 5
valorAbsoluto(3) => 3
valorAbsoluto(0) => 0
```

---

### Exercício 10: Converter String para Maiúsculas
**Descrição:** Crie uma função que converte uma string para maiúsculas.

**Requisitos:**
- Receba uma string como argumento
- Retorne a mesma string em maiúsculas

**Assinatura esperada:**
- Haskell: `paraMaiusculas :: String -> String`
- Scala: `def paraMaiusculas(s: String): String`
- Elixir: `def para_maiusculas(s)`
- Clojure: `(defn para-maiusculas [s])`

**Exemplos de teste:**
```
paraMaiusculas("olá") => "OLÁ"
paraMaiusculas("Mundo") => "MUNDO"
paraMaiusculas("123abc") => "123ABC"
```

---

### Exercício 11: Calcular a Média de Dois Números
**Descrição:** Crie uma função que calcula a média aritmética de dois números.

**Requisitos:**
- Receba dois números como argumentos
- Retorne a média (soma dividida por 2)

**Assinatura esperada:**
- Haskell: `media :: Float -> Float -> Float`
- Scala: `def media(a: Double, b: Double): Double`
- Elixir: `def media(a, b)`
- Clojure: `(defn media [a b])`

**Exemplos de teste:**
```
media(10, 20) => 15.0
media(5, 15) => 10.0
media(0, 0) => 0.0
```

---

### Exercício 12: Verificar se um Número está entre 1 e 10
**Descrição:** Crie uma função que verifica se um número está entre 1 e 10 (inclusive).

**Requisitos:**
- Retorne `true` se o número está no intervalo [1, 10]
- Retorne `false` caso contrário

**Assinatura esperada:**
- Haskell: `entreUmEDez :: Int -> Bool`
- Scala: `def entreUmEDez(n: Int): Boolean`
- Elixir: `def entre_um_e_dez(n)`
- Clojure: `(defn entre-um-e-dez [n])`

**Exemplos de teste:**
```
entreUmEDez(5) => true
entreUmEDez(1) => true
entreUmEDez(10) => true
entreUmEDez(0) => false
entreUmEDez(11) => false
```

---

### Exercício 13: Calcular o Desconto de um Preço
**Descrição:** Crie uma função que calcula o preço final após aplicar um desconto percentual.

**Requisitos:**
- Receba o preço original e o percentual de desconto
- Retorne o preço final (preço original - desconto)

**Assinatura esperada:**
- Haskell: `aplicarDesconto :: Float -> Float -> Float`
- Scala: `def aplicarDesconto(preco: Double, desconto: Double): Double`
- Elixir: `def aplicar_desconto(preco, desconto)`
- Clojure: `(defn aplicar-desconto [preco desconto])`

**Exemplos de teste:**
```
aplicarDesconto(100, 10) => 90.0
aplicarDesconto(50, 20) => 40.0
aplicarDesconto(200, 50) => 100.0
```

---

### Exercício 14: Inverter o Sinal de um Número
**Descrição:** Crie uma função que inverte o sinal de um número (positivo vira negativo e vice-versa).

**Requisitos:**
- Multiplique o número por -1
- Retorne o resultado

**Assinatura esperada:**
- Haskell: `inverterSinal :: Int -> Int`
- Scala: `def inverterSinal(n: Int): Int`
- Elixir: `def inverter_sinal(n)`
- Clojure: `(defn inverter-sinal [n])`

**Exemplos de teste:**
```
inverterSinal(5) => -5
inverterSinal(-3) => 3
inverterSinal(0) => 0
```

---

### Exercício 15: Calcular o Perímetro de um Retângulo
**Descrição:** Crie uma função que calcula o perímetro de um retângulo.

**Requisitos:**
- Receba a largura e altura como argumentos
- Use a fórmula: P = 2 × (largura + altura)

**Assinatura esperada:**
- Haskell: `perimetroRetangulo :: Float -> Float -> Float`
- Scala: `def perimetroRetangulo(largura: Double, altura: Double): Double`
- Elixir: `def perimetro_retangulo(largura, altura)`
- Clojure: `(defn perimetro-retangulo [largura altura])`

**Exemplos de teste:**
```
perimetroRetangulo(5, 3) => 16.0
perimetroRetangulo(10, 10) => 40.0
perimetroRetangulo(2.5, 3.5) => 12.0
```

---

### Exercício 16: Verificar se uma String está Vazia
**Descrição:** Crie uma função que verifica se uma string está vazia.

**Requisitos:**
- Retorne `true` se a string está vazia
- Retorne `false` caso contrário

**Assinatura esperada:**
- Haskell: `estaVazia :: String -> Bool`
- Scala: `def estaVazia(s: String): Boolean`
- Elixir: `def esta_vazia(s)`
- Clojure: `(defn esta-vazia [s])`

**Exemplos de teste:**
```
estaVazia("") => true
estaVazia("Olá") => false
estaVazia(" ") => false
```

---

### Exercício 17: Calcular o Triplo de um Número
**Descrição:** Crie uma função que calcula o triplo de um número.

**Requisitos:**
- Multiplique o número por 3
- Retorne o resultado

**Assinatura esperada:**
- Haskell: `triplo :: Int -> Int`
- Scala: `def triplo(n: Int): Int`
- Elixir: `def triplo(n)`
- Clojure: `(defn triplo [n])`

**Exemplos de teste:**
```
triplo(5) => 15
triplo(-2) => -6
triplo(0) => 0
```

---

### Exercício 18: Calcular a Área de um Triângulo
**Descrição:** Crie uma função que calcula a área de um triângulo.

**Requisitos:**
- Receba a base e altura como argumentos
- Use a fórmula: A = (base × altura) / 2

**Assinatura esperada:**
- Haskell: `areaTriangulo :: Float -> Float -> Float`
- Scala: `def areaTriangulo(base: Double, altura: Double): Double`
- Elixir: `def area_triangulo(base, altura)`
- Clojure: `(defn area-triangulo [base altura])`

**Exemplos de teste:**
```
areaTriangulo(10, 5) => 25.0
areaTriangulo(4, 6) => 12.0
areaTriangulo(0, 10) => 0.0
```

---

### Exercício 19: Verificar se um Número é Múltiplo de 3
**Descrição:** Crie uma função que verifica se um número é múltiplo de 3.

**Requisitos:**
- Retorne `true` se o número é divisível por 3
- Retorne `false` caso contrário

**Assinatura esperada:**
- Haskell: `eMultiploDeTres :: Int -> Bool`
- Scala: `def eMultiploDeTres(n: Int): Boolean`
- Elixir: `def e_multiplo_de_tres(n)`
- Clojure: `(defn e-multiplo-de-tres [n])`

**Exemplos de teste:**
```
eMultiploDeTres(9) => true
eMultiploDeTres(6) => true
eMultiploDeTres(7) => false
eMultiploDeTres(0) => true
```

---

### Exercício 20: Calcular o Resto da Divisão
**Descrição:** Crie uma função que calcula o resto da divisão de dois números.

**Requisitos:**
- Receba dois números como argumentos (dividendo e divisor)
- Retorne o resto da divisão

**Assinatura esperada:**
- Haskell: `resto :: Int -> Int -> Int`
- Scala: `def resto(dividendo: Int, divisor: Int): Int`
- Elixir: `def resto(dividendo, divisor)`
- Clojure: `(defn resto [dividendo divisor])`

**Exemplos de teste:**
```
resto(10, 3) => 1
resto(20, 5) => 0
resto(7, 2) => 1
```

---

## Dicas para Resolver os Exercícios

1. **Comece simples:** Resolva os primeiros exercícios para pegar familiaridade com a sintaxe de cada linguagem.

2. **Use uma linguagem por vez:** Não tente resolver todos os exercícios em todas as linguagens de uma vez. Escolha uma linguagem e resolva todos os 20 exercícios nela antes de passar para a próxima.

3. **Teste seu código:** Use as plataformas online recomendadas para testar cada função com os exemplos fornecidos.

4. **Procure padrões:** Observe que muitos exercícios seguem padrões similares. Use isso para aprender mais rápido.

5. **Não se preocupe com performance:** Neste nível, o foco é aprender os conceitos, não otimizar o código.

6. **Consulte a documentação:** Cada linguagem tem sua própria sintaxe. Não hesite em consultar a documentação oficial.

---

# Gabarito: 20 Exercícios - Paradigma Funcional

---

## Exercício 1: Dobrar um Número

### Haskell
```haskell
dobrar :: Int -> Int
dobrar n = n * 2

-- Testes
main = do
  print (dobrar 5)    -- Saída: 10
  print (dobrar (-3)) -- Saída: -6
  print (dobrar 0)    -- Saída: 0
```

**Explicação:** A função multiplica o número por 2. É uma função pura que não causa efeitos colaterais.

### Scala
```scala
def dobrar(n: Int): Int = n * 2

// Testes
println(dobrar(5))    // Saída: 10
println(dobrar(-3))   // Saída: -6
println(dobrar(0))    // Saída: 0
```

**Explicação:** Implementação simples que multiplica o número por 2. Retorna um Int.

### Elixir
```elixir
defmodule Funcoes do
  def dobrar(n) do
    n * 2
  end
end

# Testes
IO.inspect(Funcoes.dobrar(5))    # Saída: 10
IO.inspect(Funcoes.dobrar(-3))   # Saída: -6
IO.inspect(Funcoes.dobrar(0))    # Saída: 0
```

**Explicação:** Em Elixir, funções são definidas dentro de módulos. A função retorna o resultado da multiplicação.

### Clojure
```clojure
(defn dobrar [n]
  (* n 2))

; Testes
(println (dobrar 5))    ; Saída: 10
(println (dobrar -3))   ; Saída: -6
(println (dobrar 0))    ; Saída: 0
```

**Explicação:** Em Clojure, usa-se `*` para multiplicação. A função é definida com `defn`.

---

## Exercício 2: Verificar se um Número é Positivo

### Haskell
```haskell
ehPositivo :: Int -> Bool
ehPositivo n = n > 0

-- Testes
main = do
  print (ehPositivo 5)   -- Saída: True
  print (ehPositivo (-3)) -- Saída: False
  print (ehPositivo 0)   -- Saída: False
```

**Explicação:** Compara o número com 0 usando o operador `>`. Retorna um valor booleano.

### Scala
```scala
def ehPositivo(n: Int): Boolean = n > 0

// Testes
println(ehPositivo(5))    // Saída: true
println(ehPositivo(-3))   // Saída: false
println(ehPositivo(0))    // Saída: false
```

**Explicação:** Usa o operador `>` para comparação. Retorna Boolean.

### Elixir
```elixir
defmodule Verificador do
  def eh_positivo(n) do
    n > 0
  end
end

# Testes
IO.inspect(Verificador.eh_positivo(5))    # Saída: true
IO.inspect(Verificador.eh_positivo(-3))   # Saída: false
IO.inspect(Verificador.eh_positivo(0))    # Saída: false
```

**Explicação:** Usa o operador `>` para comparação. Retorna um booleano.

### Clojure
```clojure
(defn eh-positivo [n]
  (> n 0))

; Testes
(println (eh-positivo 5))    ; Saída: true
(println (eh-positivo -3))   ; Saída: false
(println (eh-positivo 0))    ; Saída: false
```

**Explicação:** Em Clojure, `>` é uma função. A sintaxe é `(> n 0)` em notação de prefixo.

---

## Exercício 3: Calcular a Área de um Quadrado

### Haskell
```haskell
areaQuadrado :: Float -> Float
areaQuadrado lado = lado * lado

-- Testes
main = do
  print (areaQuadrado 5)     -- Saída: 25.0
  print (areaQuadrado 2.5)   -- Saída: 6.25
  print (areaQuadrado 0)     -- Saída: 0.0
```

**Explicação:** Multiplica o lado por ele mesmo. Usa Float para permitir números decimais.

### Scala
```scala
def areaQuadrado(lado: Double): Double = lado * lado

// Testes
println(areaQuadrado(5))     // Saída: 25.0
println(areaQuadrado(2.5))   // Saída: 6.25
println(areaQuadrado(0))     // Saída: 0.0
```

**Explicação:** Usa Double para números decimais. Multiplica o lado por ele mesmo.

### Elixir
```elixir
defmodule Geometria do
  def area_quadrado(lado) do
    lado * lado
  end
end

# Testes
IO.inspect(Geometria.area_quadrado(5))     # Saída: 25.0
IO.inspect(Geometria.area_quadrado(2.5))   # Saída: 6.25
IO.inspect(Geometria.area_quadrado(0))     # Saída: 0.0
```

**Explicação:** Multiplica o lado por ele mesmo. Elixir infere o tipo automaticamente.

### Clojure
```clojure
(defn area-quadrado [lado]
  (* lado lado))

; Testes
(println (area-quadrado 5))     ; Saída: 25.0
(println (area-quadrado 2.5))   ; Saída: 6.25
(println (area-quadrado 0))     ; Saída: 0.0
```

**Explicação:** Usa `*` para multiplicação. Clojure infere o tipo automaticamente.

---

## Exercício 4: Converter Celsius para Fahrenheit

### Haskell
```haskell
celsiusParaFahrenheit :: Float -> Float
celsiusParaFahrenheit c = (c * 9 / 5) + 32

-- Testes
main = do
  print (celsiusParaFahrenheit 0)     -- Saída: 32.0
  print (celsiusParaFahrenheit 100)   -- Saída: 212.0
  print (celsiusParaFahrenheit (-40)) -- Saída: -40.0
```

**Explicação:** Implementa a fórmula F = (C × 9/5) + 32. Ordem de operações é importante.

### Scala
```scala
def celsiusParaFahrenheit(celsius: Double): Double = 
  (celsius * 9 / 5) + 32

// Testes
println(celsiusParaFahrenheit(0))     // Saída: 32.0
println(celsiusParaFahrenheit(100))   // Saída: 212.0
println(celsiusParaFahrenheit(-40))   // Saída: -40.0
```

**Explicação:** Implementa a fórmula de conversão. Usa parênteses para clareza.

### Elixir
```elixir
defmodule Conversoes do
  def celsius_para_fahrenheit(celsius) do
    (celsius * 9 / 5) + 32
  end
end

# Testes
IO.inspect(Conversoes.celsius_para_fahrenheit(0))     # Saída: 32.0
IO.inspect(Conversoes.celsius_para_fahrenheit(100))   # Saída: 212.0
IO.inspect(Conversoes.celsius_para_fahrenheit(-40))   # Saída: -40.0
```

**Explicação:** Implementa a fórmula de conversão. Parênteses garantem a ordem correta.

### Clojure
```clojure
(defn celsius-para-fahrenheit [celsius]
  (+ (* (/ (* celsius 9) 5)) 32))

; Alternativa mais legível:
(defn celsius-para-fahrenheit [celsius]
  (+ 32 (/ (* celsius 9) 5)))

; Testes
(println (celsius-para-fahrenheit 0))     ; Saída: 32.0
(println (celsius-para-fahrenheit 100))   ; Saída: 212.0
(println (celsius-para-fahrenheit -40))   ; Saída: -40.0
```

**Explicação:** Em Clojure, operações são em notação de prefixo. A ordem de leitura é de dentro para fora.

---

## Exercício 5: Contar Caracteres em uma String

### Haskell
```haskell
contarCaracteres :: String -> Int
contarCaracteres s = length s

-- Testes
main = do
  print (contarCaracteres "Olá")        -- Saída: 3
  print (contarCaracteres "Olá Mundo")  -- Saída: 9
  print (contarCaracteres "")           -- Saída: 0
```

**Explicação:** A função `length` retorna o tamanho de uma lista (string é uma lista de caracteres).

### Scala
```scala
def contarCaracteres(s: String): Int = s.length

// Testes
println(contarCaracteres("Olá"))        // Saída: 3
println(contarCaracteres("Olá Mundo"))  // Saída: 9
println(contarCaracteres(""))           // Saída: 0
```

**Explicação:** Usa o método `length` de String. Retorna um Int.

### Elixir
```elixir
defmodule Strings do
  def contar_caracteres(s) do
    String.length(s)
  end
end

# Testes
IO.inspect(Strings.contar_caracteres("Olá"))        # Saída: 3
IO.inspect(Strings.contar_caracteres("Olá Mundo"))  # Saída: 9
IO.inspect(Strings.contar_caracteres(""))           # Saída: 0
```

**Explicação:** Usa `String.length/1` para contar caracteres. Retorna um inteiro.

### Clojure
```clojure
(defn contar-caracteres [s]
  (count s))

; Testes
(println (contar-caracteres "Olá"))        ; Saída: 3
(println (contar-caracteres "Olá Mundo"))  ; Saída: 9
(println (contar-caracteres ""))           ; Saída: 0
```

**Explicação:** Usa `count` para contar elementos em uma sequência (string é uma sequência).

---

## Exercício 6: Concatenar Duas Strings

### Haskell
```haskell
concatenar :: String -> String -> String
concatenar s1 s2 = s1 ++ " " ++ s2

-- Testes
main = do
  print (concatenar "Olá" "Mundo")   -- Saída: "Olá Mundo"
  print (concatenar "Bom" "dia")     -- Saída: "Bom dia"
```

**Explicação:** Usa o operador `++` para concatenação. O espaço é uma string literal.

### Scala
```scala
def concatenar(s1: String, s2: String): String = s1 + " " + s2

// Testes
println(concatenar("Olá", "Mundo"))   // Saída: Olá Mundo
println(concatenar("Bom", "dia"))     // Saída: Bom dia
```

**Explicação:** Usa o operador `+` para concatenação de strings.

### Elixir
```elixir
defmodule Strings do
  def concatenar(s1, s2) do
    s1 <> " " <> s2
  end
end

# Testes
IO.puts(Strings.concatenar("Olá", "Mundo"))   # Saída: Olá Mundo
IO.puts(Strings.concatenar("Bom", "dia"))     # Saída: Bom dia
```

**Explicação:** Usa o operador `<>` para concatenação de strings em Elixir.

### Clojure
```clojure
(defn concatenar [s1 s2]
  (str s1 " " s2))

; Testes
(println (concatenar "Olá" "Mundo"))   ; Saída: Olá Mundo
(println (concatenar "Bom" "dia"))     ; Saída: Bom dia
```

**Explicação:** Usa `str` para concatenar strings em Clojure.

---

## Exercício 7: Elevar um Número ao Quadrado

### Haskell
```haskell
quadrado :: Int -> Int
quadrado n = n * n

-- Testes
main = do
  print (quadrado 5)   -- Saída: 25
  print (quadrado (-3)) -- Saída: 9
  print (quadrado 0)   -- Saída: 0
```

**Explicação:** Multiplica o número por ele mesmo. Simples e eficiente.

### Scala
```scala
def quadrado(n: Int): Int = n * n

// Testes
println(quadrado(5))    // Saída: 25
println(quadrado(-3))   // Saída: 9
println(quadrado(0))    // Saída: 0
```

**Explicação:** Multiplica o número por ele mesmo.

### Elixir
```elixir
defmodule Matematica do
  def quadrado(n) do
    n * n
  end
end

# Testes
IO.inspect(Matematica.quadrado(5))    # Saída: 25
IO.inspect(Matematica.quadrado(-3))   # Saída: 9
IO.inspect(Matematica.quadrado(0))    # Saída: 0
```

**Explicação:** Multiplica o número por ele mesmo.

### Clojure
```clojure
(defn quadrado [n]
  (* n n))

; Testes
(println (quadrado 5))    ; Saída: 25
(println (quadrado -3))   ; Saída: 9
(println (quadrado 0))    ; Saída: 0
```

**Explicação:** Usa `*` para multiplicação.

---

## Exercício 8: Verificar se um Número é Par

### Haskell
```haskell
ehPar :: Int -> Bool
ehPar n = n `mod` 2 == 0

-- Testes
main = do
  print (ehPar 4)   -- Saída: True
  print (ehPar 7)   -- Saída: False
  print (ehPar 0)   -- Saída: True
```

**Explicação:** Usa `mod` para obter o resto da divisão por 2. Se o resto é 0, é par.

### Scala
```scala
def ehPar(n: Int): Boolean = n % 2 == 0

// Testes
println(ehPar(4))   // Saída: true
println(ehPar(7))   // Saída: false
println(ehPar(0))   // Saída: true
```

**Explicação:** Usa `%` para obter o resto. Se o resto é 0, é par.

### Elixir
```elixir
defmodule Verificador do
  def eh_par(n) do
    rem(n, 2) == 0
  end
end

# Testes
IO.inspect(Verificador.eh_par(4))   # Saída: true
IO.inspect(Verificador.eh_par(7))   # Saída: false
IO.inspect(Verificador.eh_par(0))   # Saída: true
```

**Explicação:** Usa `rem/2` para obter o resto da divisão.

### Clojure
```clojure
(defn eh-par [n]
  (zero? (rem n 2)))

; Testes
(println (eh-par 4))   ; Saída: true
(println (eh-par 7))   ; Saída: false
(println (eh-par 0))   ; Saída: true
```

**Explicação:** Usa `rem` para resto e `zero?` para verificar se é zero.

---

## Exercício 9: Calcular o Valor Absoluto

### Haskell
```haskell
valorAbsoluto :: Int -> Int
valorAbsoluto n = abs n

-- Testes
main = do
  print (valorAbsoluto (-5))  -- Saída: 5
  print (valorAbsoluto 3)     -- Saída: 3
  print (valorAbsoluto 0)     -- Saída: 0
```

**Explicação:** Usa a função pré-definida `abs` que retorna o valor absoluto.

### Scala
```scala
def valorAbsoluto(n: Int): Int = n.abs

// Testes
println(valorAbsoluto(-5))  // Saída: 5
println(valorAbsoluto(3))   // Saída: 3
println(valorAbsoluto(0))   // Saída: 0
```

**Explicação:** Usa o método `abs` do tipo Int.

### Elixir
```elixir
defmodule Matematica do
  def valor_absoluto(n) do
    abs(n)
  end
end

# Testes
IO.inspect(Matematica.valor_absoluto(-5))  # Saída: 5
IO.inspect(Matematica.valor_absoluto(3))   # Saída: 3
IO.inspect(Matematica.valor_absoluto(0))   # Saída: 0
```

**Explicação:** Usa a função `abs/1` do Elixir.

### Clojure
```clojure
(defn valor-absoluto [n]
  (Math/abs n))

; Testes
(println (valor-absoluto -5))  ; Saída: 5
(println (valor-absoluto 3))   ; Saída: 3
(println (valor-absoluto 0))   ; Saída: 0
```

**Explicação:** Usa `Math/abs` da biblioteca padrão de Java.

---

## Exercício 10: Converter String para Maiúsculas

### Haskell
```haskell
paraMaiusculas :: String -> String
paraMaiusculas s = map toUpper s

-- Necessário importar Data.Char
import Data.Char (toUpper)

-- Testes
main = do
  print (paraMaiusculas "olá")       -- Saída: "OLÁ"
  print (paraMaiusculas "Mundo")     -- Saída: "MUNDO"
  print (paraMaiusculas "123abc")    -- Saída: "123ABC"
```

**Explicação:** Usa `map` com `toUpper` para converter cada caractere.

### Scala
```scala
def paraMaiusculas(s: String): String = s.toUpperCase()

// Testes
println(paraMaiusculas("olá"))       // Saída: OLÁ
println(paraMaiusculas("Mundo"))     // Saída: MUNDO
println(paraMaiusculas("123abc"))    // Saída: 123ABC
```

**Explicação:** Usa o método `toUpperCase()` de String.

### Elixir
```elixir
defmodule Strings do
  def para_maiusculas(s) do
    String.upcase(s)
  end
end

# Testes
IO.puts(Strings.para_maiusculas("olá"))       # Saída: OLÁ
IO.puts(Strings.para_maiusculas("Mundo"))     # Saída: MUNDO
IO.puts(Strings.para_maiusculas("123abc"))    # Saída: 123ABC
```

**Explicação:** Usa `String.upcase/1` para converter para maiúsculas.

### Clojure
```clojure
(defn para-maiusculas [s]
  (clojure.string/upper-case s))

; Testes
(println (para-maiusculas "olá"))       ; Saída: OLÁ
(println (para-maiusculas "Mundo"))     ; Saída: MUNDO
(println (para-maiusculas "123abc"))    ; Saída: 123ABC
```

**Explicação:** Usa `clojure.string/upper-case` para converter para maiúsculas.

---

## Exercício 11: Calcular a Média de Dois Números

### Haskell
```haskell
media :: Float -> Float -> Float
media a b = (a + b) / 2

-- Testes
main = do
  print (media 10 20)   -- Saída: 15.0
  print (media 5 15)    -- Saída: 10.0
  print (media 0 0)     -- Saída: 0.0
```

**Explicação:** Soma os dois números e divide por 2.

### Scala
```scala
def media(a: Double, b: Double): Double = (a + b) / 2

// Testes
println(media(10, 20))   // Saída: 15.0
println(media(5, 15))    // Saída: 10.0
println(media(0, 0))     // Saída: 0.0
```

**Explicação:** Soma e divide por 2.

### Elixir
```elixir
defmodule Estatistica do
  def media(a, b) do
    (a + b) / 2
  end
end

# Testes
IO.inspect(Estatistica.media(10, 20))   # Saída: 15.0
IO.inspect(Estatistica.media(5, 15))    # Saída: 10.0
IO.inspect(Estatistica.media(0, 0))     # Saída: 0.0
```

**Explicação:** Soma e divide por 2.

### Clojure
```clojure
(defn media [a b]
  (/ (+ a b) 2))

; Testes
(println (media 10 20))   ; Saída: 15.0
(println (media 5 15))    ; Saída: 10.0
(println (media 0 0))     ; Saída: 0.0
```

**Explicação:** Usa `+` para soma e `/` para divisão.

---

## Exercício 12: Verificar se um Número está entre 1 e 10

### Haskell
```haskell
entreUmEDez :: Int -> Bool
entreUmEDez n = n >= 1 && n <= 10

-- Testes
main = do
  print (entreUmEDez 5)    -- Saída: True
  print (entreUmEDez 1)    -- Saída: True
  print (entreUmEDez 10)   -- Saída: True
  print (entreUmEDez 0)    -- Saída: False
  print (entreUmEDez 11)   -- Saída: False
```

**Explicação:** Usa `&&` para AND lógico. Verifica se está entre 1 e 10 (inclusive).

### Scala
```scala
def entreUmEDez(n: Int): Boolean = n >= 1 && n <= 10

// Testes
println(entreUmEDez(5))    // Saída: true
println(entreUmEDez(1))    // Saída: true
println(entreUmEDez(10))   // Saída: true
println(entreUmEDez(0))    // Saída: false
println(entreUmEDez(11))   // Saída: false
```

**Explicação:** Usa `&&` para AND lógico.

### Elixir
```elixir
defmodule Verificador do
  def entre_um_e_dez(n) do
    n >= 1 and n <= 10
  end
end

# Testes
IO.inspect(Verificador.entre_um_e_dez(5))    # Saída: true
IO.inspect(Verificador.entre_um_e_dez(1))    # Saída: true
IO.inspect(Verificador.entre_um_e_dez(10))   # Saída: true
IO.inspect(Verificador.entre_um_e_dez(0))    # Saída: false
IO.inspect(Verificador.entre_um_e_dez(11))   # Saída: false
```

**Explicação:** Usa `and` para AND lógico em Elixir.

### Clojure
```clojure
(defn entre-um-e-dez [n]
  (and (>= n 1) (<= n 10)))

; Testes
(println (entre-um-e-dez 5))    ; Saída: true
(println (entre-um-e-dez 1))    ; Saída: true
(println (entre-um-e-dez 10))   ; Saída: true
(println (entre-um-e-dez 0))    ; Saída: false
(println (entre-um-e-dez 11))   ; Saída: false
```

**Explicação:** Usa `and` para AND lógico. `>=` e `<=` são funções em Clojure.

---

## Exercício 13: Calcular o Desconto de um Preço

### Haskell
```haskell
aplicarDesconto :: Float -> Float -> Float
aplicarDesconto preco desconto = preco - (preco * desconto / 100)

-- Testes
main = do
  print (aplicarDesconto 100 10)   -- Saída: 90.0
  print (aplicarDesconto 50 20)    -- Saída: 40.0
  print (aplicarDesconto 200 50)   -- Saída: 100.0
```

**Explicação:** Calcula o desconto como percentual e subtrai do preço original.

### Scala
```scala
def aplicarDesconto(preco: Double, desconto: Double): Double = 
  preco - (preco * desconto / 100)

// Testes
println(aplicarDesconto(100, 10))   // Saída: 90.0
println(aplicarDesconto(50, 20))    // Saída: 40.0
println(aplicarDesconto(200, 50))   // Saída: 100.0
```

**Explicação:** Calcula o desconto como percentual e subtrai.

### Elixir
```elixir
defmodule Comercio do
  def aplicar_desconto(preco, desconto) do
    preco - (preco * desconto / 100)
  end
end

# Testes
IO.inspect(Comercio.aplicar_desconto(100, 10))   # Saída: 90.0
IO.inspect(Comercio.aplicar_desconto(50, 20))    # Saída: 40.0
IO.inspect(Comercio.aplicar_desconto(200, 50))   # Saída: 100.0
```

**Explicação:** Calcula o desconto como percentual e subtrai.

### Clojure
```clojure
(defn aplicar-desconto [preco desconto]
  (- preco (/ (* preco desconto) 100)))

; Testes
(println (aplicar-desconto 100 10))   ; Saída: 90.0
(println (aplicar-desconto 50 20))    ; Saída: 40.0
(println (aplicar-desconto 200 50))   ; Saída: 100.0
```

**Explicação:** Usa `-` para subtração, `*` para multiplicação e `/` para divisão.

---

## Exercício 14: Inverter o Sinal de um Número

### Haskell
```haskell
inverterSinal :: Int -> Int
inverterSinal n = n * (-1)

-- Testes
main = do
  print (inverterSinal 5)    -- Saída: -5
  print (inverterSinal (-3)) -- Saída: 3
  print (inverterSinal 0)    -- Saída: 0
```

**Explicação:** Multiplica por -1 para inverter o sinal.

### Scala
```scala
def inverterSinal(n: Int): Int = n * (-1)

// Testes
println(inverterSinal(5))    // Saída: -5
println(inverterSinal(-3))   // Saída: 3
println(inverterSinal(0))    // Saída: 0
```

**Explicação:** Multiplica por -1.

### Elixir
```elixir
defmodule Matematica do
  def inverter_sinal(n) do
    n * (-1)
  end
end

# Testes
IO.inspect(Matematica.inverter_sinal(5))    # Saída: -5
IO.inspect(Matematica.inverter_sinal(-3))   # Saída: 3
IO.inspect(Matematica.inverter_sinal(0))    # Saída: 0
```

**Explicação:** Multiplica por -1.

### Clojure
```clojure
(defn inverter-sinal [n]
  (* n -1))

; Testes
(println (inverter-sinal 5))    ; Saída: -5
(println (inverter-sinal -3))   ; Saída: 3
(println (inverter-sinal 0))    ; Saída: 0
```

**Explicação:** Usa `*` para multiplicação por -1.

---

## Exercício 15: Calcular o Perímetro de um Retângulo

### Haskell
```haskell
perimetroRetangulo :: Float -> Float -> Float
perimetroRetangulo largura altura = 2 * (largura + altura)

-- Testes
main = do
  print (perimetroRetangulo 5 3)     -- Saída: 16.0
  print (perimetroRetangulo 10 10)   -- Saída: 40.0
  print (perimetroRetangulo 2.5 3.5) -- Saída: 12.0
```

**Explicação:** Implementa a fórmula P = 2 × (largura + altura).

### Scala
```scala
def perimetroRetangulo(largura: Double, altura: Double): Double = 
  2 * (largura + altura)

// Testes
println(perimetroRetangulo(5, 3))     // Saída: 16.0
println(perimetroRetangulo(10, 10))   // Saída: 40.0
println(perimetroRetangulo(2.5, 3.5)) // Saída: 12.0
```

**Explicação:** Implementa a fórmula do perímetro.

### Elixir
```elixir
defmodule Geometria do
  def perimetro_retangulo(largura, altura) do
    2 * (largura + altura)
  end
end

# Testes
IO.inspect(Geometria.perimetro_retangulo(5, 3))     # Saída: 16.0
IO.inspect(Geometria.perimetro_retangulo(10, 10))   # Saída: 40.0
IO.inspect(Geometria.perimetro_retangulo(2.5, 3.5)) # Saída: 12.0
```

**Explicação:** Implementa a fórmula do perímetro.

### Clojure
```clojure
(defn perimetro-retangulo [largura altura]
  (* 2 (+ largura altura)))

; Testes
(println (perimetro-retangulo 5 3))     ; Saída: 16.0
(println (perimetro-retangulo 10 10))   ; Saída: 40.0
(println (perimetro-retangulo 2.5 3.5)) ; Saída: 12.0
```

**Explicação:** Usa `+` para soma e `*` para multiplicação.

---

## Exercício 16: Verificar se uma String está Vazia

### Haskell
```haskell
estaVazia :: String -> Bool
estaVazia s = null s

-- Testes
main = do
  print (estaVazia "")      -- Saída: True
  print (estaVazia "Olá")   -- Saída: False
  print (estaVazia " ")     -- Saída: False
```

**Explicação:** Usa `null` para verificar se uma lista (string) está vazia.

### Scala
```scala
def estaVazia(s: String): Boolean = s.isEmpty

// Testes
println(estaVazia(""))      // Saída: true
println(estaVazia("Olá"))   // Saída: false
println(estaVazia(" "))     // Saída: false
```

**Explicação:** Usa o método `isEmpty` de String.

### Elixir
```elixir
defmodule Strings do
  def esta_vazia(s) do
    s == ""
  end
end

# Testes
IO.inspect(Strings.esta_vazia(""))      # Saída: true
IO.inspect(Strings.esta_vazia("Olá"))   # Saída: false
IO.inspect(Strings.esta_vazia(" "))     # Saída: false
```

**Explicação:** Compara a string com uma string vazia.

### Clojure
```clojure
(defn esta-vazia [s]
  (= s ""))

; Testes
(println (esta-vazia ""))      ; Saída: true
(println (esta-vazia "Olá"))   ; Saída: false
(println (esta-vazia " "))     ; Saída: false
```

**Explicação:** Usa `=` para comparação com string vazia.

---

## Exercício 17: Calcular o Triplo de um Número

### Haskell
```haskell
triplo :: Int -> Int
triplo n = n * 3

-- Testes
main = do
  print (triplo 5)    -- Saída: 15
  print (triplo (-2)) -- Saída: -6
  print (triplo 0)    -- Saída: 0
```

**Explicação:** Multiplica o número por 3.

### Scala
```scala
def triplo(n: Int): Int = n * 3

// Testes
println(triplo(5))    // Saída: 15
println(triplo(-2))   // Saída: -6
println(triplo(0))    // Saída: 0
```

**Explicação:** Multiplica por 3.

### Elixir
```elixir
defmodule Matematica do
  def triplo(n) do
    n * 3
  end
end

# Testes
IO.inspect(Matematica.triplo(5))    # Saída: 15
IO.inspect(Matematica.triplo(-2))   # Saída: -6
IO.inspect(Matematica.triplo(0))    # Saída: 0
```

**Explicação:** Multiplica por 3.

### Clojure
```clojure
(defn triplo [n]
  (* n 3))

; Testes
(println (triplo 5))    ; Saída: 15
(println (triplo -2))   ; Saída: -6
(println (triplo 0))    ; Saída: 0
```

**Explicação:** Usa `*` para multiplicação.

---

## Exercício 18: Calcular a Área de um Triângulo

### Haskell
```haskell
areaTriangulo :: Float -> Float -> Float
areaTriangulo base altura = (base * altura) / 2

-- Testes
main = do
  print (areaTriangulo 10 5)   -- Saída: 25.0
  print (areaTriangulo 4 6)    -- Saída: 12.0
  print (areaTriangulo 0 10)   -- Saída: 0.0
```

**Explicação:** Implementa a fórmula A = (base × altura) / 2.

### Scala
```scala
def areaTriangulo(base: Double, altura: Double): Double = 
  (base * altura) / 2

// Testes
println(areaTriangulo(10, 5))   // Saída: 25.0
println(areaTriangulo(4, 6))    // Saída: 12.0
println(areaTriangulo(0, 10))   // Saída: 0.0
```

**Explicação:** Implementa a fórmula da área do triângulo.

### Elixir
```elixir
defmodule Geometria do
  def area_triangulo(base, altura) do
    (base * altura) / 2
  end
end

# Testes
IO.inspect(Geometria.area_triangulo(10, 5))   # Saída: 25.0
IO.inspect(Geometria.area_triangulo(4, 6))    # Saída: 12.0
IO.inspect(Geometria.area_triangulo(0, 10))   # Saída: 0.0
```

**Explicação:** Implementa a fórmula da área do triângulo.

### Clojure
```clojure
(defn area-triangulo [base altura]
  (/ (* base altura) 2))

; Testes
(println (area-triangulo 10 5))   ; Saída: 25.0
(println (area-triangulo 4 6))    ; Saída: 12.0
(println (area-triangulo 0 10))   ; Saída: 0.0
```

**Explicação:** Usa `*` para multiplicação e `/` para divisão.

---

## Exercício 19: Verificar se um Número é Múltiplo de 3

### Haskell
```haskell
eMultiploDeTres :: Int -> Bool
eMultiploDeTres n = n `mod` 3 == 0

-- Testes
main = do
  print (eMultiploDeTres 9)   -- Saída: True
  print (eMultiploDeTres 6)   -- Saída: True
  print (eMultiploDeTres 7)   -- Saída: False
  print (eMultiploDeTres 0)   -- Saída: True
```

**Explicação:** Usa `mod` para verificar se o resto da divisão por 3 é 0.

### Scala
```scala
def eMultiploDeTres(n: Int): Boolean = n % 3 == 0

// Testes
println(eMultiploDeTres(9))   // Saída: true
println(eMultiploDeTres(6))   // Saída: true
println(eMultiploDeTres(7))   // Saída: false
println(eMultiploDeTres(0))   // Saída: true
```

**Explicação:** Usa `%` para obter o resto.

### Elixir
```elixir
defmodule Verificador do
  def e_multiplo_de_tres(n) do
    rem(n, 3) == 0
  end
end

# Testes
IO.inspect(Verificador.e_multiplo_de_tres(9))   # Saída: true
IO.inspect(Verificador.e_multiplo_de_tres(6))   # Saída: true
IO.inspect(Verificador.e_multiplo_de_tres(7))   # Saída: false
IO.inspect(Verificador.e_multiplo_de_tres(0))   # Saída: true
```

**Explicação:** Usa `rem/2` para obter o resto.

### Clojure
```clojure
(defn e-multiplo-de-tres [n]
  (zero? (rem n 3)))

; Testes
(println (e-multiplo-de-tres 9))   ; Saída: true
(println (e-multiplo-de-tres 6))   ; Saída: true
(println (e-multiplo-de-tres 7))   ; Saída: false
(println (e-multiplo-de-tres 0))   ; Saída: true
```

**Explicação:** Usa `rem` para resto e `zero?` para verificar.

---

## Exercício 20: Calcular o Resto da Divisão

### Haskell
```haskell
resto :: Int -> Int -> Int
resto dividendo divisor = dividendo `mod` divisor

-- Testes
main = do
  print (resto 10 3)   -- Saída: 1
  print (resto 20 5)   -- Saída: 0
  print (resto 7 2)    -- Saída: 1
```

**Explicação:** Usa `mod` para obter o resto da divisão.

### Scala
```scala
def resto(dividendo: Int, divisor: Int): Int = dividendo % divisor

// Testes
println(resto(10, 3))   // Saída: 1
println(resto(20, 5))   // Saída: 0
println(resto(7, 2))    // Saída: 1
```

**Explicação:** Usa `%` para obter o resto.

### Elixir
```elixir
defmodule Aritmetica do
  def resto(dividendo, divisor) do
    rem(dividendo, divisor)
  end
end

# Testes
IO.inspect(Aritmetica.resto(10, 3))   # Saída: 1
IO.inspect(Aritmetica.resto(20, 5))   # Saída: 0
IO.inspect(Aritmetica.resto(7, 2))    # Saída: 1
```

**Explicação:** Usa `rem/2` para obter o resto.

### Clojure
```clojure
(defn resto [dividendo divisor]
  (rem dividendo divisor))

; Testes
(println (resto 10 3))   ; Saída: 1
(println (resto 20 5))   ; Saída: 0
(println (resto 7 2))    ; Saída: 1
```

**Explicação:** Usa `rem` para obter o resto da divisão.

---

## Resumo das Soluções

| Exercício | Conceito | Haskell | Scala | Elixir | Clojure |
|-----------|----------|---------|-------|--------|---------|
| 1 | Aritmética | `*` | `*` | `*` | `*` |
| 2 | Comparação | `>` | `>` | `>` | `>` |
| 3 | Aritmética | `*` | `*` | `*` | `*` |
| 4 | Fórmula | `/` | `/` | `/` | `/` |
| 5 | Strings | `length` | `.length` | `String.length` | `count` |
| 6 | Strings | `++` | `+` | `<>` | `str` |
| 7 | Aritmética | `*` | `*` | `*` | `*` |
| 8 | Módulo | `mod` | `%` | `rem` | `rem` |
| 9 | Valor Absoluto | `abs` | `.abs` | `abs` | `Math/abs` |
| 10 | Strings | `map toUpper` | `.toUpperCase()` | `String.upcase` | `upper-case` |
| 11 | Média | `/` | `/` | `/` | `/` |
| 12 | Lógica | `&&` | `&&` | `and` | `and` |
| 13 | Desconto | Aritmética | Aritmética | Aritmética | Aritmética |
| 14 | Sinal | `*` | `*` | `*` | `*` |
| 15 | Perímetro | Aritmética | Aritmética | Aritmética | Aritmética |
| 16 | Strings | `null` | `.isEmpty` | `==` | `=` |
| 17 | Aritmética | `*` | `*` | `*` | `*` |
| 18 | Área | `/` | `/` | `/` | `/` |
| 19 | Módulo | `mod` | `%` | `rem` | `rem` |
| 20 | Módulo | `mod` | `%` | `rem` | `rem` |

---

## Dicas de Aprendizado

1. **Pratique em uma linguagem por vez:** Escolha uma linguagem e resolva todos os 20 exercícios antes de passar para a próxima.

2. **Teste incrementalmente:** Após implementar cada função, teste com os exemplos fornecidos.

3. **Compare as soluções:** Depois de resolver, compare suas soluções com o gabarito para aprender diferentes abordagens.

4. **Procure padrões:** Observe que muitos exercícios usam operadores similares em diferentes linguagens.

5. **Use a documentação:** Quando tiver dúvidas sobre sintaxe, consulte a documentação oficial da linguagem.

---

