<? 
/******************************************************************** 
* function that reads directory content and 
* returns the result as links to every file in the directory 
* 
* toss it into any directory and get a list of links to every file 
* 
* This program is free software licensed under the 
* GNU General Public License (GPL). 
* 
*********************************************************************/ 
function directory($result) { 

$handle=opendir("."); 
while ($file = readdir($handle)) { 
if ($file == "." || $file == ".." || $file == 'index.php') { } else { print "<a href=$file>$file</a><br>\n"; } 

} 
closedir($handle); 

return $result; 
} 


?> 
<? 
echo directory($result); 
?>