package com.camila.prestamos_jdc;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.*;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

public class SearchResource extends AppCompatActivity {

    private BottomNavigationView mBottomNavigationView;
    private ListView resourcesList;
    private List<Item> items = new ArrayList<Item>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search_resource);

        getSupportActionBar().setDisplayShowHomeEnabled(true);

        mBottomNavigationView = (BottomNavigationView) findViewById(R.id.menuInferior);
        resourcesList         = (ListView) findViewById(R.id.resources_list);

        //Opciones del menú
        mBottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.btn_search:
                        Intent oIntent = new Intent(SearchResource.this, SearchResource.class);
                        startActivity(oIntent);
                        break;
                    case R.id.btn_request:
                        Toast.makeText(getApplicationContext(), "Item 2", Toast.LENGTH_LONG).show();
                        break;
                }
                return true;
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.bar_profile, menu);
        return true;
    }


}
