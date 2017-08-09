
window.onbeforeunload = function() { document.getElementById("productSelect").selected = 'true'; };
function displayDays()
{
	
	var selection = document.getElementById("meterTypeList").value;
	if(selection == "peak" && document.getElementById("peakusage").value != '')
	{
		document.getElementById("usageDays").style.display = 'block';
		
	}
	else if(selection == "peakOff" && document.getElementById("peakusage").value != '' && document.getElementById("offpeakusage").value != '')
	{
		document.getElementById("usageDays").style.display = 'block';
		
	}
	else if(selection == "peakOffShoulder" && document.getElementById("peakusage").value != '' && document.getElementById("offpeakusage").value != ''
		 && document.getElementById("shoulderusage").value != '')
	{
		document.getElementById("usageDays").style.display = 'block';
		
	}
	else if(selection == "peakControl" && document.getElementById("peakusage").value != '' && document.getElementById("controlledLoadusage").value != '')
	{
		document.getElementById("usageDays").style.display = 'block';
		
	}
	else
	{
		document.getElementById("daysusage").value = '';
		document.getElementById("usageDays").style.display = 'none';
		document.getElementById("avgbillamount").value = '';
		document.getElementById("avgEstimation").style.display = 'none';
		document.getElementById("avgbillsummary").style.display = 'none';
		document.getElementById("dayssummary").style.display = 'none';
		document.getElementById("compareBtn").style.display = 'none';
	}
	
}
function displayDaysonNO()
{
	document.getElementById("usageDays").style.display = 'block';
	document.getElementById("usagelvlsummary").style.display = 'block';
	if(document.getElementById("oneusage").checked)
	{
		document.getElementById("usagelvlsummary").innerHTML = "Usage Level : 1-2 Person";
	}
	else if(document.getElementById("twousage").checked)
	{
		document.getElementById("usagelvlsummary").innerHTML = "Usage Level : 3-4 Person";
	}
	else if(document.getElementById("threeusage").checked)
	{
		document.getElementById("usagelvlsummary").innerHTML = "Usage Level : 4-5+ Person";
	}
	
}
jQuery(function() {
jQuery('#meterTypeList').on('change',function(){
	if(document.getElementById("billyes").checked){
  var selection = $(this).val();
  jQuery('input[data-valueref~="hide"]').hide();
  jQuery('input[data-valueref~="' + selection + '"]').show();
  resetElectricityFields(selection);
	displayDays();}
	setMeterTypeSummary();
	});
});
jQuery(function() {
jQuery('#menuList').on('change',function(){
    var value = $(this).val();
	if(value!='select')
    location.href = value +'.php'; //or .php, etc. This will go to a page called en.html
    });
});	
function resetElectricityFields(selection)
{
	if(selection == "peak")
	{
		document.getElementById("offpeakusage").value = '';
		document.getElementById("shoulderusage").value = '';
		document.getElementById("controlledLoadusage").value = '';
	}
	else if(selection == "peakOff")
	{
		document.getElementById("offpeakusage").value = '';
		document.getElementById("shoulderusage").value = '';
		document.getElementById("controlledLoadusage").value = '';
	}else if(selection == "peakOffShoulder")
	{
		 document.getElementById("shoulderusage").value = ''; 
		 document.getElementById("controlledLoadusage").value = '';
	}
	 else
	{
		 document.getElementById("offpeakusage").value = '';
		 document.getElementById("shoulderusage").value = '';
	}
	document.getElementById("usageDays").style.display = 'none';
	
}

function resetFields()
{
	document.getElementById("meterTypeList").value = 'peak';
	document.getElementById("meterType").style.display = 'none';
	document.getElementById("peakusage").style.display = 'none';
	document.getElementById("businessid").checked = false;
	document.getElementById("residentid").checked = false;
	document.getElementById("offpeakusage").style.display = 'none';
	document.getElementById("shoulderusage").style.display = 'none';
	document.getElementById("controlledLoadusage").style.display = 'none';
	document.getElementById("usageLevel").style.display = 'none';
	document.getElementById("oneusage").checked = false;
	document.getElementById("twousage").checked = false;
	document.getElementById("threeusage").checked = false;
	document.getElementById("usageDays").style.display = 'none';
	document.getElementById("offpeakusage").value = '';
    document.getElementById("shoulderusage").value = '';
    document.getElementById("controlledLoadusage").value = '';
    document.getElementById("peakusage").value = '';
    document.getElementById("daysusage").value = '';
	document.getElementById("suburb").style.display = 'none';
	document.getElementById("propertyType").style.display = 'none';
	document.getElementById("nmisummary").style.display = 'none';
	document.getElementById("postcodesummary").style.display = 'none';
	document.getElementById("suburbsummary").style.display = 'none';
	document.getElementById("propertysummary").style.display = 'none';
	document.getElementById("metertypesummary").style.display = 'none';
	document.getElementById("dayssummary").style.display = 'none';
	document.getElementById("avgbillsummary").style.display = 'none';
	document.getElementById("avgEstimation").style.display = 'none';
	document.getElementById("avgEstimation").value = '';
	document.getElementById("compareBtn").style.display = 'none';
	document.getElementById("resicon").style.color = '#737373';
	document.getElementById("businessicon").style.color = '#737373';
}

