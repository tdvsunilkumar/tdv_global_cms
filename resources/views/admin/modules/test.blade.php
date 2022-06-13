<?php
 $pageData = (array)json_decode($data['moduleValue']['value']);
 $pageHtml = $pageData['gjs-html'];
 $pageCss  = $pageData['gjs-css'];
echo $pageHtml;

?>
<style type="text/css">
	<?php echo $pageCss; ?>
</style>