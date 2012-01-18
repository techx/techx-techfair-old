<?php
if (!isset($_GET['i'])) {
	header('Location: /');
}
$mysqli = new mysqli('sql.mit.edu','techfair','02139techfair','techfair+dough');
if (mysqli_connect_errno()) {
	printf("MySQL connect failed: %s\n", mysqli_connect_error());
	exit();
}
$hash = $_GET['i'];
if ($stmt = $mysqli->prepare("SELECT name, cost, package, invoice FROM payment_2012 WHERE hash=?")) {
	$stmt->bind_param("s", $hash);
	$stmt->execute();
	$stmt->bind_result($name, $cost, $package, $invoice);
	if (!$stmt->fetch()) {
		header('Location: /');
	}
	$stmt->close();
} else {
	header('Location: /');
}
$mysqli->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
  <head>
    <title>MIT Techfair Web Payment Form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="pragma" content="no-cache" />

    <style type="text/css">
    img { border:none !important;}
    body {
  font-family: arial, helvetica, sans-serif;
  font-size: 12px;
  margin: 10px 10px 10px 10px;
}

.required {
  font-weight: bold;
  color: #000000;
}

.section_break {
  background: #e4e4e4;
  font-size: 12px;
  font-weight: bold;
  padding-left: 5px;
  color: #000000;
}

table {
  font-family: arial, helvetica, sans-serif;
  font-size: 12px;
  border-spacing: 0px;
  border: 0px;
  vertical-align: top;
}

.status {
  border: 1px solid #cccc99;
  background-color: #f7f7e7;
  padding: 5px;
  margin: 10px 0px 10px 0px;
  width: 490;
}

.msghead {
  font-weight: bold;
}
.buy_button {
width: 100;
font-size: 14px;
font-weight: bold;
}

caption.receipt_caption {
  font-size: 12px;
  font-weight: bold;
  text-align: left;
}

h1 {
  font-size: 14px;
  font-weight: bold;
}

input {
  font-size: 12px;
  font-family: arial, helvetica, sans-serif;
}
.privacyStatement {
  margin-top:10px;
  margin-bottom:10px;}
.currSymbol {
  float:right;
  }
