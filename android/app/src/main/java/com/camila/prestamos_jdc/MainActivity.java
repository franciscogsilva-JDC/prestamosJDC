package com.camila.prestamos_jdc;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    private BottomNavigationView mBottomNavigationView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        mBottomNavigationView = (BottomNavigationView) findViewById(R.id.menuInferior);
        mBottomNavigationView.setSelectedItemId(R.id.btn_request);

        //Opciones del menú
        mBottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.btn_search:
                        Intent oIntent = new Intent(MainActivity.this, SearchResource.class);
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
/*
    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        switch (item.getItemId()){
            case R.id.btn_search:
                Intent oIntent = new Intent(this, SearchResource.class);
                startActivity(oIntent);
                return true;
            case R.id.btn_request:
                oIntent = new Intent(this, SearchResource.class);
                startActivity(oIntent);
                return true;
            case R.id.btn_authorization:
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }
*/
    public void requestSpace(View v){
        Intent oIntent = new Intent(this, RequestSpace.class);
        startActivity(oIntent);
    }

    public void requestResource(View v){
        Intent oIntent = new Intent(this, RequestResource.class);
        startActivity(oIntent);
    }
}