function toggleQuestions()
{
	resetFields();
	document.getElementById("billid").className = "fa fa-check fa-2x answered";
	document.getElementById("postcode").style.display = 'none';
	document.getElementById("suburb").style.display = 'none';
	document.getElementById("propertyType").style.display = 'none';
	document.getElementById("postcodeValue").value = '';
	if (document.getElementById("billyes").checked) {

		document.getElementById("nmi").style.display = 'block';
		document.getElementById("nmiinput").value = '';
		document.getElementById("billyesicon").style.color = 'blue';
		document.getElementById("billnoicon").style.color = '#737373';
		document.getElementById("billsummary").innerHTML = 'Bills : Yes';
		
		
	} else if (document.getElementById("billno").checked) {
		document.getElementById("nmi").style.display = 'none';
		document.getElementById("postcode").style.display = 'block';
		document.getElementById("billnoicon").style.color = 'blue';
		document.getElementById("billyesicon").style.color = '#737373';
		document.getElementById("billsummary").innerHTML = 'Bills : No';
	}
	document.getElementById("summaryId").style.display = 'block';
	
}

function displayPropertyType()
{
	resetFields();
	document.getElementById("nmisummary").style.display = 'block';
	document.getElementById("nmisummary").innerHTML = "NMI : " + document.getElementById("nmiinput").value;
	if(document.getElementById("nmiinput").value.length == 11)
	{
		document.getElementById("nmiid").className = "fa fa-check fa-2x answered";
		document.getElementById("propertyType").style.display = 'block';		
	}
	else
	{
		document.getElementById("nmiid").className = "fa fa-question fa-2x question";
		document.getElementById("propertyType").style.display = 'none';
	}
}

function displayUsage()
{
	document.getElementById("meterType").style.display = 'block';
	if (document.getElementById("billyes").checked) {
		document.getElementById("peakusage").style.display = 'block';
	} else if (document.getElementById("billno").checked)
	{
		if(document.getElementById("residentid").checked) 
		{
			document.getElementById("oneusage").checked = false;
			document.getElementById("twousage").checked = false;
			document.getElementById("threeusage").checked = false;
			document.getElementById("usageLevel").style.display = 'block';
			document.getElementById("daysusage").value = '';
		document.getElementById("usageDays").style.display = 'none';
		document.getElementById("avgbillamount").value = '';
		document.getElementById("avgEstimation").style.display = 'none';
		document.getElementById("avgbillsummary").style.display = 'none';
		document.getElementById("dayssummary").style.display = 'none';
		document.getElementById("compareBtn").style.display = 'none';
		}
		else
		{
			document.getElementById("usageLevel").style.display = 'none';
			document.getElementById("usageDays").style.display = 'block';
		}
		
	}
	
	if (document.getElementById("businessid").checked){
		document.getElementById("businessicon").style.color = 'blue';
		document.getElementById("resicon").style.color = '#737373';
		document.getElementById("propertysummary").innerHTML = "Property Type : Business";
		document.getElementById("usagelvlsummary").style.display = 'none';
	}
	else if (document.getElementById("residentid").checked){
		
		document.getElementById("resicon").style.color = 'blue';
		document.getElementById("businessicon").style.color = '#737373';
		document.getElementById("propertysummary").innerHTML = "Property Type : Resident";
	}
	document.getElementById("propertysummary").style.display = 'block';
	document.getElementById("metertypesummary").style.display = 'block';
	setMeterTypeSummary();	
}

function setMeterTypeSummary()
{
	if(document.getElementById("meterTypeList").value == "peak")
	{
		document.getElementById("metertypesummary").innerHTML = "Meter Type : Peak Only";
	}
	else if(document.getElementById("meterTypeList").value == "peakOff")
	{
		document.getElementById("metertypesummary").innerHTML = "Meter Type : Peak and Off Peak";
	}
	else if(document.getElementById("meterTypeList").value == "peakOffShoulder")
	{
		document.getElementById("metertypesummary").innerHTML = "Meter Type : Peak, Off Peak & Shoulder";
	}
	else
	{
		document.getElementById("metertypesummary").innerHTML = "Meter Type : Peak with Controlled Load";
	}
}
function displayCompareBtn()
{
	if(document.getElementById("avgbillamount").value != '')
	{
		
		document.getElementById("compareBtn").style.display = 'block';		
	}
	else
	{
		document.getElementById("compareBtn").style.display = 'none';
	}
	document.getElementById("avgbillsummary").style.display = 'block';
	document.getElementById("avgbillsummary").innerHTML = "Average Bill Amount : " + document.getElementById("avgbillamount").value;
}

