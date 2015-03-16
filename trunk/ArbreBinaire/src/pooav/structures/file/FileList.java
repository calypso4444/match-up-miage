package pooav.structures.file;

import java.util.ArrayList;
import java.util.List;

public class FileList<T> implements File<T> {

    private List<T> file;
    private static final int TETE_FILE = 0;

    public FileList() {
        this.file = new ArrayList<T>();
    }

    @Override
    public boolean isEmpty() {
        return (this.file.size() == 0);
    }

    @Override
    public boolean add(T e) {
        //on ajoute en fin de file
        return this.file.add(e);
    }

    @Override
    public T remove() throws FileVideException {
        if (!this.isEmpty()) {
            T sortie = this.file.get(TETE_FILE);            
            //on supprime la tête de file
            this.file.remove(TETE_FILE);
            return sortie;
        } else {
            throw new FileVideException();
        }
    }

    @Override
    public T first() throws FileVideException {
        if (!this.isEmpty()) {
            return this.file.get(TETE_FILE);
        } else {
            throw new FileVideException();
        }
    }

    public T last() {
        if (!this.isEmpty()) {
            return this.file.get(this.file.size() - 1);
        } else {
            throw new FileVideException();
        }
    }

    @Override
    public int size() {
        return this.file.size();
    }

    @Override
    public boolean isFull() {
        //un ArrayList étant extensible, il y a toujours de la place
        return false;
    }

    @Override
    public T[] elements() {
        return (T[]) this.file.toArray();
    }

}
