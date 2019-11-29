<?php

$files = scandir("src");
foreach($files as $file) {
  if (is_file("src/$file")) {
    if (strpos("src/$file", ".meta") !== FALSE) {
      continue;
    }
    ob_start();

    # Doctype
    if (is_file("doctype")) {
      echo file_get_contents("doctype");
    }

    # HTML tag
    if (is_file("html")) {
      echo file_get_contents("html");
    }

    # Head
    if (is_file("head")) {
      $head = file_get_contents("head");
    }

    # Replace default metatags if they are set
    if (is_file("src/$file.meta")) {
      $pattern = '/<!-- SNB_META -->(.*)<!-- \/SNB_META -->' . PHP_EOL . '/s';
      $replacement = file_get_contents("src/$file.meta");
      echo preg_replace($pattern, $replacement, $head);
    } else {
      echo $head;
    }

    # Body
    if (is_file("body")) {
      echo file_get_contents("body");
    }

    echo file_get_contents("src/$file");

    # Footer of Index File
    if (is_file("footer")) {
      echo file_get_contents("footer");
    }

    # Body closing tag
    if (is_file("cbody")) {
      echo file_get_contents("cbody");
    }

    # HTML closing tag
    if (is_file("chtml")) {
      echo file_get_contents("chtml");
    }

    $result = ob_get_clean();
    file_put_contents("public_html/$file.html", $result);
  }
}

