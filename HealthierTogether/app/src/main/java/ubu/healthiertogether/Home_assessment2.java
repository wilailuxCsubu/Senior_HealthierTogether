package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class Home_assessment2 extends Home_assessment {
//
//    int result=0;
//    Button btn ;
//    RadioButton ch0,ch1,ch2,ch3;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_assessment2);


        Bundle bundle = getIntent().getExtras();
        final int sum = bundle.getInt("result");

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");
        final String userID = intent.getStringExtra("userID");

        Toast toast = Toast.makeText ( Home_assessment2.this, "result =  " + sum +"\n" +
                "HN :  =  " + HN +"\n" +"userID : " + userID, Toast.LENGTH_LONG );
        toast.show ( );


        ch0 = (RadioButton)findViewById(R.id.ch0);
        ch1 = (RadioButton)findViewById(R.id.ch1);
        ch2 = (RadioButton)findViewById(R.id.ch2);
        ch3 = (RadioButton)findViewById(R.id.ch3);

        btn = ( Button ) this.findViewById ( R.id.submit );
        radioGroup = (RadioGroup) findViewById(R.id.gch);

        btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                if (radioGroup.getCheckedRadioButtonId() == -1)
                {
                    Toast toast = Toast.makeText ( Home_assessment2.this, "กรุณากรอกข้อมูล" , Toast.LENGTH_LONG );
                    toast.show ( );
                }
                else {
                    Choice();

                    result = sum + result ;
                /*Toast toast = Toast.makeText ( Home_assessment1.this, "Checked " + result1, Toast.LENGTH_LONG );
                toast.show ( );*/
                    Intent intent = new Intent(Home_assessment2.this, Home_assessment3.class);
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

//    public void Choice(){
//        if(ch0.isChecked()){
//            result=0;
//        }else if(ch1.isChecked()){
//            result=1;
//        }else if(ch2.isChecked()){
//            result=2;
//        }else if(ch3.isChecked()){
//            result=3;
//        }
//
//    }

}
