<?php

# Wipe out public_html
if (is_dir("public_html")) {
  $files = scandir("public_html");
  foreach($files as $file) {
    if (is_file("public_html/$file")) {
      unlink("public_html/$file");
    }
  }
}
system("php index.php");
system("php content.php");
system("php book.php");

if (is_file("style.css")) {
  copy("style.css", "public_html/style.css");
}

if (is_file("favicon.ico")) {
  copy("favicon.ico", "public_html/favicon.ico");
}

copy("error.html", "public_html/error.html");

copy("robots.txt", "public_html/robots.txt");
