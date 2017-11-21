package ubu.healthiertogether;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

public class Home_assessment8 extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_assessment8);
    }
    public void nextTo(View v){
        Intent i = new Intent(getApplicationContext(),Home_assessment9.class);
        startActivity(i);


    }

}