.totalAmount {
  float:left;
  }
    </style>

    <script type="text/javascript" >

    function getAmount() {
	sponsorship = document.sponsorLevel.value;
	return sponsorship;
}

    function setShipFromBill(){
      if(document.TransactionForm.ship_same_as_bill.checked){
	document.TransactionForm.shipTo_firstName.value = document.TransactionForm.billTo_firstName.value;
	document.TransactionForm.shipTo_lastName.value = document.TransactionForm.billTo_lastName.value;
	document.TransactionForm.shipTo_company.value = document.TransactionForm.billTo_company.value;
	document.TransactionForm.shipTo_street1.value = document.TransactionForm.billTo_street1.value;
	document.TransactionForm.shipTo_street2.value = document.TransactionForm.billTo_street2.value;
	document.TransactionForm.shipTo_city.value = document.TransactionForm.billTo_city.value;
	document.TransactionForm.shipTo_state.value = document.TransactionForm.billTo_state.value;
	document.TransactionForm.shipTo_postalCode.value = document.TransactionForm.billTo_postalCode.value;
	document.TransactionForm.shipTo_country.value = document.TransactionForm.billTo_country.value;
      }else{
	document.TransactionForm.shipTo_firstName.value = "";
	document.TransactionForm.shipTo_lastName.value = "";
	document.TransactionForm.shipTo_company.value = "";
	document.TransactionForm.shipTo_street1.value = "";
	document.TransactionForm.shipTo_street2.value = "";
	document.TransactionForm.shipTo_city.value = "";
	document.TransactionForm.shipTo_state.value = "";
	document.TransactionForm.shipTo_postalCode.value = "";
	document.TransactionForm.shipTo_country.value = "NONE";
      }
    }

    function uncheckShipFromBill(){
      document.TransactionForm.ship_same_as_bill.checked = false;
    }

    function shipcity(){
      var shipcountry = document.TransactionForm.shipTo_country.value;
      if("us" == shipcountry || "" == shipcountry || "NONE" == shipcountry){
        document.getElementById('shipcity1').style.display = '';
        document.getElementById('shipcity2').style.display = 'none';
        document.getElementById('shipcity3a').style.display = 'none';
        document.getElementById('shipcity3b').style.display = 'none';
      }
      else if("ca" == shipcountry){
        document.getElementById('shipcity1').style.display = 'none';
        document.getElementById('shipcity2').style.display = '';
        document.getElementById('shipcity3a').style.display = 'none';
        document.getElementById('shipcity3b').style.display = 'none';
      }
      else{
        document.getElementById('shipcity1').style.display = 'none';
        document.getElementById('shipcity2').style.display = 'none';
        document.getElementById('shipcity3a').style.display = '';
        document.getElementById('shipcity3b').style.display = '';
      }
    }

    function billcity(){
      var billcountry = document.TransactionForm.billTo_country.value;
      if("us" == billcountry || "" == billcountry || "NONE" == billcountry){
        document.getElementById('billcity1').style.display = '';
        document.getElementById('billcity2').style.display = 'none';
        document.getElementById('billcity3a').style.display = 'none';
        document.getElementById('billcity3b').style.display = 'none';
      }else if("ca" == billcountry){
        document.getElementById('billcity1').style.display = 'none';
        document.getElementById('billcity2').style.display = '';
        document.getElementById('billcity3a').style.display = 'none';
        document.getElementById('billcity3b').style.display = 'none';
      }else{
        document.getElementById('billcity1').style.display = 'none';
        document.getElementById('billcity2').style.display = 'none';
        document.getElementById('billcity3a').style.display = '';
        document.getElementById('billcity3b').style.display = '';
      }
    }

    function shipcity(){
      var shipcountry = document.TransactionForm.shipTo_country.value;
      if("us" == shipcountry || "" == shipcountry || "NONE" == shipcountry){
        document.getElementById('shipcity1').style.display = '';
        document.getElementById('shipcity2').style.display = 'none';
        document.getElementById('shipcity3a').style.display = 'none';
        document.getElementById('shipcity3b').style.display = 'none';
      }else if("ca" == shipcountry){
        document.getElementById('shipcity1').style.display = 'none';
        document.getElementById('shipcity2').style.display = '';
        document.getElementById('shipcity3a').style.display = 'none';
        document.getElementById('shipcity3b').style.display = 'none';
      }else{
        document.getElementById('shipcity1').style.display = 'none';
        document.getElementById('shipcity2').style.display = 'none';
        document.getElementById('shipcity3a').style.display = '';
        document.getElementById('shipcity3b').style.display = '';
      }
    }



 	function changeSession() {
 	  var sessionMenu = document.getElementById('sponsorLevel');
       if (sessionMenu != null) {
         var selectedIndex = sessionMenu.selectedIndex;
         var session = sessionMenu.options[selectedIndex].value;

         if (selectedIndex == 0) {
           document.getElementById('amountText').firstChild.nodeValue = "<?php echo $cost; ?>";
           document.getElementById('amount').value  = "<?php echo $cost; ?>";
         }
	

       }
    }

    function validateForm() {

      var errorString = "";

      // verify that a positive numeric amount has been entered
      var amount = document.getElementById('amount').value;
      var amountValue = parseFloat(amount);

	  var billcountry = document.TransactionForm.billTo_country.value;
      var shipcountry = document.TransactionForm.shipTo_country.value;

      if ( isNaN(amountValue) || amountValue <= 0) {
        errorString = "The amount entered is invalid\n";
      }
      
<?php /*
      // if a classification menu is present, verify that a value has been selected
      var classificationMenu = document.getElementById('sponsorLevel');
      if (classificationMenu != null) {
        var selectedIndex = classificationMenu.selectedIndex;
        var classification = classificationMenu.options[selectedIndex].value;
        if (classification == "") {
          errorString = errorString + "Order classification is required\n";
        }
      }
*/ ?>

      // Validate Bill To Fields
	  if (
          (document.getElementById('billTo_firstName').value.length < 1)
          ||
          (document.getElementById('billTo_lastName').value.length < 1)
         ) {
        errorString = errorString + "Billing First and Last names are required\n";
      }

      if (document.getElementById('billTo_street1').value.length < 1) {
        errorString = errorString + "Billing Street Address is required\n";
      }

      if (document.getElementById('billTo_city').value.length < 1) {
        errorString = errorString + "Billing City is required\n";
      }

      if (document.getElementById('billTo_state').value.length < 1) {
        if (billcountry == "us") {
          errorString = errorString + "Billing State is required\n";
		}
        if (billcountry == "ca") {
          errorString = errorString + "Billing Province is required\n";
		}
      }

      if (document.getElementById('billTo_postalCode').value.length < 1) {
        if ( (billcountry == "us") || (billcountry == "ca") ) {
          errorString = errorString + "Billing Postal Code is required\n";
		}
      }

      var countryMenu = document.getElementById('billTo_country');
      var c = countryMenu.selectedIndex;
      var country = countryMenu.options[c].value;

      if (country == "") {
        errorString = errorString + "Billing Country is required\n";
      }

	  if (document.getElementById('billTo_phoneNumber').value.length < 1) {
        errorString = errorString + "Billing Phone Number is required\n";
      }

      if (document.getElementById('billTo_email').value.length < 1) {
        errorString = errorString + "Billing Email is required\n";
      }


      // Validate Ship To Fields
      if (
	       (document.getElementById('shipTo_firstName').value.length < 1)
	       ||
	       (document.getElementById('shipTo_lastName').value.length < 1)
	     ) {
	         errorString = errorString + "Shipping First and Last names are required\n";
	  }

	  if (document.getElementById('shipTo_street1').value.length < 1) {
	    errorString = errorString + "Shipping Street Address is required\n";
	  }

	  if (document.getElementById('shipTo_city').value.length < 1) {
	    errorString = errorString + "Shipping City is required\n";
	  }

	  if (document.getElementById('shipTo_state').value.length < 1) {
	    if (shipcountry == "us") {
	      errorString = errorString + "Shipping State is required\n";
	    }
	    if (shipcountry == "ca") {
	      errorString = errorString + "Shipping Province is required\n";
	    }
	  }

	  if (document.getElementById('shipTo_postalCode').value.length < 1) {
	    if ( (shipcountry == "us") || (shipcountry == "ca") ) {
	      errorString = errorString + "Shipping Postal Code is required\n";
	    }
	  }

	  countryMenu = document.getElementById('shipTo_country');
	  c = countryMenu.selectedIndex;
	  country = countryMenu.options[c].value;

	  if (country == "") {
	    errorString = errorString + "Shipping Country is required\n";
	  }


	  // session menu
	  var sessionMenu = document.getElementById('sponsorLevel');
      /*var selectedIndex = sessionMenu.selectedIndex;
      if (selectedIndex < 1) {
        errorString = errorString + "Sponsorship Level selection is required\n";

      }*/

      if (errorString == "") {
        return true;
      }
      else {
        alert(errorString);
        return false;
      }
    }

    </script>

  </head>


    <body  onLoad="billcity(), shipcity()"  >

    <div id="mid">
            <form name="TransactionForm" action="https://shopmitprd.mit.edu/controller/index.php" method="post">


        <div id="nav1">
        </div>


        <div id="nav2">
        <table><tr><td>
   
