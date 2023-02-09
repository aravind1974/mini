<html>
  <head>
    <style>
      /* Style for the header */
      header {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 1em;
      }

      /* Style for the main content */
      main {
        padding: 1em;
        background-color: #eee;
        text-align: center;
      }

      /* Style for the table */
      table {
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;
      }

      /* Style for the table cells */
      th, td {
        border: 1px solid black;
        padding: 0.5em;
        text-align: left;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Gym Management System</h1>
    </header>
    <main>
      <h2>Assigned Trainer Details</h2>
      <table>
        <tr>
          <th>Member Name</th>
          <th>Trainer Name</th>
        
        </tr>
        <?php
          // Connect to the local database
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "gym_management_system";

          // Create a connection to the database
          $conn = mysqli_connect($servername, $username, $password, $dbname);

          // Check if the connection was successful
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          // Get the assigned trainer details from the database
          $sql = "SELECT members.m_name, trainers.t_name FROM members INNER JOIN trainers ON members.t_id = trainers.t_id";
          $result = mysqli_query($conn, $sql);

          // Loop through the result and display the assigned trainer details
          if (mysqli_num_rows($result) != 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row["m_name"] . "</td>";
              echo "<td>" . $row["t_name"] . "</td>";
              
            
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='4'>No assigned trainers found</td></tr>";
          }

          // Close the connection to the database
          mysqli_close($conn);
        ?>
      </table>
    </main>
  </body>
</html>
