package com.camila.prestamos_jdc;

import android.app.AlertDialog;
import android.app.Dialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.*;


public class MainActivity extends AppCompatActivity {

    private BottomNavigationView mBottomNavigationView;
    private Intent oIntent;

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
                    case R.id.btn_info:
                        oIntent = new Intent(MainActivity.this, InfoApplication.class);
                        startActivity(oIntent);
                        break;
                    case R.id.btn_request:
                        oIntent = new Intent(MainActivity.this, MainActivity.class);
                        startActivity(oIntent);
                        break;
                    case R.id.btn_authorization:
                        oIntent = new Intent(MainActivity.this, AllRequests.class);
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

    public void makeRequest(View v) {
        switch (v.getId()) {
            case R.id.btn_spaces:
                requestSpace();
                break;
            case R.id.btn_resources:
                requestResource();
                break;
        }
    }

    public void requestSpace(){

        AlertDialog.Builder oAlertBuider = new AlertDialog.Builder(this);
        LayoutInflater inflater = this.getLayoutInflater();

        oAlertBuider.setView(inflater.inflate(R.layout.activity_sign_in, null));

        oAlertBuider.setPositiveButton(R.string.sign_in_button, new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                oIntent = new Intent(MainActivity.this, RequestSpace.class);
                startActivity(oIntent);
            }
        });

        oAlertBuider.setNegativeButton(R.string.sign_up_button, new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                oIntent = new Intent(MainActivity.this, MainActivity.class);
                startActivity(oIntent);
            }
        });

        oAlertBuider.show();
    }

    public void requestResource(){
        AlertDialog.Builder oAlertBuider = new AlertDialog.Builder(this);
        LayoutInflater inflater = this.getLayoutInflater();

        oAlertBuider.setView(inflater.inflate(R.layout.activity_sign_in, null));

        oAlertBuider.setPositiveButton(R.string.sign_up_button, new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                oIntent = new Intent(MainActivity.this, RequestResource.class);
                startActivity(oIntent);
            }
        });

        oAlertBuider.setNegativeButton(R.string.sign_up_button, new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                oIntent = new Intent(MainActivity.this, MainActivity.class);
                startActivity(oIntent);
            }
        });

        oAlertBuider.show();
    }
}
