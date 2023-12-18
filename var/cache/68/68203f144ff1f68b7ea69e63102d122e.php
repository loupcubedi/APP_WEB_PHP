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

/* Admin/Article/update.html.twig */
class __TwigTemplate_72680eb535f1a4edb5ae0ab6815f4a30 extends Template
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
        $this->parent = $this->loadTemplate("base.html.twig", "Admin/Article/update.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Mise à jour de l'article";
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "    <h1>Mise à jour de l'article</h1>

    <form method=\"post\" enctype=\"multipart/form-data\">
        <div>
            <label for=\"Titre\">Titre</label>
            <input type=\"text\" id=\"Titre\" name=\"Titre\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "getTitre", [], "any", false, false, false, 11), "html", null, true);
        echo "\" required>
        </div>

        <div>
            <label for=\"Description\">Description</label>
            <textarea id=\"Description\" name=\"Description\" required>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "getDescription", [], "any", false, false, false, 16), "html", null, true);
        echo "</textarea>
        </div>

        <div>
            <label for=\"Auteur\">Auteur</label>
            <input type=\"text\" id=\"Auteur\" name=\"Auteur\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "getAuteur", [], "any", false, false, false, 21), "html", null, true);
        echo "\" required>
        </div>

        <div>
            <label for=\"DatePublication\">Date de publication</label>
            <input type=\"date\" id=\"DatePublication\" name=\"DatePublication\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "getDatePublication", [], "any", false, false, false, 26), "Y-m-d"), "html", null, true);
        echo "\" required>
        </div>

        <div>
            <label for=\"Image\">Image</label>
            <input type=\"file\" id=\"Image\" name=\"Image\">
            ";
        // line 32
        if (twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "getImageFileName", [], "any", false, false, false, 32)) {
            // line 33
            echo "                <img src=\"/uploads/images/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "getImageRepository", [], "any", false, false, false, 33), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "getImageFileName", [], "any", false, false, false, 33), "html", null, true);
            echo "\" alt=\"Image actuelle\" style=\"max-width: 200px;\">
            ";
        }
        // line 35
        echo "        </div>

        <div>
            <button type=\"submit\">Mettre à jour</button>
        </div>
    </form>

    <a href=\"/?controller=AdminArticle&action=list\">Retour à la liste des articles</a>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "Admin/Article/update.html.twig";
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
        return array (  108 => 35,  100 => 33,  98 => 32,  89 => 26,  81 => 21,  73 => 16,  65 => 11,  58 => 6,  54 => 5,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Mise à jour de l'article{% endblock %}

{% block body %}
    <h1>Mise à jour de l'article</h1>

    <form method=\"post\" enctype=\"multipart/form-data\">
        <div>
            <label for=\"Titre\">Titre</label>
            <input type=\"text\" id=\"Titre\" name=\"Titre\" value=\"{{ article.getTitre }}\" required>
        </div>

        <div>
            <label for=\"Description\">Description</label>
            <textarea id=\"Description\" name=\"Description\" required>{{ article.getDescription }}</textarea>
        </div>

        <div>
            <label for=\"Auteur\">Auteur</label>
            <input type=\"text\" id=\"Auteur\" name=\"Auteur\" value=\"{{ article.getAuteur }}\" required>
        </div>

        <div>
            <label for=\"DatePublication\">Date de publication</label>
            <input type=\"date\" id=\"DatePublication\" name=\"DatePublication\" value=\"{{ article.getDatePublication|date('Y-m-d') }}\" required>
        </div>

        <div>
            <label for=\"Image\">Image</label>
            <input type=\"file\" id=\"Image\" name=\"Image\">
            {% if article.getImageFileName %}
                <img src=\"/uploads/images/{{ article.getImageRepository }}/{{ article.getImageFileName }}\" alt=\"Image actuelle\" style=\"max-width: 200px;\">
            {% endif %}
        </div>

        <div>
            <button type=\"submit\">Mettre à jour</button>
        </div>
    </form>

    <a href=\"/?controller=AdminArticle&action=list\">Retour à la liste des articles</a>
{% endblock %}
", "Admin/Article/update.html.twig", "/var/www/html/src/View/Admin/Article/update.html.twig");
    }
}
