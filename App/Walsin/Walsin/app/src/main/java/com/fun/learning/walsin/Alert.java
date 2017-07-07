package com.fun.learning.walsin;

public class Alert {
    private int r_id;
    private String r_time;
    private int r_status;
    private String o_id;

    public Alert(int r_id, String r_time, int r_status, String o_id) {
        this.r_id = r_id;
        this.r_time = r_time;
        this.r_status = r_status;
        this.o_id = o_id;
    }

    @Override
    public String toString() {
        return "Alert{" +
                "r_id=" + r_id +
                ", r_time='" + r_time + '\'' +
                ", r_status=" + r_status +
                ", o_id='" + o_id + '\'' +
                '}';
    }

    public int getR_id() {
        return r_id;
    }

    public void setR_id(int r_id) {
        this.r_id = r_id;
    }

    public String getR_time() {
        return r_time;
    }

    public void setR_time(String r_time) {
        this.r_time = r_time;
    }

    public int getR_status() {
        return r_status;
    }

    public void setR_status(int r_status) {
        this.r_status = r_status;
    }

    public String getO_id() {
        return o_id;
    }

    public void setO_id(String o_id) {
        this.o_id = o_id;
    }
}
