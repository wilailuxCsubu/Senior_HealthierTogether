package ubu.healthiertogether;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ImageView;
import android.widget.ListView;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class MySick extends AppCompatActivity {
    public static final int dialogJNON = 0;
    public static final int DIALOG_DOWNLOAD_FULL_PHOTO_PROGRESS = 1;
    private ProgressDialog mProgressDialog;
    ArrayList<HashMap<String, Object>> MyArrList;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_sick);

        Intent intent= getIntent();
        final String userID = intent.getStringExtra("userID");

        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        // Download JSON File
        new DownloadJSON().execute();

        ImageView imgBack = (ImageView) findViewById(R.id.imgBack);
        imgBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intentMain = new Intent(MySick.this,MainActivity.class);
                intentMain.putExtra("userID",userID);
                startActivity(intentMain);
            }
        });
    }

    @Override
    protected Dialog onCreateDialog(int id) {
        switch (id) {
            case dialogJNON:
                mProgressDialog = new ProgressDialog(this);
                mProgressDialog.setMessage("Downloading.....");
                mProgressDialog.setProgressStyle(ProgressDialog.STYLE_SPINNER);
                mProgressDialog.setCancelable(true);
                mProgressDialog.show();
                return mProgressDialog;
            case DIALOG_DOWNLOAD_FULL_PHOTO_PROGRESS:
                mProgressDialog = new ProgressDialog(this);
                mProgressDialog.setMessage("Downloading.....");
                mProgressDialog.setProgressStyle(ProgressDialog.STYLE_SPINNER);
                mProgressDialog.setCancelable(true);
                mProgressDialog.show();
                return mProgressDialog;
            default:
                return null;
        }
    }
    // Show All Content
    public void ShowAllContent()
    {
        // listView1
        final ListView lstView1 = (ListView)findViewById(R.id.listView1);
        lstView1.setAdapter(new dataAdapter(MySick.this,MyArrList));
        // OnClick
        lstView1.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v,
                                    int position, long id) {
                String strHN = MyArrList.get(position).get("HN").toString();
                String struserID = MyArrList.get(position).get("userID").toString();

                Intent newActivity = new Intent(MySick.this,Personal_user.class);
                newActivity.putExtra("HN", strHN);
                newActivity.putExtra("userID", struserID);
                startActivity(newActivity);
            }
        });
    }
    // Download JSON in Background
    public class DownloadJSON extends AsyncTask<String, Void, Void> {
        protected void onPreExecute() {
            super.onPreExecute();
            showDialog(dialogJNON);
        }
        @Override
        protected Void doInBackground(String... params) {
            // TODO Auto-generated method stub
            Intent intent= getIntent();
            final String MemberID = intent.getStringExtra("userID");
            String url = "http://aorair.esy.es/api/get_sicklist.php";

            List<NameValuePair> param = new ArrayList<NameValuePair>();
            param.add(new BasicNameValuePair("MemberID", MemberID));
            String resultServer  = NetConnect.getHttpPost(url,param);
            JSONArray data;
            try {
                data = new JSONArray(resultServer);
                MyArrList = new ArrayList<HashMap<String, Object>>();
                HashMap<String, Object> map;
                for(int i = 0; i < data.length(); i++){
                    JSONObject c = data.getJSONObject(i);
                    map = new HashMap<String, Object>();
                    map.put("Name", (String)c.getString("Name"));
                    map.put("no_id", (String)c.getString("no_id"));
                    map.put("date_n", (String)c.getString("date_n"));
                    map.put("HN", (String)c.getString("HN"));
                    map.put("userID", (String)c.getString("userID"));

                    map.put("img", (Bitmap)ImgBitmap.loadBitmap(c.getString("img")));
                    MyArrList.add(map);
                }
            } catch (JSONException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
            return null;
        }
        protected void onPostExecute(Void unused) {
            ShowAllContent(); // When Finish Show Content
            dismissDialog(dialogJNON);
            removeDialog(dialogJNON);
        }
    }
}
