package ubu.healthiertogether;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

public class Personal_user extends AppCompatActivity {
    private ImageView image_user;
    private TextView text_user ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_personal_user);

        image_user = (ImageView) findViewById(R.id.image_user);
        text_user = (TextView) findViewById(R.id.text_user);

        int imgID = getIntent().getIntExtra("imgUser",0);
        String User_name = getIntent().getStringExtra("Username");

        image_user.setImageResource(imgID);
        text_user.setText(User_name);
    }



    public void nextHis(View v){
        Intent i = new Intent(getApplicationContext(),Patient_history1.class);
        startActivity(i);


    }

    public void homeAss(View v){
        Intent i = new Intent(getApplicationContext(),Home_assessment.class);
        startActivity(i);


    }
}
