package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.Toast;

public class Home_assessment3 extends AppCompatActivity {

    int result3;
    Button btn ;
    RadioButton ch0,ch1,ch2,ch3;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_assessment3);

        Bundle bundle = getIntent().getExtras();
        final int result2 = bundle.getInt("Value2");


        Toast toast = Toast.makeText ( Home_assessment3.this, "result =  " + result2, Toast.LENGTH_LONG );
        toast.show ( );

        ch0 = (RadioButton)findViewById(R.id.ch0);
        ch1 = (RadioButton)findViewById(R.id.ch1);
        ch2 = (RadioButton)findViewById(R.id.ch2);
        ch3 = (RadioButton)findViewById(R.id.ch3);

        btn = ( Button ) this.findViewById ( R.id.submit );

        btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Choice();

                result3 = result2 + result3 ;
                /*Toast toast = Toast.makeText ( Home_assessment1.this, "Checked " + result1, Toast.LENGTH_LONG );
                toast.show ( );*/
                Intent intent = new Intent(Home_assessment3.this, Home_assessment4.class);
                intent.putExtra("Value3", result3);
                startActivity(intent);

            }
        });
    }

    public void Choice(){
        if(ch0.isChecked()){
            result3=0;
        }else if(ch1.isChecked()){
            result3=1;
        }else if(ch2.isChecked()){
            result3=2;
        }else if(ch3.isChecked()){
            result3=3;
        }

    }


}
