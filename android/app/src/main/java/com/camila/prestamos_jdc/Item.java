package com.camila.prestamos_jdc;

public class Item {

    private int image;
    private String tittle;
    private String description;

    public Item(){
        super();
    }

    public Item(int image, String tittle, String description){
        super();

        this.image       = image;
        this.tittle      = tittle;
        this.description = description;
    }

    public int getImage() {
        return image;
    }

    public String getTittle() {
        return tittle;
    }

    public String getDescription() {
        return description;
    }
}
