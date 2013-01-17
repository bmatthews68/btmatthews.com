<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
 <?php include_once("inc/markdown.php"); ?>
 <?php $tab = 2 ?>
 <?php include('inc/head.php'); ?>
 <body>
  <div id="wrapper">
   <?php include('inc/header.php'); ?>
   <div id="content">
    <?php include('inc/right.php'); ?>
    <div id="left">
     <p>I have developed and am actively maintaining the open source projects listed below. All projects
     	are distributed via <a href="http://search.maven.org">Maven Central</a> and the source code is
		hosted on <a href="http://github.com">GitHub</a>.</p>
     <?php $xml = simplexml_load_file("portfolio.xml"); foreach ($xml->xpath("//category") as $category) { ?>
     	<h1><?=$category->name?></h1>
     	<p><?=Markdown($category->description->asXML())?></p>
     <dl class="projects">
      <?php foreach ($category->projects->project as $project) { ?>
       <dt><?=$project->name?></dt>
       <dd>
       	<?=Markdown($project->description->asXML())?>
        <ul class="links">
         <?php foreach ($project->links->link as $link) { ?>
          <li><a href="<?=$link->url?>"><?=$link->name?></a></li>	
         <?php } ?>
        </ul>
       </dd>
      <?php } ?>
     </dl>
     <?php } ?>
    </div>
   </div>
   <?php include('inc/footer.php'); ?>
  </div>
 </body>
</html>