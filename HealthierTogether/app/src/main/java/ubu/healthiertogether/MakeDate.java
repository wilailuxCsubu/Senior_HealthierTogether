package ubu.healthiertogether;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.view.LayoutInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class MakeDate extends AppCompatActivity {

    public static final int DIALOG_DOWNLOAD_JSON_PROGRESS = 0;
    public static final int DIALOG_DOWNLOAD_FULL_PHOTO_PROGRESS = 1;
    private ProgressDialog mProgressDialog;

    ArrayList<HashMap<String, Object>> MyArrList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_make_date);

        // Permission StrictMode
        if (android.os.Build.VERSION.SDK_INT > 9) {
            StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
            StrictMode.setThreadPolicy(policy);
        }

        // Download JSON File
        new DownloadJSONFileAsync().execute();

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

    @Override
    protected Dialog onCreateDialog(int id) {
        switch (id) {
            case DIALOG_DOWNLOAD_JSON_PROGRESS:
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
        final ListView lstView1 = (ListView)findViewById(R.id.listDate);
        lstView1.setAdapter(new ImageAdapter(MakeDate.this,MyArrList));

//        // OnClick
//        lstView1.setOnItemClickListener(new AdapterView.OnItemClickListener() {
//            public void onItemClick(AdapterView<?> parent, View v,
//                                    int position, long id) {
////                String strName = MyArrList.get(position).get("Name").toString();
////                String strImage = MyArrList.get(position).get("img2").toString();
////                String strAge = MyArrList.get(position).get("age").toString();
////                String strResult = MyArrList.get(position).get("result").toString();
//                String strHN = MyArrList.get(position).get("HN").toString();
////                String struserID = MyArrList.get(position).get("userID").toString();
//
//                Intent newActivity = new Intent(MakeDate.this,Personal_user.class);
////                newActivity.putExtra("Name", strName);
////                newActivity.putExtra("img", strImage);
////                newActivity.putExtra("age", strAge);
////                newActivity.putExtra("result", strResult);
//                newActivity.putExtra("HN", strHN);
////                newActivity.putExtra("userID", struserID);
//                startActivity(newActivity);
//            }
//        });

    }

    public class ImageAdapter extends BaseAdapter
    {
        private Context context;
        private ArrayList<HashMap<String, Object>> MyArr = new ArrayList<HashMap<String, Object>>();

        public ImageAdapter(Context c, ArrayList<HashMap<String, Object>> myArrList)
        {
            // TODO Auto-generated method stub
            context = c;
            MyArr = myArrList;
        }

        public int getCount() {
            // TODO Auto-generated method stub
            return MyArr.size();
        }

        public Object getItem(int position) {
            // TODO Auto-generated method stub
            return position;
        }

        public long getItemId(int position) {
            // TODO Auto-generated method stub
            return position;
        }
        public View getView(int position, View convertView, ViewGroup parent) {
            // TODO Auto-generated method stub

            LayoutInflater inflater = (LayoutInflater) context
                    .getSystemService(Context.LAYOUT_INFLATER_SERVICE);


            if (convertView == null) {
                convertView = inflater.inflate(R.layout.costom_date, null);
            }

            // ColImage
            ImageView imageView = (ImageView) convertView.findViewById(R.id.img);
            imageView.setScaleType(ImageView.ScaleType.CENTER_CROP);
            try
            {
                imageView.setImageBitmap((Bitmap)MyArr.get(position).get("img"));
            } catch (Exception e) {
                // When Error
                imageView.setImageResource(android.R.drawable.ic_menu_report_image);
            }



            // ColImgName
            TextView txtPicName = (TextView) convertView.findViewById(R.id.nameHN);
            txtPicName.setText(MyArr.get(position).get("name").toString());

            TextView Date = (TextView) convertView.findViewById(R.id.date_no);
            Date.setText(MyArr.get(position).get("date").toString());


            return convertView;

        }

    }

    // Download JSON in Background
    public class DownloadJSONFileAsync extends AsyncTask<String, Void, Void> {

        protected void onPreExecute() {
            super.onPreExecute();
            showDialog(DIALOG_DOWNLOAD_JSON_PROGRESS);
        }

        @Override
        protected Void doInBackground(String... params) {
            // TODO Auto-generated method stub

            Intent intent= getIntent();
            final String MemberID = intent.getStringExtra("userID");

            String url = "http://aorair.esy.es/api/get_listDate.php";

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

                    map.put("name", (String)c.getString("name"));
                    map.put("date", (String)c.getString("date"));
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
            dismissDialog(DIALOG_DOWNLOAD_JSON_PROGRESS);
            removeDialog(DIALOG_DOWNLOAD_JSON_PROGRESS);
        }
    }


}
