<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Attendance</title>
</head>
<body>
    <center>
    <h1>Attendance Form</h1>
    <form action="attendance_store.php" method="POST">
    <label for="department">Staff Name:</label>
              <select>
                    <option>keerthena</option>
                    <option>Alaudin.B.M</option>
                </select><br><br>
         <label for="department">Department:</label>
                    <select name="table_name">
                        <option value ="b_a_tamil" >b_a_tamil</option>
                        <option  value ="B_Sc_Chemistry">B_Sc_Chemistry</option>
                        <option  value ="B_Sc_Nut_and_Diet">B_Sc_Nut_and_Diet</option>
                        <option  value ="B_Sc_Microbiology">B_Sc_Microbiology</option>
                        <option value ="B_Sc_ComputerScience">B_Sc_ComputerScience</option>
                        <option  value ="B_C_A">B_C_A</option>
                        <option  value ="B_B_A">B_B_A</option>

                        <option  value ="ai_ds">ai_ds</option>
                        <option  value ="B_Com">B_Com</option>
                        <option  value ="B_Com_ca">B_Com_CA</option>
                        <option  value ="B_Com">B_Com</option>
                        <option  value ="M_Com">M_Com</option>
                    </select>
                    <br>
                <br><br>
        <label for="roll">Total Students:</label>
        <input type="number" id="roll" name="roll" required>
        <br><br>
        <label for="present">Present Students:</label>
        <input type="number" id="present" name="present" required>
        <br><br>
        <button type="submit">Submit</button>
    </form>
</center>
</body>
</html>

