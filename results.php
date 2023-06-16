<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+NarWeek:wght@400;700&display=swap" rel="stylesheet">
    <title>Readiness Plan Results</title>
</head>
<body>

<?php 

    $classStart = date_create($_POST["class-start"]);
        $classStart = date_format($classStart, "F j");
    $product = $_POST["product"]; 
    $pace = $_POST["pace"];
    $sessions = $_POST["sessions"];
    $trainStart = date_create($_POST["training-start"]);
        $trainStart = date_format($trainStart,"F j");
    $teachingHours = 3 * $sessions;

    // Product Based Logic
    switch ($product) {
        case "MCAT":
            $prep = " (7-10 hours per class for MCAT)";
            $minHours = "7";
            $maxHours = "10";
            $classLength = "14";
            $prepLength = "14";
            break;
        case "LSAT":
            $prep = " (4-6 hours per class for LSAT)";
            $minHours = "4";
            $maxHours = "6";
            $classLength = "8";
            $prepLength = "8";
            break;
        default:
            $prep = " (7-10 hours per class for MCAT, 4-6 hours per class for LSAT)";
      }

    switch ($pace) {
        case "7":
            $week_1_training_hours = "5 (KB)";
            $week_2_training_hours = "5 (KB Completed)";
            $week_2_training_prep = "0";
            $week_3_training_hours = "5 (TB)";
            $week_3_training_prep = "1";
            $week_4_training_hours = "5 (TB Completed)";
            $week_4_training_prep = "1";
            $week_5_training_prep = "1";
            $week_6_training_prep = "1";
            $week_7_training_hours = "2-3 (TL1)";
            $week_9_training_hours = "2-3 (TL 2)";
            break;
        default:
            $week_1_training_hours = "10 (KB)";
            $week_2_training_hours = "10 (TB)";
            $week_2_training_prep = "2";
            $week_3_training_hours = "10 (IPB)";
            $week_3_training_prep = "2";
            $week_4_training_hours = "3-4 (TL 1)";
            $week_4_training_prep = "0";
            $week_5_training_prep = "0";
            $week_6_training_prep = "0";
            $week_7_training_hours = "0";
            $week_9_training_hours = "0";
    }

      $prepCounter = ceil($classLength / $sessions) + 2;
      $endPrepCount = 2;
?>

