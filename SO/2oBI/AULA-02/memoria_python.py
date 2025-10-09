
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
