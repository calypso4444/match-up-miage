package pooav.structures.file;

import java.util.Arrays;

public class FileTableau<T> implements File<T> {
    
	private int tete = 0; //position du prochain élément à supprimer
	private int fin = -1; //dernière position occupée
	private T[] file;
        
	private static final int DEFAULT_SIZE = 10;


	public FileTableau() {
            this(DEFAULT_SIZE);
	}

	/**
	 * créé une nouvelle file de taille fixe
	 * @param taille de la nouvelle file. Si taille<=0, une file de taille DEFAULT_SIZE sera créée
	 */
	public FileTableau(int taille) {
            if (taille>=0) {
                this.file = (T[]) new Object[taille];
            }
            else {
                this.file = (T[]) new Object[DEFAULT_SIZE];
            }
	}

        @Override
	public boolean isEmpty() {
            //si la tête dépasse la fin, la file est vide
            return (this.tete > this.fin);
	}

        @Override
	public boolean add(T e) throws FilePleineException {
            if ( (this.fin + 1) < this.file.length ) {
                this.fin++;
                this.file[fin] = e;
                return true;
            }
            else {
                if (this.hasEmptyPosition()) {
                    this.compact();
                    return this.add(e);
                }
                throw new FilePleineException();
            }
	}

        @Override
	public T remove() throws FileVideException {
            if (this.isEmpty()) 
                throw new FileVideException();
            
            T s = this.file[this.tete];
            this.tete++;
            
            return s;
	}

        @Override
	public T first() throws FileVideException {
            if (this.isEmpty()) 
                throw new FileVideException();
            
            return this.file[this.tete];
	}
        
        
        @Override
	public T last() {
            if (this.isEmpty()) 
                throw new FileVideException();
            
            return this.file[this.fin];
	}

        @Override
	public int size() {
            //nombre d'éléments de la tête à la fin de la file, les extrémités comprises
            return (fin - tete + 1); 
	}

        @Override
	public boolean isFull() {
            return (size() >= this.file.length );
	}

        @Override
	public T[] elements() {
            T[] copie = (T[]) new Object[this.size()] ;
            for (int i=0, j=this.tete; i<copie.length && j<=this.fin; i++, j++ ) {
                copie[i] = this.file[j];
            }
            return copie;
	}

        /**
         * vérifie s'il y a une position libre en tête de file
         * @return true si la tête s'est déjà déplacée et qu'il y a désormais des
         * places libres avant la tête de la file, false sinon
         */
	protected boolean hasEmptyPosition() {
            return (this.tete > 0);
	}

        /**
         * compacte la file, occupant les positions vides en tête de file
         */
	protected void compact() {
            int i = 0;
            while ( i <= (this.fin - this.tete) ) {
                this.file[i] = this.file[this.tete + i];
                i++;
            }
            this.tete = 0;
            this.fin = i - 1; 
            
            //on nettoie les positions liberées
            while (i < this.file.length) {
                this.file[i] = null;
                i++;
            }
	}

	/**
	 * rédimensione la file. Si la nouvelle taille est inférieure à la taille
         * actuelle, les derniers éléments ajoutés (fin de file) risquent d'être perdus
	 * @param taille nouvelle taille de la file. Si taille <=0, la file ne sera
         * pas modifiée
	 */
	protected void resize(int taille) {
            if (taille >0) {
                int i, j;
                T[] nvlle = (T[]) new Object[taille];
                
                i = 0; //i indique la position dans le nouveau tableau
                j = this.tete ; //j indique la position dans l'ancien
                while (i<taille && j<=this.fin) {
                    nvlle[i] = this.file[j];
                    i++;
                    j++;
                }
                this.file = nvlle;
                this.tete = 0; //l'occupation du nouveau tableau commence par 0
                this.fin = i - 1; //fin indique la dernière position occupée
            }
	}


}