package com.camila.prestamos_jdc;

import android.content.Intent;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;

public class MainActivity extends AppCompatActivity {

    private BottomNavigationView mBottomNavigationView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        getSupportActionBar().setIcon(R.drawable.ic_profile);
        getSupportActionBar().setTitle("    "+getString(R.string.app_name));
        getSupportActionBar().setDisplayShowHomeEnabled(true);

        mBottomNavigationView = (BottomNavigationView) findViewById(R.id.menuInferior);
        mBottomNavigationView.setSelectedItemId(R.id.btn_request);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        switch (item.getItemId()){
            case R.id.btn_search:
                return true;
            case R.id.btn_request:
                return true;
            case R.id.btn_authorization:
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }

    public void requestSpace(View v){
        Intent oIntent = new Intent(this, SolicitarEspacio.class);
        startActivity(oIntent);
    }
}
