package parcial1.varianteb;

import java.util.Arrays;
import java.util.HashSet;
import java.util.Random;

public class Caja {

    // Solución ACTUAL (lenta)
    public static boolean hayComprobantesRepetidosPorPares(int[] comprobantes) {
        for (int a = 0; a < comprobantes.length; a++) {
            for (int b = a + 1; b < comprobantes.length; b++) {
                if (comprobantes[a] == comprobantes[b]) {
                    return true;
                }
            }
        }
        return false;
    }

// TU CURA: O(n) utilizando un HashSet, sin modificar la lista original
    public static boolean hayComprobantesRepetidosCurado(int[] comprobantes) {
        if (comprobantes == null || comprobantes.length <= 1) {
            return false;
        }
        HashSet<Integer> vistos = new HashSet<>();
        for (int comp : comprobantes) {
            if (!vistos.add(comp)) {
                return true; 
            }
        }
        return false;
    }

// El PEOR CASO para ambas: 
    public static int[] generarSinRepetidos(int n, int semilla) {
        int[] datos = new int[n];
        for (int i = 0; i < n; i++) {
            datos[i] = 1000 + i;
        }
        Random azar = new Random(semilla);
        for (int i = n - 1; i > 0; i--) {
            int k = azar.nextInt(i + 1);
            int temp = datos[i];
            datos[i] = datos[k];
            datos[k] = temp;
        }
        return datos;
    }
}

class Programa {
    private static final Object[][] CASOS = {
        {new int[]{ 1010, 1003, 1009, 1003, 1005 }, true,  "repetido en el medio"},
        {new int[]{ 1010, 1003, 1009, 1004, 1005 }, false, "sin repetidos"},
        {new int[]{ },                          false, "lista vacía"},
        {new int[]{ 1008 },                         false, "un solo elemento"},
        {new int[]{ 1004, 1001, 1002, 1006, 1004 }, true,  "repetido en el extremos"},
    };

    public static void main(String[] args) {
    // Validación de casos
        for (Object[] caso : CASOS) {
            int[] datos = (int[]) caso[0];
            boolean esperado = (boolean) caso[1];
            String etiqueta = (String) caso[2];

            boolean lenta = Caja.hayComprobantesRepetidosPorPares(datos);
            boolean curada = Caja.hayComprobantesRepetidosCurado(datos);

            System.out.printf("%-26s esperado %-5s · por pares %-5s · tu cura %-5s%n",
                    etiqueta, esperado, lenta, curada);
        }

        // Protocolo de Medición para P1.2
        // Elige un n adecuado para que la solución lenta tarde entre 0.5 y 20 segundos
        // Para Java, n = 30000 suele tardar unos segundos con O(n^2). Ajusta si es necesario
        int nBase = 15000; 
        int[] tamanios = { nBase, nBase * 2, nBase * 4, nBase * 8 };

        System.out.println("\n--- MEDICIÓN DE RENDIMIENTO (Peor caso: sin repetidos) ---");
        System.out.printf("%-10s | %-18s | %-18s | %-15s%n", "Tamaño (n)", "Lenta Prom (ms)", "Cura Prom (ms)", "Factor Lenta (xn)");

        long tiempoLentoAnterior = -1;

        for (int n : tamanios) {
            int[] datos = Caja.generarSinRepetidos(n, 77);

            // 1 Calentamiento 
            Caja.hayComprobantesRepetidosPorPares(datos);
            Caja.hayComprobantesRepetidosCurado(datos);

            // 2 Tres corridas medidas para la lenta
            long sumaLenta = 0;
            for (int i = 0; i < 3; i++) {
                long inicio = System.nanoTime();
                Caja.hayComprobantesRepetidosPorPares(datos);
                sumaLenta += (System.nanoTime() - inicio);
            }
            long promLentaMs = (sumaLenta / 3) / 1_000_000;

            // 3 Tres corridas medidas para la cura
            long sumaCura = 0;
            for (int i = 0; i < 3; i++) {
                long inicio = System.nanoTime();
                Caja.hayComprobantesRepetidosCurado(datos);
                sumaCura += (System.nanoTime() - inicio);
            }
            long promCuraMs = (sumaCura / 3) / 1_000_000;

            String factorStr = "-";
            if (tiempoLentoAnterior > 0) {
                double factor = (double) promLentaMs / tiempoLentoAnterior;
                factorStr = String.format("%.2fx", factor);
            }
            tiempoLentoAnterior = promLentaMs == 0 ? 1 : promLentaMs;

            System.out.printf("%-10d | %-18d | %-18d | %-15s%n", n, promLentaMs, promCuraMs, factorStr);
        }
    }
}