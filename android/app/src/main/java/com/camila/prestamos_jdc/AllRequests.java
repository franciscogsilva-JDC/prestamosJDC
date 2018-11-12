package com.camila.prestamos_jdc;

import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.*;

public class AllRequests extends AppCompatActivity {

    private BottomNavigationView mBottomNavigationView;
    private Intent oIntent;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_all_requests);

        mBottomNavigationView = (BottomNavigationView) findViewById(R.id.menuInferior);
        mBottomNavigationView.setSelectedItemId(R.id.btn_authorization);

        //Opciones del menú
        mBottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.btn_info:
                        oIntent = new Intent(AllRequests.this, InfoApplication.class);
                        startActivity(oIntent);
                        break;
                    case R.id.btn_request:
                        oIntent = new Intent(AllRequests.this, MainActivity.class);
                        startActivity(oIntent);
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

    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        int id = item.getItemId();

        if (id == R.id.menu_profile){
            Intent oIntent = new Intent(this, Profile.class);
            startActivity(oIntent);
        }
        return super.onOptionsItemSelected(item);
    }
}
