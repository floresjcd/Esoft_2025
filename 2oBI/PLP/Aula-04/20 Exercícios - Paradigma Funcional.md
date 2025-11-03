
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

