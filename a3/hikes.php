<?php include './includes/header.inc'; ?>

<body>
    <?php include './includes/nav.inc'; ?>

    <main class="home-container">
        <div class="hike-intro">

            <h2>Discover Victoria your own way</h2>
            <p>
                Victoria, Australia, is a haven for hiking enthusiasts, boasting an array of trails that cater to
                various preferences and skill levels. From coastal paths to mountain tracks, Victoria offers diverse
                landscapes that promise unforgettable outdoor experiences. Whether you're seeking a leisurely stroll
                through lush forests or an adrenaline-pumping ascent to panoramic viewpoints, Victoria's hiking trails
                invite exploration and discovery amidst its natural wonders.
            </p>

        </div>
        <div class="hike-wrapper">
            <div class="hike-box">
                <img src="./images/falls.jpg" alt="waterfall image">
            </div>

            <div class="hike-box">

            <?php
                include("db_connect.inc");

                try {
                    
                    $sql = "SELECT * FROM hikes";
                    $stmt = $pdo->query($sql);

                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {

                    echo "Error: " . $e->getMessage();
                }

                $pdo = null;
            ?>

            <table>
                <tr>
                    <th>Hike</th>
                    <th>Distance (km)</th>
                    <th>Level</th>
                    <th>Location</th>
                </tr>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><a href="details.php?id=<?php echo $row['hikeid']; ?>"><?php echo $row['hikename']; ?></a></td>
                        <td><?php echo $row['distance']; ?></td>
                        <td><?php echo $row['level']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
            </div>


        </div>

        <?php include './includes/footer.inc'; ?>
    </main>





    <script src="./main.js"></script>
</body>

</html>