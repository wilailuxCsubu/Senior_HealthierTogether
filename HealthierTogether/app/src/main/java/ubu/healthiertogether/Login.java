package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Login extends AppCompatActivity {

    EditText userName,Pw;
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

        userName = (EditText)findViewById(R.id.userName);
        Pw = (EditText)findViewById(R.id.userPw);
        btn = (Button)findViewById(R.id.submit);

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String url = "http://aorair.esy.es/api/checkLogin_n.php";
                List<NameValuePair> params = new ArrayList<NameValuePair>();
                params.add(new BasicNameValuePair("strUser", userName.getText().toString()));
                params.add(new BasicNameValuePair("strPass", Pw.getText().toString()));

                String resultServer  = NetConnect.getHttpPost(url,params);

                /*** Default Value ***/
                String strStatusID = "0";
                String strMemberID = "0";
                String strType = "";
                String strError = "ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง!";
                String strUserID = "";

                JSONObject c;
                try {
                    c = new JSONObject(resultServer);
                    strStatusID = c.getString("StatusID");
                    strMemberID = c.getString("MemberID");
                    strError = c.getString("Error");
                    strType = c.getString("type");
                    strUserID = c.getString("userID");

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
                    userName.setText("");
                    Pw.setText("");
                }
                if(strType.equals("authorities"))
                {
                    Intent intentMain = new Intent(Login.this,MainActivity.class);
                    intentMain.putExtra("userID", strUserID);
                    startActivity(intentMain);
//                    // Dialog
//                    ad.setTitle("ผิดพลาด! ");
//                    ad.setIcon(android.R.drawable.ic_menu_close_clear_cancel);
//                    ad.setPositiveButton("Close", null);
//                    ad.setMessage(strError+ ":" + strUserID);
//                    ad.show();


                }
                if(strType.equals("patient"))
                {
                    Intent intentMain = new Intent(Login.this,Patient.class);
                    intentMain.putExtra("userName", strMemberID);
                    Toast toast = Toast.makeText ( Login.this, "userName :  =  " + strMemberID , Toast.LENGTH_LONG );
                    toast.show ( );
                    startActivity(intentMain);


                }




            }
        });
    }




}
