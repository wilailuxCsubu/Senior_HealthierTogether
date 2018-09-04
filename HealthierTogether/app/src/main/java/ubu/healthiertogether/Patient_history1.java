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

public class Patient_history1 extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient_history1);

//        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
//        getSupportActionBar().setDisplayShowHomeEnabled(true);

        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        final EditText HN = (EditText)findViewById(R.id.num_HN);
        final EditText name = (EditText)findViewById(R.id.name);
        final EditText last = (EditText)findViewById(R.id.last);
        final EditText age = (EditText)findViewById(R.id.age);
        final EditText address = (EditText)findViewById(R.id.address);

        final EditText idG = (EditText)findViewById(R.id.genoID);
//        idG.setVisibility(View.VISIBLE);

        Intent intent= getIntent();
        final String MemberID = intent.getStringExtra("HN");

        String url = "http://aorair.esy.es/api/get_historyP.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("MemberID", MemberID));

        String resultServer  = NetConnect.getHttpPost(url,params);

        String IdGeno = "";
        String Date = "";
        String HN_no = "";
        String Name = "";
        String Last = "";
        String Age = "";
        String Address = "";


        JSONObject c;
        try {
            c = new JSONObject(resultServer);
            IdGeno = c.getString("IdGeno");
            Date = c.getString("Date");
            HN_no = c.getString("HN");
            Name = c.getString("Name");
            Last = c.getString("Last");
            Age = c.getString("age");
            Address = c.getString("address");



            if(!HN_no.equals(""))
            {
                Toast.makeText(Patient_history1.this, "ID Geno : "+IdGeno, Toast.LENGTH_SHORT).show();
                HN.setText(HN_no);
                name.setText(Name);
                last.setText(Last);
                age.setText(Age);
                address.setText(Address);
                idG.setText(IdGeno);
                HN.setEnabled ( false );

            }
            else
            {
                name.setText("error");
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
                    Intent intent = new Intent(Patient_history1.this, Patient_history2.class);
                    intent.putExtra("HN",MemberID);
                    startActivity(intent);

                }
            }
        });


    }


    public boolean SaveData() {

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");

        final EditText name = (EditText)findViewById(R.id.name);
        final EditText last = (EditText)findViewById(R.id.last);
        final EditText age = (EditText)findViewById(R.id.age);
        final EditText address = (EditText)findViewById(R.id.address);
        final EditText idG = (EditText)findViewById(R.id.genoID);

        // Dialog
        final AlertDialog.Builder ad = new AlertDialog.Builder(this);

        ad.setTitle("Error! ");
        ad.setIcon(android.R.drawable.btn_star_big_on);
        ad.setPositiveButton("Close", null);

        String url = "http://aorair.esy.es/api/Update_historyP.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("sHN", HN));
        params.add(new BasicNameValuePair("sName", name.getText().toString()));
        params.add(new BasicNameValuePair("sLast", last.getText().toString()));
        params.add(new BasicNameValuePair("sAge", age.getText().toString()));
        params.add(new BasicNameValuePair("sAddress", address.getText().toString()));
        params.add(new BasicNameValuePair("genoID", idG.getText().toString()));


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
            Toast.makeText(Patient_history1.this, "Save Data Successfully", Toast.LENGTH_SHORT).show();

        }


        return true;
    }




//    @Override
//    public boolean onOptionsItemSelected(MenuItem item) {
//        int id = item.getItemId();
//
//        if(id == android.R.id.home){
//            this.finish();
//        }
//
//        return super.onOptionsItemSelected(item);
//    }

}
