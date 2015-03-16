package arbreBinaire;

public class ArbreBinaire<T> {

    private T valeur;
    private ArbreBinaire parent;
    private ArbreBinaire gauche;
    private ArbreBinaire droit;

    /**
     *
     * @param valeur
     * @param parent
     */
    public ArbreBinaire(T valeur, ArbreBinaire parent) {
        this.droit = null;
        this.gauche = null;
        this.valeur = valeur;
        this.parent = parent;
    }

    /**
     *
     * @return
     */
    public T getValeur() {
        return valeur;
    }

    /**
     *
     * @param valeur
     */
    public void setValeur(T valeur) {
        this.valeur = valeur;
    }

    /**
     *
     * @return
     */
    public ArbreBinaire getParent() {
        return parent;
    }

    /**
     *
     * @param parent
     */
    public void setParent(ArbreBinaire parent) {
        this.parent = parent;
    }

    /**
     *
     * @return
     */
    public ArbreBinaire getGauche() {
        return gauche;
    }

    /**
     *
     * @param gauche
     */
    public void setGauche(ArbreBinaire gauche) {
        this.gauche = gauche;
    }

    /**
     *
     * @return
     */
    public ArbreBinaire getDroit() {
        return droit;
    }

    /**
     *
     * @param droit
     */
    public void setDroit(ArbreBinaire droit) {
        this.droit = droit;
    }

    /**
     *
     * @return
     */
    public String toStringPre() {
        // TODO - implement ArbreBinaire.toStringPre
        throw new UnsupportedOperationException();
    }

    /**
     *
     * @return
     */
    public String toStringPost() {
        // TODO - implement ArbreBinaire.toStringPost
        throw new UnsupportedOperationException();
    }

    /**
     *
     * @return
     */
    public String toStringLargeur() {
        // TODO - implement ArbreBinaire.toStringLargeur
        throw new UnsupportedOperationException();
    }

    /**
     *
     * @return
     */
    public String toString() {
        // TODO - implement ArbreBinaire.toString
        throw new UnsupportedOperationException();
    }

}
