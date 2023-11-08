<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Event Planning System</title>
    <link rel="icon" type="image/png" href="index-img/favicon.ico"/>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="topnav">
    <div class="left-section">
        <a class="menu" href="javascript:void(0)" onclick="toggleSidebar()">&#9776;</a>
        <div class="logo">Calendar</div>
        <a href="index.php"><img class="schedule no-hover" src="index-img/Schedule.png" alt="Schedule"></a>
        <a href="#">Venues</a>
        <a href="#">Personnel</a>
        <a href="#">Learn</a>

    <button onclick='navigateDate("today")'>Today</button>
    <button onclick='navigateDate("prev")'>&lt;</button>
    <span id="current-month-year"><?php echo date('F Y'); ?></span>
    <button onclick='navigateDate("next")'>&gt;</button>
    </div>
    <div class="right-section">
        <input class="split" type="text" id="mySearch" placeholder="Search" title="Type to search">
        <a href="#" class="split">Help</a>
        <a href="login.php" class="split">Login</a>
        <a href="signup.php" class="split">Sign Up</a>
    </div>
    </div>
<aside id="side-nav" class="side-nav">
    <div class="logo">Calendar Options</div>
    <a href="#">Today</a>
    <a href="#">Week</a>
    <a href="#">Month</a>
    <a href="#">Year</a>
</aside>
<div id="calendar-container">
  <table class="calendar">
    <thead>
        <tr>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $dayCount = date('t'); // Number of days in the current month
    $currentDay = date('j'); // Current day without leading zeros
    $startDayOfWeek = date('N', strtotime(date('Y-m') . '-01')); // Numeric representation of the first day of the month (1 for Monday, 7 for Sunday)
    
    // Assume $prev_month_dayCount is the number of days in the previous month
    // This would typically be fetched based on the actual previous month
    $prev_month_dayCount = date('t', strtotime('last month'));
    
    // Start days from the previous month
    $prev_month_start = $prev_month_dayCount - ($startDayOfWeek - 2);
    
    // Print header row for days of the week
    // This header is already provided above in <thead>

    // Print days
    for ($i = 1, $dayOfWeek = 1; $i <= $dayCount; $i++, $dayOfWeek++) {
        // Start a new row on Monday
        if ($dayOfWeek == 1) {
            echo '<tr>';
        }
        
        // If the first day of the month is not a Monday, fill the empty cells with previous month's days
        if ($i == 1) {
            for ($j = 1; $j < $startDayOfWeek; $j++, $dayOfWeek++) {
                $prev_month_day = $prev_month_start + $j - 1;
                echo "<td class='not-current-month'>$prev_month_day</td>";
            }
        }

        // Highlight the current day
        if ($i == $currentDay) {
            echo "<td class='today'>$i</td>";
        } else {
            echo "<td>$i</td>";
        }

        // End the row on Sunday
        if ($dayOfWeek == 7) {
            echo '</tr>';
            $dayOfWeek = 0; // Reset day of the week
        }
    }

    // Fill the last row with next month's days if needed
    if ($dayOfWeek != 1) {
        $next_month_day = 1;
        while ($dayOfWeek <= 7) {
            echo "<td class='not-current-month'>$next_month_day</td>";
            $next_month_day++;
            $dayOfWeek++;
        }
        echo '</tr>';
    }
    ?>
    </tbody>
  </table>
</div>

<script src="index.js"></script>
</body>
</html>
