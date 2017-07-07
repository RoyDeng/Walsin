package com.fun.learning.walsin;

import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.nfc.NfcAdapter;
import android.nfc.Tag;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.gson.Gson;
import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.Response;

import java.io.IOException;

public class MainActivity extends AppCompatActivity {
    private Context context;
    private ConnectivityManager manager;
    private NetworkInfo info;
    private NfcAdapter nfcAdapter;
    private TextView txtOrderID, txtResult;
    private ListView listView;
    private ArrayAdapter<Alert> adapter;
    private Alert[] aList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        context = this;
        txtOrderID = (TextView) findViewById(R.id.txtOrderID);
        txtResult = (TextView) findViewById(R.id.txtResult);
        listView = (ListView) findViewById(R.id.listView);

        manager = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        info = manager.getActiveNetworkInfo();

        if (info == null) {
            Toast.makeText(this, "尚未啟動網路!", Toast.LENGTH_LONG).show();
            finish();
        }

        nfcAdapter = NfcAdapter.getDefaultAdapter(this);
        if (nfcAdapter == null) {
            Toast.makeText(this, "此裝置不支援NFC!", Toast.LENGTH_LONG).show();
            finish();
        } else if (!nfcAdapter.isEnabled()) {
            Toast.makeText(this, "尚未啟動NFC!", Toast.LENGTH_LONG).show();
            finish();
        }
    }

    public void onClick(View v) {
        new RunWork().start();
    }

    private void showNotification() {
        adapter = new ArrayAdapter<Alert>(context, R.layout.row, aList) {

            @Override
            public View getView(int position, View convertView, ViewGroup parent) {
                convertView = LayoutInflater.from(context).inflate(R.layout.row, null);

                TextView emp_id = (TextView)convertView.findViewById(R.id.txtOId);
                TextView emp_name = (TextView)convertView.findViewById(R.id.txtTime);

                Alert a = aList[position];
                emp_id.setText("訂單編號：" + a.getO_id());
                emp_name.setText(a.getR_time());

                return convertView;
            }
        };
        listView.setAdapter(adapter);
    }

    class RunWork extends Thread {
        String json = "";
        OkHttpClient client = new OkHttpClient();

        String run(String url) throws IOException {
            Request request = new Request.Builder()
                    .url(url)
                    .build();

            Response response = client.newCall(request).execute();
            return response.body().string();
        }

        Runnable r = new Runnable() {
            @Override
            public void run() {
                Gson gson = new Gson();
                aList = gson.fromJson(json, Alert[].class);
                showNotification();
            }
        };

        @Override
        public void run() {
            try {
                String url = "http://cycusa.sytes.net/alert";
                json = run(url).trim();
                runOnUiThread(r);
            } catch(Exception e) {
                e.printStackTrace(System.out);
            }
        }

    }

    @Override
    protected void onResume() {
        super.onResume();

        Intent intent = getIntent();
        String action = intent.getAction();

        if (NfcAdapter.ACTION_TECH_DISCOVERED.equals(action)) {
            Tag tag = intent.getParcelableExtra(NfcAdapter.EXTRA_TAG);
            String UID = "";
            byte[] tagId = tag.getId();

            for (int i = 0; i < tagId.length; i++) {
                UID += Integer.parseInt(String.format("%02X", tagId[i] & 0xff), 16);
            }

            if (tag == null) {
                txtOrderID.setText("NULL");
            } else {
                txtOrderID.setText("訂單編號:" + UID);
                txtResult.setText(new DBHepler().getReach(UID));
            }
        }
    }
}
