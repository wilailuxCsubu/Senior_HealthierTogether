package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.MenuItem;
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

public class Patient_history5 extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient_history5);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);

        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        Intent intent= getIntent();
        final String MemberID = intent.getStringExtra("HN");

        final EditText food = (EditText)findViewById(R.id.Food);
        final EditText sfood = (EditText)findViewById(R.id.sFood);
        final EditText Rx = (EditText)findViewById(R.id.Rx);
        final EditText sRx = (EditText)findViewById(R.id.sRx);

        String url = "http://aorair.esy.es/api/get_historyPallergy.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("MemberID", MemberID));

        String resultServer  = NetConnect.getHttpPost(url,params);

        String HN = "";
        String strfood = "";
        String strSfood = "";
        String strRx = "";
        String strSRx = "";


        JSONObject c;
        try {
            c = new JSONObject(resultServer);
            HN = c.getString("HN");
            strfood = c.getString("food");
            strRx = c.getString("Rx");
            strSfood = c.getString("symptomF");
            strSRx = c.getString("symptomR");



            if(!HN.equals("")) {

                food.setText(strfood);
                sfood.setText(strSfood);
                Rx.setText(strRx);
                sRx.setText(strSRx);

            }
            else {
                Toast.makeText(Patient_history5.this, "error or not status", Toast.LENGTH_SHORT).show();
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
                    Intent intent = new Intent(Patient_history5.this, Patient_history6.class);
                    intent.putExtra("HN",MemberID);
                    startActivity(intent);

                }
            }
        });
    }

    public boolean SaveData() {

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");

        final EditText food = (EditText)findViewById(R.id.Food);
        final EditText sfood = (EditText)findViewById(R.id.sFood);
        final EditText Rx = (EditText)findViewById(R.id.Rx);
        final EditText sRx = (EditText)findViewById(R.id.sRx);

        // Dialog
        final AlertDialog.Builder ad = new AlertDialog.Builder(this);

        ad.setTitle("Error! ");
        ad.setIcon(android.R.drawable.btn_star_big_on);
        ad.setPositiveButton("Close", null);

        String url = "http://aorair.esy.es/api/Update_historyP_allergy.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("sHN", HN));
        params.add(new BasicNameValuePair("food", food.getText().toString()));
        params.add(new BasicNameValuePair("Rx", Rx.getText().toString()));
        params.add(new BasicNameValuePair("symptomF", sfood.getText().toString()));
        params.add(new BasicNameValuePair("symptomR", sRx.getText().toString()));

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
            Toast.makeText(Patient_history5.this, "Save Data Successfully", Toast.LENGTH_SHORT).show();

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
