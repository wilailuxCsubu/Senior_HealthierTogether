package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class Home_assessment extends AppCompatActivity {
    Button btn ;
    RadioGroup radioGroup;
    RadioButton ch0,ch1,ch2,ch3;
    int result;

    public String HN,userID;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_assessment);

        ch0 = (RadioButton)findViewById(R.id.ch0);
        ch1 = (RadioButton)findViewById(R.id.ch1);
        ch2 = (RadioButton)findViewById(R.id.ch2);
        ch3 = (RadioButton)findViewById(R.id.ch3);


        radioGroup = (RadioGroup) findViewById(R.id.gch);
//
        Intent intent= getIntent();
         HN = intent.getStringExtra("HN");
         userID = intent.getStringExtra("userID");

//
//        Toast toast = Toast.makeText ( Home_assessment.this, "HN :  =  " + HN +"\n"+
//                "userID :  =  " + userID, Toast.LENGTH_LONG );
//        toast.show ( );

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
                    intent.putExtra("result", result);
                    intent.putExtra("HN",HN);
                    intent.putExtra("userID",userID);
                    startActivity(intent);
                }

            }
        });


        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);

    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();

        if(id == android.R.id.home){
            this.finish();
        }

        return super.onOptionsItemSelected(item);
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
