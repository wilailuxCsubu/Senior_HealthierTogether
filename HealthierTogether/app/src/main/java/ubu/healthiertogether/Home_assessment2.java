package ubu.healthiertogether;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

public class Home_assessment2 extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_assessment2);
    }

    public void nextTo(View v){
        Intent i = new Intent(getApplicationContext(),Home_assessment3.class);
        startActivity(i);


    }
}
