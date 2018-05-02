package ubu.healthiertogether;

import com.github.mikephil.charting.data.BarDataSet;
import com.github.mikephil.charting.data.BarEntry;

import java.util.List;

public class MyBarDataSet extends BarDataSet {

    public MyBarDataSet(List<BarEntry> yVals, String label) {
        super(yVals, label);
    }

    @Override
    public int getColor(int index) {

        if(getEntryForXIndex(index).getVal() <= 4) // less than 95 green
            return mColors.get(0);
        else if(getEntryForXIndex(index).getVal() <= 8) // less than 100 orange
            return mColors.get(1);
        else if(getEntryForXIndex(index).getVal() <= 11) // less than 100 orange
            return mColors.get(2);
        else
            return mColors.get(3);
    }



}
