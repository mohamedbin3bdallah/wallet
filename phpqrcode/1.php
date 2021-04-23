<?php 
//echo base64_encode(file_get_contents('logo.jpg'));
    include('qrlib.php'); 

    // how to build raw content - QRCode to send SMS 
     
    $tempDir = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR; 
	
	$PNG_WEB_DIR = 'temp/';
     
    // we building raw data 
	/*$codeContents  = 'BEGIN:VCARD'."\n"; 
    $codeContents .= 'FN:Mohamed Abdallah'."\n"; 
    $codeContents .= 'TEL;WORK;VOICE:(039)012-345-678'."\n"; 
	$codeContents .= 'Mail:ccc@ccc.com'; 
	$codeContents .= 'PHOTO;JPEG;ENCODING=BASE64:'.base64_encode(file_get_contents('logo.png'))."\n"; 
    $codeContents .= 'END:VCARD'; */
     
	 
	  $name         = 'John Doe'; 
    $sortName     = 'Doe;John'; 
    $phone        = '(049)012-345-678'; 
    $phonePrivate = '(049)012-345-987'; 
    $phoneCell    = '(049)888-123-123'; 
    $orgName      = 'My Company Inc.'; 

    $email        = 'john.doe@example.com'; 

    // if not used - leave blank! 
    $addressLabel     = 'Our Office'; 
    $addressPobox     = ''; 
    $addressExt       = 'Suite 123'; 
    $addressStreet    = '7th Avenue'; 
    $addressTown      = 'New York'; 
    $addressRegion    = 'NY'; 
    $addressPostCode  = '91921-1234'; 
    $addressCountry   = 'USA'; 

    // we building raw data 
    $codeContents  = 'BEGIN:VCARD'."\n"; 
    $codeContents .= 'VERSION:2.1'."\n"; 
    $codeContents .= 'N:'.$sortName."\n"; 
    $codeContents .= 'FN:'.$name."\n"; 
    $codeContents .= 'ORG:'.$orgName."\n"; 

    $codeContents .= 'TEL;WORK;VOICE:'.$phone."\n"; 
    $codeContents .= 'TEL;HOME;VOICE:'.$phonePrivate."\n"; 
    $codeContents .= 'TEL;TYPE=cell:'.$phoneCell."\n"; 

    $codeContents .= 'ADR;TYPE=work;'. 
        'LABEL="'.$addressLabel.'":' 
        .$addressPobox.';' 
        .$addressExt.';' 
        .$addressStreet.';' 
        .$addressTown.';' 
        .$addressPostCode.';' 
        .$addressCountry 
    ."\n"; 

    $codeContents .= 'EMAIL:'.$email."\n"; 
	
	$codeContents .= 'PHOTO;JPEG;ENCODING=BASE64:'.base64_encode(file_get_contents('logo.jpg'))."\n"; 

    $codeContents .= 'END:VCARD'; 
	
    // generating 
    print_r(QRcode::png($codeContents, $tempDir.'022.png', QR_ECLEVEL_H, 10)); 
    
    // displaying 
    //echo '<img src="'.$PNG_WEB_DIR.'022.png" />';