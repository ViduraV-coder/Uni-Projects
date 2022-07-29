package patient.clinical.information.system;

import java.text.SimpleDateFormat;
import java.util.logging.Level;
import java.util.logging.Logger;

// Creat Date Format
public class Commons {

    public Commons() {

    }
    public static String DATE_STANDARD = "dd-MM-yyyy";

        public static String formattedDateTime(java.util.Date dateIn, String format) {
        String retDate = null;
        if (dateIn != null) {
            try {
                SimpleDateFormat sdf = new SimpleDateFormat(format);
                retDate = sdf.format(dateIn);
                return retDate;
            } catch (Exception ex) {
                ex.printStackTrace();
                Logger.getLogger(Commons.class.getName()).log(Level.SEVERE, null, ex);
            }
        } else {
            retDate = "";
        }
        return retDate;
    }
    public static void main(String[] args) {

    }
}
