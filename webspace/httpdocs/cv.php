<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
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
								if ($odd) {
									echo "<tr>\n";
									$odd = FALSE;
								} else {
									echo "<tr class=\"even\">\n";
									$odd = TRUE;
								}
								echo "<td>".$job->company->name."</td>\n";
								echo "<td>".$job->role->from."</td>\n";
								echo "<td>".$job->role->to."</td>\n";
								echo "<td>".$job->role->name."</td>\n";
								echo "</tr>\n";
							}
						?>
					</tbody>
				</table>
				<?php
					foreach ($xml->xpath("//job") as $job) {
						echo "<div class=\"job\">\n";
						echo "<h4 class=\"company\">";
						if ($job->company->url) {
							echo "<a href=\"".$job->company->url."\">";
						}
						echo $job->company->name;
						if ($job->company->url) {
							echo "</a>";
						}
						echo ", <span class=\"location\">".$job->company->location."</span></h4>\n";
						echo "<h5 class=\"title\">".$job->role->name.", <span class=\"duration\">".$job->role->from." - ".$job->role->to."</span></h5>\n";
						if ($job->description) {
							echo "<p>".$job->description."</p>";
						}
						if ($job->achievements) {
							echo "<h5>Contributions and Achievements</h5>\n";
							echo "<ul>\n";
							foreach ($job->achievements->achievement as $achievement) {
								echo "<li>".$achievement."</li>\n";
							}
							echo "</ul>\n";
						}
						echo "<dl class=\"skills\">\n";
						if ($job->skills->programmingLanguages) {
							echo "<dt>Programming Language</dt>\n";
							echo "<dd>";
							$first = TRUE;
							foreach ($job->skills->programmingLanguages->programmingLanguage as $programmingLanguage) {
								if (!$first) {
									echo ", ";
								} else {
									$first = FALSE;
								}
								echo $programmingLanguage;
							}
							echo "</dd>";
						}
						if ($job->skills->frameworks) {
							echo "<dt>Frameworks/Libraries</dt>\n";
							echo "<dd>";
							$first = TRUE;
							foreach ($job->skills->frameworks->framework as $framework) {
								if (!$first) {
									echo ", ";
								} else {
									$first = FALSE;
								}
								echo $framework;
							}
							echo "</dd>";
						}
						if ($job->skills->targetEnvironments) {
							echo "<dt>Target Environments</dt>\n";
							echo "<dd>";
							$first = TRUE;
							foreach ($job->skills->targetEnvironments->targetEnvironment as $targetEnvironment) {
								if (!$first) {
									echo ", ";
								} else {
									$first = FALSE;
								}
								echo $targetEnvironment->name;
								if ($targetEnvironment->versions) {
									$first1 = TRUE;
									echo " (";
									foreach ($targetEnvironment->versions->version as $version) {
										if (!$first1) {
											echo ", ";
										} else {
											$first1 = FALSE;
										}
										echo $version;
									}
									echo ")";
								}
							}
						if ($job->skills->developmentTools) {
							echo "<dt>Development Tools</dt>\n";
							echo "<dd>";
							$first = TRUE;
							foreach ($job->skills->developmentTools->developmentTool as $tool) {
								if (!$first) {
									echo ", ";
								} else {
									$first = FALSE;
								}
								echo $tool;
							}
							echo "</dd>";
						}
							echo "</dd>";
						}
						echo "</div>\n";
					}
				?>		
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