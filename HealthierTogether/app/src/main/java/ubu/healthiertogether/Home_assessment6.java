package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class Home_assessment6 extends AppCompatActivity {

    int result6;
    Button btn ;
    RadioButton ch0,ch1,ch2,ch3;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_assessment6);

        Bundle bundle = getIntent().getExtras();
        final int result5 = bundle.getInt("Value5");

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");
        final String userID = intent.getStringExtra("userID");


        Toast toast = Toast.makeText ( Home_assessment6.this, "result =  " + result5 +"\n" +
                "HN :  =  " + HN +"\n" +"userID : " + userID, Toast.LENGTH_LONG );
        toast.show ( );

        ch0 = (RadioButton)findViewById(R.id.ch0);
        ch1 = (RadioButton)findViewById(R.id.ch1);
        ch2 = (RadioButton)findViewById(R.id.ch2);
        ch3 = (RadioButton)findViewById(R.id.ch3);

        btn = (Button) this.findViewById ( R.id.submit );
        final RadioGroup radioGroup = (RadioGroup) findViewById(R.id.gch);

        btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                if (radioGroup.getCheckedRadioButtonId() == -1)
                {
                    Toast toast = Toast.makeText ( Home_assessment6.this, "กรุณากรอกข้อมูล" , Toast.LENGTH_LONG );
                    toast.show ( );
                }
                else {
                    Choice();

                    result6 = result5 + result6 ;
                /*Toast toast = Toast.makeText ( Home_assessment1.this, "Checked " + result1, Toast.LENGTH_LONG );
                toast.show ( );*/
                    Intent intent = new Intent(Home_assessment6.this, Home_assessment7.class);
                    intent.putExtra("Value6", result6);
                    intent.putExtra("HN",HN);
                    intent.putExtra("userID",userID);
                    startActivity(intent);
                }


            }
        });
    }

    public void Choice(){
        if(ch0.isChecked()){
            result6=0;
        }else if(ch1.isChecked()){
            result6=1;
        }else if(ch2.isChecked()){
            result6=2;
        }else if(ch3.isChecked()){
            result6=3;
        }

    }

}
