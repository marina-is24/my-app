<?php

do {
   
    $input = readline("Type something (type 'exit' to quit): ");

   
    if ($input !== 'exit') {
  
        echo $input."\n";
    }

} while ($input !== 'exit');

echo "Goodbye!\n";

?>
