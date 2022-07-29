/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlets;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author RVishwajith
 */
public class Database {

    Connection conn = null;
    Statement st = null;
    PreparedStatement pst = null;
    PreparedStatement pst2 = null;
    ResultSet rs = null;
    String nm;

    public void uniTimetableSetData(String name, String start, String end, String title) {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            st.execute("insert into " + name + " (Start,End,Title) values('" + start + "','" + end + "','" + title + "')");

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public ArrayList uniTimetableGetData(String tblnm) {
        ArrayList<String> start = new ArrayList<>();
        ArrayList<String> end = new ArrayList<>();
        ArrayList<String> title = new ArrayList<>();
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "Select * from " + tblnm + "";
            st = conn.createStatement();
            rs = st.executeQuery(sql);
            while (rs.next()) {
                start.add(rs.getString("Start"));
                end.add(rs.getString("End"));
                title.add(rs.getString("Title"));
            }
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
        ArrayList<ArrayList> arr = new ArrayList<>();
        arr.add(start);
        arr.add(end);
        arr.add(title);
        return arr;
    }

    public void uniTimetableDeleteData(String name, String start, String end) {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "delete from " + name + " where Start='" + start + "' && End='" + end + "'";
            pst = conn.prepareStatement(sql);
            pst.executeUpdate();
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void uniDeleteTimetable(String id, String name) {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "delete from uniTimetables_" + id + " where TableName='" + name + "'";
            pst = conn.prepareStatement(sql);
            pst.executeUpdate();
            String sql2 = "drop table " + name + " ";
            pst2 = conn.prepareStatement(sql2);
            pst2.executeUpdate();
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    public ResultSet uniOpenTimetable(String name) {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "Select * from " + name + "";
            st = conn.createStatement();
            rs = st.executeQuery(sql);
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }

        return rs;
    }

    public ResultSet uniGetTimetables(String id) {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "Select * from uniTimetables_" + id + "";
            st = conn.createStatement();
            rs = st.executeQuery(sql);
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }

        return rs;
    }

    public void uniAddTimetable(String id, String name) {

        try {
            String rn = name + "_" + id;
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            st.execute("insert into uniTimetables_" + id + " (TableName) values('" + rn + "')");
            String sql = "create table " + rn + " ( `ID` int not null auto_increment, `Start` varchar(10) null, `End` varchar(10) null, `Title` varchar(100) null, primary key (`ID`))";
            Statement st2 = conn.createStatement();
            st2.execute(sql);

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    public void uniCalendarDelete(String id, String date) {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "delete from unicalendar_" + id + " where Date='" + date + "'";
            pst = conn.prepareStatement(sql);
            pst.executeUpdate();
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void uniCalendarAdd(String id, String date, String description) {
        String x = description.replaceAll("'", " ");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            st.execute("insert into unicalendar_" + id + " (Date,Description) value('" + date + "', '" + x + "')");
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void uniCalendarEdit(String id, String date, String description) {
        String x = description.replaceAll("'", " ");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "Update unicalendar_" + id + " set  Description='" + x + "' where Date='" + date + "'";
            pst = conn.prepareStatement(sql);
            pst.executeUpdate();
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public ArrayList uniCalendarGet(String id) {
        ArrayList<String> date = new ArrayList<>();
        ArrayList<String> description = new ArrayList<>();
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "Select * from unicalendar_" + id + "";
            st = conn.createStatement();
            rs = st.executeQuery(sql);
            while (rs.next()) {
                date.add(rs.getString("Date"));
                description.add(rs.getString("Description"));
            }
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
        ArrayList<ArrayList> arr = new ArrayList<>();
        arr.add(date);
        arr.add(description);
        return arr;
    }

    public ResultSet uniGetApproval(String id) {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            String sql1 = "Select UniversityName from Universities where id=" + id + "";
            ResultSet rs2 = st.executeQuery(sql1);
            String uName = null;
            while (rs2.next()) {
                uName = rs2.getString("UniversityName");
            }
            String sql2 = "Select ID,FirstName,LastName,UniversityName,StudentID,DegreeName,Approval from students where UniversityName='" + uName + "'";
            rs = st.executeQuery(sql2);
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }

        return rs;
    }

    public void uniSetApproval(String id, String appr) {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "Update students set Approval='" + appr + "' where ID=" + id + "";
            pst = conn.prepareStatement(sql);
            pst.executeUpdate();
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public ArrayList stGetEvents() {

        ArrayList<String> companyName = new ArrayList<>();
        ArrayList<String> description = new ArrayList<>();
        ArrayList<String> file = new ArrayList<>();
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql1 = "select ID,CompanyName from Industries";
            st = conn.createStatement();
            rs = st.executeQuery(sql1);
            ArrayList<String> tid = new ArrayList<>();
            ArrayList<String> tfn = new ArrayList<>();
            while (rs.next()) {
                tid.add(rs.getString("ID"));
                tfn.add(rs.getString("CompanyName"));
            }
            String[] ntid = new String[tid.size()];
            ntid = tid.toArray(ntid);
            String[] nfn = new String[tfn.size()];
            nfn = tfn.toArray(nfn);
            for (int i = 0; i <= ntid.length - 1; i++) {
                String sql2 = "select Description,File from inEvents_" + ntid[i] + "";
                Statement st2 = conn.createStatement();
                ResultSet rs2 = st2.executeQuery(sql2);
                while (rs2.next()) {
                    companyName.add(nfn[i]);
                    description.add(rs2.getString("Description"));
                    file.add(rs2.getString("File"));
                }
            }

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
        ArrayList<ArrayList> arr = new ArrayList<>();
        arr.add(companyName);
        arr.add(description);
        arr.add(file);
        return arr;
    }

    public ArrayList stGetJobs() {

        ArrayList<String> companyName = new ArrayList<>();
        ArrayList<String> type = new ArrayList<>();
        ArrayList<String> description = new ArrayList<>();
        ArrayList<String> file = new ArrayList<>();
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql1 = "select ID,CompanyName from Industries";
            st = conn.createStatement();
            rs = st.executeQuery(sql1);
            ArrayList<String> tid = new ArrayList<>();
            ArrayList<String> tfn = new ArrayList<>();
            while (rs.next()) {
                tid.add(rs.getString("ID"));
                tfn.add(rs.getString("CompanyName"));
            }
            String[] ntid = new String[tid.size()];
            ntid = tid.toArray(ntid);
            String[] nfn = new String[tfn.size()];
            nfn = tfn.toArray(nfn);
            for (int i = 0; i <= ntid.length - 1; i++) {
                String sql2 = "select Type,Description,File from inJobs_" + ntid[i] + "";
                Statement st2 = conn.createStatement();
                ResultSet rs2 = st2.executeQuery(sql2);
                while (rs2.next()) {
                    companyName.add(nfn[i]);
                    type.add(rs2.getString("Type"));
                    description.add(rs2.getString("Description"));
                    file.add(rs2.getString("File"));
                }
            }

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
        ArrayList<ArrayList> arr = new ArrayList<>();
        arr.add(companyName);
        arr.add(type);
        arr.add(description);
        arr.add(file);
        return arr;
    }

    public void updateAnswers(String tbln, String pid, String answer, String file) {
        String x = answer.replaceAll("'", " ");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            if (file.equals("")) {
                String sql = "Update " + tbln + " set Answer='" + x + "' where ID=" + pid + "";
                pst = conn.prepareStatement(sql);
            } else {
                String sql = "Update " + tbln + " set Answer='" + x + "' , File='" + file + "' where ID=" + pid + "";
                pst = conn.prepareStatement(sql);
            }
            pst.executeUpdate();
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void addAnswers(String tbln, String pgid, String pn, String pid, String answer, String file) {
        String x = answer.replaceAll("'", " ");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            st.execute("insert into " + tbln + "(QuestionGiver,QuestionGiverID,QuestionID,Answer,File)values('" + pn + "','" + pgid + "','" + pid + "','" + x + "','" + file + "')");
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public ArrayList getAnswers(String user, String pgid, String pid) {

        ArrayList<String> answerGiverId = new ArrayList<>();
        ArrayList<String> answerGiverName = new ArrayList<>();
        ArrayList<String> answerId = new ArrayList<>();
        ArrayList<String> answer = new ArrayList<>();
        ArrayList<String> file = new ArrayList<>();
        try {
            String tbl1 = null;
            String col = null;
            String tbl2 = null;
            if (user == "industry") {
                tbl1 = "Industries";
                col = "CompanyName";
                tbl2 = "inGivenAnswers_";
            } else {
                tbl1 = "Students";
                col = "FirstName";
                tbl2 = "stGivenAnswers_";
            }
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql1 = "select ID," + col + " from " + tbl1 + "";
            st = conn.createStatement();
            rs = st.executeQuery(sql1);
            ArrayList<String> tid = new ArrayList<>();
            ArrayList<String> tfn = new ArrayList<>();
            while (rs.next()) {
                tid.add(rs.getString("ID"));
                tfn.add(rs.getString("" + col + ""));
            }
            String[] ntid = new String[tid.size()];
            ntid = tid.toArray(ntid);
            String[] nfn = new String[tfn.size()];
            nfn = tfn.toArray(nfn);
            for (int i = 0; i <= ntid.length - 1; i++) {
                String sql2 = "select ID,Answer,File from " + tbl2 + ntid[i] + " where QuestionID=" + pid + " && QuestionGiverID=" + pgid + "";
                Statement st2 = conn.createStatement();
                ResultSet rs2 = st2.executeQuery(sql2);
                while (rs2.next()) {
                    answerGiverId.add(ntid[i]);
                    answerGiverName.add(nfn[i]);
                    answerId.add(rs2.getString("ID"));
                    answer.add("{" + rs2.getString("Answer") + "}");
                    file.add(rs2.getString("File"));
                }
            }

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
        ArrayList<ArrayList> arr = new ArrayList<>();
        arr.add(answerGiverId);
        arr.add(answerGiverName);
        arr.add(answerId);
        arr.add(answer);
        arr.add(file);
        return arr;
    }

    public ArrayList getProblemAnswers(String user) {

        ArrayList<String> problemGiverID = new ArrayList<>();
        ArrayList<String> problemGiverName = new ArrayList<>();
        ArrayList<String> problemID = new ArrayList<>();
        ArrayList<String> problem = new ArrayList<>();
        ArrayList<String> file = new ArrayList<>();

        try {
            String tbl1 = null;
            String col = null;
            String tbl2 = null;
            if (user == "student") {
                tbl1 = "Industries";
                col = "CompanyName";
                tbl2 = "inProblems_";
            } else {
                tbl1 = "Students";
                col = "FirstName";
                tbl2 = "stProblems_";
            }
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            String sql1 = "Select ID," + col + " from " + tbl1 + "";
            rs = st.executeQuery(sql1);
            ArrayList<String> tid = new ArrayList<>();
            ArrayList<String> fn = new ArrayList<>();
            while (rs.next()) {
                tid.add(rs.getString("ID"));
                fn.add(rs.getString("" + col + ""));
            }

            String[] ntid = new String[tid.size()];
            ntid = tid.toArray(ntid);
            String[] nfn = new String[fn.size()];
            nfn = fn.toArray(nfn);
            for (int i = 0; i <= ntid.length - 1; i++) {
                String sql2 = "Select * from " + tbl2 + ntid[i] + "";
                Statement st2 = conn.createStatement();
                ResultSet rs2 = st2.executeQuery(sql2);
                while (rs2.next()) {
                    problemGiverID.add(ntid[i]);
                    problemGiverName.add(nfn[i]);
                    problemID.add(rs2.getString("ID"));
                    problem.add(rs2.getString("Problem"));
                    file.add(rs2.getString("File"));
                }
            }

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
        ArrayList<ArrayList> newarr = new ArrayList<>();
        newarr.add(problemGiverID);
        newarr.add(problemGiverName);
        newarr.add(problemID);
        newarr.add(problem);
        newarr.add(file);
        return newarr;
    }

    public ArrayList getAnsForProblems(String user, String id, String pid) {

        ArrayList<String> answerGiver = new ArrayList<>();
        ArrayList<String> answer = new ArrayList<>();
        ArrayList<String> file = new ArrayList<>();
        try {
            String tbln1 = null;
            String coln = null;
            String tbln2 = null;
            if (user.equals("student")) {
                tbln1 = "Industries";
                coln = "CompanyName";
                tbln2 = "inGivenAnswers_";
            } else {
                tbln1 = "Students";
                coln = "FirstName";
                tbln2 = "stGivenAnswers_";
            }
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            String sql1 = "Select ID," + coln + " from " + tbln1 + "";
            rs = st.executeQuery(sql1);
            ArrayList<String> tid = new ArrayList<>();
            ArrayList<String> fn = new ArrayList<>();
            while (rs.next()) {
                tid.add(rs.getString("ID"));
                fn.add(rs.getString("" + coln + ""));
            }

            String[] ntid = new String[tid.size()];
            ntid = tid.toArray(ntid);
            String[] nfn = new String[fn.size()];
            nfn = fn.toArray(nfn);
            for (int i = 0; i <= ntid.length - 1; i++) {
                String sql2 = "Select * from " + tbln2 + ntid[i] + " where QuestionGiverID='" + id + "' && QuestionID='" + pid + "'";
                Statement st2 = conn.createStatement();
                ResultSet rs2 = st2.executeQuery(sql2);
                while (rs2.next()) {
                    answerGiver.add(nfn[i]);
                    answer.add("{" + rs2.getString("Answer") + "}");
                    file.add(rs2.getString("File"));
                }
            }

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
        ArrayList<ArrayList> newarr = new ArrayList<>();
        newarr.add(answerGiver);
        newarr.add(answer);
        newarr.add(file);
        return newarr;
    }

    public void updateProblems(String tbln, String pid, String description, String file) {
        String x = description.replaceAll("'", " ");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            if (file.equals("")) {
                String sql = "Update " + tbln + " set Problem='" + x + "' where ID=" + pid + "";
                pst = conn.prepareStatement(sql);
            } else {
                String sql = "Update " + tbln + " set Problem='" + x + "' , File='" + file + "' where ID=" + pid + "";
                pst = conn.prepareStatement(sql);
            }
            pst.executeUpdate();
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void addProblems(String tbln, String description, String file) {
        String x = description.replaceAll("'", " ");
        try {

            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            st.execute("insert into " + tbln + "(Problem,File)value('" + x + "','" + file + "')");

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    public ResultSet getProblems(String tbln) {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "Select * from " + tbln + "";
            st = conn.createStatement();
            rs = st.executeQuery(sql);
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }

        return rs;
    }

    public void rowDelete(String tblname, String id) {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "delete from " + tblname + " where id='" + id + "'";
            pst = conn.prepareStatement(sql);
            pst.executeUpdate();
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public ArrayList inGetAllUniversities() {

        ArrayList<String> uniID = new ArrayList<>();
        ArrayList<String> UniName = new ArrayList<>();
        try {

            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            String sql = "Select ID,UniversityName from universities";
            rs = st.executeQuery(sql);

            while (rs.next()) {
                uniID.add(rs.getString("ID"));
                UniName.add(rs.getString("UniversityName"));
            }

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
        ArrayList<ArrayList> newarr = new ArrayList<>();
        newarr.add(uniID);
        newarr.add(UniName);
        return newarr;
    }

    public ResultSet inGetJobs(String id) {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "Select * from injobs_" + id + "";
            st = conn.createStatement();
            rs = st.executeQuery(sql);

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
        return rs;
    }

    public void inUpdateJobs(String id, String jid, String type, String description, String file) {
        String x = description.replaceAll("'", " ");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            if (file.equals("")) {
                String sql = "Update injobs_" + id + " set Type='" + type + "' , Description='" + x + "' where ID=" + jid + "";
                pst = conn.prepareStatement(sql);
            } else {
                String sql = "Update injobs_" + id + " set Type='" + type + "' , Description='" + x + "' , File='" + file + "' where ID=" + jid + "";
                pst = conn.prepareStatement(sql);
            }
            pst.executeUpdate();
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void inAddJobs(String id, String type, String description, String file) {
        String x = description.replaceAll("'", " ");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            st.execute("insert into injobs_" + id + "(Type,Description,File)value('" + type + "','" + x + "','" + file + "')");
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public ResultSet inGetEvents(String id) {

        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            String sql = "Select * from inevents_" + id + "";
            st = conn.createStatement();
            rs = st.executeQuery(sql);

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }

        return rs;
    }

    public void inUpdateEvents(String id, String eid, String description, String file) {
        String x = description.replaceAll("'", " ");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            if (file.equals("")) {
                String sql = "Update inevents_" + id + " set Description='" + x + "' where ID=" + eid + "";
                pst = conn.prepareStatement(sql);
            } else {
                String sql = "Update inevents_" + id + " set Description='" + x + "' , File='" + file + "' where ID=" + eid + "";
                pst = conn.prepareStatement(sql);
            }
            pst.executeUpdate();
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void inAddEvents(String id, String description, String file) {
        String x = description.replaceAll("'", " ");
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            st.execute("insert into inevents_" + id + "(Description,File)value('" + x + "','" + file + "')");

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public String[] login(String email) {
        String ar[] = new String[3];
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");

            String sql1 = "Select ID,Password from industries where Email='" + email + "'";
            st = conn.createStatement();
            ResultSet lrs1 = st.executeQuery(sql1);

            String sql2 = "Select ID,Password from students where Email='" + email + "'";
            st = conn.createStatement();
            ResultSet lrs2 = st.executeQuery(sql2);

            String sql3 = "Select ID,Password from universities where Email='" + email + "'";
            st = conn.createStatement();
            ResultSet lrs3 = st.executeQuery(sql3);

            if (lrs1.next()) {

                ar[0] = Integer.toString(lrs1.getInt("ID"));
                ar[1] = lrs1.getString("Password");
                ar[2] = "industries";

            } else if (lrs2.next()) {

                ar[0] = Integer.toString(lrs2.getInt("ID"));
                ar[1] = lrs2.getString("Password");
                ar[2] = "students";

            } else if (lrs3.next()) {

                ar[0] = Integer.toString(lrs3.getInt("ID"));
                ar[1] = lrs3.getString("Password");
                ar[2] = "universities";
            }

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
        return ar;
    }

    public void industryRegister(String firstname, String lastname, String email, String password, String companyname, String address, String teleno) {
        String x = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            st.execute("insert into industries (FirstName,LastName,Email,Password,CompanyName,Address,TeleNo) value('" + firstname + "', '" + lastname + "', '" + email + "', '" + password + "', '" + companyname + "', '" + address + "', '" + teleno + "')");
            String sql = "select ID from industries order by id desc limit 1";
            rs = st.executeQuery(sql);
            while (rs.next()) {
                x = rs.getString("ID");
            }
            String ptblnm = "inProblems_" + x;
            String aouttblnm = "inGivenAnswers_" + x;
            String etblnm = "inEvents_" + x;
            String jtblnm = "inJobs_" + x;
            String sql1 = "create table " + ptblnm + " ( `ID` int not null auto_increment , `Problem` text(1500) not null , `File` varchar(250) null , primary key (`ID`))";
            String sql2 = "create table " + aouttblnm + " ( `ID` int not null auto_increment , `QuestionGiver` varchar(150) not null , `QuestionGiverID` varchar(150) not null , `QuestionID` varchar(150) not null , `Answer` text(1500) not null , `File` varchar(250) null , primary key (`ID`))";
            String sql3 = "create table " + etblnm + " ( `ID` int not null auto_increment , `Description` text(1000) not null , `File` varchar(250) null , primary key (`ID`))";
            String sql4 = "create table " + jtblnm + " ( `ID` int not null auto_increment , `Type` varchar(100) not null ,  `Description` text(1000) not null , `File` varchar(250) null , primary key (`ID`))";
            st.execute(sql1);
            st.execute(sql2);
            st.execute(sql3);
            st.execute(sql4);

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void studentRegister(String firstname, String lastname, String gender, String email, String password, String universityname, String studentid, String degreename, String address, String mobileno) {
        String x = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            st.execute("insert into students (FirstName,LastName,Gender,Email,Password,UniversityName,StudentID,DegreeName,Address,MobileNo,Approval) value('" + firstname + "', '" + lastname + "', '" + gender + "', '" + email + "', '" + password + "', '" + universityname + "', '" + studentid + "', '" + degreename + "', '" + address + "', '" + mobileno + "', 'Pending')");
            String sql = "select ID from students order by id desc limit 1";
            rs = st.executeQuery(sql);
            while (rs.next()) {
                x = rs.getString("ID");
            }
            String ptblnm = "stproblems_" + x;
            String aouttblnm = "stGivenAnswers_" + x;
            String sql1 = "create table " + ptblnm + " ( `ID` int not null auto_increment , `Problem` text(1500) not null , `File` varchar(250) null , primary key (`ID`))";
            String sql2 = "create table " + aouttblnm + " ( `ID` int not null auto_increment ,`QuestionGiver` varchar(150) not null ,`QuestionGiverID` varchar(150) not null , `QuestionID` varchar(150) not null , `Answer` text(1500) not null , `File` varchar(250) null , primary key (`ID`))";
            st.execute(sql1);
            st.execute(sql2);
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void universityRegister(String firstname, String lastname, String email, String password, String universityname, String address, String teleno) {
        String x = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/j2ee", "root", "");
            st = conn.createStatement();
            st.execute("insert into universities (FirstName,LastName,Email,Password,UniversityName,Address,TeleNo) value('" + firstname + "', '" + lastname + "', '" + email + "', '" + password + "', '" + universityname + "', '" + address + "', '" + teleno + "')");
            String sql = "select ID from universities order by id desc limit 1";
            rs = st.executeQuery(sql);
            while (rs.next()) {
                x = rs.getString("ID");
            }
            String unic = "uniCalendar_" + x;
            String unittbls = "uniTimeTables_" + x;
            String sql1 = "create table " + unic + " ( `ID` int not null auto_increment , `Date` varchar(250) not null, `Description` text(1500) not null , primary key (`ID`))";
            String sql2 = "create table " + unittbls + " ( `ID` int not null auto_increment ,`TableName` varchar(150) not null , primary key (`ID`))";
            st.execute(sql1);
            st.execute(sql2);

        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Database.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

//    public static void main(String args[]) {
//
//        Database ans = new Database();
//        ans.inAddProblem("9","asdsad", "C://asd.ap");
//        System.out.println(st);
//    }
}
