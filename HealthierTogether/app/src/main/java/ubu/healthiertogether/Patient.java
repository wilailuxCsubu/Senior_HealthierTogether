package ubu.healthiertogether;

import android.content.Intent;
import android.graphics.Bitmap;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
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
        final String MemberID = intent.getStringExtra("MemberID");

        Toast.makeText(Patient.this, "ID : " + MemberID, Toast.LENGTH_SHORT).show();


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
        String userID = "";


        JSONObject c;
        try {
            c = new JSONObject(resultServer);
            strID = c.getString("HN");
            strName = c.getString("name_p");
            strImg = (Bitmap)ImgBitmap.loadBitmap(c.getString("Img"));
            userID = c.getString("userID");


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
        final String finalUserID = userID;
        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intentMain = new Intent(Patient.this,Chart.class);
                intentMain.putExtra("HN", finalStrID);
                intentMain.putExtra("userID", finalUserID);

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
                intentMain.putExtra("userID", finalUserID);
                Toast toast = Toast.makeText ( Patient.this, "HN :  =  " + finalStrID , Toast.LENGTH_LONG );
                 toast.show ( );

                startActivity(intentMain);

            }
        });
    }
}
