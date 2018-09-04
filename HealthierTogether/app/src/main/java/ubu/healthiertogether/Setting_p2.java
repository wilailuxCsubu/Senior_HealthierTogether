package ubu.healthiertogether;

import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Setting_p2 extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_setting_p2);

        Intent intent= getIntent();
        final String MemberID = intent.getStringExtra("userName");

        final AlertDialog.Builder ad = new AlertDialog.Builder(this);

        ImageView img = (ImageView)findViewById(R.id.imgU);
        final TextView user_name = (TextView)findViewById(R.id.u_name);
        final TextView user_pw = (TextView)findViewById(R.id.u_pw);
        Button btn = (Button) findViewById(R.id.btnCh);

        String url = "http://aorair.esy.es/api/Edit_PatientProfile.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("MemberID", MemberID));

        String resultServer  = NetConnect.getHttpPost(url,params);

        String strPw = "";
        Bitmap strImg ;
        String strUserName = "";
        String strMem = "";


        JSONObject c;
        try {
            c = new JSONObject(resultServer);
            strUserName = c.getString("userName");
            strPw = c.getString("Pw");
            strMem = c.getString("HN");
            strImg = (Bitmap)ImgBitmap.loadBitmap(c.getString("img"));



            if(!strMem.equals(""))
            {
                user_name.setText(strUserName);
                user_pw.setText(strPw);
                img.setImageBitmap(strImg);
            }
            else
            {
                // Dialog
                ad.setTitle("ผิดพลาด! ");
                ad.setIcon(android.R.drawable.ic_menu_close_clear_cancel);
                ad.setPositiveButton("Close", null);
                ad.setMessage("Error ไม่พบบัญชีผู้ใช้นี้");
                ad.show();
            }

        } catch (JSONException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

        ImageView imgBack = (ImageView) findViewById(R.id.imgBack);
        imgBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intentMain = new Intent(Setting_p2.this,Patient.class);
                intentMain.putExtra("userName",MemberID);
                Toast toast = Toast.makeText ( Setting_p2.this, "userName :  =  " + MemberID , Toast.LENGTH_LONG );
                toast.show ( );
                startActivity(intentMain);
            }
        });

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intentMain = new Intent(Setting_p2.this,Setting_p.class);
                intentMain.putExtra("userName",MemberID);
                Toast toast = Toast.makeText ( Setting_p2.this, "userName :  =  " + MemberID , Toast.LENGTH_LONG );
                toast.show ( );
                startActivity(intentMain);

            }
        });

        Button submit = (Button) findViewById(R.id.submit);
        final String finalStrMem = strMem;
        final String finalStrUserName = strUserName;
        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String url = "http://aorair.esy.es/api/Update_PatientProfile.php";

                List<NameValuePair> params = new ArrayList<NameValuePair>();
                params.add(new BasicNameValuePair("HN", finalStrMem));
                params.add(new BasicNameValuePair("userName", user_name.getText().toString()));
                params.add(new BasicNameValuePair("Pw", user_pw.getText().toString()));

                String resultServer  = NetConnect.getHttpPost(url,params);

                /*** Default Value ***/
                String strStatusID = "0";
                String strError = "Unknow Status!";

                JSONObject c;
                try {
                    c = new JSONObject(resultServer);
                    strStatusID = c.getString("StatusID");
                    strError = c.getString("Error");
                } catch (JSONException e) {
                    // TODO Auto-generated catch block
                    e.printStackTrace();
                }

                // Prepare Save Data
                if(strStatusID.equals("0"))
                {
                    ad.setMessage(strError);
                    ad.show();
                }
                else
                {
                    Toast.makeText(Setting_p2.this, "Save Data Successfully", Toast.LENGTH_SHORT).show();
                    Intent intentMain = new Intent(Setting_p2.this,Patient.class);
                    intentMain.putExtra("userName", user_name.getText().toString());
                    Toast toast = Toast.makeText ( Setting_p2.this, "userName :  =  " + user_name.getText().toString() , Toast.LENGTH_LONG );
                    toast.show ( );
                    startActivity(intentMain);

                }

            }
        });

    }

}
