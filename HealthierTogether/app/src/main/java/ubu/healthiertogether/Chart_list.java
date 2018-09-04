package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.view.MenuItem;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.Toast;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class Chart_list extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chart_list);

        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        // Download JSON File
//        new DownloadJSONFileAsync().execute();

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);



        Intent intent= getIntent();
        final String MemberID = intent.getStringExtra("HN");
        Toast.makeText(Chart_list.this, "ID : " + MemberID, Toast.LENGTH_SHORT).show();

        String url = "http://aorair.esy.es/api/get_Chart.php";

        final ListView listViewMovies = (ListView)findViewById(R.id.listChart);

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("MemberID", MemberID));

        try {
            JSONArray data = new JSONArray(NetConnect.getHttpPost(url,params));

            final ArrayList<HashMap<String, String>> MyArrList = new ArrayList<HashMap<String, String>>();
            HashMap<String, String> map;

            for(int i = 0; i < data.length(); i++){
                JSONObject c = data.getJSONObject(i);

                map = new HashMap<String, String>();

                map.put("no_id", c.getString("no_id"));
                map.put("date_n", c.getString("date_n"));
                map.put("result", c.getString("result"));
                map.put("note", c.getString("note"));

                MyArrList.add(map);


            }


            SimpleAdapter simpleAdapterData;
            simpleAdapterData = new SimpleAdapter(Chart_list.this, MyArrList, R.layout.costom_chart_list,
                    new String[] {"no_id", "date_n", "result", "note"}, new int[] {R.id.No, R.id.date_re, R.id.result_no, R.id.comment_re});
            listViewMovies.setAdapter(simpleAdapterData);
        } catch (JSONException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

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