<a href="http://techfair.mit.edu/"><img src="http://techfair.mit.edu/img/header.png" alt="MIT Techfair" /></a>
   
   </td><td><h1> </h1></td>
      </tr></table><br />        </div>


<!-- Merchant ID -->
<input type="hidden" name="merchant_id" id="merchant_id" value="mit_sao_techfair" />


      <table width="500">


        <tr><td class="desc" colspan="2"><span class="required">Bold</span> = required</td></tr>

        <tr><td colspan="2" class="section_break">Payment Details</td></tr>


              <tr>
          <td class="required" >
            Registration payment for          </td>

          <td>
          	<input type="text" name="sponsorLevel" id="sponsorLevel" onchange="changeSession()" readonly="readonly" value="<?php echo $package; ?> Sponsorship" size="50"/>
            
            <?php
            /*
            <select name="sponsorLevel" id="sponsorLevel" onchange="changeSession()" >
            <option value="<?php echo $name; ?> Sponsorship"><?php echo $name; ?> Sponsorship</option>
            
            <option value="" selected>Choose One</option>
            <option value="Basic Sponsorship" >Early Basic Sponsorship </option>
 <option value="Basic Sponsorship" >Late Basic Sponsorship </option>
<option value="Silver Sponsorship" >Silver Sponsorship </option>
<option value="Gold Sponsorship" >Gold Sponsorship </option>
<option value="Platinum Sponsorship" >Platinum Sponsorship </option>-->
            </select>
            */?>
          </td>
        </tr>


        <tr>
          <td class="required"><div class="totalAmount">Total Amount</div><div class="currSymbol">$</div></td>

          <td>
	<span id="amountText"><?php echo $cost?></span>
            <input name="amount" id="amount" type="hidden" value="<?php echo $cost?>"/>
          </td>
        </tr>

             <!-- <tr>
          <td valign="top" >Description</td>
          <td><textarea name="comments" id="comments" cols="30" rows="5"></textarea></td>
        </tr>-->


              <tr>
          <td colspan="2" class="section_break">Billing Information</td>
        </tr>
        <tr>
          <td class="required">First/Last Name</td>
          <td><input type="text" name="billTo_firstName" id="billTo_firstName" size="12" value="" />
              <input type="text" name="billTo_lastName" id="billTo_lastName" size="16" value="" /></td>
        </tr>
        <tr>
          <td>Company</td>
          <td><input type="text" name="billTo_company" id="billTo_company" size="30" value="" /></td>
        </tr>
        <tr>
          <td class="required">Street Address 1</td>
          <td><input type="text" name="billTo_street1" id="billTo_street1" size="50" value="" /></td>
        </tr>
        <tr>
          <td>Street Address 2</td>
          <td><input type="text" name="billTo_street2" id="billTo_street2" size="50" value="" /></td>
        </tr>
        <tr>
          <td nowrap><span class="required" id="billcity1" >City/State/Postal Code</span>
              <span id="billcity2" class="required">City/Province/Postal Code</span>
              <span id="billcity3a" class="required">City</span><span id="billcity3b">/Province/Postal Code</span></td>


          <td><input type="text" name="billTo_city" id="billTo_city" size="16" value="" />
              <input type="text" name="billTo_state" id="billTo_state" size="2" maxlength="20" value="" />
              <input type="text" name="billTo_postalCode" id="billTo_postalCode" size="5" value="" /></td>
        </tr>
        <tr>
          <td class="required">Country</td>
	  <td><select name="billTo_country" id="billTo_country" onchange="billcity()">
