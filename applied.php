<!-- index.php (Student Portal) -->
<?php
// Function to read requests from JSON file
function readRequests() {
    $requestsFile = 'requests.json';
    if (file_exists($requestsFile)) {
        $json = file_get_contents($requestsFile);
        return json_decode($json, true);
    } else {
        return [];
    }
}

$requests = readRequests();

// Function to get status for a specific request type
function getRequestStatus($requestType, $requests) {
    foreach ($requests as $request) {
        if (isset($request['requestText']) && $request['requestText'] === $requestType) {
            return isset($request['status']) ? $request['status'] : 'Pending';
        }
    }
    return 'Pending';
}
?>


<!doctype html>
<html lang="en">
    <head>
        <title>Student Profile - S0ul Society</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="icon" type="image/png" href="https://srec.ac.in/uploads/news/sreclogo231121084746.jpg">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header class="fixed-top">
            <div class="d-flex flex-row justify-content-between ">
                <div class="d-flex flex-row justify-content-start ">
                    <img src="/images/nova.png" alt="">
                    <img src="https://srec.ac.in/uploads/news/sreclogo231121084746.jpg" class="srec-logo m-2">
                </div>
                <h1 style="font-size: large; font-weight: bolder; margin: 18px;">SRI RAMAKRISHNA ENGINEERING COLLEGE</h1>
                <div class="d-flex flex-row justify-content-start">
                    <div >
                        <p class="head-p m-2">Name: <b>ARUNMOZHI VARMAN</b></p>
                        <P class="head-p m-2">Last Login: <b>2024-02-07 01:02:51</b></P>
                    </div>
                    <img src="/images/no_image.jpg" class="no-img small m-2">
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div class="d-flex flex-row justify-content-start" style="margin-left: 15px;">
                    <i class="fa-solid fa-house mini p-3"></i>
                    <button class="mini mini-btn ">
                        Academics 
                        <i class="fa-solid fa-chevron-down rotate"></i>
                    </button>
                    <button class="mini mini-btn">
                        Administration 
                        <i class="fa-solid fa-chevron-down rotate"></i>
                    </button>
                    <button class="mini mini-btn" onclick="window.location.href='bonafide.php'">
                        Bonafide 
                        <i class="fa-solid fa-chevron-down rotate"></i>
                    </button>
                </div>
                <div class="d-flex flex-row justify-content-start" style="margin-right: 22px;">
                    <p class="link-t mini p-1">You are in:</p>
                    <a href="#"><i class="fa-regular fa-copy mini p-2"></i></a>
                    
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div class="flash-news">
                    FLASH NEWS
                </div>
                <div class="scrolling-text-container">
                    <div class="scrolling-text">
                        B.E/ B.Tech / ME / MTECH / MBA - 3/5/7 th sem UG  & 3rd Sem PG End Semester Examination Results - NOV/DEC 2023 | Specialization/Minor Results - 2021 Batch - 5 th sem  -Published
                    </div>
                  </div>
            </div>
        </header>
        <br><br><br><br><br><br>
        <main>
            <div class="bon-back">
                <div class="bon-buttons">
                    <button class="mini mini-btn" onclick="window.location.href='bonafide.php'"> New bonafide</button>
                    <button class="mini mini-btn" onclick="window.location.href='applied.php'">Applied bonafide</button>
                </div>
                <div class="bon-in">
                <div id="certificate_status" class="m-5">
                    <h3 class="card p-1 shadow"><b>Certificate Status</b></h3>
                    <ul class="card p-3 shadow">
                        <?php
                        // Array of certificate types
                        $certificateTypes = [
                            'bonafide' => 'Bonafide Certificate',
                            'no_objection' => 'No Objection Certificate',
                            'character' => 'Character Certificate',
                            'internship' => 'Internship Certificate',
                            'project_completion' => 'Project Completion Certificate',
                            'attendance' => 'Attendance Certificate',
                            'conduct' => 'Conduct Certificate',
                            'library_clearance' => 'Library Clearance Certificate',
                            'sports_participation' => 'Sports Participation Certificate',
                            'loan_availing_bonafide' => 'Loan Availing Bonafide Certificate'
                        ];
                        
                        // Loop through certificate types and display their status if requested
                        foreach ($certificateTypes as $type => $name) {
                            $status = getRequestStatus("Request for $name", $requests);
                            if ($status !== 'Pending') {
                                echo "<li class='card m-3 p-3 w-50 shadow'>$name Status: <b>$status</b></li>";
                            }
                            if ($status !== 'approved') {
                                echo "<a href=""></a>";
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        



        </main>
        <br><br><br><br><br><br><br>
        <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark" style="height: 32px;">
          <div class="container-fluid d-flex flex-row justify-content-between">
            <p>.</p>
            <a class="navbar-brand" style="font-size: 12px; color: white;" href="#">Note: Software Best Viewed on Latest Browsers</a>
            <a class="nav-link " style="font-size: 12px; color: white;" href="#">Powered by <span style="text-decoration: underline;">soul society</span></a>
          </div>
        </nav>
        <!-- Bootstrap JavaScript Libraries -->


        <script src="https://web3forms.com/client/script.js" async defer></script>
        <script src="script.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>
        <script src="https://kit.fontawesome.com/101d0c7eea.js" crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
