<?php
require_once 'config.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=poll", "root", "");

    $sql = 'SELECT *
               FROM poll_qst2
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
        <title>CCNA Exam Questions</title>
			<link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <h1>CCNA Exam Questions</h1>
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Question ID</th>
                        <th>Question</th>
                        <th>Option 1</th>
						<th>Option 2</th>
						<th>Option 3</th>
                        <th>Option 4</th>
                        <th>Option 5</th>
						<th>Option 6</th>
						<th>Question Total</th>
                        <th>Answer</th>
						<th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['qst_id']) ?></td>
                            <td><?php echo htmlspecialchars($row['qst']); ?></td>
                            <td><?php echo htmlspecialchars($row['opt1']); ?></td>
							<td><?php echo htmlspecialchars($row['opt2']) ?></td>
							<td><?php echo htmlspecialchars($row['opt3']); ?></td>
                            <td><?php echo htmlspecialchars($row['opt4']); ?></td>
							<td><?php echo htmlspecialchars($row['opt5']) ?></td>
							<td><?php echo htmlspecialchars($row['opt6']) ?></td>
							<td><?php echo htmlspecialchars($row['qst_total']); ?></td>
                            <td><?php echo htmlspecialchars($row['_answer']); ?></td>
							<td><?php echo htmlspecialchars($row['section']) ?></td>
                            
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </body>
</div>
</html>