package ubu.healthiertogether;

import android.os.Bundle;
import android.support.v4.app.FragmentActivity;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.BitmapDescriptorFactory;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

import static ubu.healthiertogether.NetConnect.getHttpGet;

public class MapsActivity extends FragmentActivity implements OnMapReadyCallback {

    private GoogleMap mMap;

    // Latitude & Longitude
    private Double Latitude = 0.00;
    private Double Longitude = 0.00;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_maps);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.googleMap);
        mapFragment.getMapAsync(this);
    }


    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;

        ArrayList<HashMap<String, String>> location = null;
        String url = "http://aorair.esy.es/api/getLatLon.php";
        try {

            JSONArray data = new JSONArray(getHttpGet(url));

            location = new ArrayList<HashMap<String, String>>();
            HashMap<String, String> map;

            for(int i = 0; i < data.length(); i++){
                JSONObject c = data.getJSONObject(i);

                map = new HashMap<String, String>();
                map.put("Latitude", c.getString("Latitude"));
                map.put("Longitude", c.getString("Longitude"));
                map.put("Name", c.getString("Name"));
                map.put("score", c.getString("score"));
                location.add(map);

            }

        } catch (JSONException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }


        // *** Focus & Zoom
        Latitude = Double.parseDouble(location.get(0).get("Latitude").toString());
        Longitude = Double.parseDouble(location.get(0).get("Longitude").toString());
        LatLng coordinate = new LatLng(Latitude, Longitude);
//        mMap.setMapType(com.google.android.gms.maps.GoogleMap.MAP_TYPE_HYBRID);
        mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(coordinate, 15));

        // *** Marker (Loop)
        for (int i = 0; i < location.size(); i++) {
            Latitude = Double.parseDouble(location.get(i).get("Latitude").toString());
            Longitude = Double.parseDouble(location.get(i).get("Longitude").toString());
            String name = location.get(i).get("Name").toString();
            String score = location.get(i).get("score").toString();
            int num = Integer.valueOf(score);
//            int score = Integer.parseInt(location.get(i).get("score"));

            if(num <= 4){
                MarkerOptions marker = new MarkerOptions().position(new LatLng(Latitude, Longitude)).icon(BitmapDescriptorFactory.defaultMarker(
                        BitmapDescriptorFactory.HUE_RED)).title(name);
                mMap.addMarker(marker);

            }else if(num <= 8){
                MarkerOptions marker = new MarkerOptions().position(new LatLng(Latitude, Longitude)).icon(BitmapDescriptorFactory.defaultMarker(
                        BitmapDescriptorFactory.HUE_ORANGE)).title(name);
                mMap.addMarker(marker);

            }else if(num <= 11){
                MarkerOptions marker = new MarkerOptions().position(new LatLng(Latitude, Longitude)).icon(BitmapDescriptorFactory.defaultMarker(
                        BitmapDescriptorFactory.HUE_YELLOW)).title(name);
                mMap.addMarker(marker);

            }else{
                MarkerOptions marker = new MarkerOptions().position(new LatLng(Latitude, Longitude)).icon(BitmapDescriptorFactory.defaultMarker(
                        BitmapDescriptorFactory.HUE_GREEN)).title(name);
                mMap.addMarker(marker);
            }



        }


    }


}
