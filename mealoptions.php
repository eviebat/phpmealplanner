<!--mealoptions.php defines a function that pulls all of the meals in
each meal file and prints them to the screen. This allows the user
to view the meals available to them. There is a link page to the homepage. -->
<html>
<body>
<?php
//Defines the function that opens a file and read each line
// until the end of file.
function readmeal($filename) {
$meals = fopen($filename, "r") or die("Unable to open file $filename");
  while(!feof($meals)) {
    echo fgets($meals)."<br>";
}
fclose($meals);
}

//Data from post method from homepage.php directs the if statement
// to look at the vegetarian options or the gluten free options
if ($_POST["dietarypreference"] == vegetarianonly) {
  echo "<h1>Vegetarian Options </h1>";
  echo "<b>Breakfasts:</b> <br>";
  readmeal("breakfast.txt");
  echo "<br>";
  echo "<b>Lunches: </b><br>";
  readmeal("lunch.txt");
  echo "<br>";
  echo "<b>Snacks: </b><br>";
  readmeal("snack.txt");
  echo "<br>";
  echo "<b>Dinners: </b><br>";
  readmeal("dinner.txt");
  echo "<br>";
} elseif($_POST["dietarypreference"] == glutenfree) {
  echo "<h1>Gluten Free Options </h1>";
  echo "<b>Breakfasts: </b><br>";
  readmeal("breakfastGF.txt");
  echo "<br>";
  echo "<b>Lunches: </b><br>";
  readmeal("lunchGF.txt");
  echo "<br>";
  echo "<b>Snacks: </b><br>";
  readmeal("snacksGF.txt");
  echo "<br>";
  echo "<b>Dinners: </b><br>";
  readmeal("dinnerGF.txt");
  echo "<br>";
} else {
	//If user links to this page without linking from homepage.php
	print "Unable to view menus, please return to homepage and try again.<br><br>";
}
?>
<a href="homepage.php">Back to home</a>


</body>
</html>
