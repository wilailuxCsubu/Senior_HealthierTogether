package ubu.healthiertogether;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

public class MySick extends AppCompatActivity {
    ListView listView;
    List<Costom_item> list_iem = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_sick);

        peparData();

        listView = findViewById(R.id.list_item);

        //Adapter
        ListAdapter adapter = new ListAdapter(MySick.this,list_iem);
        listView.setAdapter(adapter);

        //ClickListener() ไปยังหน้า personal_uer
        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {

            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                Toast.makeText(MySick.this, "Position = "+position, Toast.LENGTH_SHORT).show();

                Intent intent = new Intent(MySick.this,Personal_user.class);
                intent.putExtra("imgUser",list_iem.get(position).getImgId());
                intent.putExtra("Username",list_iem.get(position).getUser_name());

                startActivity(intent);

            }
        });


    }

    public void doBack(View v){
        Intent i = new Intent(getApplicationContext(),MainActivity.class);
        startActivity(i);


    }



    private void peparData() {
        int imgID[] = {
                R.drawable.user1,
                R.drawable.user2,
                R.drawable.user3,
                R.drawable.user4,
                R.drawable.user5,
                R.drawable.user6,
                R.drawable.user7,
                R.drawable.user8,
                R.drawable.user9,
                R.drawable.user10
                };

        String User_name[] ={
                "นางสมศรี  สุขใจ",
                "นางวิภาพร  งามเทพ",
                "นายสมยศ  สาทร",
                "นายวิทยา  ทวยพร",
                "นางเรียนดี  ได้ดี",
                "นายประสงค์  ชอบธรรม",
                "นาชชาติ  เชื้อไท",
                "นายพงคำ  ตุลา",
                "นายไพรบูรณ์  สายธาร",
                "นางสมหญิง  ดวงดี"
                };

        for (int i=0 ; i<imgID.length ; i++){
            Costom_item list = new Costom_item(imgID[i],User_name[i]);
            list_iem.add(list);
        }
    }
}
