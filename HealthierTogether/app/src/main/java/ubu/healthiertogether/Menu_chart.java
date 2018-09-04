package ubu.healthiertogether;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.MenuItem;
import android.view.View;

public class Menu_chart extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_chart);

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

    public void barChart(View v){
        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");

        Intent i = new Intent(getApplicationContext(),Chart.class);
        i.putExtra("HN",HN);
        startActivity(i);
    }

    public void listChart(View v){
        Intent intent= getIntent();
        final String HN = intent.getStringExtra("HN");

        Intent i = new Intent(getApplicationContext(),Chart_list.class);
        i.putExtra("HN",HN);
        startActivity(i);
    }
}
