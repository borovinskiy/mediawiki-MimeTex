<?php
 
$wgExtensionFunctions[] = "MimetexExtension";
 
function MimetexExtension() {
    global $wgParser;
 
    $wgParser->setHook( "math", "render_Mimetex" );
}
 
/**
* Renders $text in Mimetex
*/
 
function render_Mimetex($input, $argv, $parser = null) {
 
  if (!$parser) $parser =& $GLOBALS['wgParser'];
 
  // $img_url is the url the mimetex will be sent to.
  // IMPORTANT!! The URL below should be the link to YOUR mimetex.cgi if possible
  $img_url = "http://k.psu.ru/docs/converter/tex/image.png?".rawurlencode($input);
 
  // Sets the output of the tex tag using the url from above, and the input as
  // the Alt text.  It's important to note that there is no error output added yet.
  $output = "<img src=\"$img_url\" alt=\"LaTeX: " . htmlspecialchars($input) . "\" />";
 
  //return $output;
  return array($output, 'noparse' => true, 'isHTML' => true);
}
?>
