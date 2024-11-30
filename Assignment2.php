<?php  
$url = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';
$response = file_get_contents($url);

if ($response === FALSE) {
    die("Error retrieving data. Please try again later.");
}

$data = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UOB Student Nationalities Record</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>
    <div class="container">
        <h1>UOB Student Nationalities Record</h1>
        <div class="overflow-auto">
            <table class="striped">
                <thead>
                    <tr>
                        <th scope="col">Year</th>
                        <th scope="col">Semester</th>
                        <th scope="col">The Programs</th>
                        <th scope="col">Nationality</th>
                        <th scope="col">Colleges</th>
                        <th scope="col">Number of Students</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data['records'] as $record): ?>
                    <?php $fields = $record['record']['fields']; ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fields['academic_year']); ?></td>
                        <td><?php echo htmlspecialchars($fields['semester']); ?></td>
                        <td><?php echo htmlspecialchars($fields['the_programs']); ?></td>
                        <td><?php echo htmlspecialchars($fields['nationality']); ?></td>
                        <td><?php echo htmlspecialchars($fields['colleges']); ?></td>
                        <td><?php echo htmlspecialchars($fields['number_of_students']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
