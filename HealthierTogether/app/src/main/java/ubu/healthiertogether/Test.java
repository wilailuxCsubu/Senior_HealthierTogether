package ubu.healthiertogether;

import android.app.DatePickerDialog;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.DatePicker;
import android.widget.TextView;

import java.util.Calendar;

public class Test extends AppCompatActivity {
   TextView Date;
   Calendar calendar;
   int day ,month ,year;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_test);

        Date = (TextView)findViewById(R.id.Date);
        calendar = Calendar.getInstance();

        day = calendar.get(Calendar.DAY_OF_MONTH);
        month = calendar.get(Calendar.MONTH);
        year = calendar.get(Calendar.YEAR);

//        month = month+1;

        Date.setText(year+"-"+(month+1)+"-"+day);
        Date.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                DatePickerDialog datePickerDialog = new DatePickerDialog(Test.this, new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {
//                        month=month+1;
                        Date.setText(year+"-"+(month+1)+"-"+dayOfMonth);
                    }
                },year ,month,day);
                datePickerDialog.show();
            }
        });

    }

}
