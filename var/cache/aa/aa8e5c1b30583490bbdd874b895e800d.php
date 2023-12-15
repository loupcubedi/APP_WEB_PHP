<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_432a7a1efa5bea16f92ea0d09fb188ff extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'css' => [$this, 'block_css'],
            'body' => [$this, 'block_body'],
            'javascript' => [$this, 'block_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65\" crossorigin=\"anonymous\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css\" rel=\"stylesheet\" />
    ";
        // line 11
        $this->displayBlock('css', $context, $blocks);
        // line 12
        echo "
</head>
<body>

<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">

    <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
        <ul class=\"navbar-nav mr-auto\">
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/\">Accueil</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/?controller=AdminArticle&action=list\">Admin List</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/?controller=AdminArticle&action=add\">Admin Add</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/?controller=Article&action=fixtures\">Fixtures</a>
            </li>
        </ul>
    </div>

</nav>

<div class=\"container\">

    ";
        // line 39
        $this->displayBlock('body', $context, $blocks);
        // line 40
        echo "</div>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4\" crossorigin=\"anonymous\"></script>
";
        // line 43
        $this->displayBlock('javascript', $context, $blocks);
        // line 44
        echo "
</body>
</html>
";
    }

    // line 8
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "BLOG CESI";
    }

    // line 11
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 39
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 43
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  122 => 43,  116 => 39,  110 => 11,  103 => 8,  96 => 44,  94 => 43,  89 => 40,  87 => 39,  58 => 12,  56 => 11,  50 => 8,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>{% block title %}BLOG CESI{% endblock %}</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65\" crossorigin=\"anonymous\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css\" rel=\"stylesheet\" />
    {% block css %}{% endblock %}

</head>
<body>

<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">

    <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
        <ul class=\"navbar-nav mr-auto\">
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/\">Accueil</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/?controller=AdminArticle&action=list\">Admin List</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/?controller=AdminArticle&action=add\">Admin Add</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/?controller=Article&action=fixtures\">Fixtures</a>
            </li>
        </ul>
    </div>

</nav>

<div class=\"container\">

    {% block body %}{% endblock %}
</div>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4\" crossorigin=\"anonymous\"></script>
{% block javascript %}{% endblock %}

</body>
</html>
", "base.html.twig", "/var/www/html/src/View/base.html.twig");
    }
}
