package ubu.healthiertogether;

import android.content.Intent;
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

public class Patient_history6 extends AppCompatActivity {

    ImageView btnShowLocation;
//    TextView txtLocation;
    TextView txtLat ,txtLong;
    GPSTracker gps;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient_history6);

        btnShowLocation = (ImageView) findViewById(R.id.btnGetLocation);
        txtLat = (TextView) findViewById(R.id.Lat);
        txtLong = (TextView) findViewById(R.id.Long);

        Intent intent= getIntent();
        final String MemberID = intent.getStringExtra("HN");

        btnShowLocation.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {

                gps = new GPSTracker(Patient_history6.this);

                if(gps.canGetLocation()){

                    double latitude = gps.getLatitude();
                    double longitude = gps.getLongitude();

                    txtLat.setText(""+latitude);
                    txtLong.setText(""+longitude);

//                    txtLocation.setText("ตำแหน่งปัจจุบัน คือ  \nLat: " + latitude + "\nLong: " + longitude);

                }else{
//                    txtLocation.setText("อุปกรณ์์ของคุณ ปิด GPS");
                    Toast.makeText(Patient_history6.this, "อุปกรณ์์ของคุณ ปิด GPS", Toast.LENGTH_SHORT).show();
                }

            }
        });

        String url = "http://aorair.esy.es/api/get_historyP.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("MemberID", MemberID));

        String resultServer  = NetConnect.getHttpPost(url,params);

        String HN = "";
        String strLat = "";
        String strLong = "";
        String userID = "";



        JSONObject c;
        try {
            c = new JSONObject(resultServer);
            HN = c.getString("HN");
            strLat = c.getString("Latitude");
            strLong = c.getString("Longitude");
            userID = c.getString("userID");



            if(!HN.equals("")) {

                txtLat.setText(strLat);
                txtLong.setText(strLong);

//                txtLocation.setText(strLat +" , "+ strLong);
            }
            else {
                Toast.makeText(Patient_history6.this, "error or not status", Toast.LENGTH_SHORT).show();
            }

        } catch (JSONException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

        final Button btn = (Button) findViewById(R.id.submit);
        final String finalUserID = userID;
        btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                if(SaveData())
                {
                    Intent intent = new Intent(Patient_history6.this, Personal_user.class);
                    intent.putExtra("HN",MemberID);
                    intent.putExtra("userID", finalUserID);
                    startActivity(intent);

                }
            }
        });

    }

    public boolean SaveData() {

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");

        txtLat = (TextView) findViewById(R.id.Lat);
        txtLong = (TextView) findViewById(R.id.Long);

        // Dialog
        final AlertDialog.Builder ad = new AlertDialog.Builder(this);

        ad.setTitle("Error! ");
        ad.setIcon(android.R.drawable.btn_star_big_on);
        ad.setPositiveButton("Close", null);

        String url = "http://aorair.esy.es/api/Update_historyP_Location.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("sHN", HN));
        params.add(new BasicNameValuePair("Lat", txtLat.getText().toString()));
        params.add(new BasicNameValuePair("Long",txtLong.getText().toString()));


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
            Toast.makeText(Patient_history6.this, "Save Data Successfully", Toast.LENGTH_SHORT).show();

        }


        return true;
    }





}
