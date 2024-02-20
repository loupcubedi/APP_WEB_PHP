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
    <link href=\"/assets/css/main.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css\">
    ";
        // line 13
        $this->displayBlock('css', $context, $blocks);
        // line 14
        echo "
</head>
<body>

<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <!-- Bouton de menu hamburger pour les petits écrans -->
    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>

    <!-- Éléments de navigation pr les ecrans en cas de petit -->
    <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
        <ul class=\"navbar-nav mr-auto\">
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/\">Carte des dons du sang</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/AdminDonDuSang/list\">Liste des dons du sang</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/AdminDonDuSang/add\">Ajouter un événement</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/AdminDonDuSang/fixtures\">Génération de données (Fixtures)</a>
            </li>
        </ul>
    </div>
    <!-- <form class=\"d-flex\">
        <input class=\"form-control me-2\" type=\"search\" placeholder=\"Search\" aria-label=\"Search\" id=\"Search\">
    </form> -->
    ";
        // line 44
        if (twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "login", [], "any", true, true, false, 44)) {
            // line 45
            echo "        <a class=\"btn btn-danger\" href=\"/User/logout\" role=\"button\">Log OUT</a>
    ";
        } else {
            // line 47
            echo "        <a class=\"btn btn-success\" href=\"/User/login\" role=\"button\">Log IN</a>
    ";
        }
        // line 49
        echo "</nav>

<div class=\"container\">

    ";
        // line 53
        $this->displayBlock('body', $context, $blocks);
        // line 54
        echo "</div>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4\" crossorigin=\"anonymous\"></script>
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js\"></script>
<script src=\"https://code.jquery.com/ui/1.13.1/jquery-ui.min.js\"></script>
<script src=\"/assets/js/script.js\"></script>

";
        // line 61
        $this->displayBlock('javascript', $context, $blocks);
        // line 62
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

    // line 13
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 53
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 61
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
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  147 => 61,  141 => 53,  135 => 13,  128 => 8,  121 => 62,  119 => 61,  110 => 54,  108 => 53,  102 => 49,  98 => 47,  94 => 45,  92 => 44,  60 => 14,  58 => 13,  50 => 8,  41 => 1,);
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
    <link href=\"/assets/css/main.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css\">
    {% block css %}{% endblock %}

</head>
<body>

<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
    <!-- Bouton de menu hamburger pour les petits écrans -->
    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
    </button>

    <!-- Éléments de navigation pr les ecrans en cas de petit -->
    <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
        <ul class=\"navbar-nav mr-auto\">
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/\">Carte des dons du sang</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/AdminDonDuSang/list\">Liste des dons du sang</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/AdminDonDuSang/add\">Ajouter un événement</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"/AdminDonDuSang/fixtures\">Génération de données (Fixtures)</a>
            </li>
        </ul>
    </div>
    <!-- <form class=\"d-flex\">
        <input class=\"form-control me-2\" type=\"search\" placeholder=\"Search\" aria-label=\"Search\" id=\"Search\">
    </form> -->
    {% if session.login is defined %}
        <a class=\"btn btn-danger\" href=\"/User/logout\" role=\"button\">Log OUT</a>
    {% else %}
        <a class=\"btn btn-success\" href=\"/User/login\" role=\"button\">Log IN</a>
    {% endif %}
</nav>

<div class=\"container\">

    {% block body %}{% endblock %}
</div>

<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4\" crossorigin=\"anonymous\"></script>
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js\"></script>
<script src=\"https://code.jquery.com/ui/1.13.1/jquery-ui.min.js\"></script>
<script src=\"/assets/js/script.js\"></script>

{% block javascript %}{% endblock %}

</body>
</html>
", "base.html.twig", "/var/www/html/src/View/base.html.twig");
    }
}
