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

