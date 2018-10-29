package com.camila.prestamos_jdc;

import android.app.*;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.*;
import android.widget.EditText;

import java.util.Calendar;

public class RequestSpace extends AppCompatActivity {

    private BottomNavigationView mBottomNavigationView;

    private static final String zero="0";

    Calendar now = Calendar.getInstance();

    int month  = now.get(Calendar.MONTH);
    int day    = now.get(Calendar.DAY_OF_MONTH);
    int year   = now.get(Calendar.YEAR);

    int hour   = now.get(Calendar.HOUR_OF_DAY);
    int minute = now.get(Calendar.MINUTE);

    private EditText edtEventDate;
    private EditText edtTimeStart;
    private EditText edtTimeEnd;
    private Spinner  cbHeadquarters;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_request_space);

        getSupportActionBar().setDisplayShowHomeEnabled(true);

        mBottomNavigationView = (BottomNavigationView) findViewById(R.id.menuInferior);

        edtEventDate   = (EditText) findViewById(R.id.edtEventDate);
        edtTimeStart   = (EditText) findViewById(R.id.edtTimeStart);
        edtTimeEnd     = (EditText) findViewById(R.id.edtTimeEnd);
        cbHeadquarters = (Spinner)  findViewById(R.id.cbHeadquarters);

        //Opciones del menú
        mBottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.btn_search:
                        Intent oIntent = new Intent(RequestSpace.this, SearchResource.class);
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

    public void getDateButton(View view) {
        getDate();
    }

    private void getDate(){
        DatePickerDialog getDateText = new DatePickerDialog(this, new DatePickerDialog.OnDateSetListener() {
            @Override
            public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
                String formatDay = (dayOfMonth < 10)? zero + String.valueOf(dayOfMonth):String.valueOf(dayOfMonth);
                String formatMonth = ((month+1) < 10)? zero + String.valueOf((month+1)):String.valueOf((month+1));
                edtEventDate.setText(formatDay+"/"+formatMonth+"/"+year);
            }
        },year,month,day);
        getDateText.show();
    }

    public void getTimeButton(View view){
        switch (view.getId()){
            case R.id.ibTimeStart:
                getTimeStart();
                break;
            case R.id.ibTimeEnd:
                getTimeEnd();
                break;
        }
    }

    private void getTimeStart(){
        TimePickerDialog getTimeText = new TimePickerDialog(this, new TimePickerDialog.OnTimeSetListener() {
            @Override
            public void onTimeSet(TimePicker view, int hourOfDay, int minute) {
                String formatHour =  (hourOfDay < 10)? String.valueOf(zero + hourOfDay) : String.valueOf(hourOfDay);
                String formatMinute = (minute < 10)? String.valueOf(zero + minute):String.valueOf(minute);

                String AM_PM;
                if(hourOfDay < 12) {
                    AM_PM = "a.m.";
                } else {
                    AM_PM = "p.m.";
                }

                edtTimeStart.setText(formatHour + ":" + formatMinute + " " + AM_PM);
            }
        },hour,minute,false);
        getTimeText.show();
    }

    private void getTimeEnd(){
        TimePickerDialog getTimeText = new TimePickerDialog(this, new TimePickerDialog.OnTimeSetListener() {
            @Override
            public void onTimeSet(TimePicker view, int hourOfDay, int minute) {
                String formatHour =  (hourOfDay < 10)? String.valueOf(zero + hourOfDay) : String.valueOf(hourOfDay);
                String formatMinute = (minute < 10)? String.valueOf(zero + minute):String.valueOf(minute);

                String AM_PM;
                if(hourOfDay < 12) {
                    AM_PM = "a.m.";
                } else {
                    AM_PM = "p.m.";
                }

                edtTimeEnd.setText(formatHour + ":" + formatMinute + " " + AM_PM);
            }
        },hour,minute,false);
        getTimeText.show();
    }

    public void getHeadquarters() {

    }
}
