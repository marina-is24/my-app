<?php

$continue = true;

while ($continue) {
   
    $input = readline("Type something (type 'exit' to quit): ");

    
    if ($input === 'exit') {
        $continue = false; 
    } else {
        
        switch ($input) {
            case "hello":
                echo "Hello there!\n";
                break;
            case "how are you?":
                echo "I'm just a script, but I'm doing well!\n";
                break;
            case "how old are you?":
                echo "I never get old!\n";
                break;
            default:
                echo "You entered: $input\n";
        }

        
        $userInputs[] = $input;
    }
}

?>
