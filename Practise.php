<?php


//Create a function called isAdult($age) that returns true if the age is 18 or above, and false otherwise.


function isAdult ($age) {
    return $age >=18;
}
    //Example use 
$age = 20;
if (isAdult($age)) {
    echo "You are an adult.\n";
} else {
    echo "You are a minor.\n";
}

//Ternary Operator 

function isAdultone ($age) {
    return $age >=18 ? true:false;
}

$age =17;
echo isAdultone($age) ? "You are an adult.\n":"You are a minoor.\n";


//class method 
class Person {
    public $age;

    public function __construct($age){
        $this->age = $age;
    }

    public function isAdulttwo(){
        return $this->age >= 18;
    }
}

$person = new Person(19);
echo $person->isAdulttwo() ? "You are an adult\n" : "You are a minor\n";

//Using type hinting 

function isAdultthree (int $age): bool {
    return $age >=18;
}

$age = 15;
echo isAdultthree($age) ? "you are an adult\n" : "You are a minor\n";


//multidimensional arrays

$employees = [
    ["name" => "John" , "age" => 39],
    ["name" =>"Jane", "age" =>25]

];
echo $employees [1] ["name"];

//indexed arrays

$fruits =["apple" , "Banana" , "Orange"];

echo $fruits[1];

//assosiative  arrays
$person = ["name" => "John", "age"  => 30];
  echo $person["name"];



  //superglobals

//1 $_GET: it retrieves data from the query string (URL parameters)
//example url can  be example.com/page.php?name=John
echo $_GET['name'];


//$_POST: retrieves daya sent from a form using POST method

echo $_POST['email'];

// $_SESSION : used foro sroting session data

session_start();
$_SESSION['user'] = "John Doe";

//$_FILES: handles the uploads

$file = $_FILES ['upload_file'];

//File handling
//opening a file

$file = fopen("example.txt" , "r"); 
//reading a file

$content = fread($file, filesize("example.txt"));
//writing to a file:
$file = fopen("example.txt","w" );
fwrite($file, "Hello, world!");
fclose($file);

//sessions 
//starting a session 
session_start();
//storing data in session
$_SESSION['username'] = "JohnDoe";
//accessing session data
echo $_session['username'];
//destroying a session
session_destroy();

?>