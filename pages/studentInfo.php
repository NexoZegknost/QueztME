<?php
require_once("../server/classes.php");
session_start();
require_once("../server/function.php");
if (isset($_SESSION['STUDENT'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Quản lý học sinh</title>

        <!-- W3.CSS Framework -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css" />

        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/css/style.css" />
        <link rel="stylesheet" href="../assets/css/responsive.css" />

        <!-- Font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <main class="w3-card-4">
            <div class="w3-container w3-blue">
                <h1 class="w3-xxlarge w3-center">Thông tin học sinh</h1>
            </div>
            <section
                method="post"
                action="server/query.php"
                class="w3-container w3-border w3-padding-16">

                <?php
                // print_r($_SESSION['STUDENT']);
                $students = fixObject($_SESSION['STUDENT']);
                for ($stu = 0; $stu < count($_SESSION['STUDENT']); $stu++) {
                ?>
                    <div class="student-card w3-container-fluid w3-card-2 w3-row w3-margin w3-round">
                        <div class="w3-col w3-margin" style="width:100px">
                            <img src="../assets/img/prime.png" alt="" class="w3-circle w3-card-2 w3-image">
                        </div>
                        <div class="w3-rest w3-border w3-border-indigo w3-round">
                            <header class="w3-container w3-indigo">
                                <h3 class="">
                                    <i class="w3-padding-small w3-margin w3-border w3-round-large">@<?php echo $students[$stu]->username ?></i>
                                    <strong><?php echo $students[$stu]->fullname ?></strong>
                                </h3>
                            </header>
                            <div class="w3-container">
                                <div class="data-element w3-row w3-padding">
                                    <div class="w3-col" style="width: 50px;">
                                        <img src="../assets/icon/id-card-clip-solid-full.svg" alt="">
                                    </div>
                                    <div class="w3-rest w3-margin-left w3-container">
                                        <p><?php echo sprintf("%06d", $students[$stu]->uid) ?></p>
                                    </div>
                                </div>
                                <div class="w3-row">
                                    <div class="data-element w3-row w3-padding w3-quarter">
                                        <div class="w3-col" style="width: 50px;">
                                            <img src="../assets/icon/school-solid-full.svg" alt="">
                                        </div>
                                        <div class="w3-rest w3-margin-left w3-container">
                                            <p><?php echo $students[$stu]->classname ?></p>
                                        </div>
                                    </div>
                                    <div class="data-element w3-row w3-padding w3-half">
                                        <div class="w3-col" style="width: 50px;">
                                            <img src="../assets/icon/envelope-solid-full.svg" alt="">
                                        </div>
                                        <div class="w3-rest w3-margin-left w3-container">
                                            <p><?php echo $students[$stu]->email ?></p>
                                        </div>
                                    </div>
                                    <div class="data-element w3-row w3-padding w3-quarter">
                                        <div class="w3-col" style="width: 50px;">
                                            <img src="../assets/icon/phone-solid-full.svg" alt="">
                                        </div>
                                        <div class="w3-rest w3-margin-left w3-container">
                                            <p><?php echo $students[$stu]->phone ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w3-row">
                                    <div class="data-element w3-row w3-padding w3-quarter">
                                        <div class="w3-col" style="width: 50px;">
                                            <img src="../assets/icon/id-card-solid-full.svg" alt="">
                                        </div>
                                        <div class="w3-rest w3-margin-left w3-container">
                                            <p><?php echo $students[$stu]->icode ?></p>
                                        </div>
                                    </div>
                                    <div class="data-element w3-row w3-padding w3-half">
                                        <div class="w3-col" style="width: 50px;">
                                            <img src="../assets/icon/notes-medical-solid-full.svg" alt="">
                                        </div>
                                        <div class="w3-rest w3-margin-left w3-container">
                                            <p><?php echo $students[$stu]->mcode ?></p>
                                        </div>
                                    </div>
                                    <div class="data-element w3-row w3-padding w3-quarter">
                                        <div class="w3-col" style="width: 50px;">
                                            <img src="../assets/icon/calendar-week-solid-full.svg" alt="">
                                        </div>
                                        <div class="w3-rest w3-margin-left w3-container">
                                            <p><?php echo $students[$stu]->year ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </section>
        </main>
    </body>

    </html>
<?php
} else {
    header("Location: ../index.php");
}
?>