<option value=""> ... </option>
<option  selected  value="us" >United States</option>
<option  value="af" >Afghanistan</option>
<option  value="al" >Albania</option>
<option  value="dz" >Algeria</option>
<option  value="as" >American Samoa (US)</option>
<option  value="ad" >Andorra</option>
<option  value="ao" >Angola</option>
<option  value="ai" >Anguilla (UK)</option>
<option  value="ag" >Antigua and Barbuda</option>
<option  value="ar" >Argentina</option>
<option  value="am" >Armenia</option>
<option  value="aw" >Aruba</option>
<option  value="au" >Australia</option>
<option  value="at" >Austria</option>
<option  value="az" >Azerbaijan</option>
<option  value="bs" >Bahamas</option>
<option  value="bh" >Bahrain</option>
<option  value="bd" >Bangladesh</option>
<option  value="bb" >Barbados</option>
<option  value="by" >Belarus</option>
<option  value="be" >Belgium</option>
<option  value="bz" >Belize</option>
<option  value="bj" >Benin</option>
<option  value="bm" >Bermuda (UK)</option>
<option  value="bt" >Bhutan</option>
<option  value="bo" >Bolivia</option>
<option  value="ba" >Bosnia and Herzegovina</option>
<option  value="bw" >Botswana</option>
<option  value="br" >Brazil</option>
<option  value="vg" >British Virgin Islands (UK)</option>
<option  value="bn" >Brunei Darussalam</option>
<option  value="bg" >Bulgaria</option>
<option  value="bf" >Burkina Faso</option>
<option  value="bi" >Burundi</option>
<option  value="kh" >Cambodia</option>
<option  value="cm" >Cameroon</option>
<option  value="ca" >Canada</option>
<option  value="cv" >Cape Verde</option>
<option  value="ky" >Cayman Islands (UK)</option>
<option  value="cf" >Central African Republic</option>
<option  value="td" >Chad</option>
<option  value="cl" >Chile</option>
<option  value="cn" >China</option>
<option  value="cx" >Christmas Island (AU)</option>
<option  value="cc" >Cocos (Keeling) Islands (AU)</option>
<option  value="co" >Colombia</option>
<option  value="km" >Comoros</option>
<option  value="cd" >Congo, Democratic Republic of the</option>
<option  value="cg" >Congo, Republic of the</option>
<option  value="ck" >Cook Islands (NZ)</option>
<option  value="cr" >Costa Rica</option>
<option  value="ci" >Cote d'Ivoire</option>
<option  value="hr" >Croatia</option>
<option  value="cu" >Cuba</option>
<option  value="cy" >Cyprus</option>
<option  value="cz" >Czech Republic</option>
<option  value="dk" >Denmark</option>
<option  value="dj" >Djibouti</option>
<option  value="dm" >Dominica</option>
<option  value="do" >Dominican Republic</option>
<option  value="ec" >Ecuador</option>
<option  value="eg" >Egypt</option>
<option  value="sv" >El Salvador</option>
<option  value="gq" >Equatorial Guinea</option>
<option  value="er" >Eritrea</option>
<option  value="ee" >Estonia</option>
<option  value="et" >Ethiopia</option>
<option  value="fk" >Falkland Islands (UK)</option>
<option  value="fo" >Faroe Islands (DK)</option>
<option  value="fj" >Fiji</option>
<option  value="fi" >Finland</option>
<option  value="fr" >France</option>
<option  value="gf" >French Guiana (FR)</option>
<option  value="pf" >French Polynesia (FR)</option>
<option  value="ga" >Gabon</option>
<option  value="gm" >Gambia</option>
<option  value="ge" >Georgia</option>
<option  value="de" >Germany</option>
<option  value="gh" >Ghana</option>
<option  value="gi" >Gibraltar (UK)</option>
<option  value="gr" >Greece</option>
<option  value="gl" >Greenland (DK)</option>
<option  value="gd" >Grenada</option>
<option  value="gp" >Guadeloupe (FR)</option>
<option  value="gu" >Guam (US)</option>
<option  value="gt" >Guatemala</option>
<option  value="gn" >Guinea</option>
<option  value="gw" >Guinea-Bissau</option>
<option  value="gy" >Guyana</option>
<option  value="ht" >Haiti</option>
<option  value="va" >Holy See (Vatican City)</option>
<option  value="hn" >Honduras</option>
<option  value="hk" >Hong Kong (CN)</option>
<option  value="hu" >Hungary</option>
<option  value="is" >Iceland</option>
<option  value="in" >India</option>
<option  value="id" >Indonesia</option>
<option  value="ir" >Iran</option>
<option  value="iq" >Iraq</option>
<option  value="ie" >Ireland</option>
<option  value="il" >Israel</option>
<option  value="it" >Italy</option>
<option  value="jm" >Jamaica</option>
<option  value="jp" >Japan</option>
<option  value="jo" >Jordan</option>
<option  value="kz" >Kazakstan</option>
<option  value="ke" >Kenya</option>
<option  value="ki" >Kiribati</option>
<option  value="kp" >Korea, Democratic People's Republic (North)</option>
<option  value="kr" >Korea, Republic of (South)</option>
<option  value="kw" >Kuwait</option>
<option  value="kg" >Kyrgyzstan</option>
<option  value="la" >Laos</option>
<option  value="lv" >Latvia</option>
<option  value="lb" >Lebanon</option>
<option  value="ls" >Lesotho</option>
<option  value="lr" >Liberia</option>
<option  value="ly" >Libya</option>
<option  value="li" >Liechtenstein</option>
<option  value="lt" >Lithuania</option>
<option  value="lu" >Luxembourg</option>
<option  value="mo" >Macau (CN)</option>
<option  value="mk" >Macedonia</option>
<option  value="mg" >Madagascar</option>
<option  value="mw" >Malawi</option>
<option  value="my" >Malaysia</option>
<option  value="mv" >Maldives</option>
<option  value="ml" >Mali</option>
<option  value="mt" >Malta</option>
<option  value="mh" >Marshall islands</option>
<option  value="mq" >Martinique (FR)</option>
<option  value="mr" >Mauritania</option>
<option  value="mu" >Mauritius</option>
<option  value="yt" >Mayotte (FR)</option>
<option  value="mx" >Mexico</option>
<option  value="fm" >Micronesia, Federated States of</option>
<option  value="md" >Moldova</option>
<option  value="mc" >Monaco</option>
<option  value="mn" >Mongolia</option>
<option  value="me" >Montenegro</option>
<option  value="ms" >Montserrat (UK)</option>
<option  value="ma" >Morocco</option>
<option  value="mz" >Mozambique</option>
<option  value="mm" >Myanmar</option>
<option  value="na" >Namibia</option>
<option  value="nr" >Nauru</option>
<option  value="np" >Nepal</option>
<option  value="nl" >Netherlands</option>
<option  value="an" >Netherlands Antilles (NL)</option>
<option  value="nc" >New Caledonia (FR)</option>
<option  value="nz" >New Zealand</option>
<option  value="ni" >Nicaragua</option>
<option  value="ne" >Niger</option>
<option  value="ng" >Nigeria</option>
<option  value="nu" >Niue</option>
<option  value="nf" >Norfolk Island (AU)</option>
<option  value="mp" >Northern Mariana Islands (US)</option>
<option  value="no" >Norway</option>
<option  value="om" >Oman</option>
<option  value="pk" >Pakistan</option>
<option  value="pw" >Palau</option>
<option  value="pa" >Panama</option>
<option  value="pg" >Papua New Guinea</option>
<option  value="py" >Paraguay</option>
<option  value="pe" >Peru</option>
<option  value="ph" >Philippines</option>
<option  value="pn" >Pitcairn Islands (UK)</option>
<option  value="pl" >Poland</option>
<option  value="pt" >Portugal</option>
<option  value="pr" >Puerto Rico (US)</option>
<option  value="qa" >Qatar</option>
<option  value="re" >Reunion (FR)</option>
<option  value="ro" >Romania</option>
<option  value="ru" >Russia</option>
<option  value="rw" >Rwanda</option>
<option  value="sh" >Saint Helena (UK)</option>
<option  value="kn" >Saint Kitts and Nevis</option>
<option  value="lc" >Saint Lucia</option>
<option  value="pm" >Saint Pierre and Miquelon (FR)</option>
<option  value="vc" >Saint Vincent and the Grenadines</option>
<option  value="ws" >Samoa</option>
<option  value="sm" >San Marino</option>
<option  value="st" >Sao Tome and Principe</option>
<option  value="sa" >Saudi Arabia</option>
<option  value="sn" >Senegal</option>
<option  value="rs" >Serbia</option>
<option  value="cs" >Serbia and Montenegro</option>
<option  value="sc" >Seychelles</option>
<option  value="sl" >Sierra Leone</option>
<option  value="sg" >Singapore</option>
<option  value="sk" >Slovakia</option>
<option  value="si" >Slovenia</option>
<option  value="sb" >Solomon Islands</option>
<option  value="so" >Somalia</option>
<option  value="za" >South Africa</option>
<option  value="gs" >South Georgia &amp; South Sandwich Islands (UK)</option>
<option  value="es" >Spain</option>
<option  value="lk" >Sri Lanka</option>
<option  value="sd" >Sudan</option>
<option  value="sr" >Suriname</option>
<option  value="sz" >Swaziland</option>
<option  value="se" >Sweden</option>
<option  value="ch" >Switzerland</option>
<option  value="sy" >Syria</option>
<option  value="tw" >Taiwan</option>
<option  value="tj" >Tajikistan</option>
<option  value="tz" >Tanzania</option>
<option  value="th" >Thailand</option>
<option  value="tl" >Timor-Leste</option>
<option  value="tg" >Togo</option>
<option  value="tk" >Tokelau</option>
<option  value="to" >Tonga</option>
<option  value="tt" >Trinidad and Tobago</option>
<option  value="tn" >Tunisia</option>
<option  value="tr" >Turkey</option>
<option  value="tm" >Turkmenistan</option>
<option  value="tc" >Turks and Caicos Islands (UK)</option>
<option  value="tv" >Tuvalu</option>
<option  value="ug" >Uganda</option>
<option  value="ua" >Ukraine</option>
<option  value="ae" >United Arab Emirates</option>
<option  value="gb" >United Kingdom</option>
<option  value="uy" >Uruguay</option>
<option  value="uz" >Uzbekistan</option>
<option  value="vu" >Vanuatu</option>
<option  value="ve" >Venezuela</option>
<option  value="vn" >Vietnam</option>
<option  value="vi" >Virgin Islands (US)</option>
<option  value="wf" >Wallis and Futuna (FR)</option>
<option  value="eh" >Western Sahara</option>
<option  value="ye" >Yemen</option>
<option  value="zm" >Zambia</option>
<option  value="zw" >Zimbabwe</option>
</select>
        </tr>
        <tr>
          <td class="required" id="phone_number">Phone Number</td>
          <td><input type="text" name="billTo_phoneNumber" id="billTo_phoneNumber" size="15" value="" />&nbsp;(123-123-1234)</td>
        </tr>
        <tr>
          <td class="required">Email Address</td>
          <td><input type="text" name="billTo_email" id="billTo_email" size="30" value="" /></td>
        </tr>



              <tr>
          <td colspan="2" class="section_break">Mailing Address</td>
        </tr>

                <tr>

          <td colspan="2"><input type="checkbox" id="ship_same_as_bill" name="ship_same_as_bill"  onClick="setShipFromBill(),shipcity()" />
                           Use the name and billing address shown above.
          </td>
        </tr>


        <tr>


          <td class="required">First/Last Name</td>

          <td><input type="text" name="shipTo_firstName" id="shipTo_firstName" size="12" value="" onchange="uncheckShipFromBill()" />
              <input type="text" name="shipTo_lastName" size="16" id="shipTo_lastName" value="" onchange="uncheckShipFromBill()" /></td>
        </tr>
        <tr>
          <td>Company</td>
          <td><input type="text" name="shipTo_company" id="shipTo_company" size="30" value="" onchange="uncheckShipFromBill()" /></td>
        </tr>
        <tr>


          <td class="required">Street Address 1</td>

          <td><input type="text" name="shipTo_street1" id="shipTo_street1" size="50" value="" onchange="uncheckShipFromBill()" /></td>
        </tr>
        <tr>
          <td>Street Address 2</td>
          <td><input type="text" name="shipTo_street2" id="shipTo_street2" size="50" value="" onchange="uncheckShipFromBill()" /></td>
        </tr>
        <tr>
          <td nowrap><span class="required" id="shipcity1" >City/State/Postal Code</span>
              <span id="shipcity2" class="required">City/Province/Postal Code</span>
              <span id="shipcity3a" class="required">City</span><span id="shipcity3b">/Province/Postal Code</span></td>

          <td>
              <input type="text" name="shipTo_city" id="shipTo_city" size="16" value="" onchange="uncheckShipFromBill()" />
              <input type="text" name="shipTo_state" id="shipTo_state" size="2" maxlength="20" value="" />
              <input type="text" name="shipTo_postalCode" id="shipTo_postalCode" size="5" value="" onchange="uncheckShipFromBill()" />
          </td>
        </tr>
        <tr>
          <td class="required">Country</td>

          <td>
	    <select name="shipTo_country" id="shipTo_country" onchange="shipcity()">
