package ubu.healthiertogether;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by aorair on 11/11/2560.
 */

public class Costom_item {
    private int imgId;
    private String User_name;

    private List<Costom_item> list = new ArrayList<>();

    Costom_item(){

    }

    Costom_item(int imgId,String User_name){
        this.imgId = imgId;
        this.User_name = User_name;

    }



    public int getImgId() {
        return imgId;
    }

    public void setImgId(int imgId) {
        this.imgId = imgId;
    }

    public String getUser_name() {
        return User_name;
    }

    public void setUser_name(String user_name) {
        User_name = user_name;
    }

    public List<Costom_item> getList() {
        return list;
    }

    public void setList(List<Costom_item> list) {
        this.list = list;
    }
}
