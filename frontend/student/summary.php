<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Summary</title>
    <link rel="stylesheet" href="/Student_Survey/frontend/css/snavbar.css" />
    <link rel="stylesheet" href="/Student_Survey/frontend/css/add_feedback.css">
    <link rel="stylesheet" href="/Student_Survey/frontend/css/summary.css">
</head>
<body>
    <div id="navbar"></div>
    
    <h1>Feedback Summary</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Feedback 1</th>
                <th>Feedback 2</th>
                <th>Feedback 3</th>
                <th>Feedback 4</th>
                <th>Feedback 5</th>
                <th>Feedback 6</th>
                <th>Feedback 7</th>
                <th>Feedback 8</th>
                <th>Feedback 9</th>
                <th>Feedback 10</th>
            </tr>
        </thead>
        <tbody>
            <?php include '../../backend/fetch_feedback.php'; ?>
        </tbody>
    </table>

    <script>
        // Load the navbar
        document.getElementById('navbar').innerHTML = `
            <div class="sidebar">
                <h2>Navigation</h2>
                <ul>
                    <li><a href="/Student_Survey/frontend/student/summary.php">Summary</a></li>
                    <li><a href="/Student_Survey/frontend/student/add_feedback.html">Add Feedback</a></li>
                    <li><a href="#" id="signOutButton">Sign Out</a></li>
                </ul>
            </div>
        `;

        // Sign out functionality
        document.getElementById('signOutButton').addEventListener('click', function() {
            console.log('Signing out...');
            window.location.href = '/Student_Survey/login.html'; // Redirect to login page
        });
    </script>
    <style>
         .signout {
        margin-top: auto; /* This pushes the signout to the bottom */
    }
    </style>
</body>
</html>
