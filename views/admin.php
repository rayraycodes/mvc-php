<!DOCTYPE html>
<html>
<head>
    <style>
       body {
            font-family: "Roboto", sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #4CAF50;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 50px;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Table Designs */
        .table-container {
            overflow-x: auto;
        }

        table {
            border: 1px solid #ddd;
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        @media screen and (min-width: 600px) {
            .card {
                max-width: 600px;
                padding: 75px;
            }

            h2 {
                font-size: 60px;
                margin-bottom: 50px;
            }

            table {
                margin-bottom: 75px;
            }

            th, td {
                padding: 16px;
            }
        }

        @media screen and (min-width: 900px) {
            .card {
                max-width: 900px;
                padding: 100px;
            }

            h2 {
                font-size: 72px;
                margin-bottom: 75px;
            }

            table {
                margin-bottom: 100px;
            }

            th, td {
                padding: 24px;
            }
        }
    </style>
</head>
<body>
<h2>Registered Students</h2>
<?php if ($students): ?>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>UMID</th>
        <th>Project Title</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Time Slot</th>
    </tr>
    <?php foreach ($students as $student): ?>
    <tr>
        <td><?php echo $student['fname']; ?></td>
        <td><?php echo $student['lname']; ?></td>
        <td><?php echo $student['umid']; ?></td>
        <td><?php echo $student['project']; ?></td>
        <td><?php echo $student['email']; ?></td>
        <td><?php echo $student['phone']; ?></td>
        <td><?php echo $student['timeslot']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<p>No students found.</p>
<?php endif; ?>
</body>
</html>