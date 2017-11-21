package ubu.healthiertogether;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

public class MenuMap extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_map);
    }

    public void ToMap(View v){
        Intent i = new Intent(getApplicationContext(),MapsActivity.class);
        startActivity(i);


    }

    public void ToMapList(View v){
        Intent i = new Intent(getApplicationContext(),MapList.class);
        startActivity(i);


    }
}
