package ubu.healthiertogether;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class Result extends AppCompatActivity {

    Button btn;
    TextView show;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_result);

        Bundle bundle = getIntent().getExtras();
        final int result9 = bundle.getInt("Value9");

        Toast toast = Toast.makeText ( Result.this, "result =  " + result9, Toast.LENGTH_LONG );
        toast.show ( );

        btn = (Button) this.findViewById ( R.id.submit );
        show = (TextView) this.findViewById ( R.id.result );

        if(result9 <= 4){
            show.setText("ภาวะพึ่งพาโดยสมบูรณ์");
        }else if(result9 <= 8){
            show.setText("ภาวะพึ่งพารุนแรง");
        }else if(result9 <= 11){
            show.setText("ภาวะพึ่งพาปานกลาง");
        }else{
            show.setText("ไม่เป็นภาวะพึ่งพา");
        }

    }

    public void nextTo(View v){
        Intent i = new Intent(getApplicationContext(),MySick.class);
        startActivity(i);


    }
}
