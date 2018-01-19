package ubu.testradio;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

public class secen extends AppCompatActivity {
    RadioButton ch0,ch1,ch2,ch3;
    Button btn;
    RadioGroup s2;
    int checkeID;
    int reslut;
    int sum2;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_secen);

        Bundle bundle = getIntent().getExtras();
        final int sum = bundle.getInt("Value1");



        Toast toast = Toast.makeText ( secen.this, "sum " + sum, Toast.LENGTH_LONG );
        toast.show ( );

        ch0 = (RadioButton)findViewById(R.id.ch0);
        ch1 = (RadioButton)findViewById(R.id.ch1);
        ch2 = (RadioButton)findViewById(R.id.ch2);
        ch3 = (RadioButton)findViewById(R.id.ch3);

        btn = ( Button ) this.findViewById ( R.id.button );

        btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Choice();

                reslut = sum + sum2 ;
//                Toast toast = Toast.makeText ( MainActivity.this, "Checked " + sum, Toast.LENGTH_LONG );
//                toast.show ( );
                Intent intent = new Intent(secen.this, Reslut.class);
                intent.putExtra("Value2", reslut);
                startActivity(intent);

            }
        });

       /* btn = ( Button ) this.findViewById ( R.id.sutmit );

        btn.setOnClickListener ( new View.OnClickListener ( ) {
            public void onClick ( View v ) {
                s2 = ( RadioGroup )secen.this.findViewById ( R.id.s2 );

                checkeID = s2.getCheckedRadioButtonId ( );

                reslut = sum + checkeID;

                Intent intent = new Intent(secen.this, Reslut.class);
                intent.putExtra("Value2", reslut);
                startActivity(intent);

                //RadioButton checkedRadioButton = ( RadioButton ) MainActivity.this.findViewById ( checkedRadioButtonID );


                //String checkedLabel = checkedRadioButton.getText ( ).toString ( );

//                Toast toast = Toast.makeText ( secen.this, "Checked " + checkeID, Toast.LENGTH_LONG );
//
//                toast.show ( );
            }
        }
        );*/

    }

    public void Choice(){
        if(ch0.isChecked()){
            sum2=0;
        }else if(ch1.isChecked()){
            sum2=1;
        }else if(ch2.isChecked()){
            sum2=2;
        }else if(ch3.isChecked()){
            sum2=3;
        }

    }
}
