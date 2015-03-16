package arbreBinaire;

import pooav.structures.file.File;
import pooav.structures.file.FileList;

public class Calculateur {

    private ArbreBinaire expression;

    /**
     *
     * @return
     */
    public ArbreBinaire getExpression() {
        return expression;
    }

    /**
     *
     * @param expression
     */
    public void setExpression(ArbreBinaire expression) {
        this.expression = expression;
    }

    /**
     *
     * @return
     */
    public double calculer() {
        // TODO - implement Calculateur.calculer
        throw new UnsupportedOperationException();
    }

    /**
     *
     * @param args
     */
    public void build(String[] args) {
        FileList f = new FileList();
        for (String element : args) {
            f.add(element);
        }
        if (f.isEmpty()) {
//exception
        } else {
            this.expression = build(f, null);
        }
    }

    /**
	 * 
	 * @param file
	 * @param a
	 */
    protected ArbreBinaire build(File file, ArbreBinaire parent) {
        if(!file.isEmpty()){
            String v=(String) file.remove();// cast indispensable?
            ArbreBinaire a= new ArbreBinaire(v,parent);
            if(estOperateur(v)){
                if(file.size()>=2){
                    a.setGauche(build(file,a));
                    a.setDroit(build(file,a));
                }else{
                    //exception
                }
            }
            return a;
        }else{
            //exception
        }
        return null;//?
    }

    /**
     *
     * @param op
     * @return 
     */
    public boolean estOperateur(String op) {
        return ("+".equals(op)||"-".equals(op)||"*".equals(op)||"/".equals(op));
    }

}
