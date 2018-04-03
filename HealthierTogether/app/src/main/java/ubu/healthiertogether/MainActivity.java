package ubu.healthiertogether;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.CardView;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.BufferedOutputStream;
import java.io.ByteArrayOutputStream;
import java.io.Closeable;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

public class MainActivity extends AppCompatActivity {

    CardView b1,b2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Intent intent= getIntent();
        final String MemberID = intent.getStringExtra("MemberID");

        Toast.makeText(MainActivity.this, "ID : " + MemberID, Toast.LENGTH_SHORT).show();


        b1 = (CardView) findViewById(R.id.p_sick);
        b2 = (CardView) findViewById(R.id.p_reprot);

        final ImageView img = (ImageView)findViewById(R.id.imgUser);
        final TextView name = (TextView)findViewById(R.id.nameUser);

        String url = "http://aorair.esy.es/api/get_ByMemberID.php";

        List<NameValuePair> params = new ArrayList<NameValuePair>();
        params.add(new BasicNameValuePair("MemberID", MemberID));

        String resultServer  = NetConnect.getHttpPost(url,params);


        String strID = "";
        Bitmap strImg ;
        String strName = "";


        JSONObject c;
        try {
            c = new JSONObject(resultServer);
            strID = c.getString("userID");
            strName = c.getString("name_a");
            strImg = (Bitmap)loadBitmap(c.getString("Img"));


            if(!strID.equals(""))
            {
                name.setText(strName);
                img.setImageBitmap(strImg);
            }
            else
            {
                name.setText("error");
            }

        } catch (JSONException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }


        final String finalStrID = strID;
        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intentMain = new Intent(MainActivity.this,MySick.class);
                intentMain.putExtra("userID", finalStrID);

                startActivity(intentMain);

//                Toast toast = Toast.makeText ( MainActivity.this, "userID :  =  " + finalStrID , Toast.LENGTH_LONG );
//                 toast.show ( );

            }
        });

    }
    /***** Get Image Resource from URL (Start) *****/
    private static final String TAG = "Image";
    private static final int IO_BUFFER_SIZE = 4 * 1024;
    public static Bitmap loadBitmap(String url) {
        Bitmap bitmap = null;
        InputStream in = null;
        BufferedOutputStream out = null;

        try {
            in = new BufferedInputStream(new URL(url).openStream(), IO_BUFFER_SIZE);

            final ByteArrayOutputStream dataStream = new ByteArrayOutputStream();
            out = new BufferedOutputStream(dataStream, IO_BUFFER_SIZE);
            copy(in, out);
            out.flush();

            final byte[] data = dataStream.toByteArray();
            BitmapFactory.Options options = new BitmapFactory.Options();
            //options.inSampleSize = 1;

            bitmap = BitmapFactory.decodeByteArray(data, 0, data.length,options);
        } catch (IOException e) {
            Log.e(TAG, "Could not load Bitmap from: " + url);
        } finally {
            closeStream(in);
            closeStream(out);
        }

        return bitmap;
    }

    private static void closeStream(Closeable stream) {
        if (stream != null) {
            try {
                stream.close();
            } catch (IOException e) {
                android.util.Log.e(TAG, "Could not close stream", e);
            }
        }
    }

    private static void copy(InputStream in, OutputStream out) throws IOException {
        byte[] b = new byte[IO_BUFFER_SIZE];
        int read;
        while ((read = in.read(b)) != -1) {
            out.write(b, 0, read);
        }
    }
    /***** Get Image Resource from URL (End) *****/

    public void ToMap(View v){
        Intent i = new Intent(getApplicationContext(),MenuMap.class);
        startActivity(i);


    }


}
