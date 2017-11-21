package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

public class Home_assessment extends AppCompatActivity {
    Button btn ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_assessment);

        /*btn = (Button) findViewById(R.id.submit_record);

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent Btn = new Intent(Home_assessment.this,Record.class);
                startActivity(Btn);
            }
        });*/



    }

    public void nextTo(View v){
        Intent i = new Intent(getApplicationContext(),Home_assessment1.class);
        startActivity(i);


    }
}
