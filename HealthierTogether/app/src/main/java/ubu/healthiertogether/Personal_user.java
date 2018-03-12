package ubu.healthiertogether;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

public class Personal_user extends AppCompatActivity {
    private ImageView image_user;
    private TextView text_user ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_personal_user);

        showInfo();

//        image_user = (ImageView) findViewById(R.id.image_user);
//        text_user = (TextView) findViewById(R.id.text_user);


    }

    public void showInfo()
    {
        final TextView tName = (TextView)findViewById(R.id.text_user);

//        String url = "http://www.thaicreate.com/android/getByMemberID.php";

        Intent intent= getIntent();
        final String GetName = intent.getStringExtra("Name");

        tName.setText(GetName);

//        List<NameValuePair> params = new ArrayList<NameValuePair>();
//        params.add(new BasicNameValuePair("sMemberID", MemberID));

        /** Get result from Server (Return the JSON Code)
         *
         * {"MemberID":"2","Username":"adisorn","Password":"adisorn@2","Name":"Adisorn Bunsong","Tel":"021978032","Email":"adisorn@thaicreate.com"}
         */

//        String resultServer  = getHttpPost(url,params);
//
//        String strMemberID = "";
//        String strUsername = "";
//        String strPassword = "";
//        String strName = "";
//        String strEmail = "";
//        String strTel = "";
//
//        JSONObject c;
//        try {
//            c = new JSONObject(resultServer);
//            strMemberID = c.getString("MemberID");
//            strUsername = c.getString("Username");
//            strPassword = c.getString("Password");
//            strName = c.getString("Name");
//            strEmail = c.getString("Email");
//            strTel = c.getString("Tel");
//
//            if(!strMemberID.equals(""))
//            {
//                tMemberID.setText(strMemberID);
//                tUsername.setText(strUsername);
//                tPassword.setText(strPassword);
//                tName.setText(strName);
//                tEmail.setText(strEmail);
//                tTel.setText(strTel);
//            }
//            else
//            {
//                tMemberID.setText("-");
//                tUsername.setText("-");
//                tPassword.setText("-");
//                tName.setText("-");
//                tEmail.setText("-");
//                tTel.setText("-");
//            }

//        } catch (JSONException e) {
//            // TODO Auto-generated catch block
//            e.printStackTrace();
//        }

    }



    public void nextHis(View v){
        Intent i = new Intent(getApplicationContext(),Patient_history1.class);
        startActivity(i);


    }

    public void homeAss(View v){
        Intent i = new Intent(getApplicationContext(),Home_assessment.class);
        startActivity(i);


    }
}