<option value=""> ... </option>
<option  selected  value="us" >United States</option>
<option  value="af" >Afghanistan</option>
<option  value="al" >Albania</option>
<option  value="dz" >Algeria</option>
<option  value="as" >American Samoa (US)</option>
<option  value="ad" >Andorra</option>
<option  value="ao" >Angola</option>
<option  value="ai" >Anguilla (UK)</option>
<option  value="ag" >Antigua and Barbuda</option>
<option  value="ar" >Argentina</option>
<option  value="am" >Armenia</option>
<option  value="aw" >Aruba</option>
<option  value="au" >Australia</option>
<option  value="at" >Austria</option>
<option  value="az" >Azerbaijan</option>
<option  value="bs" >Bahamas</option>
<option  value="bh" >Bahrain</option>
<option  value="bd" >Bangladesh</option>
<option  value="bb" >Barbados</option>
<option  value="by" >Belarus</option>
<option  value="be" >Belgium</option>
<option  value="bz" >Belize</option>
<option  value="bj" >Benin</option>
<option  value="bm" >Bermuda (UK)</option>
<option  value="bt" >Bhutan</option>
<option  value="bo" >Bolivia</option>
<option  value="ba" >Bosnia and Herzegovina</option>
<option  value="bw" >Botswana</option>
<option  value="br" >Brazil</option>
<option  value="vg" >British Virgin Islands (UK)</option>
<option  value="bn" >Brunei Darussalam</option>
<option  value="bg" >Bulgaria</option>
<option  value="bf" >Burkina Faso</option>
<option  value="bi" >Burundi</option>
<option  value="kh" >Cambodia</option>
<option  value="cm" >Cameroon</option>
<option  value="ca" >Canada</option>
<option  value="cv" >Cape Verde</option>
<option  value="ky" >Cayman Islands (UK)</option>
<option  value="cf" >Central African Republic</option>
<option  value="td" >Chad</option>
<option  value="cl" >Chile</option>
<option  value="cn" >China</option>
<option  value="cx" >Christmas Island (AU)</option>
<option  value="cc" >Cocos (Keeling) Islands (AU)</option>
<option  value="co" >Colombia</option>
<option  value="km" >Comoros</option>
<option  value="cd" >Congo, Democratic Republic of the</option>
<option  value="cg" >Congo, Republic of the</option>
<option  value="ck" >Cook Islands (NZ)</option>
<option  value="cr" >Costa Rica</option>
<option  value="ci" >Cote d'Ivoire</option>
<option  value="hr" >Croatia</option>
<option  value="cu" >Cuba</option>
<option  value="cy" >Cyprus</option>
<option  value="cz" >Czech Republic</option>
<option  value="dk" >Denmark</option>
<option  value="dj" >Djibouti</option>
<option  value="dm" >Dominica</option>
<option  value="do" >Dominican Republic</option>
<option  value="ec" >Ecuador</option>
<option  value="eg" >Egypt</option>
<option  value="sv" >El Salvador</option>
<option  value="gq" >Equatorial Guinea</option>
<option  value="er" >Eritrea</option>
<option  value="ee" >Estonia</option>
<option  value="et" >Ethiopia</option>
<option  value="fk" >Falkland Islands (UK)</option>
<option  value="fo" >Faroe Islands (DK)</option>
<option  value="fj" >Fiji</option>
<option  value="fi" >Finland</option>
<option  value="fr" >France</option>
<option  value="gf" >French Guiana (FR)</option>
<option  value="pf" >French Polynesia (FR)</option>
<option  value="ga" >Gabon</option>
<option  value="gm" >Gambia</option>
<option  value="ge" >Georgia</option>
<option  value="de" >Germany</option>
<option  value="gh" >Ghana</option>
<option  value="gi" >Gibraltar (UK)</option>
<option  value="gr" >Greece</option>
<option  value="gl" >Greenland (DK)</option>
<option  value="gd" >Grenada</option>
<option  value="gp" >Guadeloupe (FR)</option>
<option  value="gu" >Guam (US)</option>
<option  value="gt" >Guatemala</option>
<option  value="gn" >Guinea</option>
<option  value="gw" >Guinea-Bissau</option>
<option  value="gy" >Guyana</option>
<option  value="ht" >Haiti</option>
<option  value="va" >Holy See (Vatican City)</option>
<option  value="hn" >Honduras</option>
<option  value="hk" >Hong Kong (CN)</option>
<option  value="hu" >Hungary</option>
<option  value="is" >Iceland</option>
<option  value="in" >India</option>
<option  value="id" >Indonesia</option>
<option  value="ir" >Iran</option>
<option  value="iq" >Iraq</option>
<option  value="ie" >Ireland</option>
<option  value="il" >Israel</option>
<option  value="it" >Italy</option>
<option  value="jm" >Jamaica</option>
<option  value="jp" >Japan</option>
<option  value="jo" >Jordan</option>
<option  value="kz" >Kazakstan</option>
<option  value="ke" >Kenya</option>
<option  value="ki" >Kiribati</option>
<option  value="kp" >Korea, Democratic People's Republic (North)</option>
<option  value="kr" >Korea, Republic of (South)</option>
<option  value="kw" >Kuwait</option>
<option  value="kg" >Kyrgyzstan</option>
<option  value="la" >Laos</option>
<option  value="lv" >Latvia</option>
<option  value="lb" >Lebanon</option>
<option  value="ls" >Lesotho</option>
<option  value="lr" >Liberia</option>
<option  value="ly" >Libya</option>
<option  value="li" >Liechtenstein</option>
<option  value="lt" >Lithuania</option>
<option  value="lu" >Luxembourg</option>
<option  value="mo" >Macau (CN)</option>
<option  value="mk" >Macedonia</option>
<option  value="mg" >Madagascar</option>
<option  value="mw" >Malawi</option>
<option  value="my" >Malaysia</option>
<option  value="mv" >Maldives</option>
<option  value="ml" >Mali</option>
<option  value="mt" >Malta</option>
<option  value="mh" >Marshall islands</option>
<option  value="mq" >Martinique (FR)</option>
<option  value="mr" >Mauritania</option>
<option  value="mu" >Mauritius</option>
<option  value="yt" >Mayotte (FR)</option>
<option  value="mx" >Mexico</option>
<option  value="fm" >Micronesia, Federated States of</option>
<option  value="md" >Moldova</option>
<option  value="mc" >Monaco</option>
<option  value="mn" >Mongolia</option>
<option  value="me" >Montenegro</option>
<option  value="ms" >Montserrat (UK)</option>
<option  value="ma" >Morocco</option>
<option  value="mz" >Mozambique</option>
<option  value="mm" >Myanmar</option>
<option  value="na" >Namibia</option>
<option  value="nr" >Nauru</option>
<option  value="np" >Nepal</option>
<option  value="nl" >Netherlands</option>
<option  value="an" >Netherlands Antilles (NL)</option>
<option  value="nc" >New Caledonia (FR)</option>
<option  value="nz" >New Zealand</option>
<option  value="ni" >Nicaragua</option>
<option  value="ne" >Niger</option>
<option  value="ng" >Nigeria</option>
<option  value="nu" >Niue</option>
<option  value="nf" >Norfolk Island (AU)</option>
<option  value="mp" >Northern Mariana Islands (US)</option>
<option  value="no" >Norway</option>
<option  value="om" >Oman</option>
<option  value="pk" >Pakistan</option>
<option  value="pw" >Palau</option>
<option  value="pa" >Panama</option>
<option  value="pg" >Papua New Guinea</option>
<option  value="py" >Paraguay</option>
<option  value="pe" >Peru</option>
<option  value="ph" >Philippines</option>
<option  value="pn" >Pitcairn Islands (UK)</option>
<option  value="pl" >Poland</option>
<option  value="pt" >Portugal</option>
<option  value="pr" >Puerto Rico (US)</option>
<option  value="qa" >Qatar</option>
<option  value="re" >Reunion (FR)</option>
<option  value="ro" >Romania</option>
<option  value="ru" >Russia</option>
<option  value="rw" >Rwanda</option>
<option  value="sh" >Saint Helena (UK)</option>
<option  value="kn" >Saint Kitts and Nevis</option>
<option  value="lc" >Saint Lucia</option>
<option  value="pm" >Saint Pierre and Miquelon (FR)</option>
<option  value="vc" >Saint Vincent and the Grenadines</option>
<option  value="ws" >Samoa</option>
<option  value="sm" >San Marino</option>
<option  value="st" >Sao Tome and Principe</option>
<option  value="sa" >Saudi Arabia</option>
<option  value="sn" >Senegal</option>
<option  value="rs" >Serbia</option>
<option  value="cs" >Serbia and Montenegro</option>
<option  value="sc" >Seychelles</option>
<option  value="sl" >Sierra Leone</option>
<option  value="sg" >Singapore</option>
<option  value="sk" >Slovakia</option>
<option  value="si" >Slovenia</option>
<option  value="sb" >Solomon Islands</option>
<option  value="so" >Somalia</option>
<option  value="za" >South Africa</option>
<option  value="gs" >South Georgia &amp; South Sandwich Islands (UK)</option>
<option  value="es" >Spain</option>
<option  value="lk" >Sri Lanka</option>
<option  value="sd" >Sudan</option>
<option  value="sr" >Suriname</option>
<option  value="sz" >Swaziland</option>
<option  value="se" >Sweden</option>
<option  value="ch" >Switzerland</option>
<option  value="sy" >Syria</option>
<option  value="tw" >Taiwan</option>
<option  value="tj" >Tajikistan</option>
<option  value="tz" >Tanzania</option>
<option  value="th" >Thailand</option>
<option  value="tl" >Timor-Leste</option>
<option  value="tg" >Togo</option>
<option  value="tk" >Tokelau</option>
<option  value="to" >Tonga</option>
<option  value="tt" >Trinidad and Tobago</option>
<option  value="tn" >Tunisia</option>
<option  value="tr" >Turkey</option>
<option  value="tm" >Turkmenistan</option>
<option  value="tc" >Turks and Caicos Islands (UK)</option>
<option  value="tv" >Tuvalu</option>
<option  value="ug" >Uganda</option>
<option  value="ua" >Ukraine</option>
<option  value="ae" >United Arab Emirates</option>
<option  value="gb" >United Kingdom</option>
<option  value="uy" >Uruguay</option>
<option  value="uz" >Uzbekistan</option>
<option  value="vu" >Vanuatu</option>
<option  value="ve" >Venezuela</option>
<option  value="vn" >Vietnam</option>
<option  value="vi" >Virgin Islands (US)</option>
<option  value="wf" >Wallis and Futuna (FR)</option>
<option  value="eh" >Western Sahara</option>
<option  value="ye" >Yemen</option>
<option  value="zm" >Zambia</option>
<option  value="zw" >Zimbabwe</option>
</select>
          </td>
        </tr>



              <tr>
          <td colspan="2" class="section_break">&nbsp;</td>
        </tr>



        <tr><td class="required">Company Name</td>
                 <td> <input name="merchantDefinedData1" id="merchantDefinedData1" value="<?php echo $name; ?>" readonly="readonly"/>  </td></tr>



      <tr><td class="required">Invoice Number</td>
          <td> <input name="merchantDefinedData2" id="merchantDefinedData2" value="<?php echo $invoice; ?>" readonly="readonly" />  </td></tr>




      <tr>
        <td colspan="2" class="section_break">&nbsp;</td>
      </tr>
      <tr>

        <td colspan="2" align="right">
          <button style="font-size: 14px; font-weight: bold;"
                  type="button"
                  name="submit_button"
                  onclick="if (validateForm()) { document.forms[0].submit(); }" >Proceed</button></td>


      </tr>

      </table>



</form><!-- /form -->
    </div><!-- End mid -->

    <div id="lo2">

<table>
<tr>
  <td>

<br>Email question or comments to <a href="mailto:techfair-finance@mit.edu">techfair-finance@mit.edu</a>
</td></tr></table>
    </div><!-- End lo2 -->
  </body>
</html>