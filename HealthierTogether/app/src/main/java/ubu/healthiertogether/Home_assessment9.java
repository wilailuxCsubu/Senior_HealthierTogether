package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class Home_assessment9 extends AppCompatActivity {

    int result9;
    Button btn ;
    RadioButton ch0,ch1,ch2,ch3;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_assessment9);

        Bundle bundle = getIntent().getExtras();
        final int result8 = bundle.getInt("Value8");

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");
        final String userID = intent.getStringExtra("userID");

        Toast toast = Toast.makeText ( Home_assessment9.this, "result =  " + result8 +"\n" +
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
                    Toast toast = Toast.makeText ( Home_assessment9.this, "กรุณากรอกข้อมูล" , Toast.LENGTH_LONG );
                    toast.show ( );
                }
                else {
                    Choice();

                    result9 = result8 + result9 ;
                /*Toast toast = Toast.makeText ( Home_assessment1.this, "Checked " + result1, Toast.LENGTH_LONG );
                toast.show ( );*/
                    Intent intent = new Intent(Home_assessment9.this, Result.class);
                    intent.putExtra("Value9", result9);
                    intent.putExtra("HN",HN);
                    intent.putExtra("userID",userID);
                    startActivity(intent);
                }


            }
        });
    }

    public void Choice(){
        if(ch0.isChecked()){
            result9=0;
        }else if(ch1.isChecked()){
            result9=1;
        }else if(ch2.isChecked()){
            result9=2;
        }else if(ch3.isChecked()){
            result9=3;
        }

    }


}
