package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.Toast;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Patient_history3 extends AppCompatActivity {

    public String Chk_status;
    RadioButton ch01,ch02,ch03,ch04;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient_history3);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);

        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        Intent intent= getIntent();
        final String MemberID = intent.getStringExtra("HN");

        ch01 = (RadioButton)findViewById(R.id.ch01);
        ch02 = (RadioButton)findViewById(R.id.ch02);
        ch03 = (RadioButton)findViewById(R.id.ch03);
        ch04 = (RadioButton)findViewById(R.id.ch04);

        String url = "http://aorair.esy.es/api/get_historyP.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("MemberID", MemberID));

        String resultServer  = NetConnect.getHttpPost(url,params);

        String Occupation = "";


        JSONObject c;
        try {
            c = new JSONObject(resultServer);
//
            Occupation = c.getString("occupation");



            if(!Occupation.equals("")) {
                if(Occupation.equals("ทำนา")){
                    ch01.setChecked(true);
                }else if(Occupation.equals("ค้าขาย")){
                    ch02.setChecked(true);
                }else if(Occupation.equals("รับจ้าง")){
                    ch03.setChecked(true);
                }else if(Occupation.equals("รับราชการ")){
                    ch04.setChecked(true);
                }

            }
            else {
                Toast.makeText(Patient_history3.this, "error or not status", Toast.LENGTH_SHORT).show();
            }

        } catch (JSONException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

        final Button btn = (Button) findViewById(R.id.submit);
        btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                if(SaveData())
                {
                    Intent intent = new Intent(Patient_history3.this, Patient_history4.class);
                    intent.putExtra("HN",MemberID);
                    startActivity(intent);

                }
            }
        });

    }

    public String set_status(){

        if(ch01.isChecked()){
            Chk_status = "ทำนา";
        }else if(ch02.isChecked()){
            Chk_status = "ค้าขาย";
        }else if(ch03.isChecked()){
            Chk_status = "รับจ้าง";
        }else if(ch04.isChecked()){
            Chk_status = "รับราชการ";
        }

        return Chk_status;
    }



    public boolean SaveData() {

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");

        // Dialog
        final AlertDialog.Builder ad = new AlertDialog.Builder(this);

        ad.setTitle("Error! ");
        ad.setIcon(android.R.drawable.btn_star_big_on);
        ad.setPositiveButton("Close", null);

        String url = "http://aorair.esy.es/api/Update_historyP_occupation.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("sHN", HN));
        params.add(new BasicNameValuePair("status", set_status()));

        String resultServer  = NetConnect.getHttpPost(url,params);

        /*** Default Value ***/
        String strStatusID = "0";
        String strError = "ไม่สำเร็จ เกิดข้อผิดพลาด!";

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
            Toast.makeText(Patient_history3.this, "Save Data Successfully", Toast.LENGTH_SHORT).show();

        }


        return true;
    }


    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();

        if(id == android.R.id.home){
            this.finish();
        }

        return super.onOptionsItemSelected(item);
    }

}
