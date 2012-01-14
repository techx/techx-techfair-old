<!--<script type="text/javascript"> 
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
</script>-->

<script type="text/javascript">
	$(document).ready(function() {
			for(count=0;count<9;count++){
			$("#tooltip"+count).tipsy({gravity: 's'});
		}
	});
 </script>
 
<style type="text/css">
.marginnone {
  border: 0px;
  padding: 0px;
}
.marginright {
  margin-right: 6px;
  border: 0px;
  padding: 0px;
}
.marginrighttopbottom {
  margin-right: 6px;
  margin-top: 6px;
  margin-bottom: 6px;
  border: 0px;
  padding: 0px;
}
.margintopbottom {
  margin-top: 6px;
  margin-bottom: 6px;
  border: 0px;
  padding: 0px;
}
</style>
 
<h1>The Techfair Executive Team</h1>
<p>
  The executive team is elected every year by the Techfair committee members. These future leaders of America 
  <strong>10 people, 1 awesome team.</strong> <br>Team email: <a href="mailto:techfair-exec@mit.edu">techfair-exec@mit.edu</a></p>

<a id="tooltip4" href="#" title="Susie Fu: Managing Director, mother hen">
  <img class="marginright" src="/img/exec/susie.jpg" name="Susie" />
</a>
<a id="tooltip5" href="#" title="Ravi Charan: Associate Director, TechTalk director, math genius">
  <img class="marginright" src="/img/exec/ravi.jpg" name="Ravi" />
</a>
<a href="#" id="tooltip1" title="Jennifer Wang: Student Relations Director, nutella fanatic">
  <img class="marginright" src="/img/exec/jennifer.jpg" name="Jennifer"/>
</a>
<a id="tooltip6" href="#" title="Joshua Ma: Corporate Relations Co-Director, superstarhacker">
  <img class="marginnone" src="/img/exec/josh.jpg" name="Josh" />
</a>

<a href="#" id="tooltip2" title="Jonathan Gootenberg: Corporate Relations Co-Director, unit overtaker">
  <img class="marginrighttopbottom" src="/img/exec/goot.jpg" name="Goot"/>
  </a>
<a href="/img/exec/execo.jpg" id="tooltip10" title="Executive Team at the Techfair Retreat">
  <img class="marginrighttopbottom" src="/img/exec/exec.JPG" name="Exec"/>
</a>
<a id="tooltip8" href="#" title="Sherry Wu: Finance Director, original apple fangirl">
  <img class="margintopbottom" src="/img/exec/sherry.jpg" name="Sherry" />
  </a>

<a id="tooltip7" href="#" title="Ranna Zhou: Internal Director, multitask extraordinare">
  <img class="marginright" src="/img/exec/ranna.jpg" name="Ranna" />
  </a>
<a href="#" id="tooltip3" title="Carolyn Zhang: Marketing Director, fashionista">
  <img class="marginright" src="/img/exec/carolyn.jpg" name="Carolyn" />
  </a>
<a href="#" id="tooltip9" title="Julie Wang: Events Director, mystery woman">
  <img class="marginright" src="/img/exec/julie.jpg" name="Julie"/>
</a>
<a href="#" id="tooltip0" title="David Luciano: Logistics Director, karate master">
  <img class="marginnone" src="/img/exec/david.jpg" name="David"/>
</a>

<!-- Old 3x3 2011 Exec
<table padding=0 margin=15>
  <tr>
    <td><a href="#" id="tooltip0" title="David Luciano: Logistics Director, karate master"><img src="/img/exec/david.jpg" name="David"/></a>
    <td><a href="#" id="tooltip1" title="Jennifer Wang: Student Relations Director, nutella fanatic"><img src="/img/exec/jennifer.jpg" name="Jennifer"/></a>
    <td><a href="#" id="tooltip2" title="Jonathan Gootenberg: Corporate Relations Co-Director, unit overtaker"><img src="/img/exec/goot.jpg" name="Goot"/></a>
  </tr>
  <tr>
    <td><a href="#" id="tooltip3" title="Carolyn Zhang: Marketing Director, fashionista"><img src="/img/exec/carolyn.jpg" name="Carolyn" /></a>
    <td><a id="tooltip4" href="#" title="Susie Fu: Managing Director, mother hen"><img src="/img/exec/susie.jpg" name="Susie" /></a>
    <td><a id="tooltip5" href="#" title="Ravi Charan: Associate Director, math genius"><img src="/img/exec/ravi.jpg" name="Ravi" /></a>
  </tr>
  <tr>
    <td><a id="tooltip6" href="#" title="Joshua Ma: Corporate Relations Co-Director, superstarhacker"><img src="/img/exec/josh.jpg" name="Josh" /></a>
    <td><a id="tooltip7" href="#" title="Ranna Zhou: Internal Director, multitask extraordinare"><img src="/img/exec/ranna.jpg" name="Ranna" /></a>
    <td><a id="tooltip8" href="#" title="Sherry Wu: Finance Director, original apple fangirl"><img src="/img/exec/sherry.jpg" name="Sherry" /></a>
  </tr>
