package ubu.healthiertogether;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.drawable.Drawable;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.io.InputStream;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

public class Personal_user extends AppCompatActivity {
    private ImageView image_user;
    private TextView text_user ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_personal_user);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);

        final TextView tName = (TextView)findViewById(R.id.text_user);
        final ImageView img1 = (ImageView) findViewById(R.id.image_user);
        final TextView tAge = (TextView)findViewById(R.id.age);
        final TextView tResult = (TextView)findViewById(R.id.result);
        final TextView homeAss = (TextView)findViewById(R.id.homeAss);


        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");
        final String userID = intent.getStringExtra("userID");



        Toast toast = Toast.makeText ( Personal_user.this, "HN :  =  " + HN , Toast.LENGTH_LONG );
        toast.show ( );

        String url = "http://aorair.esy.es/api/get_Mypatient.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("MemberID", HN));

        String resultServer  = NetConnect.getHttpPost(url,params);

        String strAge = "";
        String strResult = "";
        Bitmap strImg ;
        String strName = "";
        String strHN = "";


        JSONObject c;
        try {
            c = new JSONObject(resultServer);
            strAge = c.getString("age");
            strName = c.getString("name_p");
            strImg = (Bitmap)ImgBitmap.loadBitmap(c.getString("img"));
            strResult = c.getString("result");
            strHN = c.getString("HN");


            if(!strHN.equals(""))
            {
                tName.setText(strName);
                tResult.setText(strResult);
                tAge.setText(strAge);
                img1.setImageBitmap(strImg);
            }
            else
            {
                tName.setText("error");
            }

        } catch (JSONException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

        homeAss.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
        Intent intentMain = new Intent(Personal_user.this,Home_assessment.class);
        intentMain.putExtra("HN",HN);
        intentMain.putExtra("userID",userID);
        startActivity(intentMain);

            }
        });




    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();

        if(id == android.R.id.home){
            this.finish();
        }

        return super.onOptionsItemSelected(item);
    }

    public Drawable getResource(String url) throws MalformedURLException, IOException
    {
        return Drawable.createFromStream((InputStream)new URL(url).getContent(), "src");
    }





    public void nextHis(View v){
        Intent i = new Intent(getApplicationContext(),Patient_history1.class);
        startActivity(i);


    }
    public void BarChart(View v){
        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");

        Intent i = new Intent(getApplicationContext(),Chart.class);
        i.putExtra("HN",HN);
        startActivity(i);
        startActivity(i);


    }

    public void toUrl (View v){
        Intent intent = new Intent(this, Webviwe_genogram.class);
        startActivity(intent);


    }


}
