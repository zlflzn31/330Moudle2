// use the unlink function in php
<?php
$fh = fopen('test.html', 'a');
fwrite($fh, '<h1>Hello world!</h1>');
fclose($fh);

unlink('test.html');
?>
//this is copied from the php website
// not sure yet how to load for each
// may call in a form for each file.
// cannot test yet