</table>
-->

<!--OLD EXEC

<h2>Emily Zhao</h2>
<img src="/img/exec/Emily0.jpg" name="Emily" onMouseOver="over(0)" onMouseOut="out(0)" />
<div class="team">
	<h3>Managing Director, Logistics Director</h3>
	<h4>Course 6+18</h4>
	<span>The alpha female of the pack, Emily Zhao's only documented weakness is being distracted by an enticing Facebook app. In her off hours, Emily enjoys managing her other 30,000 student groups.  She can warp time and space to her will.</span>
</div>
<div class="clear"></div>

<h2>Jeff Chen</h2>
<img src="/img/exec/Jeff0.jpg" name="Jeff" onMouseOver="over(1)" onMouseOut="out(1)" />
<div class="team">
	<h3>Associate Director, Corporate Relations Director, Human Relations Director</h3>
	<h4>Course 6+18</h4>
	<span>When not frantically dashing from Techfair meeting to Techfair meeting, Jeff enjoys taking Jiujitsu classes and skateboarding. Jeff likes to think he looks cool skateboarding to class in uniform, when in fact he just resembles a teenage ghost.</span>
</div>
<div class="clear"></div>

<h2>Kuan Cheng</h2>
<img src="/img/exec/Kuan0.jpg" name="Kuan" onMouseOver="over(2)" onMouseOut="out(2)" />
<div class="team">
	<h3>Corporate Relations Director</h3>
	<h4>Course 2</h4>
	<span>Kuan directs the Corporate Relations board with a mixture of motherly love and a Stalin-esque iron fist. Last summer, she interned at General Electric. No she did not meet Jack Donaghey. Her favorite hobby is talking.</span>
</div>
<div class="clear"></div>

<h2>Susie Fu</h2>
<img src="/img/exec/Susie0.jpg" name="Susie" onMouseOver="over(3)" onMouseOut="out(3)" />
<div class="team">
	<h3>Marketing Director, IT Director</h3>
	<h4>Course 6</h4>
	<span>A woman of many talents, Susie can instantly identify the pitch of a fire alarm, or cook a vegetarian meal worthy of a brontosaurus (She doesn't care that they don't exist). In her leisure time she runs a small startup, Susie's Veggie Diner. It is often on fire.</span>
</div>
<div class="clear"></div>

<h2>Cyril Lan</h2>
<img src="/img/exec/Cyril0.jpg" name="Cyril" onMouseOver="over(4)" onMouseOut="out(4)" />
<div class="team">
	<h3>Finance Director</h3>
	<h4>Course 6+15</h4>
	<span>Cyril, being the oldest in the group, naturally is in charge of the money, which he doles out in small envelopes labeled 'allowance'. Outside of Techfair, Cyril sings for the MIT acapella group Syncopasian. Fun fact: The name 'Syncopasian' comes from the fact that all of its members belong to the Navajo tribe.</span>
</div>
<div class="clear"></div>

<h2>Nick Dou</h2>
<img src="/img/exec/Nick0.jpg" name="Nick" onMouseOver="over(5)" onMouseOut="out(5)" />
<div class="team">
	<h3>THINK Director</h3>
	<h4>Course 2+6</h4>
	<span>Nick is the head honcho of the THINK operation, which is kind of like babysitting, if your kids are all geniuses. When not taking far more classes than humanly possible, Nick regularly upholds the astonishing feat of owning a fixed-gear bicycle without being smug about it.</span>
</div>
<div class="clear"></div>
-->
