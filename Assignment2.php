<?php
// Specify the API URL
$api_url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Retrieve the data from the API in JSON format
$response = file_get_contents($api_url);
$data = json_decode($response, true);

// Verify the data
if(!$data || !isset($data["results"])) 
{
    die("Error: Unable to fetch data from API."); // Stop execution and display an error if data is invalid
}

$result = $data['results'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment records</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    
</head>
<body>

        <h1>Student Enrollment Records</h1>

            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Programs</th>
                            <th>Nationality</th>
                            <th>Colleges</th>
                            <th>Number of Students</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
               
               foreach($result as $student) 
               {
                ?>
                <tr>
                    <!-- Output each field in the table -->
                    <td><?php echo $student["year"]; ?></td> 
                    <td><?php echo $student["semester"]; ?></td> 
                    <td><?php echo $student["the_programs"]; ?></td> 
                    <td><?php echo $student["nationality"]; ?></td> 
                    <td><?php echo $student["colleges"]; ?></td>
                    <td><?php echo $student["number_of_students"]; ?></td>
                </tr>
                <?php
               }
               ?>
                    </tbody>
                </table>
            </div>
</body>
</html>