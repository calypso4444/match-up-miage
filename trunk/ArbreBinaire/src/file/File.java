package pooav.structures.file;

public interface File<T> {

        /**
         * vérifie si la file est vide 
         * @return true si elle n'a aucun élément, false sinon
         */
	boolean isEmpty();

	/**
	 * ajoute un élément en fin de file
	 * @param e
	 */
	boolean add(T e) throws FilePleineException;

        /**
         * supprime l'élément en tête de file
         * @return l'élément qui était en tête de file
         * @throws FileVideException si la file est vide
         */
	T remove() throws FileVideException;

        /**
         * retourne l'élément en tête de file, sans le supprimer de la file
         * @return T tête de file
         * @throws FileVideException si la file est vide
         */
	T first() throws FileVideException;

        /**
         * retourne le dernier élément ajouté à la file (élément en fin de file),
         * sans le supprimer 
         * @return T fin de file
         * @throws FileVideException si la file est vide
         */
        T last() throws FileVideException;
        
        /**
         * nombre d'éléments dans la file
         * @return 
         */
	int size();

        /**
         * vérifie si la file est pleine, ou si on peut encore lui ajouter d'éléments
         * @return true si la file est pleine
         */
	boolean isFull();

        /**
         * retourne un tableau avec les éléments stockés dans la file, sans les supprimer
         * @return T[] éléments de la file
         */
	T[] elements();


}