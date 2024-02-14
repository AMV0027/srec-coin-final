<!-- faculty.php (Faculty Portal) -->
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

// Function to save requests to JSON file
function saveRequests($requests) {
    $json = json_encode($requests, JSON_PRETTY_PRINT);
    if (file_put_contents('requests.json', $json) !== false) {
        echo "Requests saved successfully.";
    } else {
        echo "Failed to save requests.";
    }
}

$requests = readRequests();

// Handle approve or reject actions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['approve']) || isset($_POST['reject'])) {
        $requestIndex = $_POST['requestIndex'];
        $status = isset($_POST['approve']) ? 'Approved' : 'Rejected';
        $requests[$requestIndex]['status'] = $status;
        saveRequests($requests);
    } else {
        echo "No approve or reject action received.";
    }
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
                        <p class="head-p m-2">Name: <b>Suresh kumar [FACULTY]</b></p>
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
                    <button class="mini mini-btn" onclick="window.location.href='Bonafide.html'">
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
            <div class="bon-card d-flex flex-row justify-content-start">
                <i class="fa-solid fa-layer-group"></i>
                <p>Bonafide - management</p>
            </div>
            <div class="bon-back">
                <div class="bon-in">
                    <div class="container">
                    <div id="requests" class="faculty">
                                <h3 class="card w-100 p-1 shadow ">Bonafide Requests</h3>
                                <?php if (empty($requests)): ?>
                                    <p>No requests found.</p>
                                <?php else: ?>
                                    <ul>
                                    <?php 
                                    // Loop through the requests in reverse order to display the most recent first
                                    for ($i = count($requests) - 1; $i >= 0; $i--):
                                        $request = $requests[$i];
                                    ?>
                                        <li class=" card m-3 p-3 shadow">
                                            <strong>Student: </strong><?php echo isset($request['studentName']) ? $request['studentName'] : 'Unknown'; ?><br>
                                            <strong>Request: </strong><?php echo isset($request['requestText']) ? $request['requestText'] : 'Unknown'; ?><br>
                                            <strong>Status: </strong>
                                            <?php echo isset($request['status']) ? $request['status'] : 'Pending'; ?><br>
                                            <?php if (!isset($request['status'])): ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="requestIndex" value="<?php echo $i; ?>">
                                                    <button class="btn btn-success m-1" type="submit" name="approve">Approve</button>
                                                    <button class="btn btn-danger m-1" type="submit" name="reject">Reject</button>
                                                </form>
                                            <?php endif; ?>
                                        </li>
                                    <?php endfor; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
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
