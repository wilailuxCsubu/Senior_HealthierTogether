package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class Home_assessment2 extends AppCompatActivity {

    int result2;
    Button btn ;
    RadioButton ch0,ch1,ch2,ch3;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_assessment2);


        Bundle bundle = getIntent().getExtras();
        final int result1 = bundle.getInt("Value1");

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");
        final String userID = intent.getStringExtra("userID");

        Toast toast = Toast.makeText ( Home_assessment2.this, "result =  " + result1 +"\n" +
                "HN :  =  " + HN +"\n" +"userID : " + userID, Toast.LENGTH_LONG );
        toast.show ( );


        ch0 = (RadioButton)findViewById(R.id.ch0);
        ch1 = (RadioButton)findViewById(R.id.ch1);
        ch2 = (RadioButton)findViewById(R.id.ch2);
        ch3 = (RadioButton)findViewById(R.id.ch3);

        btn = ( Button ) this.findViewById ( R.id.submit );
        final RadioGroup radioGroup = (RadioGroup) findViewById(R.id.gch);

        btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                if (radioGroup.getCheckedRadioButtonId() == -1)
                {
                    Toast toast = Toast.makeText ( Home_assessment2.this, "กรุณากรอกข้อมูล" , Toast.LENGTH_LONG );
                    toast.show ( );
                }
                else {
                    Choice();

                    result2 = result1 + result2 ;
                /*Toast toast = Toast.makeText ( Home_assessment1.this, "Checked " + result1, Toast.LENGTH_LONG );
                toast.show ( );*/
                    Intent intent = new Intent(Home_assessment2.this, Home_assessment3.class);
                    intent.putExtra("Value2", result2);
                    intent.putExtra("HN",HN);
                    intent.putExtra("userID",userID);
                    startActivity(intent);
                }


            }
        });
    }

    public void Choice(){
        if(ch0.isChecked()){
            result2=0;
        }else if(ch1.isChecked()){
            result2=1;
        }else if(ch2.isChecked()){
            result2=2;
        }else if(ch3.isChecked()){
            result2=3;
        }

    }

}
