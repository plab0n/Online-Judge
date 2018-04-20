import java.io.*;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.concurrent.TimeUnit;
public class Execute extends Match{
	 public static String url = "jdbc:mysql://127.0.0.1:3306/OJ_db"+"?useSSL=false";
     public static String usr = "root";
     public static String pass = "abc";
     public static Connection conn;
     public static String name;
     public static Statement stt;
     public static ResultSet res;
     public PreparedStatement pst;
	public static String execute(String l, String pid, long timeInMillis,String uid,String sid,String fname) throws SQLException, IOException {
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	
		conn = DriverManager.getConnection(url,usr,pass);
		
		stt = conn.createStatement();
		
		res = stt.executeQuery("select addi_input,addi_output from test_case where p_id='"+pid+"'");
		String input="",output="";
		
		if(res.next()) {
			input = (String)res.getString("addi_input");
		 output = (String)res.getString("addi_output");
		}
		System.out.println(input);
		System.out.println(output);
		String path = "/home/pl4b0n/proc/test/"+pid+"in.txt";
		
		 File in = new File(path);
         in.setWritable(true);
         in.setReadable(true);
 	      in.setExecutable(true);
           try {
			if(in.createNewFile())
			   	System.out.println("dsdfd");
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
           BufferedWriter out = new BufferedWriter(new FileWriter(in));
           out.write(input);
           out.close();
           String path2 = "/home/pl4b0n/proc/test/"+pid+"out.txt";
           File outp = new File(path2);
           outp.setWritable(true);
           outp.setReadable(true);
   	       outp.setExecutable(true);
             if(outp.createNewFile())
             	System.out.println("dsdfd");
             BufferedWriter out2 = new BufferedWriter(new FileWriter(outp));
             out2.write(output);
             out2.close();
		
        ProcessBuilder p;
        if (l.equals("java")) {
            p = new ProcessBuilder("java", fname+"M");
        } else if (l.equals("c")) {
            p = new ProcessBuilder("./"+fname+"M");
        } else {
            p = new ProcessBuilder("./"+fname+"M");
        }
        p.directory(new File("/home/pl4b0n/proc"));
        File in2 = new File(path);
        p.redirectInput(in);
        p.redirectErrorStream(true);
       // System.out.println("Current directory " + System.getProperty("dir"));
        String out_path = "/home/pl4b0n/proc/output/" + "out"+uid+sid+".txt";
        File res = new File(out_path);
        p.redirectOutput(res);
       // if(out.exists())
            //System.out.println("Output file generated " + out.getAbsolutePath());
        try {
            Process pp = p.start();
           
            if (!pp.waitFor(timeInMillis, TimeUnit.MILLISECONDS)) {
                return "TIME_LIMIT_EXCEEDED";
            }
            
            int exitCode = pp.exitValue();
            System.out.println("Exit Value = " + pp.exitValue());
            if(exitCode != 0)
                return "RUNTIME_ERROR";
        } catch (IOException ioe) {
            System.err.println("in execute() "+ioe);
        } catch (InterruptedException ex) {
            System.err.println(ex);
        }
        Match mt = new Match();
        String verd = mt.match(out_path, path2);
        return verd;
        
    }


}
