<!--This is the starting homepage. This will direct the user to 
	enter their name and select their dietary preference. They can also use this 
	homepage link to view the meals available to them. -->

<html>
<h1>Meat-less meal planner</h1>
<body>
<!--This creates a form that directs the input to mealPlanner.php using
 the post method to save the variables. -->
<form action ="mealPlanner.php" method="post">
Name: <input type="text" name="name"><br>
<input type="radio" name="dietarypreference" value="vegetarianonly" checked>Vegetarian Only<br>
<input type="radio" name="dietarypreference" value="glutenfree">Gluten Free<br>
<input type="submit" value="Plan my meals!"><br>
</form>
<!--Cute GIF -->
<img src="http://i.giphy.com/LV2BmFVykzVTy.gif">
<br><br>

<!--A form that allows the user to link to mealoptions.php which
	shows all of the meal options. The form uses the post method to 
	tell mealoptions.php which meals the user wants to view. -->
<form action="mealoptions.php" method="post">
<input type="radio" name="dietarypreference" value="vegetarianonly" checked>Vegetarian Only<br>
<input type="radio" name="dietarypreference" value="glutenfree">Gluten Free<br>
<input type="submit" value="View all meal options"><br>
</form>

</body>
</html>