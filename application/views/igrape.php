<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
	<title>iGrape Framework</title> 
	
	<?=html::favicon("igrape.png")?>
	<link rel="home" href="http://igrape.org/" title="Home" />
	<link rel="downloads" href="http://igrape.org/" title="Downloads" />
	<link rel="news" href="http://igrape.org/" title="News" />
	<link rel="group" href="http://igrape.org/" title="Group" />
	<link rel="userguide" href="http://igrape.org/" title="User Guide" />
	<link rel="wiki" href="http://igrape.org/" title="Wiki" />
	<link rel="bugtracker" href="http://igrape.org/" title="Bug Tracker" />
	
	<?=html::css("http://fonts.googleapis.com/css?family=Cantarell")?>
	<?=html::css("http://fonts.googleapis.com/css?family=Droid+Sans")?>
	<?=html::css("style.css")?>
	
	<meta http-equiv='expires' content='-1' /> 
	<meta http-equiv='pragma' content='no-cache' /> 
	<meta name='robots' content='all' /> 
	<meta name='description' content='iGrape: It is based on solid MVC principles, including separation of display' /> 
	<meta name='keywords' content='igrape, php, python, ruby, developer, mvc, orm, oop' /> 
	
	<link rev="diogocosta" href="http://diogocosta.com.br/"
	title="webdesigner e designer de interfaces" />
	<link rev="ormphp" href="http://phpburn.com/"
	title="orm php" />
	
	<link rel="alternate" type="application/atom+xml" title="Master Atom feed" href="/atom" /> 
	<link rel="alternate" type="application/rss+xml" title="Master RSS feed" href="/rss" /> 
	
	<link href='<?=html::pathimg("logo.png")?>' rel='icon'/>
</head>
<body>
	<div id="content">
		<div id="header" class="marg">
			<?=html::img("logo.png",'alt="iGrape Framework"')?>
			<ul> 
				<li><a href="<?=url("/")?>">Home</a></li> 
				<li><a href="#download">Downloads</a></li> 
				<li><a href="http://groups.google.com/group/igrape">Group</a></li>
				<li><a href="http://github.com/igrape/php/issues">Bug Tracker</a></li> 
			</ul> 
		</div>
		<div id="prop" class="marg">
			<div class="left">
				<h1>
					Acelere seu código agora.<br />
					Quando você quiser,<br />
					Como você quiser.
				</h1>
			</div>
			<div class="right">
				<h2>
					Php, Ruby ou Python. Você escolhe.
				</h2>
				<h3>iGrape é um framework que te levará a um nível superior.</h3>
				<h4>
					Com ele, será possível utilizar um mesmo modo de programação em  várias linguagens de programação diferente. Com uma estrutura modular, baseada em necessidades reais e pessoas reais.
				</h4>
			</div>
			<div class="clear"></div>
		</div>
		<div id="page">
			<?=$_content?>
		</div>
		<div class="clear"></div>
		<div id="footer" class="marg">
			<div class="left">
				<h2 class="thanks">Obrigado por usar:</h2>
				<?=html::img("logo_black.png",'alt="iGrape Framework"')?>
			</div>
			<div class="right">
				<ul> 
					<li><a href="<?=url("/")?>">Home</a></li> 
					<li><a href="#download">Downloads</a></li> 
					<li><a href="http://groups.google.com/group/igrape">Group</a></li>
					<li><a href="http://github.com/igrape/php/issues">Bug Tracker</a></li> 
				</ul>
				<div class="by">
					iGrape Framework está sobre licença <a href="http://www.opensource.org/licenses/bsd-license.php">New BSD</a>.<br />
					Copyright 2007-<?=date("Y")?> - iGrape Framework - All rights Reserved
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-3063031-14']);
	  _gaq.push(['_setDomainName', '.igrape.org']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</body>
</html>