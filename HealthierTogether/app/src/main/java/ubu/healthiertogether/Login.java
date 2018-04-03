package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Login extends AppCompatActivity {

    EditText userID,Pw;
    Button btn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        final AlertDialog.Builder ad = new AlertDialog.Builder(this);

        userID = (EditText)findViewById(R.id.userID);
        Pw = (EditText)findViewById(R.id.userPw);
        btn = (Button)findViewById(R.id.submit);

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String url = "http://aorair.esy.es/api/checkLogin_n.php";
                List<NameValuePair> params = new ArrayList<NameValuePair>();
                params.add(new BasicNameValuePair("strUser", userID.getText().toString()));
                params.add(new BasicNameValuePair("strPass", Pw.getText().toString()));

                String resultServer  = NetConnect.getHttpPost(url,params);

                /*** Default Value ***/
                String strStatusID = "0";
                String strMemberID = "0";
                String strType = "";
                String strError = "ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง!";

                JSONObject c;
                try {
                    c = new JSONObject(resultServer);
                    strStatusID = c.getString("StatusID");
                    strMemberID = c.getString("MemberID");
                    strError = c.getString("Error");
                    strType = c.getString("type");

                } catch (JSONException e) {
                    // TODO Auto-generated catch block
                    e.printStackTrace();
                }

                // Prepare Login
                if(strStatusID.equals("0"))
                {
                    // Dialog
                    ad.setTitle("ผิดพลาด! ");
                    ad.setIcon(android.R.drawable.ic_menu_close_clear_cancel);
                    ad.setPositiveButton("Close", null);
                    ad.setMessage(strError);
                    ad.show();
                    userID.setText("");
                    Pw.setText("");
                }
                if(strType.equals("authorities"))
                {
//                    Toast.makeText(Login.this, "Login OK " + strMemberID, Toast.LENGTH_SHORT).show();
                    Intent intentMain = new Intent(Login.this,MainActivity.class);
                    intentMain.putExtra("MemberID", strMemberID);
                    startActivity(intentMain);

//                    Intent intent_homeass = new Intent(Login.this,MainActivity.class);
//                    intent_homeass.putExtra("MemberID", strMemberID);
//                    startActivity(intent_homeass);

                }
                if(strType.equals("patient"))
                {
//                    Toast.makeText(Login.this, "Login OK " + strMemberID, Toast.LENGTH_SHORT).show();
                    Intent intentMain = new Intent(Login.this,Patient.class);
                    intentMain.putExtra("MemberID", strMemberID);
                    startActivity(intentMain);

//                    Intent intent_homeass = new Intent(Login.this,MainActivity.class);
//                    intent_homeass.putExtra("MemberID", strMemberID);
//                    startActivity(intent_homeass);

                }




            }
        });
    }




}
