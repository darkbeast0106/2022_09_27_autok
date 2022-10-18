<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autók</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        addEventListener("DOMContentLoaded", () => {
            const oldal = "<?php echo isset($_GET['oldal']) ? $_GET['oldal'] : "" ?>";
            if (oldal.length > 0) {
                const navLink = document.getElementById('nav_' + oldal);
                navLink.classList.add('active');
            } else {
                const navLink = document.getElementById('nav_listaz');
                navLink.classList.add('active');
            }
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Autók</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a id="nav_listaz" class="nav-link" aria-current="page" href="index.php?oldal=listaz">Autók listázása</a>
                    </li>
                    <li class="nav-item">
                        <a id="nav_felvetel" class="nav-link" href="index.php?oldal=felvetel">Autó felvétele</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        <?php include $oldal; ?>
    </main>

</body>

</html>