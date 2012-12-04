<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<?php $tab = 2 ?>
<?php include('inc/head.php'); ?>
<body>
	<div id="wrapper">
		<?php include('inc/header.php'); ?>
		<div id="content">
			<?php include('inc/right.php'); ?>
			<div id="left">
				<h2>Open Source Portfolio</h2>
				<p>I develop the following open source projects:</p>
				<dl class="projects">
					<dt>Selenium JUnit 4 Runner</dt>
					<dd>
						<script type="text/javascript" src="http://www.ohloh.net/p/586053/widgets/project_basic_stats.js"></script>
						The <a href="http://selenium-junit4-runner.btmatthews.com">Selenium JUnit 4 Runner</a>
						is a test runner for <a href="http://www.junit.com">JUnit 4</a> that eliminates some of the
						boiler plate required to create integration tests using <a href="http://seleniumhq.org">Selenium</a>.
						<ul class="links">
						<li><a href="http://selenium-junit4-runner.btmatthews.com">Home</a></li>
						<li><a href="http://bmatthews68.github.com/selenium-junit4-runner">GitHub</a></li>
						</ul>
					</dd>
					<dt>CRX Maven Plugin</dt>
					<dd>
					    A Maven plugin that collects the resources for a Google Chrome extension and
					    packages then into a signed CRX archive.
					    <img src="https://buildhive.cloudbees.com/job/bmatthews68/job/crx-maven-plugin/badge/icon"/>
					</dd>
					<dt>LDAP Maven Plugin</dt>
					<dd>
						A Maven 3 plug-in that launches an embedded LDAP directory server
						intended for use in the creation of integration tests.
						<ul class="links">
						<li><a href="http://ldap-maven-plugin.btmatthews.com">Home</a></li>
						<li><a href="http://bmatthews68.github.com/ldap-maven-plugin">GitHub</a></li>
						</ul>
					</dd>
					<dt>In-Memory Database Maven Plugin</dt>
					<dd>
						A Maven 3 plugin that launches an embedded database server
						intended for use in the creation of integration tests.
						<ul class="links">
						<li><a href="http://inmemdb-maven-plugin.btmatthews.com">Home</a></li>
						<li><a href="http://bmatthews68.github.com/inmemdb-maven-plugin">GitHub</a></li>
						</ul>
					</dd>
					<dt>Greenmail Maven Plugin</dt>
					<dd>
						A Maven 3 plugin that launches an embedded mail server intended
						for use in the creation of integration tests.
						<ul class="links">
						<li><a href="http://greenmail-maven-plugin.btmatthews.com">Home</a></li>
						<li><a href="http://bmatthews68.github.com/greenmail-maven-plugin">GitHub</a></li>
						</ul>
					</dd>
					<dt>MockNS</dt>
					<dd>
						A custom namespace for Spring to simplify the definition of mock
						objects in Spring contexts intended to be used when creating unit
						tests. MockNS supports jMock, Mockito and easymock. <br />
						<ul class="links">
						<li><a href="http://mockns.btmatthews.com">Home</a></li>
						<li><a href="http://bmatthews68.github.com/MockNS">GitHub</a></li>
						</ul>
					</dd>
				</dl>
				<p>I collaborate on the following open source projects:</p>
				<dl class="projects">
					<dt>TitanDNS</dt>
					<dd>
						An authorative DNS name server written in Java using Netty, Guice and Neo4J.<br /> <a
							href="http://titandns.org" class="button">Home</a> <a href="http://TitanDNS.github.com/TitanDNS" class="button">GitHub</a>
					</dd>
				</dl>
			</div>
		</div>
		<?php include('inc/footer.php'); ?>
	</div>
</body>
</html>