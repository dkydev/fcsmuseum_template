<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
    $fullWidth = 1;
}
else
{
    $fullWidth = 0;
}

$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.js');

// Add Stylesheets
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.css');

// Use of Google Font
if ($this->params->get('googleFont'))
{
    $doc->addStyleSheet('//fonts.googleapis.com/css?family=' . $this->params->get('googleFontName'));
    $doc->addStyleDeclaration("
    h1, h2, h3, h4, h5, h6, .site-title {
        font-family: '" . str_replace('+', ' ', $this->params->get('googleFontName')) . "', sans-serif;
    }");
}

// Template color
if ($this->params->get('templateColor'))
{
    $doc->addStyleDeclaration("
    body.site {
        border-top: 3px solid " . $this->params->get('templateColor') . ";
        background-color: " . $this->params->get('templateBackgroundColor') . ";
    }
    a {
        color: " . $this->params->get('templateColor') . ";
    }
    .nav-list > .active > a,
    .nav-list > .active > a:hover,
    .dropdown-menu li > a:hover,
    .dropdown-menu .active > a,
    .dropdown-menu .active > a:hover,
    .nav-pills > .active > a,
    .nav-pills > .active > a:hover,
    .btn-primary {
        background: " . $this->params->get('templateColor') . ";
    }");
}

// Logo file or site title param
if ($this->params->get('logoFile'))
{
    $logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
    $logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle'), ENT_COMPAT, 'UTF-8') . '</span>';
}
else
{
    $logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>

<!DOCTYPE html>

<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <jdoc:include type="head" />
</head>

<body>
    
    <div class="container">
        
        <jdoc:include type="modules" name="header" style="none" />
        
        <jdoc:include type="modules" name="alert" style="none" />
        
        <nav class="navbar navbar-light bg-faded rounded navbar-toggleable-md">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $this->baseurl; ?>/"><?php echo $logo; ?></a>
            <div class="collapse navbar-collapse" id="containerNavbar">
                <jdoc:include type="modules" name="menu" style="none" />
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                      <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>
                </ul>
                <jdoc:include type="modules" name="menu-right" style="none" />
            </div>
        </nav>
        
        <jdoc:include type="modules" name="banner" style="none" />
        
        <div class="row">
            <div class="col">
                <jdoc:include type="modules" name="left" style="none" />
            </div>
            <div class="col">
                <jdoc:include type="modules" name="top" style="none" />
                <jdoc:include type="message" />
                <jdoc:include type="component" />
            </div>
            <div class="col">
                <jdoc:include type="modules" name="right" style="none" />
            </div>
        </div>
        
        <footer class="footer" role="contentinfo">
        
            <jdoc:include type="modules" name="footer" style="none" />
            
            <?php echo $logo; ?> &copy; <?php echo date('Y'); ?> <?php echo $sitename; ?>
            
        </footer>
        
    </div>
    
    <jdoc:include type="modules" name="debug" style="none" />
    
</body>

</html>
