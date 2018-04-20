import java.io.BufferedReader;
import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;

import org.omg.CORBA.portable.InputStream;

public class Compile extends Execute{
	public static String compile(String l,String fname,String pid,long time,String uid,String sid) {
       // System.out.println("Code compilation started...");
        ProcessBuilder p;
        boolean compiled = true;
        System.out.println(fname);
        if (l.equals("java")) {
            p = new ProcessBuilder("javac", fname+"."+l);
        } else if (l.equals("c")) {
            p = new ProcessBuilder("gcc","-std=c++0x","-w","-o", fname+"M", fname+"."+l);
        } else {
            p = new ProcessBuilder("g++","-std=c++0x","-w", "-o", fname+"M", fname+"."+l);
        }

        try {
        	  p.directory(new File("/home/pl4b0n/proc"));
              p.redirectErrorStream(true);
            Process pp = p.start();
            java.io.InputStream is =   pp.getInputStream();
            //String err = pp.getInputStream().toString();
           // System.out.println(err);
            String temp;
            try {
            	BufferedReader b = new BufferedReader(new InputStreamReader(is));
                while ((temp = b.readLine()) != null) {
                    compiled = false;
                    System.out.println(temp);
                }
                pp.waitFor();
                if (!compiled) {
                    is.close();
                    return "COMPILATION_ERROR";
                }
                is.close();
                System.out.println("Compile Success");
                Execute ob2 = new Execute();
                String val =  ob2.execute(l,pid,time,uid,sid,fname);
                System.out.println(val);
                return val;
         
        } catch (IOException | InterruptedException e) {
            System.out.println("in compile() " + e);
        }

    }catch(Exception e)
        {
    		
        }

        return "COMPILATION_ERROR";
	}

//	public static void main(String[] args) {
//		// TODO Auto-generated method stub
//		String res = compile("cpp");
//		System.out.println(res);
//		if(res.compareTo("COMPILATION_SUCCESS")==0)
//		{
//			String res2 = execute("cpp","6",1000);
//			System.out.println(res2);
//		}
//	}

}
