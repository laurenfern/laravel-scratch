<h1>This is the test page</h1>
<!-- when referencing variables use blade, laravel's templating engine,
 to escape the data. that's what
the double curlies {{}} are. this is an alternative to manually echoing values.
and using htmlspecialchars to escape the values.
Blade will compile this down to do all that for us. 
Note: in order for this file to have access to the value of the variable $name below,
the file routes/web.php must pass this data to this view, lines 24-25  -->
<h2>{{$name}};</h2> 