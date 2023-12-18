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

/* Admin/Article/add.html.twig */
class __TwigTemplate_fb444d6a815fc3d6ed10b2bb03ac4fef extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "Admin/Article/add.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "ADMIN - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Ajout d'un Article ";
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <h1>Ajout Article</h1>

    <form method=\"post\" enctype=\"multipart/form-data\">

        <div class=\"mb-3\">
            <input type=\"text\" class=\"form-control\" placeholder=\"Saisir un titre\" name=\"Titre\">
        </div>

        <div class=\"mb-3\">
            <textarea class=\"form-control\" name=\"Description\" rows=\"3\"></textarea>
        </div>

        <div class=\"mb-3\">
            <input type=\"date\" class=\"form-control\" name=\"DatePublication\">
        </div>

        <div class=\"mb-3\">
            <select class=\"form-select\" name=\"Auteur\">
                <option value=\"Enzo\">Enzo</option>
                <option value=\"Lukas\">Lukas</option>
                <option value=\"Rémi\">Rémi</option>
                <option value=\"Bastien\">Bastien</option>
                <option value=\"Loup\">Loup</option>
                <option value=\"Kylian\">Kylian</option>
            </select>
        </div>

        <div class=\"mb-3\">
            <input type=\"file\" class=\"custom-file-input\" name=\"Image\">
        </div>


        <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
    </form>


";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "Admin/Article/add.html.twig";
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
        return array (  60 => 5,  56 => 4,  47 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}
{% block title %}ADMIN - {{ parent() }} - Ajout d'un Article {% endblock %}

{% block body %}
    <h1>Ajout Article</h1>

    <form method=\"post\" enctype=\"multipart/form-data\">

        <div class=\"mb-3\">
            <input type=\"text\" class=\"form-control\" placeholder=\"Saisir un titre\" name=\"Titre\">
        </div>

        <div class=\"mb-3\">
            <textarea class=\"form-control\" name=\"Description\" rows=\"3\"></textarea>
        </div>

        <div class=\"mb-3\">
            <input type=\"date\" class=\"form-control\" name=\"DatePublication\">
        </div>

        <div class=\"mb-3\">
            <select class=\"form-select\" name=\"Auteur\">
                <option value=\"Enzo\">Enzo</option>
                <option value=\"Lukas\">Lukas</option>
                <option value=\"Rémi\">Rémi</option>
                <option value=\"Bastien\">Bastien</option>
                <option value=\"Loup\">Loup</option>
                <option value=\"Kylian\">Kylian</option>
            </select>
        </div>

        <div class=\"mb-3\">
            <input type=\"file\" class=\"custom-file-input\" name=\"Image\">
        </div>


        <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
    </form>


{% endblock %}
", "Admin/Article/add.html.twig", "/var/www/html/src/View/Admin/Article/add.html.twig");
    }
}
