package ubu.healthiertogether;

import android.content.Intent;
import android.graphics.drawable.Drawable;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import java.io.IOException;
import java.io.InputStream;
import java.net.MalformedURLException;
import java.net.URL;

public class Personal_user extends AppCompatActivity {
    private ImageView image_user;
    private TextView text_user ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_personal_user);

//        showInfo();

//        image_user = (ImageView) findViewById(R.id.image_user);
//        text_user = (TextView) findViewById(R.id.text_user);

        final TextView tName = (TextView)findViewById(R.id.text_user);
        final ImageView img1 = (ImageView) findViewById(R.id.image_user);
        final TextView tAge = (TextView)findViewById(R.id.age);
        final TextView tResult = (TextView)findViewById(R.id.result);
        final TextView homeAss = (TextView)findViewById(R.id.homeAss);


//        String url = "http://www.thaicreate.com/android/getByMemberID.php";

        Intent intent= getIntent();
        final String GetName = intent.getStringExtra("Name");
        final String url = intent.getStringExtra("img");
        final String Age = intent.getStringExtra("age");
        final String Result = intent.getStringExtra("result");
        final String HN = intent.getStringExtra("HN");
        final String userID = intent.getStringExtra("userID");


        tName.setText(GetName);
        tAge.setText(Age);
        tResult.setText(Result);

        Toast toast = Toast.makeText ( Personal_user.this, "HN :  =  " + HN +"\n"
                +"userID : " + userID, Toast.LENGTH_LONG );
        toast.show ( );

        homeAss.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
        Intent intentMain = new Intent(Personal_user.this,Home_assessment.class);
        intentMain.putExtra("HN", HN);
        intentMain.putExtra("userID", userID);
        startActivity(intentMain);

            }
        });


        try {

            img1.setImageDrawable(getResource(url));

        } catch (MalformedURLException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

    }

//    public void showInfo()
//    {
//
//
//    }

    public Drawable getResource(String url) throws MalformedURLException, IOException
    {
        return Drawable.createFromStream((InputStream)new URL(url).getContent(), "src");
    }





    public void nextHis(View v){
        Intent i = new Intent(getApplicationContext(),Patient_history1.class);
        startActivity(i);


    }


}
