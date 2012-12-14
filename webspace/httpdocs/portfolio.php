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
     <p>I have developed and am actively maintaining the following open source projects:</p>
     <dl class="projects">
      <?php $xml = simplexml_load_file("portfolio.xml"); foreach ($xml->xpath("//project") as $project) { ?>
       <dt><?=$project->name?></dt>
       <dd>
       	<?=$project->description?>
        <ul class="links">
         <?php foreach ($project->links->link as $link) { ?>
          <li><a href="<?=$link->url?>"><?=$link->name?></a></li>	
         <?php } ?>
        </ul>
       </dd>
      <?php } ?>
     </dl>
    </div>
   </div>
   <?php include('inc/footer.php'); ?>
  </div>
 </body>
</html>