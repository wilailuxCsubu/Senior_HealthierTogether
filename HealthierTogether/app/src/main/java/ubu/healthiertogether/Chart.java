package ubu.healthiertogether;

import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Color;
import android.os.Build;
import android.os.Bundle;
import android.support.annotation.RequiresApi;
import android.support.v4.content.res.ResourcesCompat;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;

import com.github.mikephil.charting.charts.BarChart;
import com.github.mikephil.charting.components.XAxis;
import com.github.mikephil.charting.components.YAxis;
import com.github.mikephil.charting.data.BarData;
import com.github.mikephil.charting.data.BarDataSet;
import com.github.mikephil.charting.data.BarEntry;
import com.github.mikephil.charting.utils.LargeValueFormatter;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Chart extends AppCompatActivity {
    private ProgressDialog pd;

    ArrayList<BarDataSet> dataSets;
    ArrayList<BarEntry> yEntity;
    ArrayList<String> xEntity;
    BarEntry values ;
    BarChart chart;

    BarData data;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chart);

        pd = new ProgressDialog(Chart.this);
        pd.setMessage("loading");


        // Log.d("array",Arrays.toString(fullData));
        chart = (BarChart) findViewById(R.id.chart);
        load_data_from_server();

//        Log.d("yValues01", String.valueOf(yEntity));
    }



    @RequiresApi(api = Build.VERSION_CODES.JELLY_BEAN_MR1)
    public void load_data_from_server() { //อ่านข้อมูลจาก json ยัดลงใน Entity
        pd.show();
        String url = "http://aorair.esy.es/api/get_Chart.php";
        xEntity = new ArrayList<>();
        dataSets = null;
        yEntity = new ArrayList<>();

        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("MemberID", HN));

        String resultServer  = NetConnect.getHttpPost(url,params);

        try {

            JSONArray jsonarray = new JSONArray(resultServer);

            for(int i=0; i < jsonarray.length(); i++) {

                JSONObject jsonobject = jsonarray.getJSONObject(i);

                String score = jsonobject.getString("score").trim();
                String name = jsonobject.getString("no_id").trim();

                xEntity.add(name);
//                Log.d("xAxis1", String.valueOf(xAxis1));

                values = new BarEntry(Integer.valueOf(score),i);
                yEntity.add(values);

//                Log.d("arrayValues", String.valueOf(values));

//                Log.d("arrayYValues", String.valueOf(yValues));
//                 Log.d("array", Arrays.toString(new int[]{s}));
            }

        } catch (JSONException e) {
            e.printStackTrace();


        }


        MyBarDataSet barDataSet1 = new MyBarDataSet(yEntity, ""); //MyBarDataSet.java
        barDataSet1.setColors(new int[]{
                ResourcesCompat.getColor(getResources(), R.color.red,null),
                ResourcesCompat.getColor(getResources(), R.color.orange,null),
                ResourcesCompat.getColor(getResources(), R.color.yellow ,null),
                ResourcesCompat.getColor(getResources(), R.color.green, null)});
        dataSets = new ArrayList<>();
        dataSets.add(barDataSet1);

        String names[]= xEntity.toArray(new String[xEntity.size()]);
//        Log.d("xAxis1_name", Arrays.toString(names));

        barDataSet1.setValueTextSize(20);

//        Log.d("arrayYAxis", String.valueOf(yAxis));
//        Log.d("arrayyValues", String.valueOf(yEntity));
//        Log.d("arraybarDataSet1", String.valueOf(barDataSet1));


        data = new BarData(names,dataSets); //dataSets
        chart.setData(data);
        chart.setDescription("");
        chart.animateXY(2000, 2000);

        chart.getLegend().setEnabled(false);//ไม่แสดง พวกอ

        chart.getXAxis().setPosition(XAxis.XAxisPosition.BOTTOM);
//        chart.getXAxis().setPosition(XAxis.XAxisPosition.valueOf("####"));
        chart.invalidate();

        YAxis RightAxis = chart.getAxisRight(); //ไม่แสดงเลขด้านขวา
        RightAxis.setEnabled(false);


        XAxis xAxis = chart.getXAxis();

        xAxis.setTextSize(20f);
        xAxis.setTextColor(Color.BLUE);
        xAxis.setDrawAxisLine(true);
        xAxis.setDrawGridLines(false);

        YAxis leftAxis = chart.getAxisLeft();
        leftAxis.setValueFormatter(new LargeValueFormatter());
        leftAxis.setDrawGridLines(true);
//        leftAxis.setSpaceTop(5f);
        leftAxis.setAxisMaxValue(21);
        leftAxis.setTextSize(20);
        leftAxis.setTextColor(Color.BLUE);


        pd.hide();

    }



}
