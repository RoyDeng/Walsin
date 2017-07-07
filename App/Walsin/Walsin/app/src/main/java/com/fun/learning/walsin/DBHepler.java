package com.fun.learning.walsin;

import com.squareup.okhttp.OkHttpClient;
import com.squareup.okhttp.Request;
import com.squareup.okhttp.Response;

import org.json.JSONArray;

import java.io.IOException;
import java.util.concurrent.Callable;
import java.util.concurrent.FutureTask;

public class DBHepler {
    private OkHttpClient client = new OkHttpClient();

    public String getReach(String o_id) {
        try {
            FutureTask<String> task = new FutureTask<String>(new RunReach(o_id));
            new Thread(task).start();
            return task.get();
        } catch(Exception e) {
            return null;
        }
    }

    private String run(String url) throws IOException {
        Request request = new Request.Builder()
                .url(url)
                .build();

        Response response = client.newCall(request).execute();
        return response.body().string();
    }

    private class RunReach implements Callable<String> {
        String o_id = null;

        RunReach(String o_id) {
            this.o_id = o_id;
        }

        public String call() throws Exception {
            String url = String.format("http://cycusa.sytes.net/ps?o_id=%s", o_id);
            String json = run(url);
            String encoded = null;

            try {
                encoded = "料品編號:" + new JSONArray(json).getJSONObject(0).getJSONObject("order_item").getString("i_id") + "\n";
                encoded += "達成率:" + new JSONArray(json).getJSONObject(0).getJSONObject("ps_item").getDouble("o_reach") * 100 +"%" + "\n";
                encoded += "不良率:" + new JSONArray(json).getJSONObject(0).getJSONObject("ps_item").getDouble("o_defect") * 100 +"%";
            } catch (Exception e) {
                return "讀取失敗!";
            }

            return encoded;
        }
    }
}
