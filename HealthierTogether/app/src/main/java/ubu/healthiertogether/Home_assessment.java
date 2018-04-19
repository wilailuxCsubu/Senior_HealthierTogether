package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class Home_assessment extends AppCompatActivity {
    Button btn ;
    RadioButton ch0,ch1,ch2,ch3,selectedRadioButton;
    int result=0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_assessment);

        ch0 = (RadioButton)findViewById(R.id.ch0);
        ch1 = (RadioButton)findViewById(R.id.ch1);
        ch2 = (RadioButton)findViewById(R.id.ch2);
        ch3 = (RadioButton)findViewById(R.id.ch3);

        final RadioGroup radioGroup = (RadioGroup) findViewById(R.id.gch);
//        int selectedId = radioGroup.getCheckedRadioButtonId();
//        selectedRadioButton = (RadioButton)findViewById(selectedId);

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");
        final String userID = intent.getStringExtra("userID");


        Toast toast = Toast.makeText ( Home_assessment.this, "HN :  =  " + HN , Toast.LENGTH_LONG );
        toast.show ( );

        btn = (Button) findViewById(R.id.submit);
        btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {

                if (radioGroup.getCheckedRadioButtonId() == -1)
                {
                    Toast toast = Toast.makeText ( Home_assessment.this, "กรุณากรอกข้อมูล" , Toast.LENGTH_LONG );
                    toast.show ( );
                }
                else
                {
                    Choice();
/*
                Toast toast = Toast.makeText ( Home_assessment.this, "Checked " + sum, Toast.LENGTH_LONG );
                toast.show ( );*/
                    Intent intent = new Intent(Home_assessment.this, Home_assessment1.class);
                    intent.putExtra("Value", result);
                    intent.putExtra("HN",HN);
                    startActivity(intent);
                }



            }
        });

    }

    public void Choice(){
        if(ch0.isChecked()){
            result=0;
        }else if(ch1.isChecked()){
            result=1;
        }else if(ch2.isChecked()){
            result=2;
        }else if(ch3.isChecked()){
            result=3;
        }

    }




}
