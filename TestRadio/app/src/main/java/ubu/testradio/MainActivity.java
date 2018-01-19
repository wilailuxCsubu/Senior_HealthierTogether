package ubu.testradio;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;

public class MainActivity extends AppCompatActivity {

    Button btn;
    RadioButton ch0,ch1,ch2,ch3;
    //int checkedRadioButtonID;
    int sum=0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        ch0 = (RadioButton)findViewById(R.id.ch0);
        ch1 = (RadioButton)findViewById(R.id.ch1);
        ch2 = (RadioButton)findViewById(R.id.ch2);
        ch3 = (RadioButton)findViewById(R.id.ch3);

        btn = ( Button ) this.findViewById ( R.id.button );

        btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Choice();

//                Toast toast = Toast.makeText ( MainActivity.this, "Checked " + sum, Toast.LENGTH_LONG );
//                toast.show ( );
                Intent intent = new Intent(MainActivity.this, secen.class);
                intent.putExtra("Value1", sum);
                startActivity(intent);

            }
        });




        /*******************************************/

      /* btn = ( Button ) this.findViewById ( R.id.button );

        btn.setOnClickListener ( new View.OnClickListener ( ) {
            public void onClick ( View v ) {
                sex = ( RadioGroup ) MainActivity.this.findViewById ( R.id.sex );

                checkedRadioButtonID = sex.getCheckedRadioButtonId ( );

                Intent intent = new Intent(MainActivity.this, secen.class);
                intent.putExtra("Value1", checkedRadioButtonID);
                startActivity(intent);

                //RadioButton checkedRadioButton = ( RadioButton ) MainActivity.this.findViewById ( checkedRadioButtonID );


               //String checkedLabel = checkedRadioButton.getText ( ).toString ( );

//                Toast toast = Toast.makeText ( MainActivity.this, "Checked " + checkedRadioButtonID, Toast.LENGTH_LONG );
//
//                toast.show ( );
            }
        }
        );*/

    /*  **********************************/


    }
    public void Choice(){
        if(ch0.isChecked()){
            sum=0;
        }else if(ch1.isChecked()){
            sum=1;
        }else if(ch2.isChecked()){
            sum=2;
        }else if(ch3.isChecked()){
            sum=3;
        }

    }

}
