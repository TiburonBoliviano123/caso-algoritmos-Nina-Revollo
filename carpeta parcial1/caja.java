package parcial1.varianteb;

import java.util.HashSet;
import java.util.Random;

public class Caja {

    // la lenta q nos dio el profe
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

    // mi cura usando hashset para q sea O(n) y no muera
    public static boolean hayComprobantesRepetidosCurado(int[] comprobantes) {
        if (comprobantes == null || comprobantes.length <= 1) {
            return false;
        }
        
        HashSet<Integer> vistos = new HashSet<Integer>();
        
        for (int i = 0; i < comprobantes.length; i++) {
            int actual = comprobantes[i];
            if (vistos.contains(actual)) {
                return true; 
            }
            vistos.add(actual);
        }
        
        return false;
    }

    // generador para el peor caso sin repetir
    public static int[] generarSinRepetidos(int n, int semilla) {
        int[] datos = new int[n];
        for (int i = 0; i < n; i++) {
            datos[i] = 1000 + i;
        }
        Random azar = new Random(semilla);
        for (int i = n - 1; i > 0; i--) {
            int k = azar.nextInt(i + 1);
            int tmp = datos[i];
            datos[i] = datos[k];
            datos[k] = tmp;
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
    {new int[]{ 1004, 1001, 1002, 1006, 1004 }, true,  "repetido en los extremos"},
    };

    public static void main(String[] args) {
        // probando q pasen los 5 casos
        for (int x = 0; x < CASOS.length; x++) {
            int[] datos = (int[]) CASOS[x][0];
            boolean esperado = (boolean) CASOS[x][1];
            String que = (String) CASOS[x][2];

            boolean lenta = Caja.hayComprobantesRepetidosPorPares(datos);
            boolean curada = Caja.hayComprobantesRepetidosCurado(datos);

            System.out.println("caso: " + que + " | esp: " + esperado + " | lenta: " + lenta + " | cura: " + curada);
        }
        // mediciones 
        int nBase = 15000; 
        int[] tamanios = { nBase, nBase * 2, nBase * 4, nBase * 8 };
        System.out.println("\n--- mediciones de rendimiento ---");
        long tiempoLentoAnt = -1;
        for (int i = 0; i < tamanios.length; i++) {
            int n = tamanios[i];
            int[] datos = Caja.generarSinRepetidos(n, 77);

            // calentamiento
            Caja.hayComprobantesRepetidosPorPares(datos);
            Caja.hayComprobantesRepetidosCurado(datos);

            // 3 corridas lenta
            long totalLenta = 0;
            for (int c = 0; c < 3; c++) {
                long ini = System.nanoTime();
                Caja.hayComprobantesRepetidosPorPares(datos);
                totalLenta += (System.nanoTime() - ini);
            }
            long promLenta = (totalLenta / 3) / 1_000_000;

            // 3 corridas cura
            long totalCura = 0;
            for (int c = 0; c < 3; c++) {
                long ini = System.nanoTime();
                Caja.hayComprobantesRepetidosCurado(datos);
                totalCura += (System.nanoTime() - ini);
            }
            long promCura = (totalCura / 3) / 1_000_000;

            String factor = "-";
            if (tiempoLentoAnt > 0) {
                double f = (double) promLenta / tiempoLentoAnt;
                factor = f + "";
                if(factor.length() > 4) factor = factor.substring(0, 4) + "x";
            }
            tiempoLentoAnt = promLenta == 0 ? 1 : promLenta;
            System.out.println("n=" + n + " | lenta=" + promLenta + "ms | cura=" + promCura + "ms | factor=" + factor);
        }
    }
}