var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	
function countdown(yr,m,d,hr,min,sec){
	theyear=yr;themonth=m;theday=d;thehour=hr;themin=min;thesec=sec;
	var today=new Date();
	var todayy=today.getYear();
	if (todayy < 1000)
		todayy+=1900;
	var todaym=today.getMonth();
	var todayd=today.getDate();
	var todayh=today.getHours();
	var todaymin=today.getMinutes();
	var todaysec=today.getSeconds();
	var todaystring=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;
	futurestring=montharray[m-1]+" "+d+", "+yr+" "+hr+":"+min+":"+sec;
	dd=Date.parse(futurestring)-Date.parse(todaystring);
	dday=Math.floor(dd/(60*60*1000*24)*1);
	dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
	dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
	dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
	if(dday<0&&dhour<0&&dmin<0&&dsec<0){
		document.getElementById('countdown').innerHTML='It\'s happening! Check us out at Rockwell Cage!';
		document.getElementById('countdown').style='background-color:#222;border-bottom:10px solid #aaa';
		return;
	}
	else{
		document.getElementById('cd-day').innerHTML=dday;
		document.getElementById('cd-hr').innerHTML=dhour;
		document.getElementById('cd-min').innerHTML=dmin;
		document.getElementById('cd-sec').innerHTML=dsec;
		setTimeout("countdown(theyear,themonth,theday,thehour,themin,thesec)",1000);
	}
}
//countdown(2011,1,31,10,0,0);

