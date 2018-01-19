package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.Toast;

public class Home_assessment7 extends AppCompatActivity {

    int result7;
    Button btn ;
    RadioButton ch0,ch1,ch2,ch3;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_assessment7);

        Bundle bundle = getIntent().getExtras();
        final int result6 = bundle.getInt("Value6");


        Toast toast = Toast.makeText ( Home_assessment7.this, "result =  " + result6, Toast.LENGTH_LONG );
        toast.show ( );

        ch0 = (RadioButton)findViewById(R.id.ch0);
        ch1 = (RadioButton)findViewById(R.id.ch1);
        ch2 = (RadioButton)findViewById(R.id.ch2);
        ch3 = (RadioButton)findViewById(R.id.ch3);

        btn = (Button) this.findViewById ( R.id.submit );

        btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Choice();

                result7 = result6 + result7 ;
                /*Toast toast = Toast.makeText ( Home_assessment1.this, "Checked " + result1, Toast.LENGTH_LONG );
                toast.show ( );*/
                Intent intent = new Intent(Home_assessment7.this, Home_assessment8.class);
                intent.putExtra("Value7", result7);
                startActivity(intent);

            }
        });
    }


    public void Choice(){
        if(ch0.isChecked()){
            result7=0;
        }else if(ch1.isChecked()){
            result7=1;
        }else if(ch2.isChecked()){
            result7=2;
        }else if(ch3.isChecked()){
            result7=3;
        }

    }
}
