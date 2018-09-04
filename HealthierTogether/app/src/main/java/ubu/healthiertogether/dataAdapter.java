package ubu.healthiertogether;

import android.content.Context;
import android.graphics.Bitmap;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.HashMap;

public class dataAdapter extends BaseAdapter {
    private Context context;
    private ArrayList<HashMap<String, Object>> MyArr = new ArrayList<HashMap<String, Object>>();
    public dataAdapter(Context c, ArrayList<HashMap<String, Object>> myArrList) {
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
            convertView = inflater.inflate(R.layout.costom_list, null);
        }
        // ColImage
        ImageView imageView = (ImageView) convertView.findViewById(R.id.img);
        imageView.getLayoutParams().height = 250;
        imageView.getLayoutParams().width = 250;
        imageView.setPadding(5, 5, 5, 5);
        imageView.setScaleType(ImageView.ScaleType.CENTER_CROP);
        try {
            imageView.setImageBitmap((Bitmap)MyArr.get(position).get("img"));
        } catch (Exception e) {
            // When Error
            imageView.setImageResource(android.R.drawable.ic_menu_report_image);
        }
        // ColImgName
        TextView txtPicName = (TextView) convertView.findViewById(R.id.Name);
//            txtPicName.setPadding(50, 0, 0, 0);
        txtPicName.setText(MyArr.get(position).get("Name").toString());
        TextView Date = (TextView) convertView.findViewById(R.id.date);
        Date.setText(MyArr.get(position).get("date_n").toString());
        TextView noID = (TextView) convertView.findViewById(R.id.noID);
        noID.setText(MyArr.get(position).get("no_id").toString());
        return convertView;
    }
}
