package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.CardView;
import android.view.View;

public class MainActivity extends AppCompatActivity {

    CardView b1,b2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);




        b1 = (CardView) findViewById(R.id.p_sick);
        b2 = (CardView) findViewById(R.id.p_reprot);

        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent P1 = new Intent(MainActivity.this,MySick.class);
                startActivity(P1);

            }
        });

    }

    public void ToMap(View v){
        Intent i = new Intent(getApplicationContext(),MenuMap.class);
        startActivity(i);


    }


}
