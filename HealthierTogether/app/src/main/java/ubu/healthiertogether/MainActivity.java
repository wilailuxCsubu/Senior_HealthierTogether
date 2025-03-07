package ubu.healthiertogether;

import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.CardView;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class MainActivity extends AppCompatActivity {

    CardView b1,b2,b3;

    Intent intent= getIntent();
//    public String MemberID = intent.getStringExtra("MemberID");

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Intent intent= getIntent();
        final String userID = intent.getStringExtra("userID");


//        Toast.makeText(MainActivity.this, "userID : " + userID, Toast.LENGTH_SHORT).show();

        b1 = (CardView) findViewById(R.id.p_sick);
        b2 = (CardView) findViewById(R.id.p_reprot);
        b3 = (CardView) findViewById(R.id.Date);

        final ImageView img = (ImageView)findViewById(R.id.imgUser);
        final TextView name = (TextView)findViewById(R.id.nameUser);

        String url = "http://aorair.esy.es/api/get_ByMemberID.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("MemberID", userID));

        String resultServer  = NetConnect.getHttpPost(url,params);

        String strID = "";
        Bitmap strImg ;
        String strName = "";


        JSONObject c;
        try {
            c = new JSONObject(resultServer);
            strID = c.getString("userID");
            strName = c.getString("name_a");
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
                Intent intentMain = new Intent(MainActivity.this,MySick.class);
                intentMain.putExtra("userID", finalStrID);

                startActivity(intentMain);

//                Toast toast = Toast.makeText ( MainActivity.this, "userID :  =  " + finalStrID , Toast.LENGTH_LONG );
//                 toast.show ( );

            }
        });

        b3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intentMain = new Intent(MainActivity.this,MakeDate.class);
                intentMain.putExtra("userID", finalStrID);

                startActivity(intentMain);

            }
        });

    }

    public void ToMap(View v){
        Intent i = new Intent(getApplicationContext(),MapsActivity.class);
        startActivity(i);


    }






}
