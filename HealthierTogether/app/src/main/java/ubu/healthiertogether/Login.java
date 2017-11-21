package ubu.healthiertogether;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class Login extends AppCompatActivity {

    EditText userID,Pw;
    Button btn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        userID = (EditText)findViewById(R.id.userID);
        Pw = (EditText)findViewById(R.id.userPw);
        btn = (Button)findViewById(R.id.submit);

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (userID.getText().toString().equals("aorair")&& Pw.getText().toString().equals("1234")){
                    Intent B1 = new Intent(Login.this,MainActivity.class);
                    startActivity(B1);
                }else {
                    Toast.makeText(getApplicationContext(),"รหัสผ่านไม่ถูกต้อง",Toast.LENGTH_LONG).show();
                }
            }
        });
    }
}
