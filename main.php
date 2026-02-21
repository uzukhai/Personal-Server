<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Uzukhai Server</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.4/dist/tailwind.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-[url(img/bg/bg.jpg)] bg-cover bg-center min-h-screen flex flex-col">
        <div class="bg-white dark:bg-gray-800 rounded-lg px-6 py-8 ring shadow-xl ring-gray-900/5">
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="main.php" class="text-gray-900 dark:text-gray-100 hover:text-gray-500">Home</a></li>
                    <li><a href="logout.php" class="text-gray-900 dark:text-gray-100 hover:text-gray-500">Logout</a></li>
                    <li><a href="contact.php" class="text-gray-900 dark:text-gray-100 hover:text-gray-500">Contact</a></li>
                    
                </ul>
            </nav>
        </div>

        <div class="text-sm font-medium text-center text-white dark:text-black-300 border-b border-default">
            <ul class="flex flex-wrap -mb-px tabs">
                <li class="me-2">
                    <a href="#" class="inline-block p-4 border-b border-transparent rounded-t-base hover:text-fg-brand hover:border-brand">Images</a>
                </li>
                <li class="me-2">
                    <a href="#" class="inline-block p-4 text-fg-brand border-b border-brand rounded-t-base active" aria-current="page">Videos</a>
                </li>
                <li class="me-2">
                    <a href="#" class="inline-block p-4 border-b border-transparent rounded-t-base hover:text-fg-brand hover:border-brand">Files</a>
                </li>
            </ul>
        </div>

        <div id="content" class="p-6">
            <!-- Images Section -->
            <div id="imagesSection" class="tabContent">
                <h2 class="text-2xl font-bold mb-4 text-white">Images</h2>
                <div class="grid grid-cols-3 gap-4">
                    <?php
                    $images = scandir("img/");
                    foreach ($images as $image) {
                        if ($image != "." && $image != "..") {
                            echo "<img src='img/$image' class='rounded shadow'>";
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- Videos Section -->
            <div id="videosSection" class="tabContent hidden">
                <h2 class="text-2xl font-bold mb-4 text-white">Videos</h2>
                <?php
                    $videos = scandir("vid/");
                    foreach ($videos as $video) {
                        if ($video != "." && $video != "..") {
                            echo "  <video controls class='w-160 rounded shadow mb-4'>
                                    <source src='vid/$video' type='video/mp4'>
                                    </video>";
                        }
                    }
                    ?>
            </div>
            <!-- Files Section -->
            <div id="filesSection" class="tabContent hidden">
                <h2 class="text-2xl font-bold mb-4 text-white">Files</h2>
                <ul class="space-y-2">
                    <?php
                    $files = scandir("files/");
                    foreach ($files as $file) {
                        if ($file != "." && $file != "..") {
                            echo "<li><a target='_blank' href='files/$file' class='text-blue-500 hover:underline'>$file</a></li>";
                        }
                    }
                    ?>
                </ul>
            </div>

        </div>

        <script>
            const tabs = document.querySelectorAll("ul.tabs li a");
            const sections = document.querySelectorAll(".tabContent");

            tabs.forEach(tab => {
                tab.addEventListener("click", function(e) {
                    e.preventDefault();

                    // Hide all sections
                    sections.forEach(section => {
                        section.classList.add("hidden");
                    });

                    // Remove active style
                    tabs.forEach(t => {
                        t.classList.remove("border-brand", "text-fg-brand");
                    });

                    // Show correct section
                    if (this.textContent.includes("Images")) {
                        document.getElementById("imagesSection").classList.remove("hidden");
                    }
                    if (this.textContent.includes("Videos")) {
                        document.getElementById("videosSection").classList.remove("hidden");
                    }
                    if (this.textContent.includes("Files")) {
                        document.getElementById("filesSection").classList.remove("hidden");
                    }
                });
            });
        </script>
        
    </body>
    <footer>
        <div class="bg-white dark:bg-gray-800 rounded-lg px-6 py-8 ring shadow-xl ring-gray-900/5 mt-4 bottom-0 left-0 w-full">
            <p class="text-gray-700 dark:text-gray-300 mb-4 text-center">© 2026 Uzukhai. All rights reserved.</p>
        </div>
    </footer>
    
</html>
