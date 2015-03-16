package pooav.structures.file;

public class FileMain {

    private File file;

    public FileMain(File file) {
        this.file = file;
    }

    /**
     *
     * @param nbE
     */
    public void enfiler(int nbE) {
        for (int i = 0; i < nbE; i++) {
            try {
                boolean rep = this.file.add(i);
                System.out.println("enfiler (" + i + ") : " + rep);
            } catch (FilePleineException fpe) {
                System.out.println("File pleine");
            }
        }
    }

    /**
     *
     * @param nbE
     */
    public void defiler(int nbE) {
        for (int i = 0; i < nbE; i++) {
            try {
                Object o = this.file.remove();
                System.out.println("defiler : " + o);
            } catch (FileVideException fve) {
                System.out.println("File vide");
            }
        }
    }

    public void extremes() {
        int taille = this.file.size();
        System.out.println("Nb Elements : " + taille);
        try {
            Object tete = this.file.first();
            Object fin = this.file.last();
            System.out.println("Tete : " + tete + " Fin : " + fin);
        } catch (FileVideException fve) {
            System.out.println("File vide");
        }
    }

    public void elements() {
        try {
            for (Object o : this.file.elements()) {
                System.out.print(" " + o + " ");
            }
        } catch (FileVideException fve) {
            System.out.println("File vide");
        }
        System.out.println(" --- ");
    }


    public void tester(int nbE) {
        this.enfiler(nbE); //on enfile tout
        this.extremes();
        this.elements();
        this.defiler(nbE/2); //on défile la moitié
        this.extremes();
        this.elements();
        this.enfiler(nbE/2); //on enfile la moitié
        this.extremes();
        this.elements();
        this.defiler(nbE); //on défile tout
        this.extremes();
        this.elements();
    }
    
    

    public File getFile() {
        return this.file;
    }

    public void setFile(File file) {
        this.file = file;
    }

    /**
     *
     * @param args
     */
    public static void main(String[] args) {
        File f = new FileList();

        FileMain m = new FileMain(f);
        m.tester(5);
        
        System.out.println("**** On change de file **** ");

        f = new FileTableau(4);
        m.setFile(f);
        m.tester(5);
        
        //on teste le resize
        m.enfiler(4);
        m.elements();
        System.out.println("resize");
        ((FileTableau) f).resize(2);
        m.elements();
        m.enfiler(1);
        //m.elements();
        m.defiler(3);
    }

}