<main>
    <h2>Readiness Case Studies for Sharpe Awesome Tool Creation</h2>
    <p class="table-head">
        <a href="http://localhost:3000/">New Form</a><br>
        <?php echo $product ?> x<?php echo $sessions ?> classes/week<br>
        <?php echo $pace ?> Week Training Timeline
    </p>
    <div class="grid">
        <!-- headers -->
        <div class="headers">Week</div>
        <div class="headers">Training Hours</div>
        <div class="headers">Training Prep Hours</div>
        <div class="headers" id="test">Prep Hours <?php echo $prep; ?></div>
        <div class="headers">Teaching Hours (3 hours per class, does not include pre/post class approx 45 minutes)</div>
        <div class="headers">Total Hours</div>
    
        <!-- Week 1 -->
        <div class="cell">Week 1 (Training starts: <?php echo $trainStart ?>)</div>
        <div class="cell" id="A1"><?php echo $week_1_training_hours; ?></div>
        <div class="cell" id="A2">0</div>
        <div class="cell" id="A3">0</div>
        <div class="cell" id="A4">0</div>
        <div class="cell"></div>
        
        <!-- Week 2 -->
        <div class="cell">Week 2</div>
        <div class="cell" id="B1"><?php echo $week_2_training_hours; ?></div>
        <div class="cell" id="B2"><?php echo $week_2_training_prep; ?></div>
        <div class="cell" id="B3">0</div>
        <div class="cell" id="B4">0</div>
        <div class="cell" ></div>
        
        <!-- Week 3 -->
        <div class="cell">Week 3</div>
        <div class="cell"><?php echo $week_3_training_hours; ?></div>
        <div class="cell"><?php echo $week_3_training_prep; ?></div>
        <div class="cell"><?php 
                if ($pace < "5") {
                    if ($prepLength > $sessions) {
                        echo $sessions * $minHours . "-" . $sessions * $maxHours;
                        $prepLength -= $sessions;
                    } elseif ($prepLength > 0) {
                        echo $prepLength * $minHours . "-" . $prepLength * $maxHours;
                        $prepLength -= $sessions;
                    } elseif ($endPrepCount > 0) {
                        echo "5";
                        $endPrepCount -= 1;
                    } else { echo "0"; }
                } else {
                    echo "0";
                }
            ?>
        </div>
        <div class="cell">0</div>
        <div class="cell"></div>
        
        <!-- Week 4 -->
        <div class="cell">Week 4</div>
        <div class="cell" id="C1"><?php echo $week_4_training_hours; ?></div>
        <div class="cell" id="C2"><?php echo $week_4_training_prep; ?></div>
        <div class="cell" id="C3">
            <?php 
                if ($pace < "7") {
                    if ($prepLength > $sessions) {
                        echo $sessions * $minHours . "-" . $sessions * $maxHours;
                        $prepLength -= $sessions;
                    } elseif ($prepLength > 0) {
                        echo $prepLength * $minHours . "-" . $prepLength * $maxHours;
                        $prepLength -= $sessions;
                    } elseif ($endPrepCount > 0) {
                        echo "5";
                        $endPrepCount -= 1;
                    } else { echo "0"; }
                } else {
                    echo "0";
                }
            ?>
        </div>
        <div class="cell" id="C4">0</div>
        <div class="cell"></div>
        
        <!-- Week 5 -->
        <div class="cell">Week 5
            <?php
                if ($pace == "4") {
                    echo " Class Starts: " . $classStart;
                }
            ?>
        </div>
        <div class="cell">
            <?php
                switch($pace) {
                    case "4":
                        echo "3 (TL 2)";
                        break;
                    case "5":
                        echo "0";
                        break;
                    case "7":
                        echo "5 (IPB)";
                        break;
                    }
            ?>
        </div>
        <div class="cell"><?php echo $week_5_training_prep; ?></div>
        <div class="cell">
            <?php 
                    if ($pace < "7") {
                        if ($prepLength > $sessions) {
                            echo $sessions * $minHours . "-" . $sessions * $maxHours;
                            $prepLength -= $sessions;
                        } elseif ($prepLength > 0) {
                            echo $prepLength * $minHours . "-" . $prepLength * $maxHours;
                            $prepLength -= $sessions;
                        } elseif ($endPrepCount > 0) {
                            echo "5";
                            $endPrepCount -= 1;
                        } else { echo "0"; }
                    } else {
                        echo "0";
                    }
            ?>
        </div>
        <div class="cell">
            <?php 
                if ($pace < "5") { 
                    if ($classLength > $sessions) {
                    echo $teachingHours; 
                    $classLength = $classLength - $sessions;
                    } elseif ($classLength > 0) {
                        echo $classLength;
                        $classLength -= $classLength;
                    } else {
                        echo 0;
                    }
                } else { 
                    echo "0"; 
                } 
            ?>
        </div>
        <div class="cell"></div>
        
        <!-- Week 6 -->
        <div class="cell">Week 6
            <?php
                if ($pace == "5") {
                    echo " Class Starts: " . $classStart;
                }
            ?>
        </div>
        <div class="cell">
            <?php
                switch($pace) {
                    case "5":
                        echo "3 (TL 2)";
                        break;
                    case "4":
                        echo "0";
                        break;
                    case "7":
                        echo "2-3 (IPB Complete)";
                        break;
                        
                    }
                
            ?>
        </div>
        <div class="cell"><?php echo $week_6_training_prep; ?></div>
        <div class="cell">
            <?php 
                if ($pace <= "7") {
                    if ($prepLength > $sessions) {
                        echo $sessions * $minHours . "-" . $sessions * $maxHours;
                        $prepLength -= $sessions;
                    } elseif ($prepLength > 0) {
                        echo $prepLength * $minHours . "-" . $prepLength * $maxHours;
                        $prepLength -= $sessions;
                    } elseif ($endPrepCount > 0) {
                        echo "5";
                        $endPrepCount -= 1;
                    } else { echo "0"; }
                } else {
                    echo "0";
                }
            ?>
        </div>
        <div class="cell">
            <?php 
                if ($pace < "7") { 
                    if ($classLength > $sessions) {
                    echo $teachingHours; 
                    $classLength = $classLength - $sessions;
                    } elseif ($classLength > 0) {
                        echo $classLength;
                        $classLength -= $classLength;
                    } else {
                        echo 0;
                    }
                } else { 
                    echo "0"; 
                }
            ?>
        </div>
        <div class="cell"></div>
        
        <!-- Week 7 -->
        <div class="cell">Week 7</div>
        <div class="cell"><?php echo $week_7_training_hours; ?></div>
        <div class="cell">0</div>
        <div class="cell">
            <?php 
                if ($pace <= "7") {
                    if ($prepLength > $sessions) {
                        echo $sessions * $minHours . "-" . $sessions * $maxHours;
                        $prepLength -= $sessions;
                    } elseif ($prepLength > 0) {
                        echo $prepLength * $minHours . "-" . $prepLength * $maxHours;
                        $prepLength -= $sessions;
                    } elseif ($endPrepCount > 0) {
                        echo "5";
                        $endPrepCount -= 1;
                    } else { echo "0"; }
                } else {
                    echo "0";
                }
            ?>
        </div>
        <div class="cell">
            <?php  
                if ($pace < "7") { 
                    if ($classLength > $sessions) {
                    echo $teachingHours; 
                    $classLength = $classLength - $sessions;
                    } elseif ($classLength > 0) {
                        echo $classLength;
                        $classLength -= $classLength;
                    } else {
                        echo 0;
                    }
                } else { 
                    echo "0"; 
                }
            ?>
        </div>
        <div class="cell"></div>
        
        <!-- Week 8-->
        <div class="cell">Week 8
            <?php
                if ($pace == "7") {
                    echo " Class Starts: " . $classStart;
                }
            ?>
        </div>
        <div class="cell">0</div>
        <div class="cell">0</div>
        <div class="cell">
            <?php 
            if ($pace <= "7") {
                if ($prepLength > $sessions) {
                    echo $sessions * $minHours . "-" . $sessions * $maxHours;
                    $prepLength -= $sessions;
                } elseif ($prepLength > 0) {
                    echo $prepLength * $minHours . "-" . $prepLength * $maxHours;
                    $prepLength -= $sessions;
                } elseif ($endPrepCount > 0) {
                    echo "5";
                    $endPrepCount -= 1;
                } else { echo "0"; }
            } else {
                echo "0";
            }
            ?>
        </div>
        <div class="cell">
            <?php 
                if ($pace <= "7") { 
                    if ($classLength > $sessions) {
                    echo $teachingHours; 
                    $classLength = $classLength - $sessions;
                    } elseif ($classLength > 0) {
                        echo $classLength;
                        $classLength -= $classLength;
                    } else {
                        echo 0;
                    }
                } else { 
                    echo "0"; 
                }
            ?>
        </div>
        <div class="cell"></div>
        
        <!-- Week 9 -->
        <div class="cell week9">Week 9</div>
        <div class="cell week9"><?php echo $week_9_training_hours; ?></div>
        <div class="cell week9">0</div>
        <div class="cell week9">
            <?php 
            if ($pace <= "7") {
                if ($prepLength > $sessions) {
                    echo $sessions * $minHours . "-" . $sessions * $maxHours;
                    $prepLength -= $sessions;
                } elseif ($prepLength > 0) {
                    echo $prepLength * $minHours . "-" . $prepLength * $maxHours;
                    $prepLength -= $sessions;
                } elseif ($endPrepCount > 0) {
                    echo "5";
                    $endPrepCount -= 1;
                } else { echo "0"; }
            } else {
                echo "0";
            }
            ?>
        </div>
        <div class="cell week9">
            <?php 
                if ($pace <= "7") { 
                    if ($classLength > $sessions) {
                    echo $teachingHours; 
                    $classLength = $classLength - $sessions;
                    } elseif ($classLength > 0) {
                        echo $classLength;
                        $classLength -= $classLength;
                    } else {
                        echo 0;
                    }
                } else { 
                    echo "0"; 
                }
            ?>
        </div>
        <div class="cell week9"></div>
        
        <!-- Week 10 -->
        <div class="cell week10">Week 10</div>
        <div class="cell week10">0</div>
        <div class="cell week10">0</div>
        <div class="cell week10">
            <?php 
            if ($pace <= "7") {
                if ($prepLength > $sessions) {
                    echo $sessions * $minHours . "-" . $sessions * $maxHours;
                    $prepLength -= $sessions;
                } elseif ($prepLength > 0) {
                    echo $prepLength * $minHours . "-" . $prepLength * $maxHours;
                    $prepLength -= $sessions;
                } elseif ($endPrepCount > 0) {
                    echo "5";
                    $endPrepCount -= 1;
                } else { echo "0"; }
            } else {
                echo "0";
            }
            ?>
        </div>
        <div class="cell week10" id="w10th">
            <?php 
                if ($pace <= "7") { 
                    if ($classLength > $sessions) {
                    echo $teachingHours; 
                    $classLength = $classLength - $sessions;
                    } elseif ($classLength > 0) {
                        echo $classLength;
                        $classLength -= $classLength;
                    } else {
                        echo 0;
                    }
                } else { 
                    echo "0"; 
                }
            ?>
        </div>
        <div class="cell week10"></div>
        
        <!-- Week 11 -->
        <div class="cell week11">Week 11</div>
        <div class="cell week11">0</div>
        <div class="cell week11">0</div>
        <div class="cell week11">
            <?php  
            if ($pace <= "7") {
                if ($prepLength > $sessions) {
                    echo $sessions * $minHours . "-" . $sessions * $maxHours;
                    $prepLength -= $sessions;
                } elseif ($prepLength > 0) {
                    echo $prepLength * $minHours . "-" . $prepLength * $maxHours;
                    $prepLength -= $sessions;
                } elseif ($endPrepCount > 0) {
                    echo "5";
                    $endPrepCount -= 1;
                } else { echo "0"; }
            } else {
                echo "0";
            }
            ?>
        </div>
        <div class="cell week11">
            <?php 
                if ($pace <= "7") { 
                    if ($classLength > $sessions) {
                    echo $teachingHours; 
                    $classLength = $classLength - $sessions;
                    } elseif ($classLength > 0) {
                        echo $classLength;
                        $classLength -= $classLength;
                    } else {
                        echo 0;
                    }
                } else { 
                    echo "0"; 
                } 
            ?>
        </div>
        <div class="cell week11"></div>
        
        <!-- Week 12 -->
        <div class="cell week12">Week 12</div>
        <div class="cell week12">0</div>
        <div class="cell week12">0</div>
        <div class="cell week12">
            <?php  
            if ($pace <= "7") {
                if ($prepLength > $sessions) {
                    echo $sessions * $minHours . "-" . $sessions * $maxHours;
                    $prepLength -= $sessions;
                } elseif ($prepLength > 0) {
                    echo $prepLength * $minHours . "-" . $prepLength * $maxHours;
                    $prepLength -= $sessions;
                } elseif ($endPrepCount > 0) {
                    echo "5";
                    $endPrepCount -= 1;
                } else { echo "0"; }
            } else {
                echo "0";
            }
            ?>
        </div>
        <div class="cell week12">
            <?php 
                if ($pace <= "7") { 
                    if ($classLength > $sessions) {
                    echo $teachingHours; 
                    $classLength = $classLength - $sessions;
                    } elseif ($classLength > 0) {
                        echo $classLength;
                        $classLength -= $classLength;
                    } else {
                        echo 0;
                    }
                } else { 
                    echo "0"; 
                }
            ?>
        </div>
        <div class="cell week12"></div>
    </div>
    
    <p class="table-foot">
        This tool was conceived by Kevin Strombel and built by Brian Sharpe of the Course Delivery & Training Team. 
    </p>

</main>
<script type="text/javascript" src="js/main.js"></script>
<script>
    
    
</script>
</body>
</html>