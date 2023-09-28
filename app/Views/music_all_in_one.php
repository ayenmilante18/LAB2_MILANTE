<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #searchInput, .music-list, .now-playing {
            padding: 6px 12px;
            height: 40px;
            width: 100%; /* Use 100% width for equal columns */
            border: 2px solid black; /* Default border properties */
            border-radius: 5px; /* Optional: Add border radius for rounded corners */
            transition: border-color 0.3s; /* Smooth transition for the border color */
        }

        .container {
            background-color: white;
            color: #333;
            font-family: Arial, sans-serif;
            max-width: 10000px; 
        }

        .container h2 {
            text-align: center;
        }

        .table-container {
            margin: center;
        }

        .table-container table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid black;
        }

        .table-container th, .table-container td {
            border: 2px solid black;
            padding: 10px;
            text-align: center;
        }

        .table-container th {
            background-color: #0074D9;
            color: #fff;
        }

        .table-container tr:hover {
            background-color: #f0f0f0; 
        }
        .border-button {
    border: 1px solid #0074D9; 
    border-radius: 3px; 
    padding: 5px 15px; 
    margin: 0;
}

    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container d-flex flex-column align-items-center">
        <h2 class="mb-0 mt-4">The Upload And PlayList Button</h2>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary ms-2 border-button mt-4" href="/upload">Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary ms-2 border-button mt-4" href="music/add_playlist">Add Playlist</a>
                </li>
            </ul>
        </div>
    </div>
</nav>





    <div class="container mt-5">
        <div class="row">
            <!-- Search Music Field  -->
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Search Music</h2>
                <div class="input-group mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search by Title and Playlist">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">Search</button>
                    </div>
                </div>
            </div>

            <!-- Music List  -->
            <div class="col-md-6 offset-md-3 table-container">
                <h2 class="text-center">Music List</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Playlist</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($music) && count($music) > 0): ?>
                            <?php foreach ($music as $song): ?>
                                <tr>
                                    <td><?= $song['title'] ?></td>
                                    <td><?= $song['playlist'] ?></td>
                                    <td>
                                        <a href="<?= site_url('music/play/' . $song['id']) ?>" class="btn btn-primary btn-sm">Play</a>
                                        <a href="<?= site_url('music/delete/' . $song['id']) ?>" class="btn btn-danger btn-sm delete-button">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center">No music available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Now Playing  -->
            <div class="col-md-6 offset-md-3">
                <br>
                <br>
                <div class="now-playing">
                    <h3 class="text-center">Now Playing</h3>
                    <?php if (isset($music_to_play)): ?>
                        <h3><strong>Title:</strong> <?= $music_to_play['title'] ?></h3>
                        <h5><strong>Playlist:</strong> <?= $music_to_play['playlist'] ?></h5>
                        <audio controls>
                            <source src="<?= base_url('uploads/' . $music_to_play['file_name']) ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <a href="javascript:history.back()" class="btn btn-primary btn-block mt-3">Go Back</a>
                    <?php else: ?>
                        <p class="text-center">None</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

  <!-- Include Bootstrap JS and jQuery (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // JavaScript for live search
        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("tbody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Enable all delete buttons initially
            $(".delete-button").prop("disabled", false);

            // Handle delete button click
            $(".delete-button").click(function () {
                var row = $(this).closest("tr");
                var songTitle = row.find("td:eq(0)").text();
                var confirmation = confirm("Are you sure you want to delete the song: " + songTitle + "?");
                if (confirmation) {
                    // Handle the deletion logic here
                    // You can use AJAX or other methods to delete the song
                    // For now, we'll simply remove the row
                    row.remove();
                }
            });
        });
    </script>
</body>

</html>
