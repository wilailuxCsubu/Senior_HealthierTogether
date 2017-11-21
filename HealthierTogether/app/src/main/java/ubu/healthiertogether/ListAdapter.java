package ubu.healthiertogether;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by aorair on 11/11/2560.
 */

public class ListAdapter extends BaseAdapter {

    private Context context;
    private List<Costom_item> list_iem = new ArrayList<>();

    ListAdapter(Context context , List<Costom_item> list_iem){
        this.context = context;
        this.list_iem = list_iem;

    }

    @Override
    public int getCount() {
        if(list_iem == null){
            return  0;
        }

        return list_iem.size();
    }

    @Override
    public Object getItem(int position) {
        return null;
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        View view;
        LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        view = inflater.inflate(R.layout.costom_list,parent,false);

        ImageView imageView = view.findViewById(R.id.image_item);
        TextView textView= view.findViewById(R.id.text_item);

        imageView.setImageResource(list_iem.get(position).getImgId());
        textView.setText(list_iem.get(position).getUser_name());

        return view;
    }
}
