package ubu.healthiertogether;

import android.content.Intent;
import android.graphics.Bitmap;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Patient extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient);

        Intent intent= getIntent();
        final String MemberID = intent.getStringExtra("userName");

        CardView b1 = (CardView) findViewById(R.id.chart);
        CardView b2 = (CardView) findViewById(R.id.date_patient);

        final ImageView img = (ImageView)findViewById(R.id.imgUser);
        final TextView name = (TextView)findViewById(R.id.nameUser);

        String url = "http://aorair.esy.es/api/get_ByPatientID.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("MemberID", MemberID));

        String resultServer  = NetConnect.getHttpPost(url,params);


        String strID = "";
        Bitmap strImg ;
        String strName = "";


        JSONObject c;
        try {
            c = new JSONObject(resultServer);
            strID = c.getString("HN");
            strName = c.getString("name_p");
            strImg = (Bitmap)ImgBitmap.loadBitmap(c.getString("Img"));



            if(!strID.equals(""))
            {
                name.setText(strName);
                img.setImageBitmap(strImg);
            }
            else
            {
                name.setText("error");
            }

        } catch (JSONException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }


        final String finalStrID = strID;
        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intentMain = new Intent(Patient.this,Chart.class);
                intentMain.putExtra("HN", finalStrID);
                startActivity(intentMain);

//                Toast toast = Toast.makeText ( MainActivity.this, "userID :  =  " + finalStrID , Toast.LENGTH_LONG );
//                 toast.show ( );

            }
        });

        b2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intentMain = new Intent(Patient.this,DatePatient.class);
                intentMain.putExtra("HN", finalStrID);
                Toast toast = Toast.makeText ( Patient.this, "HN :  =  " + finalStrID , Toast.LENGTH_LONG );
                 toast.show ( );

                startActivity(intentMain);

            }
        });

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_p,menu);

        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        Intent intent= getIntent();
        final String MemberID = intent.getStringExtra("userName");

        if (item.getItemId()== R.id.user){
            Intent intentMain = new Intent(Patient.this,Setting_p2.class);
            intentMain.putExtra("userName", MemberID);
            Toast toast = Toast.makeText ( Patient.this, "userName :  =  " + MemberID , Toast.LENGTH_LONG );
            toast.show ( );
            startActivity(intentMain);

        }

        if(item.getItemId() == android.R.id.home){
            this.finish();
        }

        return super.onOptionsItemSelected(item);
    }
}
