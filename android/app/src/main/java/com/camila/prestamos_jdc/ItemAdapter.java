package com.camila.prestamos_jdc;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.List;

public class ItemAdapter {

    private Context    context;
    private List<Item> items;

    public ItemAdapter(Context context, List<Item> items){

        this.context = context;
        this.items   = items;
    }

    public int getCount(){
        return this.items.size();
    }

    public Object getItem(int position){
        return this.items.get(position);
    }

    public long getItemId(int position){
        return position;
    }

    public View getView (int position, View convertView, ViewGroup parent){

        View rowView = convertView;

        if (rowView == null){
            //No existe la vista, se crea una nueva vista dentro de la lista
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            rowView = inflater.inflate(R.layout.activity_item_list, parent, false);
        }

        //Se ingresa la info en la vista

        ImageView imageResource      = (ImageView) rowView.findViewById(R.id.imageResource);
        TextView tittleResource      = (TextView)  rowView.findViewById(R.id.tittleResource);
        TextView descriptionResource = (TextView)  rowView.findViewById(R.id.descriptionResource);

        Item item = this.items.get(position);

        imageResource.setImageResource(item.getImage());
        tittleResource.setText(item.getTittle());
        descriptionResource.setText(item.getDescription());

        return rowView;
    }

}
