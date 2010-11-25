<script type="text/javascript"> 
var revert = new Array();
var inames = new Array('Emily', 'Jeff', 'Kuan', 'Susie', 'Cyril', 'Nick');
 
// Preload
if (document.images) {
  var flipped = new Array();
  for(i=0; i< inames.length; i++) {
    flipped[i] = new Image();
    flipped[i].src = "/img/exec/"+inames[i]+"1.jpg";
  }
}
 
function over(num) {
  if(document.images) {
    revert[num] = document.images[inames[num]].src;
    document.images[inames[num]].src = flipped[num].src;
  }
}
function out(num) {
  if(document.images) document.images[inames[num]].src = revert[num];
}
</script>
<h1>The TechFair Team</h1>
<p>6 people, 1 awesome team.</p>

<table border="0" cellspacing="3" cellpadding="3" style="font-size: 8pt;">
	<tr>
		<td><img src="/img/exec/Emily0.jpg" name="Emily" onMouseOver="over(0)" onMouseOut="out(0)"></td>
		<td valign="top">
			<span style="font-size: 18pt; text-shadow: #eeeeee 1px 1px 2px;">Emily Zhao </span>
			<br />Course 6 + 18
			<br /><strong>Managing Director, Logistics Director</strong>
			<br /><br />
			The alpha female of the pack, Emily Zhao's only documented weakness is being distracted by an enticing Facebook app. In her off hours, Emily enjoys managing her other 30,000 student groups.  She can warp time and space to her will.
			<br /><br />
		</td>
	</tr>
	<tr>
		<td><img src="/img/exec/Jeff0.jpg" name="Jeff" onMouseOver="over(1)" onMouseOut="out(1)"></td>
		<td valign="top">
			<span style="font-size: 18pt; text-shadow: #eeeeee 1px 1px 2px;">Jeff Chen</span>
			<br />Course 6 + 18
			<br /><strong>Associate Director, Corporate Relations Director, Human Relations Director</strong>
			<br /><br />
			When not frantically dashing from Techfair meeting to Techfair meeting, Jeff enjoys taking Jiujitsu classes and skateboarding. Jeff likes to think he looks cool skateboarding to class in uniform, when in fact he just resembles a teenage ghost.
			<br /><br />
		</td>
	</tr>
	<tr>
		<td><img src="/img/exec/Kuan0.jpg" name="Kuan" onMouseOver="over(2)" onMouseOut="out(2)"></td>
		<td valign="top">
			<span style="font-size: 18pt; text-shadow: #eeeeee 1px 1px 2px;">Kuan Cheng</span>
			<br />Course 2
			<br /><strong>Corporate Relations Director</strong>
			<br /><br />
			Kuan directs the Corporate Relations board with a mixture of motherly love and a Stalin-esque iron fist. Last summer, she interned at General Electric. No she did not meet Jack Donaghey. Her favorite hobby is talking.
			<br /><br />
		</td>
	</tr>
	<tr>
		<td><img src="/img/exec/Susie0.jpg" name="Susie" onMouseOver="over(3)" onMouseOut="out(3)"></td>
		<td valign="top">
			<span style="font-size: 18pt; text-shadow: #eeeeee 1px 1px 2px;">Susie Fu</span>
			<br />Course 6 
			<br /><strong>Marketing Director, IT Director</strong>
			<br /><br />
			A woman of many talents, Susie can instantly identify the pitch of a fire alarm, or cook a vegetarian meal worthy of a brontosaurus (She doesn't care that they don't exist). In her leisure time she runs a small startup, Susie's Veggie Diner. It is often on fire.
			<br /><br />
		</td>
	</tr>
	<tr>
		<td><img src="/img/exec/Cyril0.jpg" name="Cyril" onMouseOver="over(4)" onMouseOut="out(4)"></td>
		<td valign="top">
			<span style="font-size: 18pt; text-shadow: #eeeeee 1px 1px 2px;">Cyril Lan</span>
			<br />Course 6 + 15
			<br /><strong>Finance Director</strong>
			<br /><br />
			Cyril, being the oldest in the group, naturally is in charge of the money, which he doles out in small envelopes labeled 'allowance'. Outside of Techfair, Cyril sings for the MIT acapella group Syncopasian. Fun fact: The name 'Syncopasian' comes from the fact that all of its members belong to the Navajo tribe.
			<br /><br />
		</td>
	</tr>
	<tr>
		<td><img src="/img/exec/Nick0.jpg" name="Nick" onMouseOver="over(5)" onMouseOut="out(5)"></td>
		<td valign="top">
			<span style="font-size: 18pt; text-shadow: #eeeeee 1px 1px 2px;">Nick Dou</span>
			<br />Course 2 + 6
			<br /><strong>THINK Director</strong>
			<br /><br />
			Nick is the head honcho of the THINK operation, which is kind of like babysitting, if your kids are all geniuses. When not taking far more classes than humanly possible, Nick regularly upholds the astonishing feat of owning a fixed-gear bicycle without being smug about it.
			<br /><br />
		</td>
	</tr>
</table>