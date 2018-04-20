

import javax.swing.*;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;

public class DB extends Compile{
     public boolean ache;
     public static String url = "jdbc:mysql://127.0.0.1:3306/OJ_db";
     public static String usr = "root";
     public static String pass = "abc";
     public static Connection conn;
     public static String name;
     public static Statement stt;
     public static Statement stt2,stt3;
     public static ResultSet res;
     public static ResultSet res2;
	int res3,res4;
     public PreparedStatement pst;
    public boolean check(String word) throws ClassNotFoundException, IOException {

       long time = 0;
                                try {
                                    Class.forName("com.mysql.jdbc.Driver");
				conn = DriverManager.getConnection(url,usr,pass);
				stt = conn.createStatement();
				stt3 = conn.createStatement();
				//int cnt = 1;
				while(true) {
				res = stt.executeQuery("select * from submission");  
				
				while(res.next())
				{
					
					String src = (String)res.getString("s_code");
					String lang = (String)res.getString("lang");
					String sid = (String)res.getString("s_id");
					String pid = (String)res.getString("p_id");
					String uid = (String)res.getString("u_id");
					String cid = (String)res.getString("c_id");
					String stime = (String)res.getString("s_time");
					stt2 = conn.createStatement();
					res2 = stt2.executeQuery("SELECT tle from problem_table where p_id='"+pid+"'");
					if(res2.next()) {
					String tl = (String)res2.getString("tle");
					 time = Long.parseLong(tl);
					}
                    String path = "/home/pl4b0n/proc/"+ uid+sid+"program."+lang;
                    String fn = uid+sid+"program";
                 
                   // System.out.println(path);
                    File f = new File(path);
                  f.setWritable(true);
                  f.setReadable(true);
          	      f.setExecutable(true);
                    if(f.createNewFile())
                    	System.out.println("dsdfd");
                    BufferedWriter out = new BufferedWriter(new FileWriter(f));
                    out.write(src);
                    out.close();
                   String verdict = compile(lang,fn,pid,time*1000,uid,sid);
                   res3 =  stt3.executeUpdate("INSERT INTO modify_submission(s_id,s_code,lang,s_time,verdict,c_id,p_id,u_id) VALUES('"+sid+"','"+src+"','"+lang+"','"+stime+"','"+verdict+"','"+cid+"','"+pid+"','"+uid+"')");
                   res4 = stt3.executeUpdate("DELETE FROM submission WHERE s_id='"+sid+"'");
				}
				
				}
                             
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
								return true;
                                
                                
                  
    }
    public static void main(String[] args)
    {
    	System.out.println("dlmdf");
    	DB ob = new DB();
    	try {
			ob.check("sdkfdf");
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    }
   
}


