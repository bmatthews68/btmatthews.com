<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
 <?php include_once("inc/markdown.php"); ?>
 <?php function outputSkills($title, $skills) { ?>
  <dt><?=$title?></dt>
  <dd>
  <?php $skills = array_unique($skills);
  sort($skills, SORT_STRING);
  $n = count($skills);
  foreach ($skills as $skill) { ?>
   <?=$skill?><?php if (--$n > 0) { ?>, <?php }
  } ?>
  </dd>
 <?php } ?>
 <?php function outputDuration($start, $end) {
  $enda = date_parse($end);
  $starta = date_parse($start);
  $months = ($enda['year'] - $starta['year']) * 12 + $enda['month'] - $starta['month'] + 1;
  $duration = '';
  if ($months >= 12) {
  	if ($months < 24) {
  		$duration = $duration . '1 year';
	} else {
		$duration = $duration . (int)($months / 12) . ' years';
	}
  }
  if ($months % 12 > 0) {
  	if ($months > 12) {
  		$duration = $duration . ' ';
  	}
  	if ($months % 12 == 1) {
  		$duration = $duration . '1 month';
  	} else {
  		$duration = $duration . (int)($months % 12) . ' months';
  	}
  }
  return $duration;  
 }?>
 <?php $tab = 3 ?>
 <?php include('inc/head.php'); ?>
 <body>
  <div id="wrapper">
   <?php include('inc/header.php'); ?>
   <div id="content">
    <?php include('inc/right.php'); ?>
    <div id="left">
     <?php $xml = simplexml_load_file("cv.xml") ?>
     <h3>Professional Profile</h3>
     <ul>
      <li>Self-motivated IT professional with a focus on rapid development of high quality enterprise solutions incorporating the following technologies: 
       <ul>
        <li>Portal Servers</li>
        <li>Enterprise Application Integration</li>
        <li>Business Process Management/Workflow Automation</li>
       </ul>
      </li>
      <li>Experience developing solutions for following industry verticals: 
       <ul>
        <li>Banking / Finance</li> 
        <li>Insurance</li>
        <li>Software</li> 
        <li>Telecommunications</li> 
        <li>Transportation</li>
       </ul>
      </li>
      <li>8+ years project management experience using traditional waterfall-based and iterative software development lifecycles</li>
      <li>Working knowledge of the SCRUM agile project management technique</li>
      <li>Experience working with development and coordinating teams based in multiple geographical locations and time zones</li>
      <li>Experience working with off shore development teams based in Tunisia, India, Singapore and Philippines</li>
      <li>International experience working in Ireland, UK, USA, France, Japan and Tunisia</li>
      <li>Experience managing performance in a structured environment</li>
      <li>Broad range of technical expertise covering both the JEE and .NET stacks</li>
     </ul>
     <h3>Skills</h3>
      <dl class="skills">
       <?php outputSkills('Programming Languages', $xml->xpath('//programmingLanguage')); ?>
       <?php outputSkills('Frameworks/Libraries', $xml->xpath('//framework')); ?>
       <?php outputSkills('Target Environments', $xml->xpath('//targetEnvironment/name')); ?>
       <?php outputSkills('Development Tools', $xml->xpath('//developmentTool')); ?>
      </dl>
     <h3>Professional Experience</h3>
     <h4>Summary of Roles</h4>
     <table id="summary">
      <thead>
       <tr>
        <th>Company</th>
        <th>From</th>
        <th>To</th>
        <th>Position (Duration)</th>
       </tr>
      </thead>
      <tbody>
       <?php
        $odd = TRUE;
        foreach ($xml->xpath("//job") as $job) {
          if ($odd) { ?>
          <tr>
          <?php
           $odd = FALSE;
         } else { ?>
          <tr class="even">
         <?php
         $odd = TRUE;
         } ?>
         <td><?=$job->company->name?></td>
         <td><?=$job->role->from?></td>
         <td><?=$job->role->to?></td>
         <td><?=$job->role->name?> (<?=outputDuration($job->role->from, $job->role->to)?>)</td>
        </tr>
       <?php } ?>
      </tbody>
     </table>
     <?php foreach ($xml->xpath("//job") as $job) { ?>
      <div class="job">
       <h4 class="company"><?php if ($job->company->url) { ?><a href="<?=$job->company->url?>"><?php } ?><?= $job->company->name?><?php if ($job->company->url) {?></a><?php } ?>, <span class="location"><?=$job->company->location?></span></h4>
       <h5 class="title"><?=$job->role->name?>, <span class="duration"><?=$job->role->from?> - <?=$job->role->to?></span></h5>
       <?php if ($job->description) { ?><p><?=Markdown($job->description->asXML())?></p><?php } ?>
       <?php if ($job->achievements) { ?>
        <h5>Contributions and Achievements</h5>
        <ul>
         <?php foreach ($job->achievements->achievement as $achievement) { ?>
          <li><?=$achievement?></li>
         <?php } ?>
        </ul>
       <?php } ?>
       <dl class="skills">
         <?php if ($job->skills->programmingLanguages) { ?>
         <dt>Programming Languages</dt>
         <dd><?php $n = count($job->skills->programmingLanguages->programmingLanguage); foreach ($job->skills->programmingLanguages->programmingLanguage as $programmingLanguage) { ?>
          <?=$programmingLanguage?><?php if (--$n > 0) { ?>, <?php }
         } ?></dd>
        <?php } ?>
        <?php if ($job->skills->frameworks) { ?>
         <dt>Frameworks/Libraries</dt>
         <dd><?php $n = count($job->skills->frameworks->framework); foreach ($job->skills->frameworks->framework as $framework) { ?>
          <?=$framework?><?php if (--$n > 0) { ?>, <?php }
         } ?></dd>
        <?php } ?>
        <?php if ($job->skills->targetEnvironments) { ?>
         <dt>Target Environments</dt>
         <dd><?php $n = count($job->skills->targetEnvironments->targetEnvironment); foreach ($job->skills->targetEnvironments->targetEnvironment as $targetEnvironment) {
          if ($targetEnvironment->versions) { ?>
          	<?=$targetEnvironment->name?> (<?php $m = count($targetEnvironment->versions->version); foreach ($targetEnvironment->versions->version as $version) { ?><?=$version?><?php if (--$m > 0) { ?>, <?php } } ?>)<?php if (--$n > 0) { ?>, <?php }
          } else { ?>
           <?=$targetEnvironment->name?><?php if (--$n > 0) { ?>, <?php }
		  }
         } ?></dd>
        <?php } ?>
        <?php if ($job->skills->developmentTools) { ?>
         <dt>Development Tools</dt>
		 <dd><?php $n = count($job->skills->developmentTools->developmentTool); foreach ($job->skills->developmentTools->developmentTool as $tool) { ?>
          <?=$tool?><?php if (--$n > 0) { ?>, <?php }
         } ?></dd>
        <?php } ?>
       </dl>
      </div>
     <?php } ?>		
     <h3>Qualifications &amp; Training</h3>
     <h5>B.Sc. in Computer Applications</h5>
     <p>Dublin City University</p>
     <p>Graduated with honours in November 1990</p>
     <h3>References</h3>
     <p>Available upon request.</p> 
    </div>
   </div>
   <?php include('inc/footer.php'); ?>
  </div>
 </body>
</html>