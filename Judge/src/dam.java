

import java.awt.*;
import java.awt.event.*;
import java.io.IOException;
import java.sql.Statement;
import javax.swing.*;


public class dam extends JFrame{
    public JButton b1;
    public JFrame f = new JFrame("Code Mosh-Pit");
    public Font ft = new Font("Times New Roman",Font.BOLD,40);
    public Font ft2 = new Font("Times New Roman",Font.BOLD,45);
    public JLabel lb = new JLabel("Code Mosh-Pit");

    public void lol2(){

        f.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        f.setSize(1920, 1080);
        f.setVisible(true);
        f.setLayout(null);

        f.getContentPane().setBackground(Color.darkGray);

        lb.setBounds(100,50,500,80);
        lb.setForeground(Color.LIGHT_GRAY);
        lb.setFont(ft2);
        f.add(lb);

        b1 = new JButton("Start");
        b1.setBounds(900,500,240,80);
        b1.setBackground(Color.WHITE);
        b1.setForeground(Color.BLACK);
        b1.setFont(ft);
        f.add(b1);

        event1 e1 = new event1();
        b1.addActionListener(e1);
    }
    public class event1 implements ActionListener{
        public void actionPerformed(ActionEvent e1){
            Toolkit.getDefaultToolkit().beep();
            //lol obj=new lol();
            //obj.lol3();
            //obj.runTimer();
           
            //f.setVisible(false);
        }
    }
    public static void main(String[] args)
    {
    	System.out.println("dlmdf");
//    	dam ob2 = new dam();
    	//ob2.lol2();
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
