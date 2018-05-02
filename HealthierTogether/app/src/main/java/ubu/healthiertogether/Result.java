package ubu.healthiertogether;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

public class Result extends AppCompatActivity {

    public String no_ID;
    TextView Date;
    Calendar calendar;
    int day ,month ,year;
    Button btn;
    TextView show;
    ImageView image;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_result);

        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        Bundle bundle = getIntent().getExtras();
        final int result9 = bundle.getInt("Value9");

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");
        final String userID = intent.getStringExtra("userID");

        final EditText comment = (EditText)findViewById(R.id.comment);
        final TextView show = (TextView)this.findViewById(R.id.result);
        final ImageView image = (ImageView)findViewById(R.id.img_re);
        final Button btn = (Button) findViewById(R.id.submit);

        final String sequence;

        if(result9 <= 4){
            show.setText("ภาระพึ่งพาโดยสมบูรณ์");
            sequence = "4";
            image.setImageResource(R.drawable.sad);

        }else if(result9 <= 8){
            show.setText("ภาระพึ่งพารุนแรง");
            sequence = "3";
            image.setImageResource(R.drawable.confused);

        }else if(result9 <= 11){
            show.setText("ภาระพึ่งพาปานกลาง");
            sequence = "2";
            image.setImageResource(R.drawable.smiling);
        }else{
            show.setText("ไม่เป็นภาระพึ่งพา");
            image.setImageResource(R.drawable.happy);
            sequence = "1";
        }
        Toast toast = Toast.makeText ( Result.this, "result =  " + sequence +"\n" +
                "HN :  =  " + HN +"\n" +"userID : " + userID, Toast.LENGTH_LONG );
        toast.show ( );

        final TextView howTo = (TextView)this.findViewById(R.id.howTo);

        String url = "http://aorair.esy.es/api/get_Howto.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("sequence", sequence));

        String resultServer  = NetConnect.getHttpPost(url,params);


        String strSequence = "";
        String strResult = "";
        String strHowTo = "";


        JSONObject c;
        try {
            c = new JSONObject(resultServer);
            strSequence = c.getString("sequence");
            strResult = c.getString("result");
            strHowTo = c.getString("subject");

            if(!strSequence.equals(""))
            {
                howTo.setText(strHowTo);
            }
            else
            {
                howTo.setText("error");
            }

        } catch (JSONException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }


        // Perform action on click
        btn.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                if(SaveData())
                {
                    Intent i = new Intent(getApplicationContext(),Personal_user.class);
                    startActivity(i);

                }
            }
        });

        Date = (TextView)findViewById(R.id.Date);
        calendar = Calendar.getInstance();

        day = calendar.get(Calendar.DAY_OF_MONTH);
        month = calendar.get(Calendar.MONTH);
        year = calendar.get(Calendar.YEAR);

        Date.setText(year+"-"+(month+1)+"-"+day);
        Date.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DatePickerDialog datePickerDialog = new DatePickerDialog(Result.this, new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
                        Date.setText(year+"-"+(month+1)+"-"+dayOfMonth);
                    }
                },year ,month,day);
                datePickerDialog.show();
            }
        });


        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();

        if(id == android.R.id.home){
            this.finish();
        }

        return super.onOptionsItemSelected(item);
    }

    public String set_noID(){

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");

        //Search no_id of HN by date present
        String url = "http://aorair.esy.es/api/get_noID.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("sHN", HN));
        String resultServer  = NetConnect.getHttpPost(url,params);

        String strNo_id = "";

        JSONObject c;
        try {
            c = new JSONObject(resultServer);
            strNo_id = c.getString("no_id");

            if(!strNo_id.equals(""))
            {
                int aInt = Integer.parseInt(strNo_id);
                aInt+=1;
                return no_ID = Integer.toString(aInt);
            }
            else
            {
                Toast toast = Toast.makeText ( Result.this, " ผิดพลาด !! " , Toast.LENGTH_LONG );
                toast.show ( );
            }

        } catch (JSONException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }


        return no_ID;
    }


    public boolean SaveData() {
        Bundle bundle = getIntent().getExtras();
        final int result9 = bundle.getInt("Value9");
        final String answer =  Integer.toString(result9);

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");
        final String userID = intent.getStringExtra("userID");

        final EditText comment = (EditText)findViewById(R.id.comment);
        Date = (TextView)findViewById(R.id.Date);


        final String get ;

        if(result9 <= 4){
            get = "ภาระพึ่งพาโดยสมบูรณ์";

        }else if(result9 <= 8){
            get = "ภาระพึ่งพารุนแรง";

        }else if(result9 <= 11){
            get = "ภาระพึ่งพาปานกลาง";
        }else{
            get = "ไม่เป็นภาระพึ่งพา";
        }

        // Dialog
        final AlertDialog.Builder ad = new AlertDialog.Builder(this);

        ad.setTitle("Error! ");
        ad.setIcon(android.R.drawable.btn_star_big_on);
        ad.setPositiveButton("Close", null);

        String url = "http://aorair.esy.es/api/saveAdd_assessment.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("sHN", HN));
        params.add(new BasicNameValuePair("sUserID", userID));
        params.add(new BasicNameValuePair("sResult", get));
        params.add(new BasicNameValuePair("sComment", comment.getText().toString()));
        params.add(new BasicNameValuePair("sDate", Date.getText().toString()));
        params.add(new BasicNameValuePair("sCore", answer));
        params.add(new BasicNameValuePair("sNo_id",set_noID()));


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
            Toast.makeText(Result.this, "Save Data Successfully", Toast.LENGTH_SHORT).show();

        }


        return true;
    }





}
