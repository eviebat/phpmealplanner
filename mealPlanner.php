<!--mealPlanner.php creates a meal schedule for a week. Depending on dietary preference selected on homepage.php(and
transferred using POST method) it will open the corresponding meal menus and randomly select one for each day of the
 week. The user can then decide if they want to save it or try again.  -->
<html>
<body>
<?php
$days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"); //Create an array of days
 function grabMeal($filename){
 	$meals = file($filename) or die ("Could not open file $filename");     //Reads meal file into an array
 	$meal = $meals[array_rand($meals)];                                   //Selects random meal in meal array
 	return $meal;														//Returns this random meal
 }
$menuheader = $_POST["name"] . "s Menu";
$menufile = fopen("menu.html", "w");

if($_POST["dietarypreference"] == vegetarianonly) {
$menuheader = "<b>$menuheader" . "(Vegetarian)</b>";
echo "$menuheader";
fwrite($menufile, $menuheader);	
  foreach($days as $day) {											//Loops through each day of the days array
   $breakfast = grabMeal("meals/breakfast.txt"); 							//Loads breakfast meal
   $lunch = grabMeal("meals/lunch.txt");									//Loads lunch meal
   $snack = grabMeal("meals/snack.txt");									//Loads snack meal
   $dinner = grabMeal("meals/dinner.txt");									//Loads dinner meal
   $menu = "<br>$day <br>Breakfast: $breakfast<br>Lunch: $lunch
   <br>Snack: $snack<br>Dinner: $dinner<br>-----------------------------<br>"; //Creates a menu for the day

   print $menu;
   $menufile = fopen("menu.html", "a") or die ("Unable to open file!");		//Opens menu html file
   fwrite($menufile,$menu);													//Writes menu to file
   fclose($menufile);															//Closes file
  }
} elseif ($_POST["dietarypreference"] == glutenfree) {
 $menuheader = "<b>$menuheader " . "(Gluten Free)</b>";
 echo "$menuheader";
 fwrite($menufile, $menuheader);
  foreach($days as $day) {											//Loops through each day of the days array
   $breakfast = grabMeal("meals/breakfastGF.txt"); 							//Loads breakfast meal
   $lunch = grabMeal("meals/lunchGF.txt");									//Loads lunch meal
   $snack = grabMeal("meals/snacksGF.txt");									//Loads snack meal
   $dinner = grabMeal("meals/dinnerGF.txt");									//Loads dinner meal
   $menu = "<br>$day <br>Breakfast: $breakfast<br>Lunch: $lunch
   <br>Snack: $snack<br>Dinner: $dinner<br>-----------------------------<br>"; //Creates a menu for the day

   print $menu;
   $menufile = fopen("menu.html", "a") or die ("Unable to open file!");		//Opens menu html file
   fwrite($menufile,$menu);													//Writes menu to file
   fclose($menufile);															//Closes file
  }
} else {
	//If user links to page from anywhere but homepage.php the if statement 
	//will not know which dietary preference the user prefers - this will
	//redirect them to link from homepage.php
	print "<br>Unable to establish meal preference, please select 'Try again' 
	to return to homepage<br><br>";
}
?>
<a href="menu.html">Save</a>
<a href="homepage.php">Try again</a>




</body>
</html>