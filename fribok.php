<?php
$bookid = "2008073100064"; 
$maxp = 213;
$preurl = 'http://www.nb.no/services/image/resolver?url_ver=geneza&urn=URN:NBN:no-nb_digibok_';
$posturl = '&maxLevel=6&level=4&col=0&row=0&resX=2504&resY=3792&tileWidth=1024&tileHeight=1024';

echo "Saved page :      ";  // 5 characters of padding at the end
for ($p = 1; $p <= $maxp; $p++) {
  $paddedp = sprintf("%'.04d", $p);
  $url = $preurl.$bookid.'_'.$paddedp.$posturl;
  $img = './fribok_'.$bookid.'_'.$p.'.jpg';
  if ($file = @file_get_contents($url)) {
    file_put_contents($img, $file);
    printstatus ($paddedp);
  }
}
print "  - DONE\n";

function printstatus ($p) {
  echo "\033[4D";      // Move 4 characters backward
  echo str_pad($p, 3, ' ', STR_PAD_LEFT) ; // output is already padded
}