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

// Use of Google Font
/*
if ($this->params->get('googleFont'))
{
    $doc->addStyleSheet('//fonts.googleapis.com/css?family=' . $this->params->get('googleFontName'));
    $doc->addStyleDeclaration("
    h1, h2, h3, h4, h5, h6, .site-title {
        font-family: '" . str_replace('+', ' ', $this->params->get('googleFontName')) . "', sans-serif;
    }");
}
*/

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
    <meta name="generator" content="Joomla! - Open Source Content Management" />
    <title><?php echo $this->title; ?></title>
    <link href="templates/fcsmuseum/css/bootstrap.css" rel="stylesheet" />
    <link href="templates/fcsmuseum/css/fcsmuseum.css" rel="stylesheet" />
</head>

<body>
    
    <div class="container">
        <div class="wrapper">
            <a class="navbar-brand" href="<?php echo $this->baseurl; ?>/"><?php echo $logo; ?></a>
            <jdoc:include type="modules" name="header" style="none" />
        </div>

        <jdoc:include type="modules" name="alert" style="none" />

        <div class="wrapper">
        
            <nav class="navbar navbar-inverse navbar-toggleable-md">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#containerNavbar" aria-controls="containerNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="containerNavbar">
                    <jdoc:include type="modules" name="menu" style="none" />
                </div>
                <jdoc:include type="modules" name="search" style="none" />
            </nav>
            
            <jdoc:include type="modules" name="banner" style="none" />
            
            <div class="row">

                <?php if ($this->countModules('left')): ?>
                <div class="col">
                    <jdoc:include type="modules" name="left" style="none" />
                </div>
                <?php endif; ?>

                <div class="col">
                    <jdoc:include type="modules" name="top" style="none" />
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                    <jdoc:include type="modules" name="bottom" style="none" />
                </div>

                <?php if ($this->countModules('right')) : ?>
                <div class="col">
                    <jdoc:include type="modules" name="right" style="none" />
                </div>
                <?php endif; ?>

            </div>
        
        </div>

        <div class="wrapper">
            <footer class="footer" role="contentinfo">
                <jdoc:include type="modules" name="footer" style="none" />
                <?php echo $logo; ?> &copy; <?php echo date('Y'); ?>
            </footer>
        </div>

    </div>
    
    <jdoc:include type="modules" name="debug" style="none" />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="templates/fcsmuseum/js/bootstrap.min.js"></script>

</body>

</html>
