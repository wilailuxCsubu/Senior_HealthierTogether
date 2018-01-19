package ubu.testradio;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.widget.TextView;

public class Reslut extends AppCompatActivity {

    TextView txt;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reslut);



        Bundle bundle = getIntent().getExtras();
        final int sum2 = bundle.getInt("Value2");

        txt = (TextView)findViewById(R.id.re);
        txt.setText(String.valueOf(sum2));
/*
        Toast toast = Toast.makeText ( Reslut.this, "Checked " + sum, Toast.LENGTH_LONG );

                toast.show ( );*/



    }
}
