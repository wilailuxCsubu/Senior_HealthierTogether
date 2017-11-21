package ubu.healthiertogether;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

public class Patient_history4 extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient_history4);
    }

    public void nextTo(View v){
        Intent i = new Intent(getApplicationContext(),Patient_history5.class);
        startActivity(i);


    }

}
