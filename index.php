<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MDL App</title>
    <link rel="icon" type="image/x-icon" href="assets/logo.png" />
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<?php

$zipped = 0;


if (isset($_GET['download'])) {
    echo $_GET['download'];
    switch ($_GET['download']) {
        case 1:
            createZip('notifSender.zip', 'assets/notifSender/');
            break;
        case 2:
            createZip('notifSender_UPDATE.zip', 'assets/notifSender_UPDATE/');
            break;
    }
}

function createZip($zipName, $dir)
{
    $rootPath = realpath($dir);
    $zip = new ZipArchive();
    $zip->open($zipName, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    /** @var SplFileInfo[] $files */
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $file) {
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);
            $zip->addFile($filePath, $relativePath);
        }
    }
    $zip->close();
    header("Location: " . $zipName);
}
?>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">MDL App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Tools</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Harga</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Hubungi Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://laundry.mdl.my.id/Register">Daftar</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://laundry.mdl.my.id/Login">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">MDL Application</div>
            <div class="masthead-heading text-uppercase">Aplikasi Laundry</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#portfolio">Selengkapnya</a>
        </div>
    </header>
    <!-- Services-->
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Fitur</h2>
                <h3 class="section-subheading text-muted">Fitur akan selalu update mengikuti perkembangan zaman</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal">
                            <img class="img-fluid" src="assets/img/portfolio/1.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Customer Notification</div>
                            <div class="portfolio-caption-subheading text-muted">Mengirim notifikasi ke pelanggan mengenai penerimaan dan penyelesaian</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal">
                            <img class="img-fluid" src="assets/img/portfolio/2.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Deposit Paket Member</div>
                            <div class="portfolio-caption-subheading text-muted">Deposit paket yang memudahkan berlangganan</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal">
                            <img class="img-fluid" src="assets/img/portfolio/3.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Poin Reward</div>
                            <div class="portfolio-caption-subheading text-muted">Akumulasi poin dan berikan reward untuk pelanggan setia</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Tools</h2>
                <h3 class="section-subheading text-muted">Tools pendukung Aplikasi</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Notif Sender</h4>
                    <p class="text-muted">Whatsapp dan SMS Sender</p>
                    <!-- Auto width -->
                    <button class="btn"><a href="index.php?download=1" style="text-decoration: none;"> <b>FULL</b> Patch</a></button>
                    <button class="btn"><a href="index.php?download=2" style="text-decoration: none;"> <b>UPDATE</b> Patch</a></button>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Telegram Group</h4>
                    <p class="text-muted">Group informasi penggunaan aplikasi</p>
                    <!-- Auto width -->
                    <button class="btn"><a href="https://t.me/mdlapp" target="_blank" style="text-decoration: none;"> Join Group</a></button>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Whatsapp Group</h4>
                    <p class="text-muted">Group informasi penggunaan aplikasi</p>
                    <!-- Auto width -->
                    <button class="btn"><a href="https://chat.whatsapp.com/EaS2dd3QIR35cb52uL4thf" target="_blank" style="text-decoration: none;"> Join Group</a></button>
                </div>
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Tentang</h2>
                <h3 class="section-subheading text-muted">Riwayat Aplikasi</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2016-2021</h4>
                            <h4 class="subheading">MDL App Desktop Version</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Aplikasi MDL dibuat dan dikembangna dalam versi Desktop yang berjalan pada sistem operasi Windows</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>January 2022</h4>
                            <h4 class="subheading">MDL App Web Version</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Mengingat diperlukannya aplikasi yang lebih fleksibel, mudah di akses dari mana saja, dan dapat dikembangkan lebih jauh lagi, Developer memutuskan membuat MDL App berbasis Web.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Harga</h2>
                <h3 class="section-subheading text-muted">Tarif penggunaan aplikasi</h3>
            </div>
            <div class="row">
                <div class="col">
                    <div class="team-member">
                        <h4>Rp60,000/bulan/cabang</h4>
                        <p class="text-muted">Harga dapat berubah sewaktu-waktu tanpa pemberitahuan terlebih dahulu</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Hubungi Kami</h2>
                <h3 class="section-subheading text-muted">Silahkan tinggal pesan</h3>
            </div>
            <div class="row align-items-stretch mb-5">
                <div class="col">
                    <div class="team-member">
                        <h4 class="text-light">WA/Telegram</h4>
                        <p class="text-light">0812 6809 8300<br>0852 7811 4125</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">MDL App 2022</div>
                <div class="col-lg-4 my-3 my-lg-0">

                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>

<script src="js/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        setTimeout(() => {}, 3000);
    });
</script>