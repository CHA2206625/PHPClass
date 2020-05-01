
<?php // Script final list_dir.php
include('templates/header.html');
date_default_timezone_set('America/Phoenix');

// set directory name and scan it
$search_dir = '.';
$contents = scandir($search_dir);

// list the directories first
// print a caption and start a list
print '<div class="welcome"><div class="seethru2 height"><hr/><h2>Site Directory</h2>
<ul>';
foreach ($contents as $item) {
	if ( ( is_dir($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.')) { // the substring looks for hidden files that start with a period '.'
		print "<li>$item</li>\n";
	}
}
print '</ul></div></div>'; // close the list

// -------Create a table header
print'<div class="edit bottomtable"><div class="height"><hr/><h2>Files</h2>
<table  cellpadding="2" cellspacing="2" >
<tr>
	<th>Name</th>
	<th>Size</th>
	<th>Last Modified</th>
</tr>';

// list the files
foreach ($contents as $item) {
	if((is_file($search_dir . '/' . $item)) AND (substr($item, 0, 1) != '.')) {
		
		//get file size
		$fs = filesize($search_dir . '/' . $item);
		
		// get files modification date
		$lm = date('F j, Y', filemtime($search_dir . '/' . $item));
		
		// print the info
		print "<tr>
		<td>$item</td>
		<td>$fs bytes</td>
		<td>$lm</td>
		</tr>\n";
		
	} // close if statement
} // close FOREACH 

print '</table></div></div>'; // close HTML table
?>

<?php // Return to PHP.
include('templates/footer.html');
//includes the footer.

?>



