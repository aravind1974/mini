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

      /* Style for the exercise list */
      table {
        width: 100%;
        border-collapse: collapse;
      }

      /* Style for the table header */
      th {
        background-color: #333;
        color: white;
        padding: 0.5em;
      }

      /* Style for the table cells */
      td {
        border: 1px solid #333;
        padding: 0.5em;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Gym Management System</h1>
    </header>
    <main>
      <h2>Exercise List</h2>
      <table>
        <tr>
          <th>Exercise Name</th>
          <th>Muscle Group</th>
          <th>Equipment</th>
        </tr>
        <?php
          // Connect to the database
          $conn = mysqli_connect("localhost", "root", "", "gym_management_system") or die ("error");

          // Fetch the list of exercises from the database
          $result = mysqli_query($conn, "SELECT e_name, muscle_group, equipment FROM exercises");

          // Loop through the result set and output each exercise
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["e_name"] . "</td>";
            echo "<td>" . $row["muscle_group"] . "</td>";
            echo "<td>" . $row["equipment"] . "</td>";
            echo "</tr>";
          }

          // Close the database connection
          mysqli_close($conn);
        ?>
      </table>
    </main>
  </body>
</html>
