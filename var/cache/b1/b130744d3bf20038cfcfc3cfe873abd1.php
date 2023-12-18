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

/* Article/show.html.twig */
class __TwigTemplate_8a1a965c838f891943e3ab6d83496240 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'css' => [$this, 'block_css'],
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
        $this->parent = $this->loadTemplate("base.html.twig", "Article/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " Article ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "titre", [], "any", false, false, false, 2), "html", null, true);
        echo " - ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "    <link href=\"/assets/css/article.show.css\" rel=\"stylesheet\">
";
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "    <h1>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "titre", [], "any", false, false, false, 7), "html", null, true);
        echo "</h1>
    <p><strong>Description :</strong>";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "description", [], "any", false, false, false, 8), "html", null, true);
        echo "</p>
    <p><strong>Auteur :</strong>";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "Auteur", [], "any", false, false, false, 9), "html", null, true);
        echo "</p>
    <p><strong>Date :</strong>";
        // line 10
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "DatePublication", [], "any", false, false, false, 10), "d/m/Y"), "html", null, true);
        echo "</p>
    <p>

        ";
        // line 13
        if (($this->env->getFunction('file_exist')->getCallable()(((("./uploads/images/" . twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageRepository", [], "any", false, false, false, 13)) . "/") . twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageFileName", [], "any", false, false, false, 13))) && (twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageFileName", [], "any", false, false, false, 13) != ""))) {
            // line 14
            echo "
            <img src=\"/uploads/images/";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageRepository", [], "any", false, false, false, 15), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["article"] ?? null), "ImageFileName", [], "any", false, false, false, 15), "html", null, true);
            echo "\" class=\"img-thumbnail\"/>


        ";
        }
        // line 19
        echo "
    </p>

    <p>
        ";
        // line 26
        echo "    </p>
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "Article/show.html.twig";
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
        return array (  110 => 26,  104 => 19,  95 => 15,  92 => 14,  90 => 13,  84 => 10,  80 => 9,  76 => 8,  71 => 7,  67 => 6,  62 => 4,  58 => 3,  48 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}
{% block title %} Article {{ article.titre}} - {{ parent() }}{% endblock %}
{% block css %}
    <link href=\"/assets/css/article.show.css\" rel=\"stylesheet\">
{% endblock %}
{% block body %}
    <h1>{{ article.titre }}</h1>
    <p><strong>Description :</strong>{{ article.description }}</p>
    <p><strong>Auteur :</strong>{{ article.Auteur }}</p>
    <p><strong>Date :</strong>{{ article.DatePublication|date(\"d/m/Y\") }}</p>
    <p>

        {% if file_exist( './uploads/images/'~article.ImageRepository~'/'~article.ImageFileName ) and article.ImageFileName !=\"\" %}

            <img src=\"/uploads/images/{{ article.ImageRepository }}/{{ article.ImageFileName }}\" class=\"img-thumbnail\"/>


        {% endif %}

    </p>

    <p>
        {#
        <a href=\"/Article/pdf/{{ article.id }}\" class=\"btn btn-primary\">Exporter en PDF</a>
        #}
    </p>
{%  endblock %}", "Article/show.html.twig", "/var/www/html/src/View/Article/show.html.twig");
    }
}
