<?php
require_once 'config.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=poll", "root", "");

    $sql = 'SELECT *
               FROM poll_answer
              ';

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CCNA Score Sheet</title>
			<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <h1>CCNA Score Sheet</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Question No</th>
                        <th>User Answer</th>
                        <th>Actual Answer</th>
						<th>Mark</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['qst_id']) ?></td>
                            <td><?php echo htmlspecialchars($row['opt']); ?></td>
                            <td><?php echo htmlspecialchars($row['correct']); ?></td>
							<td><?php echo htmlspecialchars($row['mark']) ?></td>
                            
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </body>
</div>
</html>