function displayAvgEstimation()
{
	if(document.getElementById("daysusage").value != '')
	{
		
		document.getElementById("avgEstimation").style.display = 'block';		
	}
	else
	{
		document.getElementById("avgbillamount").value = '';
		document.getElementById("avgEstimation").style.display = 'none';
		document.getElementById("avgbillsummary").style.display = 'none';
	}
	document.getElementById("dayssummary").style.display = 'block';
	document.getElementById("dayssummary").innerHTML = "Days : " + document.getElementById("daysusage").value;
	document.getElementById("compareBtn").style.display = 'none';
}

function compare(element) {
	var data = dataGlobal;
	if (document.getElementById("businessid").checked) {
		var busresvalue = "Business";

	} else if (document.getElementById("residentid").checked) {
		var busresvalue = "Residential";

	}
	if (document.getElementById("billyes").checked) {
		bynmiLookup();
	} else
		bypostcodeLookup();
	for (var i = 0; i < Object.keys(data).length; i++) {
		if (data[i].state == document.getElementById("state").innerHTML
				&& data[i].meter_type == document
						.getElementById("meterTypeList").value
				&& data[i].property_type == busresvalue) {
			document.getElementById("tariff_type").innerHTML = data[i].tarifftype;
		}
	}
	var usage;
	if (document.getElementById("billyes").checked) {
		usage = document.getElementById("peakusage").value;
	} else {

		if (document.getElementById("oneusage").checked) {
			usage = 100;
		}
		else if (document.getElementById("twousage").checked) {
			usage = 200;
		}
		else if (document.getElementById("threeusage").checked) {
			usage = 300;
		}
	}

	/*var link = "compare.html?distributor="
			+ document.getElementById("distributor").innerHTML + "&tarifftype="
			+ document.getElementById("tarifftype").innerHTML + "&usage="
			+ "" +usage + "&days="
			+ document.getElementById("daysusage").value;
	document.getElementById("comparlink").setAttribute('href', link);*/
	return "compare.php?distributor="
			+ document.getElementById("distributor").innerHTML + "&tarifftype="
			+ document.getElementById("tarifftype").innerHTML + "&usage="
			+ "" +usage + "&days="
			+ document.getElementById("daysusage").value;

}

function bynmiLookup() {

	var nmis = nmisGlobal;
	for (var i = 0; i < Object.keys(nmis).length; i++) {
		if (nmis[i].nmiprefix == document.getElementById("nmiinput").value.substring(0,2)) {
			document.getElementById("distributor").innerHTML = nmis[i].distributor;
			document.getElementById("state").innerHTML = nmis[i].state;
		}
	}
}

function bypostcodeLookup() {

	var postcodes = postcodesGlobal;
	for (var i = 0; i < Object.keys(postcodes).length; i++) {
		if (postcodes[i].postcode == document.getElementById("postcodeValue").value
				&& postcodes[i].suburb == document.getElementById("suburbList").value) {
			document.getElementById("state").innerHTML = postcodes[i].state;
			document.getElementById("distributor").innerHTML = postcodes[i].distributor;
		}
	}
}
function suburbChoice(value) {
	resetFields();
	var postcodes = postcodesGlobal;
	document.getElementById("postcodesummary").style.display = 'block';
	document.getElementById("postcodesummary").innerHTML = "Post Code : " + value;
	var suburb = document.getElementById("suburbList");
	var metertype = document.getElementById("meterTypeList");

	for (var i = 0; i < Object.keys(postcodes).length; i++) {
		if (postcodes[i].postcode == document.getElementById("postcodeValue").value) {

			document.getElementById("propertyType").style.display = 'block';
			
			var option = document.createElement("option");
			option.value = postcodes[i].suburb;
			option.text = postcodes[i].suburb;
			suburb.appendChild(option);
			document.getElementById("suburb").style.display = 'block';
			document.getElementById("suburbsummary").style.display = 'block';
			document.getElementById("suburbsummary").innerHTML = "Suburb : " + postcodes[i].suburb;
			document.getElementById("postid").className = "fa fa-check fa-2x answered";
			document.getElementById("suburbid").className = "fa fa-check fa-2x answered";
		} else {
			suburb.options[i] = null;

		}
	}
}
